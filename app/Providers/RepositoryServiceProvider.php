<?php

declare(strict_types=1);

namespace App\Providers;

use App\Contracts\ActiveApartmentRepositoryInterface;
use App\Contracts\ApartmentCommissionerRepositoryInterface;
use App\Contracts\ApartmentRepositoryInterface;
use App\Contracts\BookingHouseRepositoryInterface;
use App\Contracts\BookingRepositoryInterface;
use App\Contracts\BookingUserRepositoryInterface;
use App\Contracts\CancelBookingRepositoryInterface;
use App\Contracts\CategoryHomeRepositoryInterface;
use App\Contracts\CategoryRepositoryInterface;
use App\Contracts\ClientRepositoryInterface;
use App\Contracts\HomeCommissionerRepositoryInterface;
use App\Contracts\HomeRepositoryInterface;
use App\Contracts\ImageCommissionerRepositoryInterface;
use App\Contracts\ImageRepositoryInterface;
use App\Contracts\InvoiceRepositoryInterface;
use App\Contracts\NewsLetterRepositoryInterface;
use App\Contracts\NotificationRepositoryInterface;
use App\Contracts\SearchRepositoryInterface;
use App\Contracts\SlideRepositoryInterface;
use App\Contracts\TransactionRepositoryInterface;
use App\Contracts\UpdateUserRepositoryInterface;
use App\Contracts\UserRepositoryInterface;
use App\Http\Controllers\UseCase\Auth\FacebookAuth\Interfaces\FacebookAuthRepositoryInterface;
use App\Http\Controllers\UseCase\Auth\FacebookAuth\Repository\FacebookAuthRepository;
use App\Repository\Backend\Booking\BookingRepository;
use App\Repository\Backend\CategoryRepository;
use App\Repository\Backend\ClientRepository;
use App\Repository\Backend\House\ActiveApartmentRepository;
use App\Repository\Backend\House\ApartmentRepository;
use App\Repository\Backend\House\ImageRepository;
use App\Repository\Backend\NotificationRepository;
use App\Repository\Backend\SlideRepository;
use App\Repository\Backend\TransactionRepository;
use App\Repository\Backend\UserRepository;
use App\Repository\Dealer\ApartmentCommissionerRepository;
use App\Repository\Dealer\HomeCommissionerRepository;
use App\Repository\Dealer\ImageCommissionerRepository;
use App\Repository\Frontend\BookingRepository as Reservation;
use App\Repository\Frontend\CategoryRepository as HomeCategory;
use App\Repository\Frontend\HomeFrontendRepository;
use App\Repository\Frontend\NewsLetterRepository;
use App\Repository\Frontend\SearchRepository;
use App\Repository\Users\BookingUserRepository;
use App\Repository\Users\CancelBookingRepository;
use App\Repository\Users\InvoiceRepository;
use App\Repository\Users\UsersProfileRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    protected array $repositories = [
        CategoryRepositoryInterface::class => CategoryRepository::class,
        UserRepositoryInterface::class => UserRepository::class,
        BookingRepositoryInterface::class => BookingRepository::class,
        ApartmentRepositoryInterface::class => ApartmentRepository::class,
        HomeRepositoryInterface::class => HomeFrontendRepository::class,
        NewsLetterRepositoryInterface::class => NewsLetterRepository::class,
        ActiveApartmentRepositoryInterface::class => ActiveApartmentRepository::class,
        CategoryHomeRepositoryInterface::class => HomeCategory::class,
        BookingHouseRepositoryInterface::class => Reservation::class,
        ImageRepositoryInterface::class => ImageRepository::class,
        HomeCommissionerRepositoryInterface::class => HomeCommissionerRepository::class,
        ApartmentCommissionerRepositoryInterface::class => ApartmentCommissionerRepository::class,
        ImageCommissionerRepositoryInterface::class => ImageCommissionerRepository::class,
        UpdateUserRepositoryInterface::class => UsersProfileRepository::class,
        SearchRepositoryInterface::class => SearchRepository::class,
        BookingUserRepositoryInterface::class => BookingUserRepository::class,
        CancelBookingRepositoryInterface::class => CancelBookingRepository::class,
        SlideRepositoryInterface::class => SlideRepository::class,
        TransactionRepositoryInterface::class => TransactionRepository::class,
        ClientRepositoryInterface::class => ClientRepository::class,
        InvoiceRepositoryInterface::class => InvoiceRepository::class,
        NotificationRepositoryInterface::class => NotificationRepository::class,
        FacebookAuthRepositoryInterface::class => FacebookAuthRepository::class
    ];

    public function register()
    {
    }

    public function boot()
    {
        foreach ($this->repositories as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
        }
    }
}
