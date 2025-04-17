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
