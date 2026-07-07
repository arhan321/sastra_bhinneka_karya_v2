<?php

namespace App\Http\Controllers;

use App\Models\Client;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::active()->orderBy('sort_order')->get();
        return view('pages.clients', compact('clients'));
    }
}
