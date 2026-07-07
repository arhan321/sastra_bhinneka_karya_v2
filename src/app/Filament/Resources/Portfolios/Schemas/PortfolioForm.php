<?php

namespace App\Filament\Resources\Portfolios\Schemas;

use App\Models\Client;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;

class PortfolioForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([

            Select::make('client_id')
                ->label('Perusahaan Klien')
                ->options(fn () => Client::active()->pluck('name', 'id'))
                ->searchable()
                ->preload()
                ->required(),

            TextInput::make('document_name')
                ->label('Nama Dokumen')
                ->required()
                ->columnSpanFull(),

            TextInput::make('document_category')
                ->label('Kategori Dokumen')
                ->placeholder('Contoh: Lingkungan, Konstruksi, dll'),

            TextInput::make('month')
                ->label('Bulan (angka)')
                ->numeric()
                ->minValue(1)
                ->maxValue(12)
                ->placeholder('1-12'),

            TextInput::make('year')
                ->label('Tahun')
                ->numeric()
                ->required()
                ->default(date('Y')),

            Textarea::make('description')
                ->label('Deskripsi')
                ->rows(3)
                ->columnSpanFull(),

            Toggle::make('is_visible')
                ->label('Tampilkan di Website')
                ->default(true),

            TextInput::make('sort_order')
                ->label('Urutan')
                ->numeric()
                ->default(0),

            Repeater::make('images')
                ->label('Foto Dokumentasi Kegiatan')
                ->relationship('images')
                ->columnSpanFull()
                ->schema([
                    FileUpload::make('image_path')
                        ->label('Foto')
                        ->image()
                        ->disk('public')
                        ->directory('portfolios/images')
                        ->visibility('public')
                        ->imageEditor()
                        ->maxSize(10240)
                        ->acceptedFileTypes([
                            'image/jpeg',
                            'image/png',
                            'image/webp',
                            'image/jpg',
                        ])
                        ->required(),

                    TextInput::make('caption')
                        ->label('Keterangan Foto')
                        ->placeholder('Contoh: Verifikasi Lapangan IPAL'),

                    TextInput::make('activity_type')
                        ->label('Jenis Kegiatan')
                        ->placeholder('Contoh: VERLAP, Rapat, Survey'),

                    TextInput::make('sort_order')
                        ->label('Urutan')
                        ->numeric()
                        ->default(0),
                ])
                ->addActionLabel('+ Tambah Foto')
                ->collapsible()
                ->itemLabel(fn (array $state): ?string => $state['caption'] ?? 'Foto Baru'),
        ]);
    }
}