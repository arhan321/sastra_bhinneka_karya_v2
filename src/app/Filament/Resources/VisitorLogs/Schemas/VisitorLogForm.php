<?php

namespace App\Filament\Resources\VisitorLogs\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class VisitorLogForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->default(null),
                TextInput::make('ip_address')
                    ->required(),
                TextInput::make('method')
                    ->required(),
                TextInput::make('path')
                    ->required(),
                Textarea::make('full_url')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('status_code')
                    ->numeric()
                    ->default(null),
                Textarea::make('user_agent')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('referer')
                    ->default(null)
                    ->columnSpanFull(),
            ]);
    }
}
