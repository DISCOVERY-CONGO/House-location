@extends('backend.layout.backend')

@section('title')
    Liste des commissionnaire
@endsection

@section('content')
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Comissionnaire</h3>
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
                                    <th class="nk-tb-col text-right">
                                        <span class="sub-text">Actions</span>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr class="nk-tb-item text-center">
                                        <td class="nk-tb-col tb-col-sm">
                                            <span class="tb-product">
                                                @if($user->images)
                                                    <img
                                                        src="{{ asset('storage/'.$user->images) }}"
                                                        alt="{{ $user->name }}"
                                                        class="thumb">
                                                @else
                                                    <img
                                                        src="{{ asset('app/images/logo.png') }}"
                                                        alt="{{ $user->name }}"
                                                        class="thumb">
                                                @endif
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
                                        </td>
                                        <td class="nk-tb-col">
                                            <div class="tb-lead justify-content-center">
                                                <a href="{{ route('admins.users.show', $user->id) }}"
                                                   class="btn btn-outline-primary btn-sm" title="">
                                                    <em class="icon ni ni-eye-alt-fill"></em>
                                                    <span>Detail commissionaire</span>
                                                </a>
                                            </div>
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
