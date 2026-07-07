#!/usr/bin/env bash

set -Eeuo pipefail

# ==================================================
# AUTO GIT BACKUP - SASTRA BHINNEKA KARYA V2
# Root/Super User Mode + New Repository + No Raw DB
# ==================================================
#
# Tujuan script:
# - Jalan sebagai root/super user.
# - Push project /home/backend/sastra_bhineka ke repository baru:
#   git@github.com:arhan321/sastra_bhinneka_karya_v2.git
# - Branch target: main
# - db/data TIDAK ikut push.
# - File/folder lain tetap dipush, kecuali file runtime log/lock.
# - Backup SQL tetap ikut dipush walaupun kena .gitignore.
# - Kalau .git corrupt / HEAD rusak / object kosong, script akan membuat ulang
#   metadata .git tanpa menghapus isi folder project.
#
# Catatan:
# - Pastikan .gitignore berisi:
#   db/data
#   /db/data/
# - Jangan jalankan git reset --hard jika tidak ingin file lokal tertimpa.

# --------------------------------------------------
# Jalankan sebagai root
# --------------------------------------------------
if [ "$(id -u)" -ne 0 ]; then
    echo "[INFO] Script ini butuh super user/root. Menjalankan ulang pakai sudo..."
    exec sudo -E /bin/bash "$0" "$@"
fi

export PATH=/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin
export HOME=/root

PROJECT_DIR="/home/backend/sastra_bhineka"
BRANCH="main"
REMOTE_URL="git@github.com:arhan321/sastra_bhinneka_karya_v2.git"

# Global SSH key untuk GitHub
SSH_KEY="/etc/ssh/github_keys/id_ed25519_github"
export GIT_SSH_COMMAND="ssh -i $SSH_KEY -o IdentitiesOnly=yes -o StrictHostKeyChecking=accept-new"

# Log root mode
RUNTIME_DIR="/var/log/auto_git_sastra_bhineka_v2"
LOG_FILE="$RUNTIME_DIR/auto_git_commit.log"
LOCK_FILE="/var/lock/auto_git_sastra_bhineka_v2.lock"

# Sesuai permintaan:
# - Raw database db/data TIDAK ikut push.
# - Backup SQL tetap ikut push.
# - .env ikut push karena user minta selain db/data tetap dipush.
INCLUDE_ENV_FILE="true"
INCLUDE_BACKUP_SQL="true"
INCLUDE_RAW_DB_DATA="false"

# Identitas commit
export GIT_AUTHOR_NAME="Sastra Bhinneka Auto Backup"
export GIT_AUTHOR_EMAIL="arhanmali96@gmail.com"
export GIT_COMMITTER_NAME="Sastra Bhinneka Auto Backup"
export GIT_COMMITTER_EMAIL="arhanmali96@gmail.com"

BACKUP_SQL_DIRS=(
    "backup_database/src/uploads/backup"
    "backup_database/src/upload/uploads/backup"
    "backup_database/src/upload/backup"
    "backup_database/src/backup"
    "backup_database/backup"
)

RAW_DB_DIRS=(
    "db/data"
    "database/data"
    "mysql/data"
    "mariadb/data"
)

mkdir -p "$RUNTIME_DIR"
touch "$LOG_FILE" 2>/dev/null || true

timestamp() {
    date '+%Y-%m-%d %H:%M:%S'
}

log() {
    echo "[$(timestamp)] $*"
}

run_git() {
    GIT_SSH_COMMAND="$GIT_SSH_COMMAND" git "$@"
}

is_file_in_use() {
    local file="$1"

    if command -v fuser >/dev/null 2>&1; then
        fuser "$file" >/dev/null 2>&1
        return $?
    fi

    if command -v lsof >/dev/null 2>&1; then
        lsof "$file" >/dev/null 2>&1
        return $?
    fi

    return 1
}

check_requirements() {
    if [ ! -d "$PROJECT_DIR" ]; then
        log "ERROR: Project directory tidak ditemukan: $PROJECT_DIR"
        exit 1
    fi

    if [ ! -f "$SSH_KEY" ]; then
        log "ERROR: SSH key tidak ditemukan: $SSH_KEY"
        exit 1
    fi

    chmod 700 "$(dirname "$SSH_KEY")" 2>/dev/null || true
    chmod 600 "$SSH_KEY" 2>/dev/null || true
    chmod 644 "$SSH_KEY.pub" 2>/dev/null || true

    if [ ! -r "$SSH_KEY" ]; then
        log "ERROR: SSH key tidak bisa dibaca oleh root: $SSH_KEY"
        exit 1
    fi
}

