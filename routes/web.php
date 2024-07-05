<?php

use App\Http\Controllers\{
    ProdiController,
    LecturerController,
    StudentController,
    RoomController,
    ThesisController,
    ValidasiTaController,
    SesiController,
    PenilaianController,
    ProfileController,
    Auth\LoginController,
    SessionController,
    DetailSessionController,
    DetailThesisController,
    UserController,
    Auth\AuthenticatedSessionController
};
use Illuminate\Support\Facades\{
    Mail,
    Route
};

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

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/test-email', function () {
    Mail::raw('This is a test email', function ($message) {
        $message->to('test@example.com')
            ->subject('Test Email');
    });

    return 'Test email sent';
});

// Middleware untuk rute yang memerlukan autentikasi dan verifikasi
Route::middleware(['auth', 'verified'])->group(function () {

    Route::resource('students', StudentController::class);
    Route::resource('thesis', ThesisController::class);
    Route::resource('session', SessionController::class);
    Route::resource('detailSession', DetailSessionController::class);
    Route::resource('users', UserController::class);
    Route::resource('penilaian', PenilaianController::class);
    Route::resource('validasiTa', ValidasiTaController::class);

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    Route::get('/api/available-rooms', [SessionController::class, 'getAvailableRooms']);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile/landingpages', [ProfileController::class, 'landingPages'])->name('profile.landingpages');
});

// Middleware untuk rute dengan peran admin
Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    // Prodi Routes
    Route::get('/prodi', [ProdiController::class, 'index'])->name('prodi.index');
    Route::get('/prodi/create', [ProdiController::class, 'create'])->name('prodi.create');
    Route::post('/prodi/store', [ProdiController::class, 'store'])->name('prodi.store');
    Route::get('/prodi/edit/{id}', [ProdiController::class, 'edit'])->name('prodi.edit');
    Route::put('/prodi/update/{id}', [ProdiController::class, 'update'])->name('prodi.update');
    Route::delete('/prodi/{id}', [ProdiController::class, 'destroy'])->name('prodi.destroy');

    // Additional Form Routes
    Route::get('/formProdi', function () {
        return view('backend.form.formProdi');
    })->name('formProdi');

    Route::get('/formEditProdi', function () {
        return view('backend.form.formEditProdi');
    })->name('formEditProdi');
});


Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    // Lecturer Routes
    Route::get('/lecturer', [LecturerController::class, 'index'])->name('lecturer.index');
    Route::get('lecturer/export_excel', [LecturerController::class, 'export_excel']);
    Route::post('lecturer/import_excel', [LecturerController::class, 'import_excel'])->name('lecturer.import_excel');
    Route::get('/lecturer/create', [LecturerController::class, 'create'])->name('lecturer.create');
    Route::post('/lecturer/store', [LecturerController::class, 'store'])->name('lecturer.store');
    Route::get('/lecturer/edit/{id}', [LecturerController::class, 'edit'])->name('lecturer.edit');
    Route::put('/lecturer/update/{id}', [LecturerController::class, 'update'])->name('lecturer.update');
    Route::delete('/lecturer/{id}', [LecturerController::class, 'destroy'])->name('lecturer.destroy');
    Route::get('/lecturers/{id}', [LecturerController::class, 'show'])->name('lecturer.show');
    Route::resource('lecturers', LecturerController::class);
});
Route::middleware(['auth', 'verified', 'role:admin|kaprodi'])->group(function () {
    // Room Routes
    Route::get('/room', [RoomController::class, 'index'])->name('room.index');
    Route::get('/room/create', [RoomController::class, 'create'])->name('room.create');
    Route::post('/room/store', [RoomController::class, 'store'])->name('room.store');
    Route::get('/room/edit/{id}', [RoomController::class, 'edit'])->name('room.edit');
    Route::put('/room/update/{id}', [RoomController::class, 'update'])->name('room.update');
    Route::delete('/room/{id}', [RoomController::class, 'destroy'])->name('room.destroy');
    Route::get('/api/available-rooms', [SessionController::class, 'getAvailableRooms']);
});
Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    // Student Routes
    Route::get('/student', [RoomController::class, 'index'])->name('student.index');
    Route::get('/formStudent', [StudentController::class, 'create'])->name('formStudent');
    Route::post('/student/store', [StudentController::class, 'store'])->name('student.store');
    Route::get('/student/edit/{id}', [StudentController::class, 'edit'])->name('student.edit');
    Route::put('/student/update/{id}', [StudentController::class, 'update'])->name('student.update');
    Route::delete('/student/delete/{id}', [StudentController::class, 'destroy'])->name('student.destroy');
    Route::get('student/export_excel', [StudentController::class, 'export_excel']);
    Route::post('student/import_excel', [StudentController::class, 'import_excel'])->name('student.import_excel');
    Route::resource('students', StudentController::class);
});
Route::middleware(['auth', 'verified', 'role:admin|mahasiswa|kaprodi|dosen'])->group(function () {
    // Thesis Routes
    Route::get('/thesis', [RoomController::class, 'index'])->name('thesis.index');
    Route::get('/formThesis', [ThesisController::class, 'create'])->name('formThesis');
    Route::post('/thesis/store', [ThesisController::class, 'store'])->name('thesis.store');
    Route::get('/thesis/{id}/edit', [ThesisController::class, 'edit'])->name('thesis.edit');
    Route::put('/thesis/update/{id}', [ThesisController::class, 'update'])->name('thesis.update');
    Route::delete('/thesis/delete/{id}', [ThesisController::class, 'destroy'])->name('thesis.destroy');
    Route::get('/thesis/{id}', [ThesisController::class, 'show'])->name('thesis.show');
    Route::get('/download/{file}', [ThesisController::class, 'download'])->name('thesis.download');
});
Route::middleware(['auth', 'verified', 'role:admin|kaprodi'])->group(function () {
    // Session Routes
    Route::get('/session', [RoomController::class, 'index'])->name('session.index');
    Route::get('/formsession', [SessionController::class, 'create'])->name('formsession');
    Route::post('/session/store', [SessionController::class, 'store'])->name('session.store');
    Route::get('/session/{id}/edit', [SessionController::class, 'edit'])->name('session.edit');
    Route::put('/session/update/{id}', [SessionController::class, 'update'])->name('session.update');
    Route::delete('/session/delete/{id}', [SessionController::class, 'destroy'])->name('session.destroy');
    Route::get('session/export_excel', [SessionController::class, 'export_excel']);
    Route::post('session/import_excel', [SessionController::class, 'import_excel'])->name('session.import_excel');
    Route::get('/session/get-pembimbing', [SessionController::class, 'getPembimbing'])->name('session.getPembimbing');


});

