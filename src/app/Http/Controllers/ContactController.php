<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\CompanyProfile;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $company = CompanyProfile::first();
        return view('pages.contact', compact('company'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'phone'   => 'nullable|string|max:20',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string|min:10',
        ]);

        \App\Models\ContactMessage::create([
            'name'          => $request->name,
            'email'         => $request->email,
            'phone'         => $request->phone,
            'subject'       => $request->subject,
            'message'       => $request->message,
            'status'  => 'new',
        ]);


        return back()->with('success', 'Pesan Anda telah terkirim! Kami akan menghubungi Anda segera.');
    }
}