setup_root_git_config() {
    run_git config --global --add safe.directory "$PROJECT_DIR" 2>/dev/null || true
    run_git config --global user.name "$GIT_AUTHOR_NAME" 2>/dev/null || true
    run_git config --global user.email "$GIT_AUTHOR_EMAIL" 2>/dev/null || true
}

ensure_gitignore_raw_db() {
    cd "$PROJECT_DIR"

    touch .gitignore

    if ! grep -qxF "db/data" .gitignore 2>/dev/null; then
        echo "db/data" >> .gitignore
        log "Menambahkan db/data ke .gitignore"
    fi

    if ! grep -qxF "/db/data/" .gitignore 2>/dev/null; then
        echo "/db/data/" >> .gitignore
        log "Menambahkan /db/data/ ke .gitignore"
    fi
}

init_clean_git_metadata() {
    log "Membuat ulang metadata .git lokal tanpa menghapus isi project..."

    cd "$PROJECT_DIR"

    local ts
    ts="$(date +%F_%H%M%S)"

    if [ -d "$PROJECT_DIR/.git" ]; then
        log "Memindahkan .git lama/rusak ke /tmp/sastra_bhineka_git_corrupt_$ts"
        mv "$PROJECT_DIR/.git" "/tmp/sastra_bhineka_git_corrupt_$ts"
    fi

    run_git init
    run_git branch -M "$BRANCH" 2>/dev/null || true
    run_git remote add origin "$REMOTE_URL" 2>/dev/null || run_git remote set-url origin "$REMOTE_URL"
    setup_root_git_config

    log "Metadata .git baru sudah dibuat untuk remote baru."
}

cleanup_old_git_locks() {
    cd "$PROJECT_DIR"

    if [ ! -d "$PROJECT_DIR/.git" ]; then
        return 0
    fi

    local old_locks
    old_locks="$(find "$PROJECT_DIR/.git" -type f -name "*.lock" -mmin +3 2>/dev/null || true)"

    if [ -z "$old_locks" ]; then
        return 0
    fi

    log "Git lock lama ditemukan:"
    echo "$old_locks"

    echo "$old_locks" | while read -r lock_file; do
        if [ -z "$lock_file" ] || [ ! -f "$lock_file" ]; then
            continue
        fi

        if is_file_in_use "$lock_file"; then
            log "Lock masih dipakai proses aktif, tidak dihapus: $lock_file"
            continue
        fi

        log "Menghapus Git lock lama: $lock_file"
        rm -f "$lock_file"
    done
}

check_git_integrity_or_repair() {
    cd "$PROJECT_DIR"

    if [ ! -d "$PROJECT_DIR/.git" ]; then
        log ".git tidak ditemukan."
        init_clean_git_metadata
        return 0
    fi

    if ! run_git rev-parse --git-dir >/dev/null 2>&1; then
        log "Repository Git tidak valid."
        init_clean_git_metadata
        return 0
    fi

    local empty_objects
    empty_objects="$(find "$PROJECT_DIR/.git/objects" -type f -empty 2>/dev/null || true)"

    if [ -n "$empty_objects" ]; then
        log "Ditemukan object Git kosong/rusak:"
        echo "$empty_objects"
        init_clean_git_metadata
        return 0
    fi

    if run_git rev-parse --verify HEAD >/dev/null 2>&1; then
        if ! run_git fsck --connectivity-only --no-dangling >/dev/null 2>&1; then
            log "Git fsck gagal. Repository kemungkinan bermasalah."
            init_clean_git_metadata
            return 0
        fi
    else
        log "HEAD belum punya commit atau branch belum valid. Lanjut sebagai repo baru."
    fi

    log "Git integrity OK."
}

check_git_state() {
    cd "$PROJECT_DIR"

    if [ ! -d "$PROJECT_DIR/.git" ]; then
        return 0
    fi

    if [ -d "$PROJECT_DIR/.git/rebase-merge" ] || [ -d "$PROJECT_DIR/.git/rebase-apply" ]; then
        log "Ada proses rebase belum selesai. Membatalkan rebase..."
        run_git rebase --abort || true
    fi

    if [ -f "$PROJECT_DIR/.git/MERGE_HEAD" ]; then
        log "Ada proses merge belum selesai. Membatalkan merge..."
        run_git merge --abort || true
    fi
}

