<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\Client;

class PortfolioController extends Controller
{
    public function index()
    {
        $clients    = Client::active()->orderBy('sort_order')->get();
        $portfolios = Portfolio::visible()
            ->with(['client', 'images'])
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get();

        return view('pages.portfolio', compact('clients', 'portfolios'));
    }

    public function show($id)
    {
        $portfolio = Portfolio::with(['client', 'images' => function ($q) {
            $q->orderBy('sort_order');
        }])->findOrFail($id);

        $related = Portfolio::visible()
            ->where('client_id', $portfolio->client_id)
            ->where('id', '!=', $portfolio->id)
            ->with('client')
            ->latest()
            ->take(3)
            ->get();

        return view('pages.portfolio-detail', compact('portfolio', 'related'));
    }
}
