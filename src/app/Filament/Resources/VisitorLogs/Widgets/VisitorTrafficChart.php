<?php

namespace App\Filament\Resources\VisitorLogs\Widgets;

use App\Models\VisitorLog;
use Filament\Widgets\ChartWidget;

class VisitorTrafficChart extends ChartWidget
{
    protected ?string $heading = 'Grafik Akses 30 Hari Terakhir';

    protected ?string $pollingInterval = '30s';

    protected int | string | array $columnSpan = 'full';

    protected function getData(): array
    {
        $startDate = now()->subDays(29)->startOfDay();

        $rawData = VisitorLog::query()
            ->selectRaw('DATE(created_at) as visit_date')
            ->selectRaw('COUNT(*) as total_access')
            ->selectRaw('COUNT(DISTINCT ip_address) as unique_access')
            ->where('created_at', '>=', $startDate)
            ->groupBy('visit_date')
            ->orderBy('visit_date')
            ->get()
            ->keyBy('visit_date');

        $labels = [];
        $totalAccess = [];
        $uniqueAccess = [];

        for ($i = 0; $i < 30; $i++) {
            $date = $startDate->copy()->addDays($i);
            $key = $date->format('Y-m-d');

            $labels[] = $date->format('d M');
            $totalAccess[] = (int) ($rawData[$key]->total_access ?? 0);
            $uniqueAccess[] = (int) ($rawData[$key]->unique_access ?? 0);
        }

        return [
            'datasets' => [
                [
                    'label' => 'Total Akses',
                    'data' => $totalAccess,
                ],
                [
                    'label' => 'Unique IP',
                    'data' => $uniqueAccess,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}