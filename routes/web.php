<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->middleware('guest');

Route::get('/dashboard', [AdminController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/videos', function () {
    return view('videos');
})->middleware(['auth', 'verified'])->name('videos');

Route::get('/anti-stress', function () {
    return view('anti-stress');
})->middleware(['auth', 'verified'])->name('anti-stress');

Route::get('/playground', function () {
    return view('playground');
})->middleware(['auth', 'verified'])->name('playground');

Route::get('/a-propos', function () {
    return view('a-propos');
})->middleware(['auth', 'verified'])->name('a-propos');

Route::get('/avis', function () {
    return view('avis');
})->middleware(['auth', 'verified'])->name('avis');

Route::get('/quiz', function () {
    return view('quiz');
})->middleware(['auth', 'verified'])->name('quiz');

// ADMIN //
Route::get('/admin', function () {
    return view('admin');
})->middleware(['auth', 'verified'])->name('admin');
// //

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::fallback([PageController::class, 'notfound']);
Route::delete('/admin/users/{user}', [AdminController::class, 'destroy'])->name('admin.users.destroy');

require __DIR__.'/auth.php';
