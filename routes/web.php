<?php
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\thesisController;

use App\Models\Lecturer;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\DetailSessionController;
use App\Models\DetailSession;
use App\Models\Sessions;
use App\Http\Controllers\DetailThesisController;




use App\Models\Student;
use App\Models\Thesis;
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

Route::get('/formEditProdi', function () {
    return view('backend.form.formEditProdi');
});

Route::get('/room', function () {
    return view('backend.room');
})->name('room');

Route::get('/formRoom', function () {
    return view('backend.form.formRoom');
});

Route::get('/formEditRoom', function () {
    return view('backend.form.formEditRoom');
});

Route::get('/student', function () {
    return view('backend.student');
})->name('student');

Route::get('/thesis', function () {
    return view('backend.thesis');
})->name('thesis');


Route::get('/session', function () {
    return view('backend.session');
})->name('session');

Route::get('/formSession', function () {
    return view('backend.form.formSession');
});

Route::get('/formEditSession', function () {
    return view('backend.form.formEditSession');
});

Route::get('/detailSession', function () {
    return view('backend.detailSession');
})->name('detailSession');

Route::get('/formDetailSession', function () {
    return view('backend.form.formDetailSession');
});

Route::get('/formEditDetailSession', function () {
    return view('backend.form.formEditDetailSession');
});

Route::get('/detailthesis', function () {
    return view('backend.detailThesis');
})->name('detailThesis');


Route::resource('lecturers', LecturerController::class);
Route::resource('students', StudentController::class);
Route::resource('thesis', ThesisController::class);

Route::resource('session', SessionController::class);
Route::resource('detailSession', DetailSessionController::class);


Route::middleware('auth')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('auth.login');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
   // Route::patch('/profile', [ProfileController::class, 'update'])run->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile/landingpages', [ProfileController::class, 'landingPages'])->name('profile.landingpages');

});

require __DIR__.'/auth.php';

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/backend/lecturer', [App\Http\Controllers\LecturerController::class, 'index'])->name('backend.lecturer');
Route::get('/backend/prodi', [App\Http\Controllers\ProdiController::class, 'index'])->name('backend.prodi');
Route::get('/backend/room', [App\Http\Controllers\RoomController::class, 'index'])->name('backend.room');
Route::get('/backend/student', [StudentController::class, 'index'])->name('backend.student');
Route::get('/backend/thesis', [App\Http\Controllers\ThesisController::class, 'index'])->name('backend.thesis');

Route::get('/backend/session', [App\Http\Controllers\SessionController::class, 'index'])->name('backend.session');
Route::get('/backend/detailSession', [App\Http\Controllers\DetailSessionController::class, 'index'])->name('backend.detailSession');

Route::get('/backend/detailThesis', [App\Http\Controllers\DetailThesisController::class, 'index'])->name('backend.detailThesis');


Route::middleware('auth')->group(function () {
    Route::get('/prodi', [ProdiController::class, 'index'])->name('backend.prodi');
    Route::get('/prodi/create', [ProdiController::class, 'create'])->name('prodi.create');
    Route::post('/prodi/store', [ProdiController::class, 'store'])->name('prodi.store');
    Route::get('/prodi/edit/{id}', [ProdiController::class, 'edit'])->name('prodi.edit');
    Route::put('/prodi/update/{id}', [ProdiController::class, 'update'])->name('prodi.update');
    Route::delete('/prodi/{id}', [ProdiController::class, 'destroy'])->name('prodi.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/lecturer', [LecturerController::class, 'index'])->name('backend.lecturer');
    Route::get('lecturer/export_excel', [LecturerController::class, 'export_excel']);
    Route::post('lecturer/import_excel', [LecturerController::class, 'import_excel']);
    Route::post('lecturer/import_excel', [LecturerController::class, 'import_excel'])->name('lecturer.import_excel');
    Route::get('/lecturer/create', [LecturerController::class, 'create'])->name('lecturer.create');
    Route::post('/lecturer/store', [LecturerController::class, 'store'])->name('lecturer.store');
    Route::get('/lecturer/edit/{id}', [LecturerController::class, 'edit'])->name('lecturer.edit');
    Route::put('/lecturer/update/{id}', [LecturerController::class, 'update'])->name('lecturer.update');
    Route::delete('/lecturer/{id}', [LecturerController::class, 'destroy'])->name('lecturer.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/room', [RoomController::class, 'index'])->name('backend.room');
    Route::get('/room/create', [RoomController::class, 'create'])->name('room.create');
    Route::post('/room/store', [RoomController::class, 'store'])->name('room.store');
    Route::get('/room/edit/{id}', [RoomController::class, 'edit'])->name('room.edit');
    Route::put('/room/update/{id}', [RoomController::class, 'update'])->name('room.update');
    Route::delete('/room/{id}', [RoomController::class, 'destroy'])->name('room.destroy');
});

