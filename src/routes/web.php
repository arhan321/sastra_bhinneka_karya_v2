<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BlogController;

Route::get('/',           [HomeController::class, 'index'])->name('home');
Route::get('/tentang',    [AboutController::class, 'index'])->name('about');
Route::get('/layanan',    [ServiceController::class, 'index'])->name('services');
Route::get('/portofolio', [PortfolioController::class, 'index'])->name('portfolio');
Route::get('/portofolio/{id}', [PortfolioController::class, 'show'])->name('portfolio.show');
Route::get('/klien',      [ClientController::class, 'index'])->name('clients');
Route::get('/kontak',     [ContactController::class, 'index'])->name('contact');
Route::post('/kontak',    [ContactController::class, 'store'])->name('contact.store');
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');
Route::post('/blog/{slug}/comment', [BlogController::class, 'storeComment'])->name('blog.comment.store');
