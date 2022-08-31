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
                                    <div class="alert alert-success alert-icon alert-dismissible mb-1">
                                        <em class="icon ni ni-cross-circle"></em>
                                        <strong>[[{{ $notification->created_at }}]]</strong>
                                        L'utilisateur {{ $notification->data['email'] }} vient d'ajoutez une nouvelle maison
                                        <a href="#" class="close mark-as-read" data-bs-dismiss="alert" data-id="{{ $notification->id }}"></a>
                                    </div>
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
