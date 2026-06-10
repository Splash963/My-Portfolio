<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\ProjectsController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReviewController;

// Frontend Routes
Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/services', [FrontendController::class, 'services'])->name('services');
Route::get('/projects', [FrontendController::class, 'projects'])->name('projects');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');


//Login and Register Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/submit-contact', [MessageController::class, 'store'])->name('contact.submit');


Route::middleware('auth')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/review', function () {
        return view('review');
    })->name('review');
    Route::post('/submit-review', [ReviewController::class, 'store'])->name('review.submit');

    Route::middleware('admin')->group(function () {

        Route::get('/admin', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');
        Route::get('/admin/manage-reviews', [ReviewController::class, 'index'])->name('admin.reviews');
        Route::get('/reviews/{id}/view', [ReviewController::class, 'view_all_data'])->name('reviews.view_all_data');
        Route::post('/admin/reviews/{id}/approve', [ReviewController::class, 'approve'])->name('reviews.approve');
        Route::post('/admin/reviews/{id}/reject', [ReviewController::class, 'reject'])->name('reviews.reject');

        Route::get('/admin/manage-projects', [ProjectsController::class, 'index'])->name('admin.projects');
        Route::get('/admin/manage-projects/view', [ProjectsController::class, 'view_data'])->name('projects.view');
        Route::post('/admin/manage-projects/add', [ProjectsController::class, 'store'])->name('projects.add');
        Route::post('/admin/manage-projects/update/{id}', [ProjectsController::class, 'update'])->name('projects.update');
        Route::delete('/admin/manage-projects/delete/{id}', [ProjectsController::class, 'delete'])->name('projects.delete');
    });
});
