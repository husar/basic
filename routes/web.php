<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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

Route::get('/home', function () {
    echo "This is homepage.";
});

Route::get('/about', function () {
    return view('about');
});

//Route::get('/contact', 'ContactController@index'); //Laravel 7 format
Route::get('/contact-asdf-asdfsad', [ContactController::class, 'index'])->name('con'); //contact je URL parameter a vykona s ContactController-a metodu index()

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
