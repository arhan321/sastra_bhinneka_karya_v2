<?php

namespace App\Filament\Resources\VisitorLogs\Tables;

use Filament\Tables\Table;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;

class VisitorLogsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->poll('5s')
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('created_at')
                    ->label('Waktu')
                    ->dateTime('d M Y H:i:s')
                    ->sortable(),

                TextColumn::make('ip_address')
                    ->label('IP Address')
                    ->searchable()
                    ->copyable()
                    ->sortable(),

                TextColumn::make('user.name')
                    ->label('User')
                    ->placeholder('Guest')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('method')
                    ->label('Method')
                    ->badge()
                    ->sortable(),

                TextColumn::make('path')
                    ->label('Halaman')
                    ->searchable()
                    ->limit(60)
                    ->tooltip(fn ($record): ?string => $record->path),

                TextColumn::make('status_code')
                    ->label('Status')
                    ->badge()
                    ->color(fn ($state): string => match (true) {
                        $state >= 500 => 'danger',
                        $state >= 400 => 'warning',
                        $state >= 300 => 'info',
                        default => 'success',
                    })
                    ->sortable(),

                TextColumn::make('referer')
                    ->label('Referer')
                    ->limit(45)
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('user_agent')
                    ->label('User Agent')
                    ->limit(45)
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Filter::make('today')
                    ->label('Hari Ini')
                    ->query(fn (Builder $query): Builder => $query->whereDate('created_at', today())),

                Filter::make('last_30_days')
                    ->label('30 Hari Terakhir')
                    ->query(fn (Builder $query): Builder => $query->where('created_at', '>=', now()->subDays(30)->startOfDay())),

                Filter::make('last_year')
                    ->label('1 Tahun Terakhir')
                    ->query(fn (Builder $query): Builder => $query->where('created_at', '>=', now()->subYear()->startOfDay())),

                SelectFilter::make('method')
                    ->label('Method')
                    ->options([
                        'GET' => 'GET',
                        'POST' => 'POST',
                        'PUT' => 'PUT',
                        'PATCH' => 'PATCH',
                        'DELETE' => 'DELETE',
                    ]),

                SelectFilter::make('status_code')
                    ->label('Status')
                    ->options([
                        200 => '200 OK',
                        301 => '301 Redirect',
                        302 => '302 Redirect',
                        403 => '403 Forbidden',
                        404 => '404 Not Found',
                        419 => '419 Page Expired',
                        422 => '422 Validation Error',
                        500 => '500 Server Error',
                    ]),
            ]);
    }
}