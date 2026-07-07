<?php

namespace App\Filament\Resources\VisitorLogs\Widgets;

use App\Models\VisitorLog;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class VisitorTrafficStats extends BaseWidget
{
    protected ?string $pollingInterval = '5s';

    protected static bool $isLazy = false;

    protected function getStats(): array
    {
        $todayStart = now()->startOfDay();
        $thirtyDaysStart = now()->subDays(30)->startOfDay();
        $yearStart = now()->subYear()->startOfDay();
        $onlineStart = now()->subMinutes(5);

        $onlineNow = VisitorLog::query()
            ->where('created_at', '>=', $onlineStart)
            ->distinct('ip_address')
            ->count('ip_address');

        $totalToday = VisitorLog::query()
            ->where('created_at', '>=', $todayStart)
            ->count();

        $uniqueToday = VisitorLog::query()
            ->where('created_at', '>=', $todayStart)
            ->distinct('ip_address')
            ->count('ip_address');

        $total30Days = VisitorLog::query()
            ->where('created_at', '>=', $thirtyDaysStart)
            ->count();

        $unique30Days = VisitorLog::query()
            ->where('created_at', '>=', $thirtyDaysStart)
            ->distinct('ip_address')
            ->count('ip_address');

        $totalYear = VisitorLog::query()
            ->where('created_at', '>=', $yearStart)
            ->count();

        $uniqueYear = VisitorLog::query()
            ->where('created_at', '>=', $yearStart)
            ->distinct('ip_address')
            ->count('ip_address');

        return [
            Stat::make('Online Sekarang', number_format($onlineNow))
                ->description('Unique IP 5 menit terakhir')
                ->descriptionIcon('heroicon-m-signal')
                ->color('success'),

            Stat::make('Akses Hari Ini', number_format($totalToday))
                ->description('Unique: ' . number_format($uniqueToday))
                ->descriptionIcon('heroicon-m-eye')
                ->color('primary'),

            Stat::make('Akses 30 Hari', number_format($total30Days))
                ->description('Unique: ' . number_format($unique30Days))
                ->descriptionIcon('heroicon-m-calendar-days')
                ->color('info'),

            Stat::make('Akses 1 Tahun', number_format($totalYear))
                ->description('Unique: ' . number_format($uniqueYear))
                ->descriptionIcon('heroicon-m-chart-bar')
                ->color('warning'),
        ];
    }
}