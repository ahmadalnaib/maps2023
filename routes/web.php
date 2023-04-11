<?php

use App\Models\User;
use App\Models\Payment;
use App\Models\Rentals;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\RentalsController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\Door\DoorAdminController;
use App\Http\Controllers\Admin\Place\PlaceAdminController;
use App\Http\Controllers\Admin\Users\UsersAdminController;
use App\Http\Controllers\Admin\Locker\LockerAdminController;

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

// admin -- place
Route::get('admin/places',[PlaceAdminController::class,'index'])->name('admin.place.index');
Route::get('admin/place/create',[PlaceAdminController::class,'create'])->name('admin.place.create');
Route::post('admin/place/store',[PlaceAdminController::class,'store'])->name('admin.place.store');


// admin -- Locker
Route::get('admin/locker',[LockerAdminController::class,'index'])->name('admin.locker.index');
Route::get('admin/locker/create',[LockerAdminController::class,'create'])->name('admin.locker.create');
Route::post('admin/locker/store',[LockerAdminController::class,'store'])->name('admin.locker.store');

// admin -- Door
Route::get('admin/door',[DoorAdminController::class,'index'])->name('admin.door.index');
Route::get('admin/door/create',[DoorAdminController::class,'create'])->name('admin.door.create');
Route::post('admin/door/create',[DoorAdminController::class,'store'])->name('admin.door.store');

// admin users
Route::get('admin/users',[UsersAdminController::class,'index'])->name('admin.user.index');

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



Route::get('/',[PlaceController::class,'index'])->name('home');
Route::get('/{place}/{slug}',[PlaceController::class,'show'])->name('place.show');



Route::post('/rent', [RentalsController::class,'rent'])->name('rent');
Route::get('/cancel', [RentalsController::class,'cancel'])->name('cancel');
Route::get('/success', [RentalsController::class,'success'])->name('success');



