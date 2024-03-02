<?php

use App\Http\Controllers\Admin\AdminRouteController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Hotel\HotelCasherController;
use App\Http\Controllers\Hotel\HotelRouteController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\route\PublicRouteController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::middleware('auth')->group(function () {

    Route::group(['middleware' => ['role:Super_Admin']], function () {

        Route::prefix('superAdmin')->group(function () {
            Route::get('/Home', [AdminRouteController::class, 'AdminHome'])->name('SuperAdmin.Home');
            Route::get('/Hotels', [AdminRouteController::class, 'AdminHotels'])->name('SuperAdmin.Hotels');
            Route::get('/Users', [AdminRouteController::class, 'AdminUsers'])->name('SuperAdmin.Users');
            Route::get('/HotelDetails/{id}', [AdminRouteController::class, 'AdminHotelDetails'])->name('SuperAdmin.HotelDetails');
        });
    });

    Route::group(['middleware' => ['role:Hotel_Admin']], function () {

        Route::prefix('hotelAdmin')->group(function () {
            Route::get('/Home', [HotelRouteController::class, 'HotelAdminHome'])->name('HotelAdmin.Home');
            Route::get('/Users', [HotelRouteController::class, 'HotelAdminUsers'])->name('HotelAdmin.users');
            Route::get('/Menus', [HotelRouteController::class, 'HotelAdminMenus'])->name('HotelAdmin.Menus');
        });
    });


    Route::group(['middleware' => ['role:Hotel_Casher']], function () {

        Route::prefix('hotelCasher')->group(function () {
            Route::get('/Home', [HotelCasherController::class, 'CasherHome'])->name('HotelCasher.Home');
        });
    });

    Route::prefix("/process")->group(function () {

        Route::group(['middleware' => ['can:create_hotels']], function () {
            Route::post('/create-Hotel', [HotelController::class, 'store'])->name('Create.Hotel');
        });

        Route::group(['middleware' => ['can:manage_users']], function () {
            Route::post('/create-user', [UserController::class, 'store'])->name('Create.User');
        });

        Route::group(['middleware' => ['can:manage_hotel_staff']], function () {
            Route::post('/create-user-hotel', [UserController::class, 'storeEmployee'])->name('Create.Employee');
            Route::post('/create-menu', [MenuController::class, 'store'])->name('Create.Menu');
        });

        Route::group(['middleware' => ['can:edit_hotels']], function () {
        });

        Route::post('/create-order', [OrderController::class, 'store'])->name('Order.create');
        Route::get('/open-table/{id}', [TableController::class, 'update'])->name('Open.Table');
    });
});

Route::prefix("/auth")->group(function () {
    Route::post("/login-process", [AuthController::class, 'login'])->name("auth.login");
});


Route::get('/', [PublicRouteController::class, 'login'])->name('login');
