<?php

namespace App\Filament\Widgets;

use App\Models\ContactMessage;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;

class ContactChart extends ChartWidget
{
    protected ?string $heading = 'Pesan Kontak per Bulan';
    protected ?string $description = 'Jumlah pesan masuk dari form kontak dalam 12 bulan terakhir';
    protected static ?int $sort = 2;
    protected ?string $maxHeight = '300px';
    protected int|string|array $columnSpan = 'full';

    protected function getData(): array
    {
        $data = [];
        $labels = [];

        for ($i = 11; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i);
            $labels[] = $month->translatedFormat('M Y');
            $data[] = ContactMessage::whereYear('created_at', $month->year)
                ->whereMonth('created_at', $month->month)
                ->count();
        }

        return [
            'datasets' => [
                [
                    'label'                => 'Pesan Masuk',
                    'data'                 => $data,
                    'backgroundColor'      => 'rgba(204, 0, 0, 0.1)',
                    'borderColor'          => 'rgba(204, 0, 0, 1)',
                    'borderWidth'          => 2,
                    'pointBackgroundColor' => 'rgba(204, 0, 0, 1)',
                    'pointRadius'          => 4,
                    'fill'                 => true,
                    'tension'              => 0.4,
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