Route::middleware(['auth', 'verified', 'role:admin|dosen'])->group(function () {
    Route::get('/penilaian/create', [PenilaianController::class, 'create'])->name('penilaian.create');
    Route::post('/penilaian', [PenilaianController::class, 'store'])->name('penilaian.store');
    Route::get('/penilaian/edit/{id}', [PenilaianController::class, 'edit'])->name('penilaian.edit');
    Route::put('/penilaian/update/{id}', [PenilaianController::class, 'update'])->name('penilaian.update');
    Route::delete('/penilaian/{id}', [PenilaianController::class, 'destroy'])->name('penilaian.destroy');
});
Route::middleware(['auth', 'verified', 'role:admin|kaprodi'])->group(function () {
    Route::get('/sesi', [RoomController::class, 'index'])->name('sesi.index');
    Route::get('/sesi/create', [SesiController::class, 'create'])->name('sesi.create');
    Route::post('/sesi', [SesiController::class, 'store'])->name('sesi.store');
    Route::get('/sesi/edit/{id}', [SesiController::class, 'edit'])->name('sesi.edit');
    Route::put('/sesi/update/{id}', [SesiController::class, 'update'])->name('sesi.update');
    Route::delete('/sesi/{id}', [SesiController::class, 'destroy'])->name('sesi.destroy');
});

Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    // User Routes
    Route::get('/formUser', function () {
        return view('backend.form.formUser');
    })->name('formUser');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/users/export_user', [UserController::class, 'export_user']);
    Route::post('/users/import_excel', [UserController::class, 'import_excel'])->name('users.import_excel');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
});


Route::middleware('auth')->group(function () {
    Route::get('/penilaian', [PenilaianController::class, 'index'])->name('backend.penilaian');
    Route::get('/penilaian/create', [PenilaianController::class, 'create'])->name('penilaian.create');
    Route::post('/penilaian', [PenilaianController::class, 'store'])->name('penilaian.store');
    Route::get('/penilaian/{id}/edit', [PenilaianController::class, 'edit'])->name('penilaian.edit');
    Route::put('/penilaian/{id}', [PenilaianController::class, 'update'])->name('penilaian.update');
    Route::delete('/penilaian/{id}', [PenilaianController::class, 'destroy'])->name('penilaian.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/validasiTa', [ValidasiTaController::class, 'index'])->name('backend.validasiTa');
    Route::get('/validasiTa/create', [ValidasiTaController::class, 'create'])->name('backend.form.formValidasiTa');
    Route::post('/validasiTa/store', [ValidasiTaController::class, 'store'])->name('backend.form.formValidasiTa.store');
    Route::get('/validasiTa/edit/{id}', [ValidasiTaController::class, 'edit'])->name('backend.form.formEditValidasiTa');
    Route::put('/validasiTa/update/{id}', [ValidasiTaController::class, 'update'])->name('backend.form.formEditValidasiTa.update');
    Route::delete('/validasiTa/{id}', [ValidasiTaController::class, 'destroy'])->name('backend.form.formEditValidasiTa.destroy');
});


