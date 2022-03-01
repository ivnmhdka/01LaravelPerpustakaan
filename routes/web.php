<?php

use App\Http\Controllers\ContactController;
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
    return view('index', [
        "title" => "Beranda"
    ]);
});
Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "nama" => "Ivan Mahadika Yanuarizqi",
        "email" => "ivanmahadika@gmail.com",
        "gambar" => "image.jpg"
    ]);
});
Route::get('/gallery', function () {
    return view('gallery', [
        "title" => "Gallery"
    ]);
});
// Route::resource('/contacts', ContactController::class);
Route::get('/contact/create', [ContactController::class, 'create'])->name('contacts.create');
Route::post('/contact/store', [ContactController::class, 'store'])->name('contacts.store');

use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [App\http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/contact/index', [ContactController::class, 'index'])->name('contacts.index');
    Route::get('/contact/{id}/edit', [ContactController::class, 'edit'])->name('contacts.edit');
    Route::post('/contact/{id}/update', [ContactController::class, 'update'])->name('contacts.update');
    Route::get('/contact/{id}/destroy', [ContactController::class, 'destroy'])->name('contacts.destroy');
});
