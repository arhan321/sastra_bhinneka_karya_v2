<?php

namespace App\Filament\Resources\VisitorLogs\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\VisitorLogs\VisitorLogResource;
use App\Filament\Resources\VisitorLogs\Widgets\VisitorTrafficChart;
use App\Filament\Resources\VisitorLogs\Widgets\VisitorTrafficStats;

class ListVisitorLogs extends ListRecords
{
    protected static string $resource = VisitorLogResource::class;

    protected function getHeaderWidgets(): array
    {
        return [
            VisitorTrafficStats::class,
            VisitorTrafficChart::class,
        ];
    }

    public function getHeaderWidgetsColumns(): int | array
    {
        return [
            'md' => 1,
            'xl' => 2,
        ];
    }
}