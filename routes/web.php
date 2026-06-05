<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\ProjectsController;

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
Route::get('/admin/manage-reviews', function () {
    return view('admin.manage-reviews');
})->name('admin.reviews');

Route::get('/admin/manage-projects', [ProjectsController::class, 'index'])->name('admin.projects');
Route::get('/admin/manage-projects/view', [ProjectsController::class, 'view_data'])->name('projects.view');
Route::post('/admin/manage-projects/add', [ProjectsController::class, 'store'])->name('projects.add');
Route::post('/admin/manage-projects/update/{id}', [ProjectsController::class, 'update'])->name('projects.update');
Route::delete('/admin/manage-projects/delete/{id}', [ProjectsController::class, 'delete'])->name('projects.delete');

// Auth Routes (Customer/User Login & Register)
Route::get('/login', function () {
    return view('admin.login');
})->name('admin.login');

Route::post('/login', function () {
    // Placeholder for login logic
    return back();
})->name('admin.login.submit');

Route::get('/register', function () {
    return view('admin.register');
})->name('admin.register');

Route::post('/register', function () {
    // Placeholder for register logic
    return back();
})->name('admin.register.submit');
