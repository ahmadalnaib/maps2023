<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\RentalsController;
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
Route::get('/admin/category',[CategoryController::class,'index'])->name('category.admin.index');
Route::get('/admin/category/create',[CategoryController::class,'create'])->name('category.admin.create');
Route::post('/admin/category/store',[CategoryController::class,'store'])->name('category.admin.store');
Route::get('/admin/{category}',[CategoryController::class,'edit'])->name('category.admin.edit');
Route::post('/admin/{category}',[CategoryController::class,'update'])->name('category.admin.update');
Route::delete('/admin/{category}',[CategoryController::class,'destroy'])->name('category.admin.destroy');
Route::get('/{category:slug}',[CategoryController::class,'show'])->name('category.show');

Route::resource('report',ReportController::class,['only'=>['create','store']]);

Route::get('/place/create',[PlaceController::class,'create'])->name('place.create');
Route::post('/place/store',[PlaceController::class,'store'])->name('place.store');
Route::get('/',[PlaceController::class,'index'])->name('home');
Route::get('/{place}/{slug}',[PlaceController::class,'show'])->name('place.show');



Route::post('/rent', [RentalsController::class,'rent'])->name('rent');
Route::get('/cancel', [RentalsController::class,'cancel'])->name('cancel');
Route::get('/success', [RentalsController::class,'success'])->name('success');
