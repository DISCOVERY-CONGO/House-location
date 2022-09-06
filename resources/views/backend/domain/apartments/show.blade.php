@extends('backend.layout.backend')

@section('title')
    Detail de l'appartement
@endsection

@section('content')
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-md">
                <div class="nk-block-between g-3">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Détail / <strong
                                    class="text-primary small">{{ $room->commune ?? "" }}</strong></h3>
                    </div>
                    <div class="nk-block-head-content">
                        <div class="toggle-wrap nk-block-tools-toggle">
                            <div class="toggle-expand-content" data-content="pageMenu">
                                <ul class="nk-block-tools g-3">
                                    <li class="preview-item">
                                        @if ($room->status == false)
                                            @include('backend.components._update', [
                                                'route' => route('admins.apartment.active',$room->id),
                                                'button' => 'btn-outline-success btn-sm',
                                                'icon' => 'ni-check-circle',
                                                'title' => 'Activer'
                                            ])
                                        @else
                                            @include('backend.components._update', [
                                                'route' => route('admins.apartment.inactive',$room->id),
                                                'button' => 'btn-outline-danger btn-sm',
                                                'icon' => 'ni-check-circle',
                                                'title' => 'Désactiver'
                                            ])
                                        @endif
                                    </li>
                                    <li class="preview-item">
                                        <a href="{{ route('admins.houses.index') }}"
                                           class="btn btn-outline-secondary btn-sm d-none d-sm-inline-flex">
                                            <em class="icon ni ni-arrow-left"></em>
                                            <span>Back</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="nk-block nk-block-lg">
                <div class="nk-block">
                    @if($room->status == \App\Enums\HouseEnum::INVALIDATED_HOUSE)
                        <div class="alert alert-danger alert-icon mb-3" role="alert">
                            <em class="icon ni ni-alert-circle"></em>
                            Cette salle ne pas encore activé. Veillez l'activer pour qu'elle soie visible
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-inner">
                            <div class="text-center">
                                <img
                                    src="{{ asset('storage/'.$room->images) }}"
                                    title="{{ $room->reference ?? "" }}"
                                    style="object-fit: contain"
                                    class="img-fluid user-avatar-xl mb-3 text-center border-danger"
                                >
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane active" id="room-info">
                                    <div class="nk-block">
                                        <div class="profile-ud-list">
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Commune</span>
                                                    <span class="profile-ud-value">{{ $room->commune ?? "" }}</span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Addresse</span>
                                                    <span class="profile-ud-value">{{ $room->address ?? "" }}</span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Quartier</span>
                                                    <span class="profile-ud-value">{{ $room->district ?? "" }}</span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Ville</span>
                                                    <span class="profile-ud-value">{{ $room->town ?? "" }}</span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Telephone</span>
                                                    <span class="profile-ud-value">{{ $room->phone_number ?? "" }}</span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Email</span>
                                                    <span class="profile-ud-value">{{ $room->email ?? "" }}</span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Prix</span>
                                                    <span class="profile-ud-value">{{ $room->prices ?? "" }} $</span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Type </span>
                                                    <span class="profile-ud-value font-bold">{{ strtoupper($room->type->name) ?? "" }}</span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Nombre de Pieces</span>
                                                    <span class="profile-ud-value">{{ $room->detail->number_pieces ?? "" }} pieces</span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Nombre de Chambre</span>
                                                    <span class="profile-ud-value">{{ $room->detail->number_rooms ?? "" }} pieces</span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Garantie</span>
                                                    <span class="profile-ud-value">{{ $room->warranty_price ?? "" }} $ </span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Electricite</span>
                                                    <span class="profile-ud-value">{{ strtoupper($room->detail->toilet) ?? "" }} </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if($room->image)
                        <div id="carouselExCap" class="carousel slide" data-bs-ride="carousel">
                            <ol class="carousel-indicators">
                                @foreach($room->image as $key => $images)
                                <li data-bs-target="#carouselExCap" data-bs-slide-to="{{ $key }}" class="active"></li>
                                @endforeach
                            </ol>
                            <div class="carousel-inner text-light">
                                @foreach($room->image as $images)
                                <div class="carousel-item active">
                                    <img
                                        src="{{ asset('storage/'.$images->images) }}"
                                        class="d-block w-100"
                                        alt="{{ $images->id ?? "" }}">
                                </div>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#carouselExCap" role="button" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExCap" role="button" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
