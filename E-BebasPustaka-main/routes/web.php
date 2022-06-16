<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ResourceController;
use App\Http\Controllers\Admin\ThesisController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AskController;
use App\Http\Controllers\Admin\BookOrderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MahasiswaAuthController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
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
// E-Bebas Pustaka
Route::get('/test', function () { return view('test');});
Route::get('/', function () { return view('welcome'); });
Route::get('/active', function () { return view('welcome_aktivasi'); });
Route::get('/verification', function () { return view('welcome_verifikasi'); });
Route::get('/print', function () { return view('welcome_cetak'); });
Route::get('/ebp', function () { return view('welcome_ebp'); });

//Mahasiswa 
Route::group(['middleware' => ['auth:mahasiswa']], function(){ // DI SCOPE INI PERLU AUTH SEMUA & DIKASIH NAME  
    Route::get('/form', [FormController::class, 'create'])->name('mahasiswa.form'); //
    Route::post('/form', [FormController::class, 'store'])->name('mahasiswa.ajukan'); //
});

Route::post('/register', [MahasiswaController::class, 'register']); //
Route::get('/register', [MahasiswaController::class, 'create']); //
Route::get('/login', [MahasiswaAuthController::class, 'login'])->name('mahasiswa.login'); //
Route::post('/login', [MahasiswaAuthController::class, 'HandleLogin']); //
Route::get('/logout', [MahasiswaAuthController::class, 'logout']); //

//Admin
Route::get('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login'); //
Route::post('/admin/login', [AdminAuthController::class, 'HandleLogin']); //
Route::get('/admin/logout', [AdminAuthController::class, 'logout']); //

Route::group(['middleware' => ['auth:admin']], function(){ // DI SCOPE INI PERLU AUTH SEMUA & DIKASIH NAME  
    //buat nyoba, name
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.index'); // Pengguna - Halaman Form E-Thesis
    Route::put('/admin/dashboard/aktivasi/{id}', [AdminController::class, 'aktivasiMahasiswa'])->name('admin.aktivasi'); // Pengguna - Halaman Form E-Thesis

    Route::get('/admin/validasi', [AdminController::class, 'validasi']);
    Route::put('/admin/validasi/a/{id}', [AdminController::class, 'validasiSetuju'])->name('mhs.validasi.setuju');
    Route::put('/admin/validasi/d/{id}', [AdminController::class, 'validasiTolak'])->name('mhs.validasi.tolak');

    Route::get('/admin/caraterima', [AdminController::class, 'caraterima']);
    Route::get('/admin/tanggungan', [AdminController::class, 'tanggungan']);
    Route::get('/admin/suratbebas', [AdminController::class, 'suratbebas']);
    Route::get('/admin/detail/{id}', [AdminController::class, 'detail'])->name('mhs.detail');
});








// -------------------------------------------------KP Mas Danu-----------------------------------------

Route::get('/vpn', function () {return view('vpn');});

// ADMIN
// login
// Route::get('/admin-login', [LoginController::class, 'login'])->name('login');
// Route::post('/login-process', [LoginController::class, 'loginProcess']);
Route::post('/admin-logout', [LoginController::class, 'logout'])->name('logout');

// reset password
Route::get('/forgot-password', [ForgotPasswordController::class, 'getEmail']);
Route::post('/forgot-password', [ForgotPasswordController::class, 'postEmail']);
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'getPassword']);
Route::post('/reset-password', [ResetPasswordController::class, 'updatePassword']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

// e-resource delivery
Route::get('/resource/request', [ResourceController::class, 'newResource'])->middleware('auth');  
Route::get('/resource/finished', [ResourceController::class, 'finishedResource'])->middleware('auth'); 
Route::patch('/resource/mark/{id}', [ResourceController::class, 'markResource'])->middleware('auth'); 
Route::get('/resource/download/{id}', [ResourceController::class, 'download'])->middleware('auth'); 

// e-thesis delivery
Route::get('/thesis/request', [ThesisController::class, 'newThesis'])->middleware('auth');  
Route::get('/thesis/finished', [ThesisController::class, 'finishedThesis'])->middleware('auth'); 
Route::patch('/thesis/mark/{id}', [ThesisController::class, 'markThesis'])->middleware('auth'); 
Route::get('/thesis/download/{id}', [ThesisController::class, 'download'])->middleware('auth'); 




// ask a librarian
Route::get('/ask/request', [AskController::class, 'newAsk'])->middleware('auth');  
Route::get('/ask/finished', [AskController::class, 'finishedAsk'])->middleware('auth'); 
Route::patch('/ask/mark/{id}', [AskController::class, 'markAsk'])->middleware('auth');

// admin list
Route::group(['middleware' => ['auth']], function(){
    Route::group(['middleware' => ['adminCheck:admin']], function(){
        Route::get('/admin-list', [UserController::class, 'index']);
    });
});
Route::post('/admin-list/add', [UserController::class, 'create'])->middleware('auth');

// profile
Route::get('/profile', [UserController::class, 'getProfile'])->middleware('auth');
Route::patch('/profile/change-password', [UserController::class, 'changePasswordProfile'])->middleware('auth');


// UMUM
//      resource
Route::get('/resource', [ResourceController::class, 'create']); // Pengguna - Halaman Form E-Resource
Route::post('/resource', [ResourceController::class, 'store']); // Pengguna - Halaman Form E-Resource

//      thesis
// Route::get('/thesis', [ThesisController::class, 'create']); // Pengguna - Halaman Form E-Thesis
Route::post('/thesis', [ThesisController::class, 'store']); // Pengguna - Halaman Form E-Thesis

//      ask
Route::get('/ask', [AskController::class, 'create']); // Pengguna - Halaman Form Ask a Librarian
Route::post('/ask', [AskController::class, 'store']); // Pengguna - Halaman Form Ask a Librarian