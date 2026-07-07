# PHP Database Backup Tool

Tools sederhana untuk melakukan backup database MySQL/MariaDB ke file `.sql` menggunakan PHP native dan Docker Apache.

Project ini bisa dijalankan lewat browser, CLI, atau otomatis menggunakan cron.

---

## Struktur Folder

```text
backup_database/
├── backup.php
├── config.php
├── run_backup.php
├── docker-compose.yml
├── dockerfile
├── httpd.vhost.conf
├── uploads/
│   └── backup/
│       ├── .htaccess
│       ├── backup.lock
│       └── backup_*.sql
└── backup.log
```

---

## Konfigurasi Database

File utama konfigurasi ada di:

```text
config.php
```

Contoh konfigurasi:

```php
<?php

declare(strict_types=1);

return [
    'db' => [
        'host' => '100.100.55.22',
        'port' => 62307,
        'name' => 'sdk_db',
        'username' => 'root',
        'password' => 'ISI_PASSWORD_DATABASE',
        'charset' => 'utf8mb4',
    ],

    'backup_dir' => __DIR__ . '/uploads/backup',
    'backup_prefix' => 'backup_sdk_db_',
    'keep_last_files' => 12,
    'timezone' => 'Asia/Jakarta',
];
```

> Catatan: jangan commit password asli ke GitHub. Gunakan `.env` atau file konfigurasi lokal jika project ini dipakai di production.

---

## File Runner Backup

File:

```text
run_backup.php
```

Isi:

```php
<?php

declare(strict_types=1);

require __DIR__ . '/backup.php';
```

File ini digunakan untuk menjalankan backup, baik dari browser, CLI, maupun cron.

---

## Konfigurasi Apache

File:

```text
httpd.vhost.conf
```

Isi:

```apache
<Directory /var/www/html>
    Options +Indexes +FollowSymLinks
    AllowOverride All
    Require all granted
</Directory>
```

Konfigurasi ini digunakan agar:

- Apache dapat membaca `.htaccess`
- Folder dapat menampilkan halaman `Index Of`
- File di `/var/www/html` dapat diakses dari browser

---

## Menjalankan Docker

Build dan jalankan container:

```bash
sudo docker compose up -d --build
```

Cek container:

```bash
sudo docker ps
```

Masuk ke container:

```bash
sudo docker exec -it php_backup_sastra bash
```

---

## Menjalankan Backup Manual

Dari host/server:

```bash
sudo docker exec php_backup_sastra php /var/www/html/run_backup.php
```

Atau dari dalam container:

```bash
php /var/www/html/run_backup.php
```

Hasil backup akan masuk ke:

```text
uploads/backup/
```

Contoh file hasil backup:

```text
backup_sdk_db_2026-05-02_16-30-00.sql
```

---

## Menampilkan Folder Backup dari Browser

Buka URL:

```text
http://100.100.55.22:46/uploads/backup/
```

Jika konfigurasi Apache dan `.htaccess` benar, halaman `Index Of` akan muncul.

---

## Memberi Password pada Index Of

Agar folder backup tetap bisa dibuka, tetapi harus login terlebih dahulu, gunakan Basic Auth.

### 1. Buat file `.htaccess`

File:

```text
uploads/backup/.htaccess
```

Isi:

```apache
Options +Indexes

AuthType Basic
AuthName "Backup Database"
AuthUserFile /etc/apache2/.htpasswd
Require valid-user
```

Dengan konfigurasi ini, halaman `Index Of` dan file `.sql` di dalam folder backup hanya bisa dibuka setelah login.

---

### 2. Masuk ke container

```bash
sudo docker exec -it php_backup_sastra bash
```

---

### 3. Install tool `htpasswd`

```bash
apt-get update
apt-get install -y apache2-utils
```

---

### 4. Buat username dan password

Contoh:

```text
username: admin
password: password
```

Command:

```bash
htpasswd -bc /etc/apache2/.htpasswd admin 'password'
```

Set permission:

```bash
chown root:www-data /etc/apache2/.htpasswd
chmod 640 /etc/apache2/.htpasswd
```

Restart/reload Apache:

```bash
apachectl graceful
```

Keluar dari container:

```bash
exit
```

---

### 5. Test di browser

Buka:

```text
http://100.100.55.22:46/uploads/backup/
```

Login menggunakan username dan password yang sudah dibuat.

---

## Mengubah Password Basic Auth

Masuk ke container:

```bash
sudo docker exec -it php_backup_sastra bash
```

Buat ulang password:

