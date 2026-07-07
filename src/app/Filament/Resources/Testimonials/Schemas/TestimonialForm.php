<?php

namespace App\Filament\Resources\Testimonials\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class TestimonialForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([

            TextInput::make('client_name')
                ->label('Nama Pemberi Testimoni')
                ->required()
                ->columnSpanFull(),

            TextInput::make('position')
                ->label('Jabatan')
                ->placeholder('Contoh: Direktur, Manager HSE'),

            TextInput::make('company')
                ->label('Nama Perusahaan')
                ->placeholder('Contoh: PT National Steel Industries'),

            Textarea::make('content')
                ->label('Isi Testimoni')
                ->required()
                ->rows(4)
                ->columnSpanFull(),

            Select::make('rating')
                ->label('Rating Bintang')
                ->options([
                    1 => '⭐ 1 Bintang',
                    2 => '⭐⭐ 2 Bintang',
                    3 => '⭐⭐⭐ 3 Bintang',
                    4 => '⭐⭐⭐⭐ 4 Bintang',
                    5 => '⭐⭐⭐⭐⭐ 5 Bintang',
                ])
                ->default(5)
                ->required(),

            FileUpload::make('photo')
                ->label('Foto Pemberi Testimoni')
                ->image()
                ->directory('testimonials/photos')
                ->imageEditor()
                ->circleCropper()
                ->columnSpanFull(),

            TextInput::make('sort_order')
                ->label('Urutan Tampil')
                ->numeric()
                ->default(0),

            Toggle::make('is_visible')
                ->label('Tampilkan di Website')
                ->default(true)
                ->columnSpanFull(),
        ]);
    }
}