setup_git_repo() {
    cd "$PROJECT_DIR"

    setup_root_git_config
    ensure_gitignore_raw_db

    run_git config core.fileMode false 2>/dev/null || true

    local current_remote
    current_remote="$(run_git remote get-url origin 2>/dev/null || true)"

    if [ -z "$current_remote" ]; then
        log "Remote origin belum ada. Menambahkan origin..."
        run_git remote add origin "$REMOTE_URL"
    elif [ "$current_remote" != "$REMOTE_URL" ]; then
        log "Remote origin berbeda. Mengubah remote origin..."
        log "Remote lama: $current_remote"
        log "Remote baru: $REMOTE_URL"
        run_git remote set-url origin "$REMOTE_URL"
    fi

    local active_branch
    active_branch="$(run_git branch --show-current || true)"

    if [ -z "$active_branch" ]; then
        log "Branch aktif kosong. Membuat/memakai branch $BRANCH..."
        run_git checkout -B "$BRANCH"
        active_branch="$BRANCH"
    elif [ "$active_branch" != "$BRANCH" ]; then
        log "Branch aktif bukan $BRANCH. Mengubah ke $BRANCH..."
        run_git checkout -B "$BRANCH"
        active_branch="$BRANCH"
    fi

    log "User aktif: $(whoami)"
    log "Project dir: $PROJECT_DIR"
    log "Branch target: $BRANCH"
    log "Branch aktif: ${active_branch:-unknown}"
    log "Remote URL: $REMOTE_URL"
    log "SSH key aktif: $SSH_KEY"
    log "INCLUDE_RAW_DB_DATA=$INCLUDE_RAW_DB_DATA"
}

sync_with_remote_before_commit() {
    cd "$PROJECT_DIR"

    log "Fetch remote terbaru..."
    if ! run_git fetch origin "$BRANCH" --prune; then
        log "WARNING: Fetch gagal atau branch remote belum ada. Lanjut commit lokal dulu."
        return 0
    fi

    if ! run_git rev-parse --verify "origin/$BRANCH" >/dev/null 2>&1; then
        log "origin/$BRANCH belum ada. Lanjut commit lalu push branch baru."
        return 0
    fi

    if ! run_git rev-parse --verify HEAD >/dev/null 2>&1; then
        log "Local HEAD belum ada. Skip sync remote sebelum initial commit."
        return 0
    fi

    local local_sha
    local remote_sha
    local base_sha

    local_sha="$(run_git rev-parse HEAD)"
    remote_sha="$(run_git rev-parse "origin/$BRANCH")"
    base_sha="$(run_git merge-base HEAD "origin/$BRANCH" || true)"

    if [ "$local_sha" = "$remote_sha" ]; then
        log "Branch lokal sudah sama dengan origin/$BRANCH."
        return 0
    fi

    if [ "$local_sha" = "$base_sha" ]; then
        log "Branch lokal tertinggal dari origin/$BRANCH. Pull rebase..."
        run_git pull --rebase --autostash origin "$BRANCH" || {
            log "Pull rebase gagal. Membatalkan rebase lalu lanjut commit lokal."
            run_git rebase --abort || true
        }
        return 0
    fi

    if [ "$remote_sha" = "$base_sha" ]; then
        log "Branch lokal lebih maju dari origin/$BRANCH. Lanjut commit/push."
        return 0
    fi

    log "Branch lokal dan remote diverged. Mencoba pull rebase..."
    run_git pull --rebase --autostash origin "$BRANCH" || {
        log "Pull rebase diverged gagal. Membatalkan rebase."
        run_git rebase --abort || true
    }
}

stage_env_file() {
    cd "$PROJECT_DIR"

    if [ "$INCLUDE_ENV_FILE" != "true" ]; then
        run_git restore --staged -- .env 2>/dev/null || true
        return 0
    fi

    if [ -f "$PROJECT_DIR/.env" ]; then
        log "Stage .env sesuai permintaan backup."
        run_git add -f .env 2>/dev/null || true
    fi
}

