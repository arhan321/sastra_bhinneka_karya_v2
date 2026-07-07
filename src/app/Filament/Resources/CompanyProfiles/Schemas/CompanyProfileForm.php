<?php

namespace App\Filament\Resources\CompanyProfiles\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;

class CompanyProfileForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama Perusahaan')
                    ->required(),

                TextInput::make('slogan')
                    ->label('Slogan'),

                Textarea::make('description')
                    ->label('Deskripsi Perusahaan')
                    ->rows(4)
                    ->columnSpanFull(),

                Textarea::make('history')
                    ->label('Sejarah Perusahaan')
                    ->rows(4)
                    ->columnSpanFull(),

                FileUpload::make('logo_path')
                    ->label('Logo Perusahaan')
                    ->image()
                    ->disk('public')
                    ->directory('company')
                    ->visibility('public')
                    ->imageEditor()
                    ->maxSize(5120)
                    ->acceptedFileTypes([
                        'image/jpeg',
                        'image/png',
                        'image/webp',
                        'image/jpg',
                    ])
                    ->downloadable()
                    ->openable()
                    ->columnSpanFull(),

                Textarea::make('vision')
                    ->label('Visi')
                    ->rows(3)
                    ->columnSpanFull(),

                Repeater::make('mission')
                    ->label('Misi (per poin)')
                    ->schema([
                        TextInput::make('item')
                            ->label('Poin Misi')
                            ->required(),
                    ])
                    ->default([])
                    ->columnSpanFull()
                    ->addActionLabel('Tambah Poin Misi'),

                Repeater::make('values')
                    ->label('Nilai Perusahaan')
                    ->schema([
                        TextInput::make('title')
                            ->label('Judul')
                            ->required(),

                        Textarea::make('description')
                            ->label('Deskripsi')
                            ->required(),

                        Select::make('icon')
                            ->label('Icon')
                            ->options([
                                'shield' => 'Profesional (Shield)',
                                'briefcase' => 'Berpengalaman (Briefcase)',
                                'users' => 'Terpercaya (Users)',
                                'bolt' => 'Inovatif (Bolt)',
                            ])
                            ->default('shield')
                            ->required(),
                    ])
                    ->default([])
                    ->columnSpanFull()
                    ->addActionLabel('Tambah Nilai'),

                // TextInput::make('phone')
                //     ->label('Nomor Telepon / WhatsApp')
                //     ->tel(),

                // TextInput::make('email')
                //     ->label('Email address')
                //     ->email(),

                // Textarea::make('address')
                //     ->label('Alamat')
                //     ->columnSpanFull(),

                // TextInput::make('instagram')
                //     ->label('Instagram'),

                // TextInput::make('facebook')
                //     ->label('Facebook'),

                // TextInput::make('twitter')
                //     ->label('Twitter / X'),

                // Textarea::make('google_map_url')
                //     ->label('Google Map URL')
                //     ->columnSpanFull(),

                // Textarea::make('google_map_embed')
                //     ->label('Google Map Embed')
                //     ->columnSpanFull(),
            ]);
    }
}
