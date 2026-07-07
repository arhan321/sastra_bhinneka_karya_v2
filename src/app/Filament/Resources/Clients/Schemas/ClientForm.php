<?php

namespace App\Filament\Resources\Clients\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;

class ClientForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('name')
                ->label('Nama Perusahaan')
                ->required()
                ->maxLength(255)
                ->columnSpanFull(),

            FileUpload::make('logo')
                ->label('Logo Perusahaan')
                ->image()
                ->disk('public')
                ->directory('clients/logos')
                ->visibility('public')
                ->imageEditor()
                ->maxSize(5120)
                ->acceptedFileTypes([
                    'image/jpeg',
                    'image/png',
                    'image/webp',
                    'image/jpg',
                    'image/svg+xml',
                ])
                ->downloadable()
                ->openable()
                ->columnSpanFull(),

            TextInput::make('industry')
                ->label('Industri')
                ->maxLength(255),

            TextInput::make('sort_order')
                ->label('Urutan Tampil')
                ->numeric()
                ->default(0),

            Toggle::make('is_active')
                ->label('Aktif')
                ->default(true)
                ->columnSpanFull(),
        ]);
    }
}