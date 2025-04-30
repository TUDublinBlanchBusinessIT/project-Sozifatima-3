<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ListingController;

/*
|----------------------------------------------------------------------
| Web Routes
|----------------------------------------------------------------------
*/

// Home route
Route::get('/', function () {
    return view('welcome');
});

// Dashboard route (added this for your reference)
Route::get('/dashboard', function () {
    return view('dashboard');  // This can be replaced with your actual dashboard view
})->middleware(['auth'])->name('dashboard');

// Skills routes
Route::get('/skills', [SkillController::class, 'index']);
Route::get('/skills/create', [SkillController::class, 'create']);
Route::post('/skills', [SkillController::class, 'store'])->name('skills.store');
Route::get('/skills/{id}/edit', [SkillController::class, 'edit'])->name('skills.edit');
Route::put('/skills/{id}', [SkillController::class, 'update'])->name('skills.update');
Route::delete('/skills/{id}', [SkillController::class, 'destroy'])->name('skills.destroy');

// Listings routes (this is what you were missing)
Route::resource('listings', ListingController::class);

