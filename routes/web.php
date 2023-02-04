<?php

declare(strict_types=1);

use App\Http\Controllers\Api\Upload\UploadFIleApiController;
use App\Http\Controllers\Backend\Apartments\ApartmentAdminController;
use App\Http\Controllers\Backend\Apartments\StatusApartmentController;
use App\Http\Controllers\Backend\Booking\BookingAdminController;
use App\Http\Controllers\Backend\Booking\StatusBookingBackendController;
use App\Http\Controllers\Backend\CategoryAdminController;
use App\Http\Controllers\Backend\ClientBackendController;
use App\Http\Controllers\Backend\HomeAdminController;
use App\Http\Controllers\Backend\ImagesAdminController;
use App\Http\Controllers\Backend\NotificationAdminController;
use App\Http\Controllers\Backend\SlideAdminController;
use App\Http\Controllers\Backend\TransactionBackendController;
use App\Http\Controllers\Backend\UsersAdminController;
use App\Http\Controllers\Dealer\ApartmentCommissionerController;
use App\Http\Controllers\Dealer\HomeCommissionerController;
use App\Http\Controllers\Dealer\ImageCommissionerController;
use App\Http\Controllers\Dealer\Upload\UploadDealerController as ImagesUpload;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\BookingController;
use App\Http\Controllers\Frontend\CategoryController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\HouseController;
use App\Http\Controllers\Frontend\LocationController;
use App\Http\Controllers\Frontend\SearchLocationController;
use App\Http\Controllers\UseCase\Auth\FacebookAuth\FacebookAuthenticationCallbackController;
use App\Http\Controllers\UseCase\Auth\FacebookAuth\FacebookAuthenticationController;
use App\Http\Controllers\UseCase\Auth\Google\GoogleAuthentication;
use App\Http\Controllers\UseCase\Auth\Google\GoogleAuthenticationCallback;
use App\Http\Controllers\Users\CancellingBookingController;
use App\Http\Controllers\Users\HomeUserController;
use App\Http\Controllers\Users\InvoiceUserController;
use App\Http\Controllers\Users\UpdateUserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::group([
    'prefix' => 'admins',
    'as' => 'admins.',
    'middleware' => ['admins', 'auth'],
], function () {
    Route::resource('backend', HomeAdminController::class)
        ->except(['show', 'create', 'store', 'update', 'edit', 'destroy']);
    Route::resource('houses', ApartmentAdminController::class);
    Route::resource('categories', CategoryAdminController::class);
    Route::resource('users', UsersAdminController::class)
        ->except(['create', 'store', 'update', 'edit']);
    Route::resource('reservations', BookingAdminController::class)
        ->except(['create', 'store', 'update', 'edit']);
    Route::resource('image', ImagesAdminController::class);

    Route::resource('slides', SlideAdminController::class);

    Route::get('transactions', [TransactionBackendController::class, 'index'])->name('transaction.index');
    Route::get('transaction/{key}', [TransactionBackendController::class, 'show'])->name('transaction.show');
    Route::delete('transaction/{key}', [TransactionBackendController::class, 'destroy'])->name('transaction.destroy');

    Route::get('clients', [ClientBackendController::class, 'index'])->name('client.index');
    Route::get('client/{key}', [ClientBackendController::class, 'show'])->name('client.show');

    Route::get('notification', [NotificationAdminController::class, 'index'])->name('notification.index');
    Route::post('notification/{key}', [NotificationAdminController::class, 'readNotification'])->name('notification.read');
    Route::delete('notification/{key}', [NotificationAdminController::class, 'delete'])->name('notification.delete');
    Route::get('notification/markRead', [NotificationAdminController::class, 'markAllReads'])->name('notification.markReads');

    Route::post('toggle-reservation', StatusBookingBackendController::class)->name('booking.toggle');

    Route::post('active-room', StatusApartmentController::class);

    Route::post('upload-images', UploadFIleApiController::class);
    Route::delete('remove-images', [UploadFIleApiController::class, 'destroy']);
});

Route::group([
    'prefix' => 'commissioner',
    'as' => 'commissioner.',
    'middleware' => ['commissioner', 'auth'],
], function () {
    Route::resource('backend', HomeCommissionerController::class);
    Route::resource('houses', ApartmentCommissionerController::class);
    Route::resource('imageHouses', ImageCommissionerController::class);

    Route::post('upload-images', ImagesUpload::class)->name('images.upload');
    Route::delete('remove-images', [ImagesUpload::class, 'destroy'])->name('images.delete');
});

Route::group([
    'prefix' => 'users',
    'as' => 'users.',
    'middleware' => ['users', 'auth'],
], function () {
    Route::resource('users', HomeUserController::class);
    Route::put('updateUser/{key}/update', UpdateUserController::class)->name('update.users');
    Route::get('downloadPDF/{key}', [InvoiceUserController::class, 'downloadInvoice'])->name('invoice.download');
    Route::delete('cancel/{key}', [CancellingBookingController::class, 'cancel'])->name('reservation.cancel');
});

Route::get('/', HomeController::class)->name('home.index');

Route::resource('categories', CategoryController::class);
Route::get('abouts', AboutController::class)->name('abouts.index');
Route::get('localisation', LocationController::class)->name('location.index');
Route::get('contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('search', [SearchLocationController::class, 'searching'])->name('search.house');
Route::get('/maisons/{key}', [HouseController::class, 'show'])->name('house.show');
Route::controller(BookingController::class)->group(function () {
    Route::post('reservation', 'store')->name('reservation.store');
    Route::get('confirmation/{key}', 'show')->name('reservation.show');
});

Route::group([
    'prefix' => 'auth',
    'as' => 'auth.',
], function () {
    Route::get('facebook', FacebookAuthenticationController::class)->name('facebook.auth');
    Route::get('callback/facebook', FacebookAuthenticationCallbackController::class)->name('facebook.callback');

    Route::get('google', GoogleAuthentication::class)->name('google.auth');
    Route::get('callback/google', GoogleAuthenticationCallback::class)->name('google.callback');
});

Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);

    return redirect()->back();
});
