<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Models\User;
use App\Models\Multipic;
use Illuminate\Support\Facades\DB;

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
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/', function () {
    $brands = DB::table('brands')->get();
    $abouts = DB::table('home_abouts')->first();
    $images = Multipic::all();
    return view('home', compact('brands','abouts', 'images'));
});

Route::get('/home', function () {
    echo "This is homepage.";
});

Route::get('/about', function () {
    return view('about');
});

//Route::get('/contact', 'ContactController@index'); //Laravel 7 format
Route::get('/contact-asdf-asdfsad', [ContactController::class, 'index'])->name('con'); //contact je URL parameter a vykona s ContactController-a metodu index()

// Category controller
Route::get('/category/all', [CategoryController::class, 'AllCat'])->name('all.category');

Route::post('/category/add', [CategoryController::class, 'AddCat'])->name('store.category');

Route::get('/category/edit/{id}', [CategoryController::class, 'Edit']);

Route::post('/category/update/{id}', [CategoryController::class, 'Update']);

Route::get('/softdelete/category/{id}', [CategoryController::class, 'SoftDelete']);

Route::get('/category/restore/{id}', [CategoryController::class, 'Restore']);

Route::get('/pdelete/category/{id}', [CategoryController::class, 'PDelete']);

// For Brand Route

Route::get('/brand/all', [BrandController::class, 'AllBrand'])->name('all.brand');

Route::post('/brand/add', [BrandController::class, 'StoreBrand'])->name('store.brand');

Route::get('/brand/edit/{id}', [BrandController::class, 'Edit']);

Route::post('/brand/update/{id}', [BrandController::class, 'Update']);

Route::get('/brand/delete/{id}', [BrandController::class, 'Delete']);

// For Multi Image Route

Route::get('/multi/image', [BrandController::class, 'Multpic'])->name('multi.image');

Route::post('/multi/add', [BrandController::class, 'StoreImg'])->name('store.image');

//Admin ALL Route

Route::get('/home/slider', [HomeController::class, 'HomeSlider'])->name('home.slider');

Route::get('/add/slider', [HomeController::class, 'AddSlider'])->name('add.slider');

Route::post('/store/slider', [HomeController::class, 'StoreSlider'])->name('store.slider');

//Home About All Route

Route::get('/home/About', [AboutController::class, 'HomeAbout'])->name('home.about');

Route::get('/add/About', [AboutController::class, 'AddAbout'])->name('add.about');

Route::post('/store/About', [AboutController::class, 'StoreAbout'])->name('store.about');

Route::get('/about/edit/{id}', [AboutController::class, 'EditAbout']);

Route::post('/update/homeabout/{id}', [AboutController::class, 'UpdateAbout']);

Route::get('/about/delete/{id}', [AboutController::class, 'DeleteAbout']);

// Portfolio Page Route

Route::get('/portfolio', [AboutController::class, 'Portfolio'])->name('portfolio');

// For User

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
   // $users = User::all();
    // $users = DB::table('users')->get();

    return view('admin.index');
})->name('dashboard');

Route::get('/user/logout', [BrandController::class, 'Logout'])->name('user.logout');