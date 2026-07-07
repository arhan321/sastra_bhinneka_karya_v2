<?php

namespace App\Filament\Pages;

use App\Models\HomepageSetting;
use App\Models\Client;
use App\Models\Service;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Actions\Action;

class ManageHomepage extends Page implements HasForms
{
    use InteractsWithForms;

    protected string $view = 'filament.pages.manage-homepage';

    public static function getNavigationIcon(): string
    {
        return 'heroicon-o-home';
    }

    public static function getNavigationLabel(): string
    {
        return 'Pengaturan Beranda';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Konten Website';
    }

    public static function getNavigationSort(): ?int
    {
        return 1;
    }

    public ?array $data = [];

    public function mount(): void
    {
        $setting = HomepageSetting::getInstance();
        $data = $setting->toArray();

        // Auto-hitung dari database, timpa nilai yang tersimpan
        $data['stat_clients'] = Client::where('is_active', true)->count();
        $data['stat_services'] = Service::where('is_active', true)->count();

        $this->form->fill($data);
    }

    public function form(Schema $form): Schema
    {
        $autoClients  = Client::where('is_active', true)->count();
        $autoServices = Service::where('is_active', true)->count();

        return $form
            ->components([

                // HERO SECTION
                Section::make('🖼️ Hero Section')
                    ->description('Bagian utama paling atas halaman beranda')
                    ->schema([
                        FileUpload::make('hero_logo_image')
                            ->label('Logo Hero (ditampilkan di kanan hero section)')
                            ->image()
                            ->disk('public')
                            ->directory('homepage/logo')
                            ->helperText('Format: PNG (transparan). Maks 10MB. Logo yang tampil di panel kanan hero.')
                            ->maxSize(10240)
                            ->columnSpanFull(),

                        TextInput::make('hero_badge_text')
                            ->label('Teks Badge')
                            ->helperText('Label kecil di atas judul')
                            ->maxLength(100)
                            ->columnSpanFull(),

                        Grid::make(3)->schema([
                            TextInput::make('hero_title_line1')->label('Judul Baris 1')->maxLength(100),
                            TextInput::make('hero_title_line2')->label('Judul Baris 2 (merah)')->maxLength(100),
                            TextInput::make('hero_title_line3')->label('Judul Baris 3')->maxLength(100),
                        ]),

                        TextInput::make('hero_tagline')
                            ->label('Tagline')
                            ->helperText('Kalimat miring di bawah judul')
                            ->maxLength(200)
                            ->columnSpanFull(),

                        Textarea::make('hero_description')
                            ->label('Deskripsi Hero')
                            ->rows(3)
                            ->maxLength(500)
                            ->columnSpanFull(),

                        Grid::make(2)->schema([
                            TextInput::make('hero_btn_primary_text')->label('Teks Tombol Utama')->maxLength(50),
                            TextInput::make('hero_whatsapp_number')->label('Nomor WhatsApp')->helperText('Format: 628xxxxxxxxxx')->maxLength(20),
                        ]),

                        Grid::make(2)->schema([
                            TextInput::make('hero_btn_secondary_text')->label('Teks Tombol Sekunder')->maxLength(50),
                            TextInput::make('hero_whatsapp_message')->label('Pesan WhatsApp Default')->maxLength(200),
                        ]),
                    ]),

                // STATS
                Section::make('📊 Statistik')
                    ->description('Angka-angka statistik di hero section')
                    ->schema([
                        Grid::make(2)->schema([
                            // AUTO: Klien
                            Section::make('👥 Klien Aktif')
                                ->description('Otomatis dihitung dari tabel Clients')
                                ->schema([
                                    Placeholder::make('stat_clients_info')
                                        ->label('Total Klien Aktif Saat Ini')
                                        ->content(fn() => $autoClients . ' klien'),
                                    TextInput::make('stat_clients_label')
                                        ->label('Label Klien')
                                        ->helperText('Contoh: Klien Aktif')
                                        ->maxLength(50),
                                ]),

                            // AUTO: Layanan
                            Section::make('🛠️ Layanan Aktif')
                                ->description('Otomatis dihitung dari tabel Services')
                                ->schema([
                                    Placeholder::make('stat_services_info')
                                        ->label('Total Layanan Aktif Saat Ini')
                                        ->content(fn() => $autoServices . ' layanan'),
                                    TextInput::make('stat_services_label')
                                        ->label('Label Layanan')
                                        ->helperText('Contoh: Jenis Layanan')
                                        ->maxLength(50),
                                ]),
                        ]),

                        Grid::make(2)->schema([
                            // MANUAL: Proyek
                            Section::make('📁 Proyek')
                                ->schema([
                                    TextInput::make('stat_projects')
                                        ->label('Jumlah Proyek')
                                        ->helperText('Isi manual, contoh: 50+')
                                        ->required()
                                        ->maxLength(20),
                                    TextInput::make('stat_projects_label')
                                        ->label('Label Proyek')
                                        ->helperText('Contoh: Proyek Selesai')
                                        ->maxLength(50),
                                ]),

                            // MANUAL: Tahun
                            Section::make('📅 Tahun Pengalaman')
                                ->schema([
                                    TextInput::make('stat_years')
                                        ->label('Tahun Pengalaman')
                                        ->helperText('Isi manual, contoh: 5+')
                                        ->required()
                                        ->maxLength(20),
                                    TextInput::make('stat_years_label')
                                        ->label('Label Tahun')
                                        ->helperText('Contoh: Tahun Pengalaman')
                                        ->maxLength(50),
                                ]),
                        ]),
                    ]),

                // ABOUT SECTION
                Section::make('👥 About Section')
                    ->description('Bagian Tentang Kami di halaman beranda')
                    ->schema([
                        FileUpload::make('about_image')
                            ->label('Foto About')
                            ->image()
                            ->disk('public')
                            ->directory('homepage')
                            ->maxSize(10240)
                            ->columnSpanFull(),

                        Grid::make(2)->schema([
                            TextInput::make('about_section_tag')->label('Tag Label')->maxLength(50),
                            TextInput::make('about_title')->label('Judul About')->maxLength(200),
                        ]),

                        Textarea::make('about_description')->label('Deskripsi About')->rows(4)->maxLength(1000)->columnSpanFull(),

                        Textarea::make('about_highlights')
                            ->label('Poin Keunggulan')
                            ->helperText('Satu poin per baris')
                            ->rows(5)
                            ->columnSpanFull(),
                    ]),

                // CTA SECTION
                Section::make('📣 CTA Section')
                    ->description('Call-to-action banner')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('cta_section_tag')->label('Tag CTA')->maxLength(50),
                            TextInput::make('cta_btn_text')->label('Teks Tombol CTA')->maxLength(50),
                        ]),
                        TextInput::make('cta_title')->label('Judul CTA')->maxLength(200)->columnSpanFull(),
                        TextInput::make('cta_title_highlight')->label('Kata yang Di-highlight (merah)')->helperText('Kata dalam judul CTA yang akan berwarna merah')->maxLength(100)->columnSpanFull(),
                        Textarea::make('cta_description')->label('Deskripsi CTA')->rows(3)->columnSpanFull(),
                    ]),

                // CONTACT
                Section::make('📞 Info Kontak')
                    ->schema([
                        TextInput::make('contact_address')->label('Alamat')->maxLength(300)->columnSpanFull(),
                        Grid::make(2)->schema([
                            TextInput::make('contact_phone')->label('Telepon')->maxLength(50),
                            TextInput::make('contact_email')->label('Email')->email()->maxLength(100),
                        ]),
                        Textarea::make('contact_maps_embed_url')
                            ->label('URL Embed Google Maps')
                            ->helperText('Paste src URL dari iframe Google Maps')
                            ->rows(2)
                            ->columnSpanFull(),
                    ]),

                // SEO
                Section::make('🔍 SEO')
                    ->collapsed()
                    ->schema([
                        TextInput::make('meta_title')->label('Meta Title')->maxLength(70)->columnSpanFull(),
                        Textarea::make('meta_description')->label('Meta Description')->rows(2)->maxLength(160)->columnSpanFull(),
                    ]),

            ])
            ->statePath('data');
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('save')
                ->label('Simpan Semua Perubahan')
                ->action('save')
                ->color('primary')
                ->icon('heroicon-o-check'),
        ];
    }

    public function save(): void
    {
        $data = $this->form->getState();

        // Selalu timpa stat_clients & stat_services dengan data real dari DB
        $data['stat_clients']  = Client::where('is_active', true)->count();
        $data['stat_services'] = Service::where('is_active', true)->count();

        $setting = HomepageSetting::getInstance();
        $setting->update($data);

        Notification::make()
            ->title('Berhasil disimpan!')
            ->body('Pengaturan beranda telah diperbarui.')
            ->success()
            ->send();
    }

    public function getTitle(): string
    {
        return 'Pengaturan Beranda';
    }
}
