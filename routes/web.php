<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('departments', [\App\Http\Controllers\DepartmentController::class, 'index'])->name('departments.index');
    Route::get('incidencias', [\App\Http\Controllers\IncidenciaController::class, 'index'])->name('incidencias.index');
    Route::get('jobs', [\App\Http\Controllers\JobController::class, 'index'])->name('jobs.index');
    Route::get('schedules', [\App\Http\Controllers\ScheduleController::class, 'index'])->name('schedules.index');
    Route::get('conditions', [\App\Http\Controllers\ConditionController::class, 'index'])->name('conditions.index');
    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});
