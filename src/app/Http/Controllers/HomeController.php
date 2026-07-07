<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Client;
use App\Models\Portfolio;
use App\Models\Testimonial;
use App\Models\CompanyProfile;
use App\Models\HomepageSetting; 
use App\Models\HeroImage;

class HomeController extends Controller
{
    public function index()
    {
        $setting     = HomepageSetting::getInstance();
        $company     = CompanyProfile::first();
        $services = Service::active()->orderBy('sort_order')->get();
        $clients     = Client::active()->orderBy('sort_order')->get();
        $portfolios  = Portfolio::visible()->with('client')->latest()->take(6)->get();
        $testimonials = Testimonial::visible()->orderBy('sort_order')->get();
        $heroImages = HeroImage::active()->get();

        $totalClients  = Client::active()->count();
        $totalProjects = Portfolio::count();
        $totalServices = Service::active()->count();

        return view('pages.home', compact(
            'heroImages',
            'setting',  
            'company',
            'services',
            'clients',
            'portfolios',
            'testimonials',
            'totalClients',
            'totalProjects',
            'totalServices'
        ));
    }
}
