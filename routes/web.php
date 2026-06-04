<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FrontendController;

// Frontend Routes
Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/services', [FrontendController::class, 'services'])->name('services');
Route::get('/projects', [FrontendController::class, 'projects'])->name('projects');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');

//Backnd Routes
Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');
Route::get('/admin/manage-projects', function () {
    return view('admin.manage-projects');
})->name('admin.projects');
Route::get('/admin/manage-reviews', function () {
    return view('admin.manage-reviews');
})->name('admin.reviews');
