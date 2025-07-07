<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/skills', [SkillController::class, 'index'])->name('skills');
Route::get('/projects', [ProjectController::class, 'index'])->name('projects');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/projects/filter', [ProjectController::class, 'filter']);
Route::get('/projects/{project}', [ProjectController::class, 'show']);

// Admin routes
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('/skills', AdminController::class);
    Route::resource('/projects', AdminController::class);
    Route::get('/skills/index', [SkillController::class, 'index'])->name('admin.skills.index');
    Route::get('/projects/index', [ProjectController::class, 'index'])->name('admin.projects.index');
});
require __DIR__.'/auth.php';