```bash
htpasswd -bc /etc/apache2/.htpasswd admin 'password_baru'
chown root:www-data /etc/apache2/.htpasswd
chmod 640 /etc/apache2/.htpasswd
apachectl graceful
```

> Flag `-c` akan membuat ulang file `.htpasswd`. Jika ada user lama, user lama akan terhapus.

---

## Cronjob Backup Otomatis

Edit crontab root:

```bash
sudo crontab -e
```

### Jadwal testing setiap 1 menit

```cron
* * * * * /usr/bin/docker exec php_backup_sastra php /var/www/html/run_backup.php >> /home/backend/sastra_bhineka/backup_database/backup.log 2>&1
```

### Jadwal production setiap Minggu jam 01:00

```cron
0 1 * * 0 /usr/bin/docker exec php_backup_sastra php /var/www/html/run_backup.php >> /home/backend/sastra_bhineka/backup_database/backup.log 2>&1
```

Cek log:

```bash
tail -f /home/backend/sastra_bhineka/backup_database/backup.log
```

---

## Catatan Penting Cron

Jangan gunakan `-it` pada command cron.

Benar:

```bash
docker exec php_backup_sastra php /var/www/html/run_backup.php
```

Salah:

```bash
docker exec -it php_backup_sastra php /var/www/html/run_backup.php
```

Cron berjalan non-interaktif, jadi opsi `-it` dapat menyebabkan command gagal.

---

## Troubleshooting

### 1. Muncul `500 Internal Server Error`

Cek log Apache:

```bash
sudo docker exec -it php_backup_sastra bash
tail -n 80 /var/log/apache2/error.log
```

Penyebab yang sering terjadi:

- File `/etc/apache2/.htpasswd` belum ada
- Permission `.htpasswd` salah
- Isi `.htaccess` salah
- `AllowOverride All` belum aktif
- Container baru hasil rebuild belum dibuatkan ulang `.htpasswd`

Cek file `.htpasswd`:

```bash
ls -lah /etc/apache2/.htpasswd
cat /etc/apache2/.htpasswd
```

Jika file tidak ada, buat ulang:

```bash
htpasswd -bc /etc/apache2/.htpasswd admin 'password'
chown root:www-data /etc/apache2/.htpasswd
chmod 640 /etc/apache2/.htpasswd
apachectl graceful
```

---

### 2. Warning `ServerName`

Jika muncul warning:

```text
AH00558: apache2: Could not reliably determine the server's fully qualified domain name
```

Itu bukan error fatal. Untuk menghilangkannya, jalankan di dalam container:

```bash
echo "ServerName localhost" > /etc/apache2/conf-available/servername.conf
a2enconf servername
apachectl graceful
```

---

### 3. `.htpasswd` Hilang Setelah Rebuild

Jika menjalankan:

```bash
sudo docker compose up -d --build
```

container bisa dibuat ulang. File yang dibuat manual di dalam container seperti:

```text
/etc/apache2/.htpasswd
```

bisa hilang.

Solusi sederhana: buat ulang `.htpasswd` setelah rebuild.

Solusi lebih rapi: tambahkan pembuatan `.htpasswd` ke Dockerfile atau mount sebagai volume.

---

## Rekomendasi `.gitignore`

Tambahkan file `.gitignore` agar backup dan credential tidak ikut masuk GitHub:

```gitignore
.env
backup.log
uploads/backup/*.sql
uploads/backup/*.bak
uploads/backup/backup.lock
```

Jika ingin tetap menyimpan folder `uploads/backup`, tambahkan file kosong:

```text
uploads/backup/.gitkeep
```

Lalu `.gitignore` bisa dibuat seperti ini:

```gitignore
.env
backup.log

uploads/backup/*
!uploads/backup/.gitkeep
!uploads/backup/.htaccess
```

---

## Catatan Keamanan

- Jangan commit password database ke GitHub.
- Jangan gunakan password Basic Auth yang terlalu mudah di production.
- Lebih aman jika halaman backup hanya bisa diakses dari jaringan internal/VPN.
- Backup database berisi data sensitif, jadi pastikan folder backup tidak dibuka publik tanpa proteksi.
- Gunakan HTTPS jika backup diakses lewat browser.

---

## Command Ringkas

Build container:

```bash
sudo docker compose up -d --build
```

Backup manual:

```bash
sudo docker exec php_backup_sastra php /var/www/html/run_backup.php
```

Cek log backup:

```bash
tail -f /home/backend/sastra_bhineka/backup_database/backup.log
```

Masuk container:

```bash
sudo docker exec -it php_backup_sastra bash
```

Reload Apache:

```bash
apachectl graceful
```
