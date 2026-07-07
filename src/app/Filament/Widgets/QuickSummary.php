<?php

namespace App\Filament\Widgets;

use App\Models\Client;
use App\Models\ContactMessage;
use App\Models\Portfolio;
use App\Models\Service;
use Filament\Widgets\Widget;

class QuickSummary extends Widget
{
    protected static ?int $sort = 4;
    protected int|string|array $columnSpan = 'full';
    protected string $view = 'filament.widgets.quick-summary';

    public function getViewData(): array
    {
        return [
            'totalServices'        => Service::count(),
            'activeServices'       => Service::active()->count(),
            'totalPortfolios'      => Portfolio::count(),
            'visiblePortfolios'    => Portfolio::visible()->count(),
            'totalClients'         => Client::count(),
            'activeClients'        => Client::active()->count(),
            'totalMessages'        => ContactMessage::count(),
            'newMessages'          => ContactMessage::where('status', 'new')->count(),
            'constructionCount'    => Service::active()->construction()->count(),
            'nonConstructionCount' => Service::active()->nonConstruction()->count(),
        ];
    }
}
