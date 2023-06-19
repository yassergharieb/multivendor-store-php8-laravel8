<?php

use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\LangsController;
use App\Http\Controllers\Admin\VendorController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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







Route::group(['prefix' => LaravelLocalization::setLocale() ,
 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ] ] , function() {


Route::group(['prefix' => 'admin' , 'middleware' => 'auth:admin' ] , function () {

    Route::get('/logout' , [AdminLoginController::class , 'LogOut'])->name('admin.logout');
    Route::get('/', [HomeController::class , 'index'])->name('admin.dashboard');

    Route::group(['prefix' => 'categories'], function () {
        Route::get('index',  [CategoriesController::class , 'index' ] )->name('categories.index');
        Route::get('create', [CategoriesController::class , 'create'])->name('categories.create');
        Route::post('store', [CategoriesController::class , 'store'])->name('categories.store');
        Route::get('edit/{id}', [CategoriesController::class , 'edit' ] )->name('categories.edit');
        Route::post('update/{id}',  [CategoriesController::class , 'update'])->name('categories.update');
        Route::get('delete/{id}', [CategoriesController::class , 'destroye' ] )->name('categories.delete');
        Route::get('changeStatus/{id}', [CategoriesController::class , 'changeStatus' ] )->name('categories.changeStatus');

        

    });


    Route::group(['prefix' => 'langs'], function () {
        Route::get('index',  [LangsController::class, 'index' ] )->name('langs.index');
        Route::get('create', [LangsController::class , 'create'])->name('langs.create');
        Route::post('store', [LangsController::class , 'store'])->name('langs.store');
        Route::get('edit/{id}', [LangsController::class , 'edit' ] )->name('langs.edit');
        Route::post('update/{id}',  [LangsController::class , 'update'])->name('langsupdate');
        Route::get('delete/{id}', [LangsController::class , 'destroye' ] )->name('langs.delete');

    });


    Route::group(['prefix' => 'vendor'], function () {
        Route::get('index',  [VendorController::class, 'index' ] )->name('vendor.index');
        Route::get('create', [VendorController::class , 'create'])->name('vendor.create');
        Route::post('store', [VendorController::class , 'store'])->name('vendor.store');
        Route::get('edit/{id}', [VendorController::class , 'edit' ] )->name('vendor.edit');
        Route::post('update/{id}',  [VendorController::class , 'update'])->name('vendor.update');
        Route::get('delete/{id}', [VendorController::class , 'destroye' ] )->name('vendor.delete');
        Route::get('changeStatus/{id}', [VendorController::class , 'changeStatus' ] )->name('vendor.changeStatus');


    });

    

    Route::group(['prefix' => 'profile'], function () {
        Route::get('index',  [ AdminProfileController::class , 'index' ] )->name('admin.profile.index');
        Route::get('create', [ AdminProfileController::class  , 'create'])->name('admin.profile.create');
        Route::post('store', [AdminProfileController::class , 'store'])->name('admin.profile.store');
        Route::get('edit/{id}', [ AdminProfileController::class , 'edit' ] )->name('admin.profile.edit');
        Route::post('update/{id}', [AdminProfileController::class , 'update'])->name('admin.profile.update');
        // Route::post('/logout' , [AdminProfileController::class , 'logout'])->name('admin.logout');
        Route::get('delete/{id}', [ AdminProfileController::class, 'destroye' ] )->name('admin.profile.delete');

    });

});   


});



Route::get('admin/login' , [\App\Http\Controllers\Admin\AdminLoginController::class, 'AdminLoginForm' ])->middleware('guest')->name('admin.login');
Route::post('admin/post' , [\App\Http\Controllers\Admin\AdminLoginController::class, 'AdminLoginPost' ])
          ->name('admin.login.post');


