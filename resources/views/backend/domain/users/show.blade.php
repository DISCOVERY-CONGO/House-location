@extends('backend.layout.backend')

@section('title')
    Detail du commissionnaire
@endsection

@section('content')
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-md">
                <div class="nk-block-between g-3">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">
                            <strong class="text-primary small">
                                Détail commissionaire
                            </strong>
                        </h3>
                    </div>
                    <div class="nk-block-head-content">
                        <div class="toggle-wrap nk-block-tools-toggle">
                            <div class="toggle-expand-content" data-content="pageMenu">
                                <ul class="nk-block-tools g-3">
                                    <li class="preview-item">
                                        <a class="btn btn-outline-primary btn-sm" href="{{ route('admins.users.index') }}">
                                            <em class="icon ni ni-arrow-long-left"></em>
                                            <span>Touts les commissionnaires</span>
                                        </a>
                                    </li>
                                    <li class="preview-item">
                                        <form
                                            action="{{ route('admins.users.destroy', $user->id) }}"
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
                                                    <span class="profile-ud-label">Nom</span>
                                                    <span class="profile-ud-value">
                                                        {{ ucfirst($user->name) ?? "" }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Prenom</span>
                                                    <span class="profile-ud-value">
                                                        {{ ucfirst($user->last_name) ?? "" }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">N° Telephone</span>
                                                    <span class="profile-ud-value">
                                                        {{ $user->phone_number ?? "" }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Email</span>
                                                    <span class="profile-ud-value">
                                                        {{ $user->email ?? "" }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Role</span>
                                                    <span class="profile-ud-value">
                                                        @if($user->role_id == \App\Enums\UserRoleEnum::DEALER_ROLE)
                                                            <span class="badge badge-dim badge-success p-1">
                                                                <em class="icon ni ni-user"></em>
                                                                <span>Commissionners</span>
                                                            </span>
                                                        @endif
                                                        @if($user->role_id == \App\Enums\UserRoleEnum::USERS_ROLE)
                                                            <span class="badge badge-dim badge-primary p-1">
                                                                <em class="icon ni ni-user"></em>
                                                                <span>Users</span>
                                                            </span>
                                                        @endif
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
                                                    <span class="profile-ud-value">{{ $user->created_at->format('Y-m-d') }}</span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Dernière mise à jour</span>
                                                    <span class="profile-ud-value">{{ $user->updated_at->format('Y-m-d') }}</span>
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