Route::middleware('auth')->group(function () {
Route::get('/formStudent', [StudentController::class, 'create'])->name('formStudent');
Route::post('/student/store', [StudentController::class, 'store'])->name('student.store');
Route::get('/student/edit/{id}', [StudentController::class, 'edit'])->name('student.edit');
Route::put('/student/update/{id}', [StudentController::class, 'update'])->name('student.update');
Route::delete('/student/delete/{id}', [StudentController::class, 'destroy'])->name('student.destroy');
Route::get('student/export_excel', [StudentController::class, 'export_excel']);
Route::post('student/import_excel', [StudentController::class, 'import_excel']);
Route::post('student/import_excel', [StudentController::class, 'import_excel'])->name('student.import_excel');
});

Route::middleware('auth')->group(function () {
    Route::get('/formThesis', [ThesisController::class, 'create'])->name('formThesis');
    Route::post('/thesis/store', [ThesisController::class, 'store'])->name('thesis.store');
    Route::get('/thesis/{id}/edit', [ThesisController::class, 'edit'])->name('thesis.edit');
    Route::put('/thesis/update/{id}', [ThesisController::class, 'update'])->name('thesis.update');
    Route::delete('/thesis/delete/{id}', [ThesisController::class, 'destroy'])->name('thesis.destroy');
});

Route::middleware('auth')->group(function () {

    Route::get('/formsession', [SessionController::class, 'create'])->name('formsession');
    Route::post('/session/store', [SessionController::class, 'store'])->name('session.store');
    Route::get('/session/{id}/edit', [SessionController::class, 'edit'])->name('session.edit');
    Route::put('/session/update/{id}', [SessionController::class, 'update'])->name('session.update');
    Route::delete('/session/delete/{id}', [SessionController::class, 'destroy'])->name('session.destroy');
    Route::get('session/export_excel', [SessionController::class, 'export_excel']);
    Route::post('session/import_excel', [SessionController::class, 'import_excel']);
    Route::post('session/import_excel', [SessionController::class, 'import_excel'])->name('session.import_excel');
});

Route::middleware('auth')->group(function () {
    Route::get('/formDetailSession', [DetailSessionController::class, 'create'])->name('formDetailSession');
    Route::post('/detailSession/store', [DetailSessionController::class, 'store'])->name('detailSession.store');
    Route::get('/detailSession/{id}/edit', [DetailSessionController::class, 'edit'])->name('detailSession.edit');
    Route::put('/detailSession/update/{id}', [DetailSessionController::class, 'update'])->name('detailSession.update');
    Route::delete('/detailSession/delete/{id}', [DetailSessionController::class, 'destroy'])->name('detailSession.destroy');
});

Route::get('/detailThesis', [DetailThesisController::class, 'index']);
Route::get('/formDetailThesis', [DetailThesisController::class, 'create']);
Route::post('/detailThesis', [DetailThesisController::class, 'store'])->name('detailThesis.store');
Route::get('/detailThesis/edit/{id}', [DetailThesisController::class, 'edit'])->name('detailThesis.edit');
Route::put('/detailThesis/update/{id}', [DetailThesisController::class, 'update'])->name('detailThesis.update');
Route::delete('/detailThesis/{id}', [DetailThesisController::class, 'destroy'])->name('detailThesis.destroy');
});

