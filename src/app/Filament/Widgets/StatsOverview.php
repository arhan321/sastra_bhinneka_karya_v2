<?php

namespace App\Filament\Widgets;

use App\Models\Client;
use App\Models\ContactMessage;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\BlogPost;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $newMessages = ContactMessage::where('status', 'new')->count();
        $totalPosts = BlogPost::count();
        $publishedPosts = BlogPost::published()->count();

        return [
            Stat::make('Total Layanan', Service::active()->count())
                ->description('Layanan aktif tersedia')
                ->descriptionIcon('heroicon-m-wrench-screwdriver')
                ->color('danger')
                ->chart([3, 5, 7, 8, Service::active()->count()]),

            Stat::make('Total Portofolio', Portfolio::visible()->count())
                ->description('Dokumen proyek terdaftar')
                ->descriptionIcon('heroicon-m-document-text')
                ->color('warning')
                ->chart([2, 4, 6, 8, Portfolio::visible()->count()]),

            Stat::make('Total Klien', Client::active()->count())
                ->description('Perusahaan klien aktif')
                ->descriptionIcon('heroicon-m-building-office-2')
                ->color('success')
                ->chart([2, 5, 8, 10, Client::active()->count()]),

            Stat::make('Pesan Masuk', $newMessages)
                ->description($newMessages . ' pesan belum dibaca')
                ->descriptionIcon('heroicon-m-envelope')
                ->color($newMessages > 0 ? 'danger' : 'gray')
                ->chart([1, 2, 3, $newMessages]),

            Stat::make('Total Testimoni', Testimonial::where('is_visible', true)->count())
                ->description('Testimoni aktif')
                ->descriptionIcon('heroicon-m-star')
                ->color('info'),

            Stat::make('Total Artikel', $totalPosts)
                ->description($publishedPosts . ' artikel dipublikasi')
                ->descriptionIcon('heroicon-m-newspaper')
                ->color('primary')
                ->chart([1, 3, 5, $totalPosts]),
        ];
    }
}
