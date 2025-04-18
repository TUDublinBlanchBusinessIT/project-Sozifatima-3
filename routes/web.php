<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ListingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

// Skills routes
Route::get('/skills', [SkillController::class, 'index']);
Route::get('/skills/create', [SkillController::class, 'create']);
Route::post('/skills', [SkillController::class, 'store'])->name('skills.store');
Route::get('/skills/{id}/edit', [SkillController::class, 'edit'])->name('skills.edit');
Route::put('/skills/{id}', [SkillController::class, 'update'])->name('skills.update');
Route::delete('/skills/{id}', [SkillController::class, 'destroy'])->name('skills.destroy');

// Listings routes (this is what you were missing)
Route::resource('listings', ListingController::class);
