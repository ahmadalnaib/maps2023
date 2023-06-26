<?php

use App\Models\User;
use App\Models\Payment;
use App\Models\Rentals;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HowController;
use App\Http\Controllers\TermController;
use App\Http\Controllers\BasicController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\SuperController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\PrivacyController;
use App\Http\Controllers\RentalsController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\Admin\Box\BoxController;
use App\Http\Controllers\ImpersonationController;
use App\Http\Controllers\Admin\Plan\PlanController;
use App\Http\Controllers\Admin\Faq\FaqAdminController;
use App\Http\Controllers\Admin\How\HowAdminController;
use App\Http\Controllers\Admin\Policy\PolicyController;
use App\Http\Controllers\Admin\System\SystemController;
use App\Http\Controllers\Admin\State\CategoryController;
use App\Http\Controllers\Admin\Term\TermAdminController;
use App\Http\Controllers\Admin\BoxType\BoxTypeController;
use App\Http\Controllers\Admin\Place\PlaceAdminController;
use App\Http\Controllers\Admin\Price\PriceAdminController;
use App\Http\Controllers\Admin\Users\UsersAdminController;
use App\Http\Controllers\Admin\Duration\DurationController;
use App\Http\Controllers\Admin\Locker\LockerAdminController;
use App\Http\Controllers\Admin\Privacy\PrivacyAdminController;
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


$app_url = config("app.url");
if (app()->environment('production') && !empty($app_url)) {
    URL::forceRootUrl($app_url);
    $schema = explode(':', $app_url)[0];
    URL::forceScheme($schema);
}

require_once __DIR__ . '/jetstream.php';

// lang route
Route::get('/change-language/{locale}',[LocaleController::class,'switch'])->name('change.language');




// admin users
Route::get('admin/users',[UsersAdminController::class,'index'])->name('admin.user.index')->middleware(['auth', 'role:super']);


// admin -- policies
Route::get('admin/policy',[PolicyController::class,'index'])->name('admin.policy.index')->middleware(['auth', 'verified', 'role:admin']);
Route::get('admin/policy/create',[PolicyController::class,'create'])->name('admin.policy.create')->middleware(['auth', 'verified', 'role:admin']);
Route::post('admin/policy/store',[PolicyController::class,'store'])->name('admin.policy.store')->middleware(['auth', 'verified', 'role:admin']);
Route::get('admin/policy/{policy}',[PolicyController::class,'edit'])->name('admin.policy.edit')->middleware(['auth', 'verified', 'role:admin']);
Route::put('admin/policy/{policy}',[PolicyController::class,'update'])->name('admin.policy.update')->middleware(['auth', 'verified', 'role:admin']);
Route::delete('admin/policy/{policy}',[PolicyController::class,'destroy'])->name('admin.policy.destroy')->middleware(['auth', 'verified', 'role:admin']);




// admin -- systems
Route::get('admin/system',[SystemController::class,'index'])->name('admin.system.index')->middleware(['auth', 'verified', 'role:admin']);
Route::get('admin/system/create',[SystemController::class,'create'])->name('admin.system.create')->middleware(['auth', 'verified', 'role:admin']);
Route::post('admin/system/store',[SystemController::class,'store'])->name('admin.system.store')->middleware(['auth', 'verified', 'role:admin']);
Route::get('admin/system/{system}', [SystemController::class, 'edit'])->name('admin.system.edit')->middleware(['auth', 'verified', 'role:admin']);
Route::put('admin/system/{system}', [SystemController::class, 'update'])->name('admin.system.update')->middleware(['auth', 'verified', 'role:admin']);
Route::delete('admin/system/{system}', [SystemController::class, 'destroy'])->name('admin.system.destroy')->middleware(['auth', 'verified', 'role:admin']);


