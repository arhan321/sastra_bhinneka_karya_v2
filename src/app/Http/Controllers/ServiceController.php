<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\CompanyProfile;

class ServiceController extends Controller
{
    public function index()
    {
        $company     = CompanyProfile::first();
        $construction    = Service::active()->construction()->orderBy('sort_order')->get();
        $nonConstruction = Service::active()->nonConstruction()->orderBy('sort_order')->get();

        return view('pages.services', compact('company', 'construction', 'nonConstruction'));
    }
}
