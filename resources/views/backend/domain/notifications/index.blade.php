@php use App\Enums\UserRoleEnum; @endphp
@extends('backend.layout.backend')

@section('title')
    Notifications
@endsection

@section('content')
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Notifications</h3>
                    </div>
                </div>
            </div>
            <div class="nk-block">
                <div class="nk-block nk-block-lg">
                    <div class="card card-preview">
                        <div class="card-inner">
                            @if(auth()->user()->role_id == UserRoleEnum::ADMINS_ROLE)
                                @forelse($notifications as $notification)
                                    @if($notification->type == "App\Notifications\ApartmentNotification")
                                        <a href="#" onclick="notification('{{ $notification->id }}')">
                                            <div class="alert alert-success alert-icon alert-dismissible mb-1">
                                                <em class="icon ni ni-cross-circle"></em>
                                                <strong>[[{{ $notification->created_at }}]]</strong>
                                                L'utilisateur {{ $notification->data['email'] }} vient d'ajoutez une nouvelle maison
                                            </div>
                                        </a>
                                    @elseif($notification->type == "App\Notifications\ReservationCancelNotification")
                                        <a href="#" onclick="notification('{{ $notification->id }}')">
                                            <div class="alert alert-warning alert-icon mb-1">
                                                <em class="icon ni ni-alert-circle"></em>
                                                <strong>[[{{ $notification->data['house'] }}]]</strong>.
                                                Vient d'annuler sa reservation.
                                            </div>
                                        </a>
                                    @elseif($notification->type == "App\Notifications\ActivateApartmentNotification")
                                        <a href="#" onclick="notification('{{ $notification->id }}')">
                                            <div class="alert alert-info alert-icon mb-1">
                                                <em class="icon ni ni-alert-circle"></em>
                                                <strong>{{ $notification->data['email'] }}</strong>.
                                                 la confirmation de votre maison vient d'etre effectuer
                                            </div>
                                        </a>
                                    @elseif($notification->type == "App\Notifications\BookingNotification")
                                        <a href="#" onclick="notification('{{ $notification->id }}')">
                                            <div class="alert alert-danger alert-icon mb-1">
                                                <em class="icon ni ni-alert-circle"></em>
                                                <strong>{{ $notification->data['reference'] }}</strong>.
                                                 une reservation a ete effectuer
                                            </div>
                                        </a>
                                    @else
                                        <a href="#" onclick="notification('{{ $notification->id }}')">
                                            <div class="alert alert-primary alert-icon mb-1">
                                                <em class="icon ni ni-check-circle"></em>
                                                <strong>[[{{ $notification->created_at }}]]</strong>.
                                                La reservation vient d'etre confirmez.
                                            </div>
                                        </a>
                                    @endif
                                    @if($loop->last)
                                        <a href="#" id="mark-all">
                                            Marquez comme tout lis
                                        </a>
                                    @endif
                                @empty
                                    Pas de notification disponible
                                @endforelse
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