// admin -- Boxes
Route::get('admin/box',[BoxController::class,'index'])->name('admin.box.index')->middleware(['auth', 'verified', 'role:admin']);
Route::get('admin/box/create',[BoxController::class,'create'])->name('admin.box.create')->middleware(['auth', 'verified', 'role:admin']);
Route::post('admin/box/create',[BoxController::class,'store'])->name('admin.box.store')->middleware(['auth', 'verified', 'role:admin']);
Route::get('admin/box/{box}', [BoxController::class, 'edit'])->name('admin.box.edit')->middleware(['auth', 'verified', 'role:admin']);
Route::put('admin/boxs/{box}', [BoxController::class, 'update'])->name('admin.box.update')->middleware(['auth', 'verified', 'role:admin']);
Route::delete('admin/boxs/{box}', [BoxController::class, 'destroy'])->name('admin.box.destroy')->middleware(['auth', 'verified', 'role:admin']);

// admin -- BoxesTypes
Route::get('admin/boxtype',[BoxTypeController::class,'index'])->name('admin.boxtype.index')->middleware(['auth', 'verified', 'role:admin']);
Route::get('admin/boxtype/create',[BoxTypeController::class,'create'])->name('admin.boxtype.create')->middleware(['auth', 'verified', 'role:admin']);
Route::post('admin/boxtype/create',[BoxTypeController::class,'store'])->name('admin.boxtype.store')->middleware(['auth', 'verified', 'role:admin']);
Route::get('admin/boxtype/{type}', [BoxTypeController::class, 'edit'])->name('admin.boxtype.edit')->middleware(['auth', 'verified', 'role:admin']);
Route::put('admin/boxtype/{type}', [BoxTypeController::class, 'update'])->name('admin.boxtype.update')->middleware(['auth', 'verified', 'role:admin']);
Route::delete('admin/boxtype/{type}', [BoxTypeController::class, 'destroy'])->name('admin.boxtype.destroy')->middleware(['auth', 'verified', 'role:admin']);


// **** Admin place route ****//
Route::get('admin/places',[PlaceAdminController::class,'index'])->name('admin.place.index')->middleware(['auth', 'verified', 'role:admin']);
Route::get('admin/place/create',[PlaceAdminController::class,'create'])->name('admin.place.create')->middleware(['auth', 'verified', 'role:admin']);
Route::post('admin/place/store',[PlaceAdminController::class,'store'])->name('admin.place.store')->middleware(['auth', 'verified', 'role:admin']);
Route::get('admin/place/{place}',[PlaceAdminController::class,'edit'])->name('admin.place.edit')->middleware(['auth', 'verified', 'role:admin']);
Route::put('admin/place/{place}',[PlaceAdminController::class,'update'])->name('admin.place.update');
Route::delete('admin/place/{place}',[PlaceAdminController::class,'destroy'])->name('admin.place.destroy')->middleware(['auth', 'verified', 'role:admin']);



// admin -- plans
Route::get('admin/plan',[PlanController::class,'index'])->name('admin.plan.index')->middleware(['auth', 'verified', 'role:admin']);
Route::get('admin/plan/create',[PlanController::class,'create'])->name('admin.plan.create')->middleware(['auth', 'verified', 'role:admin']);
Route::post('admin/plan/create',[PlanController::class,'store'])->name('admin.plan.store')->middleware(['auth', 'verified', 'role:admin']);
Route::get('admin/plan/{plan}', [PlanController::class, 'edit'])->name('admin.plan.edit')->middleware(['auth', 'verified', 'role:admin']);
Route::put('admin/plans/{plan}', [PlanController::class, 'update'])->name('admin.plan.update')->middleware(['auth', 'verified', 'role:admin']);
Route::delete('admin/plans/{plan}', [PlanController::class, 'destroy'])->name('admin.plan.destroy')->middleware(['auth', 'verified', 'role:admin']);





Route::get('/checkout',[RentalsController::class,'creditCheckout'])->name('credit.checkout');
Route::post('/rentals/purchase/{plan}', [RentalsController::class,'purchase'])->name('rentals.purchase')->middleware('auth');


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

