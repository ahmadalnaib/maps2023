<?php

use App\Models\User;
use App\Models\Payment;
use App\Models\Rentals;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BasicController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\SuperController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\RentalsController;
use App\Http\Controllers\ImpersonationController;
use App\Http\Controllers\Admin\Plan\PlanController;
use App\Http\Controllers\Admin\Door\DoorAdminController;
use App\Http\Controllers\Admin\State\CategoryController;
use App\Http\Controllers\Admin\Place\PlaceAdminController;
use App\Http\Controllers\Admin\Users\UsersAdminController;
use App\Http\Controllers\Admin\Duration\DurationController;
use App\Http\Controllers\Admin\Locker\LockerAdminController;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Laravel\Jetstream\Http\Controllers\Livewire\UserProfileController;


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



// lang route
Route::get('/change-language/{locale}',[LocaleController::class,'switch'])->name('change.language');


// **** Admin place route ****//
Route::get('admin/places',[PlaceAdminController::class,'index'])->name('admin.place.index');
Route::get('admin/place/create',[PlaceAdminController::class,'create'])->name('admin.place.create');
Route::post('admin/place/store',[PlaceAdminController::class,'store'])->name('admin.place.store');
Route::get('admin/place/{place}',[PlaceAdminController::class,'edit'])->name('admin.place.edit');
Route::put('admin/place/{place}',[PlaceAdminController::class,'update'])->name('admin.place.update');
Route::delete('admin/place/{place}',[PlaceAdminController::class,'destroy'])->name('admin.place.destroy');



// admin -- plans
Route::get('admin/plan',[PlanController::class,'index'])->name('admin.plan.index');
Route::get('admin/plan/create',[PlanController::class,'create'])->name('admin.plan.create');
Route::post('admin/plan/create',[PlanController::class,'store'])->name('admin.plan.store');
Route::get('admin/plan/{plan}', [PlanController::class, 'edit'])->name('admin.plan.edit');
Route::put('admin/plans/{plan}', [PlanController::class, 'update'])->name('admin.plan.update');
Route::delete('admin/plans/{plan}', [PlanController::class, 'destroy'])->name('admin.plan.destroy');

// admin -- Door
Route::get('admin/door',[DoorAdminController::class,'index'])->name('admin.door.index');
Route::get('admin/door/create',[DoorAdminController::class,'create'])->name('admin.door.create');
Route::post('admin/door/create',[DoorAdminController::class,'store'])->name('admin.door.store');
Route::get('admin/door/{door}', [DoorAdminController::class, 'edit'])->name('admin.door.edit');
Route::put('admin/doors/{door}', [DoorAdminController::class, 'update'])->name('admin.door.update');
Route::delete('admin/doors/{door}', [DoorAdminController::class, 'destroy'])->name('admin.door.destroy');


// admin -- Locker
Route::get('admin/locker',[LockerAdminController::class,'index'])->name('admin.locker.index');
Route::get('admin/locker/create',[LockerAdminController::class,'create'])->name('admin.locker.create');
Route::post('admin/locker/store',[LockerAdminController::class,'store'])->name('admin.locker.store');
Route::get('admin/locker/{locker}', [LockerAdminController::class, 'edit'])->name('admin.locker.edit');
Route::put('admin/lockers/{locker}', [LockerAdminController::class, 'update'])->name('admin.locker.update');
Route::delete('admin/lockers/{locker}', [LockerAdminController::class, 'destroy'])->name('admin.locker.destroy');


// super citys  *****
// super users *****


// Route::middleware(['auth', 'role:admin'])->group(function () {
//     Route::get('admin/users',[UsersAdminController::class,'index'])->name('admin.user.index');
    
// });

// routes/web.php
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        $user = Auth::user();

        // Check the user's role and return the corresponding dashboard view
        if ($user->role === 'basic') {
            return app(BasicController::class)->dashboard();
        } elseif ($user->role === 'super') {
            return app(SuperController::class)->show();
        }

        // Default case if the user's role doesn't match any specific dashboard
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/invoices/{rental}/generate', [BasicController::class,'generateInvoice'])->name('invoices.generate');


Route::get('/admin/category',[CategoryController::class,'index'])->name('category.admin.index')
->middleware(['auth', 'role:super']);
Route::get('/admin/category/create',[CategoryController::class,'create'])->name('category.admin.create')->middleware(['auth', 'role:super']);
Route::post('/admin/category/store',[CategoryController::class,'store'])->name('category.admin.store')->middleware(['auth', 'role:super']);
Route::get('/admin/{category}',[CategoryController::class,'edit'])->name('category.admin.edit')
->middleware(['auth', 'role:super']);
Route::put('/admin/{category}',[CategoryController::class,'update'])->name('category.admin.update')->middleware(['auth', 'role:super']);
Route::delete('/admin/{category}',[CategoryController::class,'destroy'])->name('category.admin.destroy')->middleware(['auth', 'role:super']);










Route::get('/faq', function () {
    return view('faq');
})->name('faq');

Route::get('/price', function () {
    return view('price');
})->name('price');
Route::get('/how', function () {
    return view('how');
})->name('how');

Route::get('/super', [SuperController::class, 'show'])->name('super');

Route::view('/team', 'team')->name('team.index');

Route::get('/leave-impersonation',[ImpersonationController::class,'leave'])->name('leave-impersonation');

// admin -- place

Route::middleware(['web'])->group(function(){
    Route::get('/user/profile', [UserProfileController::class, 'show'])->name('profile.show');
    
// admin users
Route::get('admin/users',[UsersAdminController::class,'index'])->name('admin.user.index');


Route::get('/search',[SearchController::class,'autoComplete'])->name('auto-complete');
Route::post('search',[SearchController::class,'show'])->name('search');
Route::get('/{category:slug}',[CategoryController::class,'show'])->name('category.show');
Route::resource('report',ReportController::class,['only'=>['create','store']]);

Route::get('/',[PlaceController::class,'index'])->name('home');
Route::get('/{place}/{slug}',[PlaceController::class,'show'])->name('place.show');


Route::post('/rent', [RentalsController::class,'rent'])->name('rent')->middleware('auth');








// require_once __DIR__ . '/jetstream.php';


});