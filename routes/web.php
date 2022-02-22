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
Route::resource('/contacts', ContactController::class);

use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [App\http\Controllers\HomeController::class, 'index'])->name('home');
});