Route::get('/invoices', [BasicController::class, 'index'])
    ->name('invoices.index')
    ->middleware(['auth', 'verified', 'role:basic']);


Route::get('/invoices/{rental}/generate', [BasicController::class,'generateInvoice'])->name('invoices.generate')->middleware(['auth', 'verified', 'role:basic']);;


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




Route::get('/pages', function () {
    return view('admin.pages.index');
})->name('pages')->middleware(['auth', 'role:super']);


Route::get('/faq',[FaqController::class,'index'])->name('faq');
Route::get('/faq/edit',[FaqAdminController::class,'index'])->name('faq.edit')->middleware(['auth', 'role:super']);
Route::put('/faq/update',[FaqAdminController::class,'update'])->name('faq.update')->middleware(['auth', 'role:super']);



Route::get('/how',[HowController::class,'index'])->name('how');
Route::get('/how/edit',[HowAdminController::class,'index'])->name('how.edit')->middleware(['auth', 'role:super']);
Route::put('/how/update',[HowAdminController::class,'update'])->name('how.update')->middleware(['auth', 'role:super']);

Route::get('/price',[PriceController::class,'index'])->name('price');
Route::get('/price/edit',[PriceAdminController::class,'index'])->name('price.edit')->middleware(['auth', 'role:super']);
Route::put('/price/update',[PriceAdminController::class,'update'])->name('price.update')->middleware(['auth', 'role:super']);


// e
Route::get('/policy',[PrivacyController::class,'index'])->name('policy');
Route::get('/policy/edit',[PrivacyAdminController::class,'index'])->name('policy.edit')->middleware(['auth', 'role:super']);
Route::put('/policy/update',[PrivacyAdminController::class,'update'])->name('policy.update')->middleware(['auth', 'role:super']);

Route::get('/terms',[TermController::class,'index'])->name('terms');
Route::get('/terms/edit',[TermAdminController::class,'index'])->name('term.edit')->middleware(['auth', 'role:super']);
Route::put('/terms/update',[TermAdminController::class,'update'])->name('term.update')->middleware(['auth', 'role:super']);

Route::get('/super', [SuperController::class, 'show'])->name('super')->middleware(['auth', 'role:super']);

Route::view('/team', 'team')->name('team.index')->middleware(['auth', 'role:super']);
Route::view('/tenant', 'tenant')->name('tenant')->middleware(['auth', 'role:super']);
Route::view('/userlogin', 'loginUser')->name('userLogin')->middleware(['auth', 'role:super']);
Route::view('/createuser', 'createuser')->name('createuser')->middleware(['auth', 'role:super']);


Route::get('/leave-impersonation',[ImpersonationController::class,'leave'])->name('leave-impersonation')->middleware(['auth', 'role:super']);

// admin -- place

Route::middleware(['web'])->group(function(){
    Route::get('/user/profile', [UserProfileController::class, 'show'])->name('profile.show');
// Login
// Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
// Route::post('login', [AuthenticatedSessionController::class, 'store']);

// // Registration
// Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
// Route::post('register', [RegisteredUserController::class, 'store']);


Route::get('/search',[SearchController::class,'autoComplete'])->name('auto-complete');
Route::post('search',[SearchController::class,'show'])->name('search');
Route::get('/{category:slug}',[CategoryController::class,'show'])->name('category.show');
Route::resource('report',ReportController::class,['only'=>['create','store']]);

Route::get('/',[PlaceController::class,'index'])->name('home');
Route::get('/{place:uuid}/{slug}',[PlaceController::class,'show'])->name('place.show');


Route::post('/rent', [RentalsController::class,'rent'])->name('rent')->middleware('auth');

Route::post('/rentals/save', [RentalsController::class, 'save'])->name('rentals.save')->middleware('auth');











});

