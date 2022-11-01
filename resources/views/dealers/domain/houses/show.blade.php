@php use App\Enums\HouseEnum; @endphp
@extends('dealers.layout.dealer')

@section('title')
    Detail de la maison
@endsection

@section('content')
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-md">
                <div class="nk-block-between g-3">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">
                            <strong class="text-primary small">
                                Détail de la maison
                            </strong>
                        </h3>
                    </div>
                    <div class="nk-block-head-content">
                        <div class="toggle-wrap nk-block-tools-toggle">
                            <div class="toggle-expand-content" data-content="pageMenu">
                                <ul class="nk-block-tools g-3">
                                    <li class="preview-item">
                                        <a class="btn btn-outline-primary btn-sm" href="{{ route('commissioner.houses.index') }}">
                                            <em class="icon ni ni-arrow-long-left"></em>
                                            <span>Touts les maison</span>
                                        </a>
                                    </li>
                                    <li class="preview-item">
                                        <a
                                            href="{{ route('commissioner.houses.edit', $room->id) }}"
                                            class="btn btn-outline-primary btn-sm">
                                            <em class="icon ni ni-edit mr-1"></em>
                                            Editer
                                        </a>
                                    </li>
                                    <li class="preview-item">
                                        <form
                                            action="{{ route('commissioner.houses.destroy', $room->id) }}"
                                            method="POST"
                                            class="d-inline-block"
                                            onsubmit="return confirm('Are you sure you want to delete this item?');"
                                        >
                                            @method('DELETE')
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button type="submit" class="btn btn-outline-danger btn-sm">
                                                <em class="icon ni ni-trash-empty-fill"></em>
                                                Delete le campus
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="nk-block">
                <div class="nk-block nk-block-lg">
                    <div class="card card-preview">
                        <div class="card-inner">
                            <div class="tab-content">
                                <div class="tab-pane active" id="room-info">
                                    <div class="nk-block">
                                        <div class="profile-ud-list">
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Ville</span>
                                                    <span class="profile-ud-value">{{ $room->address->town ?? "" }}</span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Commune</span>
                                                    <span class="profile-ud-value">{{ $room->address->commune ?? "" }}</span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Quartier</span>
                                                    <span class="profile-ud-value">{{ $room->address->district ?? "" }}</span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Adresse</span>
                                                    <span class="profile-ud-value">{{ $room->address->address ?? "" }}</span>
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
                                                    <span class="profile-ud-value">$ {{ $room->prices ?? "" }}</span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Type </span>
                                                    <span class="profile-ud-value font-bold">
                                                        {{ ucfirst($room->type->name) ?? "" }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Nombre de Pieces</span>
                                                    <span class="profile-ud-value">
                                                        {{ $room->detail->number_pieces ?? "" }} Pieces
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Nombre de Chambre</span>
                                                    <span class="profile-ud-value">
                                                        {{ $room->detail->number_rooms ?? "" }} Chambres
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Garantie</span>
                                                    <span class="profile-ud-value">
                                                        $ {{ $room->warranty_price ?? "" }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Electricite</span>
                                                    <span class="profile-ud-value">
                                                        @if($room->detail->electricity === 0)
                                                            Pas d'electricite
                                                        @else
                                                            Avec Electricite
                                                        @endif
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Type de toilette</span>
                                                    <span class="profile-ud-value">
                                                        {{ ucfirst($room->detail->toilet) ?? "" }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Categories</span>
                                                    @foreach($room->categories as $category)
                                                        <span class="profile-ud-value">
                                                            {{ ucfirst($category->name) ?? "" }}
                                                        </span>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Code reference</span>
                                                    <span class="profile-ud-value">
                                                        <span class="badge badge-circle badge-outline-primary">
                                                            {{ $room->reference ?? "" }}
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="nk-divider divider md"></div>
                                    <div class="nk-block">
                                        <div class="nk-block-head">
                                            <span class="title">Informations supplémentaires</span>
                                        </div>
                                        <div class="profile-ud-list">
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Date de creation</span>
                                                    <span class="profile-ud-value">{{ $room->created_at->format('Y-m-d') }}</span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Dernière mise à jour</span>
                                                    <span class="profile-ud-value">{{ $room->updated_at->format('Y-m-d') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
