<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\CategoryController;

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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('/search',[SearchController::class,'autoComplete'])->name('auto-complete');
Route::post('search',[SearchController::class,'show'])->name('search');
Route::get('bookmark/{place_id}',[BookmarkController::class,'bookmark'])->name('bookmark');
Route::get('bookmarks',[BookmarkController::class,'getByUser'])->name('bookmarks');
Route::get('/{category:slug}',[CategoryController::class,'show'])->name('category.show');

Route::resource('report',ReportController::class,['only'=>['create','store']]);

Route::get('/place/create',[PlaceController::class,'create'])->name('place.create');
Route::post('/place/store',[PlaceController::class,'store'])->name('place.store');
Route::get('/',[PlaceController::class,'index'])->name('home');
Route::get('/{place}/{slug}',[PlaceController::class,'show'])->name('place.show');


