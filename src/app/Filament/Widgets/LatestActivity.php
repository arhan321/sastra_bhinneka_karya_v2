<?php

namespace App\Filament\Widgets;

use App\Models\ContactMessage;
use App\Models\Portfolio;
use App\Models\Client;
use App\Models\Service;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;

class LatestActivity extends BaseWidget
{
    protected static ?string $heading = 'Pesan Terbaru';
    protected static ?int $sort = 3;
    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                ContactMessage::query()->latest()->limit(8)
            )
            ->columns([
                TextColumn::make('name')
                    ->label('Pengirim')
                    ->searchable()
                    ->weight('bold'),

                TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->copyable()
                    ->color('gray'),

                TextColumn::make('subject')
                    ->label('Subjek')
                    ->limit(40)
                    ->default('(Tidak ada subjek)'),

                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'new'      => 'danger',
                        'read'     => 'success',
                        'archived' => 'gray',
                        default    => 'gray',
                    })
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        'new'      => 'Baru',
                        'read'     => 'Dibaca',
                        'archived' => 'Diarsipkan',
                        default    => $state,
                    }),

                TextColumn::make('created_at')
                    ->label('Waktu')
                    ->dateTime('d M Y, H:i')
                    ->sortable()
                    ->since()
                    ->color('gray'),
            ])
            ->actions([
                \Filament\Actions\Action::make('mark_read')
                    ->label('Tandai Dibaca')
                    ->icon('heroicon-m-check')
                    ->color('success')
                    ->visible(fn($record) => $record->status === 'new')
                    ->action(fn($record) => $record->update(['status' => 'read', 'read_at' => now()])),
            ])
            ->paginated(false);
    }
}
