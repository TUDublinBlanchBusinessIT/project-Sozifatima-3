<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SkillController;

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
