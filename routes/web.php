<?php

use App\Http\Controllers\AccessbilityController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\RequestVisitController;
use App\Http\Controllers\SematController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ShopTitleController;
use App\Http\Controllers\UserAdminController;
use App\Http\Controllers\VisitTitleController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::prefix('/dashboard')->group(function () {
    Route::resource('/request', RequestVisitController::class)
        ->only(['index', 'store'])
        ->middleware(['auth']);

    Route::resource('/shop', ShopController::class)
        ->only(['index', 'store', 'create', 'destroy', 'edit', 'update'])
        ->middleware(['auth']);

    Route::resource('/member', MemberController::class)
        ->only(['index', 'store', 'create', 'destroy', 'edit', 'update'])
        ->middleware(['auth']);
});

Route::prefix('/dashboard/admin')->name('admin.')->group(function () {
    // Cities And Sates
    Route::resource('/city', CityController::class)
        ->only(['index', 'create', 'store'])
        ->middleware(['auth']);

    // Form
    Route::resource('/form', FormController::class)
        ->only(['index', 'create', 'store'])
        ->middleware(['auth']);

    // Semat
    Route::resource('/semat', SematController::class)
        ->only(['index', 'create', 'store'])
        ->middleware(['auth']);

    // accessbility
    Route::resource('/accessbility', AccessbilityController::class)
        ->only(['index', 'create', 'store'])
        ->middleware(['auth']);

    // Shop Title
    Route::resource('/shop-titles', ShopTitleController::class)
        ->only(['index', 'create', 'store'])
        ->middleware(['auth']);

    // Visit Title
    Route::resource('/visit-titles', VisitTitleController::class)
        ->only(['index', 'create', 'store'])
        ->middleware(['auth']);

    // Users
    Route::resource('/users', UserAdminController::class)
        ->only(['index', 'create', 'store'])
        ->middleware(['auth']);
});

require __DIR__ . '/auth.php';
