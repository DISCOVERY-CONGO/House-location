@extends('layouts.admin')

@section('title', "Liste des clients")

@section('content')
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Clients</h3>
                    </div>
                </div>
            </div>
            <div class="nk-block">
                <div class="nk-block nk-block-lg">
                    <div class="card card-preview">
                        <div class="card-inner">
                            <table class="datatable-init nowrap nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                                <thead>
                                <tr class="nk-tb-item nk-tb-head text-center">
                                    <th class="nk-tb-col tb-col-mb">
                                        <span class="sub-text">Photo</span>
                                    </th>
                                    <th class="nk-tb-col tb-col-md">
                                        <span class="sub-text">Name</span>
                                    </th>
                                    <th class="nk-tb-col tb-col-md">
                                        <span class="sub-text">Email</span>
                                    </th>
                                    <th class="nk-tb-col tb-col-md">
                                        <span class="sub-text">Phones</span>
                                    </th>
                                    <th class="nk-tb-col tb-col-md">
                                        <span class="sub-text">Role</span>
                                    </th>
                                    <th class="nk-tb-col nk-tb-col-tools text-right">
                                        <span class="sub-text">Actions</span>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                        <tr class="nk-tb-item text-center">
                                            <td class="nk-tb-col tb-col-sm">
                                                <span class="tb-product">
                                                    <img src="{{ asset('storage/'.$user->images) }}" alt="{{ $user->name }}" class="thumb">
                                                </span>
                                            </td>
                                            <td class="nk-tb-col tb-col-md">
                                                <span>{{ $user->name ?? "" }}</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-md">
                                                <span>{{ $user->email ?? "" }}</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-md">
                                                <span>{{ $user->phone_number ?? "" }}</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-md">
                                                @if($user->role_id == \App\Enums\UserRoleEnum::COMMISSIONNERS)
                                                    <span class="badge badge-dim badge-warning">
                                                        <em class="icon ni ni-user"></em>
                                                        <span>Commissionners</span>
                                                    </span>
                                                @endif
                                                @if($user->role_id == \App\Enums\UserRoleEnum::USERS)
                                                    <span class="badge badge-dim badge-warning">
                                                        <em class="icon ni ni-user"></em>
                                                        <span>Users</span>
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions gx-1">
                                                    <li>
                                                        <div class="drodown">
                                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown">
                                                                <em class="icon ni ni-more-h"></em>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li>
                                                                        <a href="{{ route('admins.users.show', $user->key) }}">
                                                                            <em class="icon ni ni-eye"></em>
                                                                            <span>Voir</span>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <form action="{{ route('admins.users.destroy', $key->key) }}" method="POST" onsubmit="return confirm('Voulez vous supprimer');">
                                                                            @method('DELETE')
                                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                            <button type="submit" class="btn btn-dim">
                                                                                <em class="icon ni ni-cross-sm"></em>
                                                                                <span>Suspendre</span>
                                                                            </button>
                                                                        </form>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
