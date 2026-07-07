cat > src/resources/views/filament/widgets/quick-summary.blade.php << 'EOF' <x-filament-widgets::widget>
    <x-filament::section>
        <x-slot name="heading">Ringkasan Data</x-slot>
        <x-slot name="description">Overview konten website saat ini</x-slot>

        <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px;">
            <div style="background: #fff1f2; border: 1px solid #fecdd3; border-radius: 12px; padding: 16px;">
                <p style="font-size: 12px; color: #6b7280; margin-bottom: 8px; font-weight: 600;">🔧 LAYANAN</p>
                <p style="font-size: 28px; font-weight: 900; color: #dc2626; margin: 0;">{{ $activeServices }}</p>
                <p style="font-size: 11px; color: #9ca3af; margin-top: 4px;">{{ $totalServices }} total terdaftar</p>
                <hr style="margin: 8px 0; border-color: #fecdd3;">
                <p style="font-size: 11px; color: #6b7280; margin: 2px 0;">🏗 Konstruksi:
                    <strong>{{ $constructionCount }}</strong></p>
                <p style="font-size: 11px; color: #6b7280; margin: 2px 0;">📄 Non-Konstruksi:
                    <strong>{{ $nonConstructionCount }}</strong></p>
            </div>

            <div style="background: #fffbeb; border: 1px solid #fde68a; border-radius: 12px; padding: 16px;">
                <p style="font-size: 12px; color: #6b7280; margin-bottom: 8px; font-weight: 600;">📁 PORTOFOLIO</p>
                <p style="font-size: 28px; font-weight: 900; color: #d97706; margin: 0;">{{ $visiblePortfolios }}</p>
                <p style="font-size: 11px; color: #9ca3af; margin-top: 4px;">{{ $totalPortfolios }} total terdaftar</p>
                <hr style="margin: 8px 0; border-color: #fde68a;">
                <p style="font-size: 11px; color: #6b7280; margin: 2px 0;">👁 Tampil:
                    <strong>{{ $visiblePortfolios }}</strong></p>
                <p style="font-size: 11px; color: #6b7280; margin: 2px 0;">🙈 Tersembunyi:
                    <strong>{{ $totalPortfolios - $visiblePortfolios }}</strong></p>
            </div>

            <div style="background: #f0fdf4; border: 1px solid #bbf7d0; border-radius: 12px; padding: 16px;">
                <p style="font-size: 12px; color: #6b7280; margin-bottom: 8px; font-weight: 600;">🏢 KLIEN</p>
                <p style="font-size: 28px; font-weight: 900; color: #16a34a; margin: 0;">{{ $activeClients }}</p>
                <p style="font-size: 11px; color: #9ca3af; margin-top: 4px;">{{ $totalClients }} total terdaftar</p>
                <hr style="margin: 8px 0; border-color: #bbf7d0;">
                <p style="font-size: 11px; color: #6b7280; margin: 2px 0;">✅ Aktif:
                    <strong>{{ $activeClients }}</strong></p>
                <p style="font-size: 11px; color: #6b7280; margin: 2px 0;">❌ Nonaktif:
                    <strong>{{ $totalClients - $activeClients }}</strong></p>
            </div>

            <div style="background: #eff6ff; border: 1px solid #bfdbfe; border-radius: 12px; padding: 16px;">
                <p style="font-size: 12px; color: #6b7280; margin-bottom: 8px; font-weight: 600;">✉️ PESAN</p>
                <p style="font-size: 28px; font-weight: 900; color: #2563eb; margin: 0;">{{ $newMessages }}</p>
                <p style="font-size: 11px; color: #9ca3af; margin-top: 4px;">{{ $totalMessages }} total pesan</p>
                <hr style="margin: 8px 0; border-color: #bfdbfe;">
                <p style="font-size: 11px; color: #dc2626; margin: 2px 0;">🔴 Belum dibaca:
                    <strong>{{ $newMessages }}</strong></p>
                <p style="font-size: 11px; color: #6b7280; margin: 2px 0;">✅ Dibaca:
                    <strong>{{ $totalMessages - $newMessages }}</strong></p>
            </div>
        </div>
    </x-filament::section>
    </x-filament-widgets::widget>
    EOF