stage_backup_sql_files() {
    if [ "$INCLUDE_BACKUP_SQL" != "true" ]; then
        return 0
    fi

    cd "$PROJECT_DIR"

    local dir
    local sql_file
    local rel_path

    for dir in "${BACKUP_SQL_DIRS[@]}"; do
        if [ ! -d "$PROJECT_DIR/$dir" ]; then
            continue
        fi

        for sql_file in "$PROJECT_DIR/$dir"/*.sql; do
            if [ ! -f "$sql_file" ]; then
                continue
            fi

            rel_path="${sql_file#$PROJECT_DIR/}"

            if is_file_in_use "$sql_file"; then
                log "Skip backup SQL karena masih dipakai proses lain: $rel_path"
                continue
            fi

            log "Stage backup SQL: $rel_path"
            run_git add -f "$rel_path" 2>/dev/null || true
        done
    done
}

unstage_raw_db_dirs() {
    cd "$PROJECT_DIR"

    local dir

    log "Raw database folder TIDAK akan ikut commit/push."

    for dir in "${RAW_DB_DIRS[@]}"; do
        if [ -d "$PROJECT_DIR/$dir" ]; then
            log "Unstage raw database dir: $dir"
            run_git restore --staged -- "$dir" 2>/dev/null || true
            run_git rm -r --cached --ignore-unmatch "$dir" 2>/dev/null || true
        fi
    done
}

unstage_runtime_and_lock_files() {
    cd "$PROJECT_DIR"

    run_git restore --staged -- auto_git_commit.log 2>/dev/null || true
    run_git restore --staged -- cron_git_runner.log 2>/dev/null || true
    run_git restore --staged -- .auto_git_commit.lock 2>/dev/null || true
    run_git restore --staged -- .gitignore.lock 2>/dev/null || true
    run_git restore --staged -- "$LOG_FILE" 2>/dev/null || true

    local log_files
    log_files="$(run_git diff --cached --name-only | grep -E '(^|/).*\.log$' || true)"

    if [ -n "$log_files" ]; then
        echo "$log_files" | while read -r log_path; do
            if [ -n "$log_path" ]; then
                log "Unstage log file: $log_path"
                run_git restore --staged -- "$log_path" 2>/dev/null || true
            fi
        done
    fi

    local lock_files
    lock_files="$(run_git diff --cached --name-only | grep -E '(^|/).*\.lock$' || true)"

    if [ -n "$lock_files" ]; then
        echo "$lock_files" | while read -r lock_path; do
            if [ -n "$lock_path" ]; then
                log "Unstage lock file: $lock_path"
                run_git restore --staged -- "$lock_path" 2>/dev/null || true
            fi
        done
    fi
}

stage_changes() {
    cd "$PROJECT_DIR"

    ensure_gitignore_raw_db

    log "Status perubahan sebelum add:"
    run_git status --short || true

    log "Menambahkan perubahan umum ke staging..."
    run_git add -A

    stage_env_file
    stage_backup_sql_files
    unstage_raw_db_dirs
    unstage_runtime_and_lock_files

    log "Status perubahan setelah staging:"
    run_git status --short || true
}

commit_and_push() {
    cd "$PROJECT_DIR"

    if run_git diff --cached --quiet; then
        log "Tidak ada perubahan untuk di-commit."
    else
        local commit_message
        commit_message="auto commit sastra bhinneka v2: $(timestamp)"
        log "Membuat commit: $commit_message"
        run_git commit -m "$commit_message"
    fi

    log "Push ke GitHub repo baru..."

    if run_git push -u origin "HEAD:$BRANCH"; then
        log "Auto commit dan push ke repo baru berhasil."
        return 0
    fi

    log "Push gagal. Mencoba fetch + pull rebase lalu push ulang..."

    run_git fetch origin "$BRANCH" --prune || true

    if run_git pull --rebase --autostash origin "$BRANCH"; then
        log "Pull rebase berhasil. Mencoba push ulang..."
        run_git push -u origin "HEAD:$BRANCH"
        log "Auto commit dan push berhasil setelah rebase."
    else
        log "ERROR: Pull rebase gagal."
        run_git rebase --abort || true
        log "Cek manual: cd $PROJECT_DIR && git status"
        exit 1
    fi
}

main() {
    flock -n 9 || {
        log "Script masih berjalan, skip."
        exit 0
    }

    echo "=================================================="
    log "Mulai auto commit Sastra Bhinneka V2 ROOT mode..."

    check_requirements

    cd "$PROJECT_DIR"

    setup_root_git_config
    cleanup_old_git_locks
    check_git_integrity_or_repair
    check_git_state
    setup_git_repo

    log "Remote aktif:"
    run_git remote -v || true

    log "Cek koneksi SSH GitHub..."
    ssh -i "$SSH_KEY" -o IdentitiesOnly=yes -o StrictHostKeyChecking=accept-new -T git@github.com || true

    log "Auto commit berjalan sebagai root."
    log "db/data tidak akan dipush."

    sync_with_remote_before_commit
    stage_changes
    commit_and_push

    log "Selesai."
}

main 9>"$LOCK_FILE" >> "$LOG_FILE" 2>&1
