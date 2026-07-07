<?php

namespace App\Filament\Resources\VisitorLogs;

use UnitEnum;
use BackedEnum;
use App\Models\VisitorLog;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\VisitorLogs\Pages;
use App\Filament\Resources\VisitorLogs\Tables\VisitorLogsTable;
use App\Filament\Resources\VisitorLogs\Widgets\VisitorTrafficChart;
use App\Filament\Resources\VisitorLogs\Widgets\VisitorTrafficStats;

class VisitorLogResource extends Resource
{
    protected static ?string $model = VisitorLog::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-chart-bar-square';

    protected static string | UnitEnum | null $navigationGroup = 'Monitoring';

    protected static ?string $navigationLabel = 'Traffic Website';

    protected static ?string $modelLabel = 'Traffic Log';

    protected static ?string $pluralModelLabel = 'Traffic Website';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([]);
    }

    public static function table(Table $table): Table
    {
        return VisitorLogsTable::configure($table);
    }

    public static function getWidgets(): array
    {
        return [
            VisitorTrafficStats::class,
            VisitorTrafficChart::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVisitorLogs::route('/'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->latest('created_at');
    }
}