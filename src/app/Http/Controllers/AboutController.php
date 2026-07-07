<?php

namespace App\Http\Controllers;

use App\Models\CompanyProfile;
use App\Models\Client;

class AboutController extends Controller
{
    public function index()
    {
        $company = CompanyProfile::first();
        $totalClients    = Client::active()->count();
        $totalProjects = \App\Models\Portfolio::count();
        $totalServices = \App\Models\Service::active()->count();

        return view('pages.about', compact('company', 'totalClients', 'totalProjects', 'totalServices'));
    }
}
