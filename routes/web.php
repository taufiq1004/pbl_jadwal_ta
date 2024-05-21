<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('landingpages');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/lecturer', function () {
    return view('backend.lecturer');
})->name('lecturer');

Route::get('/prodi', function () {
    return view('backend.prodi');
})->name('prodi');

// Route for displaying the add lecturer form
Route::get('/formLecturer', function () {
    return view('backend.form.formLecturer');
});

Route::get('/formProdi', function () {
    return view('backend.form.formProdi');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
   // Route::patch('/profile', [ProfileController::class, 'update'])run->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/lecturer', [App\Http\Controllers\LecturerController::class, 'index'])->name('backend.lecturer');
Route::get('/backend/prodi', [App\Http\Controllers\ProdiController::class, 'index'])->name('backend.prodi');

Route::middleware('auth')->group(function () {
Route::get('/prodi', [ProdiController::class, 'index'])->name('backend.prodi');
Route::get('/prodi/create', [ProdiController::class, 'create'])->name('prodi.create');
Route::post('/prodi', [ProdiController::class, 'store'])->name('prodi.store');
Route::get('/prodi/{id}/edit', [ProdiController::class, 'edit'])->name('prodi.edit');
Route::put('/prodi/{id}', [ProdiController::class, 'update'])->name('prodi.update');
Route::delete('/prodi/{id}', [ProdiController::class, 'destroy'])->name('prodi.destroy');

});
