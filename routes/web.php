<?php
declare(strict_types=1);

use App\Http\Controllers\Admins\ApartmentAdminController;
use App\Http\Controllers\Admins\CategoryAdminController;
use App\Http\Controllers\Admins\ConfirmedApartmentController;
use App\Http\Controllers\Admins\HomeAdminController;
use App\Http\Controllers\Admins\ImagesAdminController;
use App\Http\Controllers\Admins\ReservationAdminController;
use App\Http\Controllers\Admins\UsersAdminController;
use App\Http\Controllers\Apps\AboutController;
use App\Http\Controllers\Apps\CategoryController;
use App\Http\Controllers\Apps\ContactController;
use App\Http\Controllers\Apps\HomeController;
use App\Http\Controllers\Apps\LocationController;
use App\Http\Controllers\Apps\NewsLetterController;
use App\Http\Controllers\Apps\ReservationController;
use App\Http\Controllers\Apps\SearchController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::group([
    'prefix' => 'admins',
    'as' => 'admins.',
    'middleware' => ['admins', 'auth']
], function(){
    Route::resource('backend', HomeAdminController::class)->except(['show', 'create', 'store', 'update', 'edit', 'destroy']);
    Route::resource('apartments', ApartmentAdminController::class);
    Route::resource('categories', CategoryAdminController::class);
    Route::resource('users', UsersAdminController::class)->except(['create', 'store', 'update', 'edit']);
    Route::resource('reservations', ReservationAdminController::class)->except(['create', 'store', 'update', 'edit']);
    Route::resource('image', ImagesAdminController::class);

    Route::controller(ConfirmedApartmentController::class)->group(function (){
        Route::put('activeApartment/{key}','active')
            ->name('apartment.active');
        Route::put('invalidApartment/{key}', 'inactive')
            ->name('apartment.inactive');
    });

    Route::get('trashedApartment', [ApartmentAdminController::class, 'trashed'])
        ->name('apartment.trashed');
});

Route::group([
    'prefix' => 'commissioner',
    'as' => 'commissioner.',
    'middleware' => ['commissioner', 'auth']
], function(){
    Route::resource('backend', HomeAdminController::class);
});

Route::group([
    'prefix' => 'users',
    'as' => 'users.',
    'middleware' => ['users', 'auth']
], function(){
    Route::resource('backend', HomeAdminController::class);
});

Route::get('/', HomeController::class)->name('home.index');

Route::resource('categories', CategoryController::class);
Route::get('abouts', AboutController::class)->name('abouts.index');
Route::get('localisation', LocationController::class)->name('location.index');
Route::get('contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('news-letters', [NewsLetterController::class, 'index'])->name('newsletters.send');
Route::controller(ReservationController::class)->group(function (){
    Route::post('reservation', 'store')->name('reservation.store');
    Route::get('confirmation/{reference}', 'show')->name('reservation.show');
});
