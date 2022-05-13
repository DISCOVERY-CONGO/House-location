<?php
declare(strict_types=1);

namespace App\Providers;

use App\Contracts\ActiveApartmentRepositoryInterface;
use App\Contracts\ApartmentCommissionerRepositoryInterface;
use App\Contracts\CancellingUserRepositoryInterface;
use App\Contracts\CategoryHomeRepositoryInterface;
use App\Contracts\CategoryRepositoryInterface;
use App\Contracts\HomeCommissionerRepositoryInterface;
use App\Contracts\HomeRepositoryInterface;
use App\Contracts\DetailsHouseCommissionerRepositoryInterface;
use App\Contracts\ImageCommissionerRepositoryInterface;
use App\Contracts\ImageRepositoryInterface;
use App\Contracts\NewsLetterRepositoryInterface;
use App\Contracts\ReservationHouseRepositoryInterface;
use App\Contracts\ReservationRepositoryInterface;
use App\Contracts\ReservationUserRepositoryInterface;
use App\Contracts\SearchRepositoryInterface;
use App\Contracts\TrashedRepositoryInterface;
use App\Contracts\UpdateUserRepositoryInterface;
use App\Contracts\UserRepositoryInterface;
use App\Contracts\UsersProfileRepositoryInterface;
use App\Repository\Admins\ActiveApartmentRepository;
use App\Repository\Admins\ApartmentRepository;
use App\Repository\Admins\CategoryRepository;
use App\Repository\Admins\ImageRepository;
use App\Repository\Admins\ReservationRepository;
use App\Repository\Admins\TrashedRepository;
use App\Repository\Admins\UserRepository;
use App\Repository\Apps\HomeFrontendRepository;
use App\Repository\Apps\NewsLetterRepository;
use App\Repository\Apps\SearchRepository;
use App\Repository\Commissioners\ApartmentCommissionerRepository;
use App\Repository\Commissioners\DetailHouseCommissionerRepository;
use App\Repository\Commissioners\HomeCommissionerRepository;
use App\Repository\Commissioners\ImageCommissionerRepository;
use App\Repository\Users\CancellingUserRepository;
use App\Repository\Users\ReservationUserRepository;
use App\Repository\Users\UsersProfileRepository;
use Illuminate\Support\ServiceProvider;
use App\Contracts\ApartmentRepositoryInterface;
use App\Repository\Apps\CategoryRepository as HomeCategory;
use App\Repository\Apps\ReservationRepository as Reservation;

class RepositoryServiceProvider extends ServiceProvider
{
    protected array $repositories = [
        CategoryRepositoryInterface::class => CategoryRepository::class,
        UserRepositoryInterface::class => UserRepository::class,
        ReservationRepositoryInterface::class => ReservationRepository::class,
        ApartmentRepositoryInterface::class => ApartmentRepository::class,
        HomeRepositoryInterface::class => HomeFrontendRepository::class,
        NewsLetterRepositoryInterface::class => NewsLetterRepository::class,
        ActiveApartmentRepositoryInterface::class => ActiveApartmentRepository::class,
        TrashedRepositoryInterface::class => TrashedRepository::class,
        CategoryHomeRepositoryInterface::class => HomeCategory::class,
        ReservationHouseRepositoryInterface::class => Reservation::class,
        ImageRepositoryInterface::class => ImageRepository::class,
        HomeCommissionerRepositoryInterface::class => HomeCommissionerRepository::class,
        ApartmentCommissionerRepositoryInterface::class => ApartmentCommissionerRepository::class,
        ImageCommissionerRepositoryInterface::class => ImageCommissionerRepository::class,
        UpdateUserRepositoryInterface::class => UsersProfileRepository::class,
        SearchRepositoryInterface::class => SearchRepository::class,
        DetailsHouseCommissionerRepositoryInterface::class => DetailHouseCommissionerRepository::class,
        ReservationUserRepositoryInterface::class => ReservationUserRepository::class,
        CancellingUserRepositoryInterface::class => CancellingUserRepository::class,
    ];

    public function register(){}

    public function boot()
    {
        foreach ($this->repositories as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
        }
    }
}
