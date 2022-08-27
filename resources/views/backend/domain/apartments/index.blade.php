@php use App\Enums\HouseEnum;use App\Models\House; @endphp
@extends('backend.layout.backend')

@section('title')
    Liste des appartements
@endsection

@section('content')
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Liste des appartements</h3>
                    </div>
                    <div class="nk-block-head-content">
                        <div class="toggle-wrap nk-block-tools-toggle">
                            <div class="toggle-expand-content" data-content="pageMenu">
                                <ul class="nk-block-tools g-3">
                                    <li class="preview-item">
                                        <a href="{{ route('admins.houses.create') }}"
                                           class="btn btn-dim btn-primary btn-sm">
                                            <em class="icon ni ni-plus mr-1"></em> Create
                                        </a>
                                    </li>
                                    <li class="preview-item">
                                        <a href="{{ route('admins.trashedApartments.index') }}"
                                           class="btn btn-dim btn-secondary btn-sm">
                                            <em class="icon ni ni-histroy mr-1"></em> Historique
                                        </a>
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
                            <table class="datatable-init nowrap nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                                <thead>
                                <tr class="nk-tb-item nk-tb-head">
                                    <th class="nk-tb-col tb-col-mb">
                                        <span class="sub-text">Photo</span>
                                    </th>
                                    <th class="nk-tb-col tb-col-md">
                                        <span class="sub-text">Ville</span>
                                    </th>
                                    <th class="nk-tb-col tb-col-md">
                                        <span class="sub-text">Commune</span>
                                    </th>
                                    <th class="nk-tb-col tb-col-md">
                                        <span class="sub-text">Status</span>
                                    </th>
                                    <th class="nk-tb-col tb-col-md">
                                        <span class="sub-text">N° Telephone</span>
                                    </th>
                                    <th class="nk-tb-col">
                                        <span class="sub-text">Actions</span>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($rooms as $room)
                                    @if($room->status == HouseEnum::VALIDATED_HOUSE)
                                        <tr class="nk-tb-item alert alert-primary">
                                            <td class="nk-tb-col tb-col-sm">
                                            <span class="tb-product text-center">
                                                <img src="{{ asset('storage/'.$room->images) }}"
                                                     alt="{{ $room->commune }}" class="thumb">
                                            </span>
                                            </td>
                                            <td class="nk-tb-col tb-col-md">
                                                <span>{{ ucfirst($room->town) ?? "" }}</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-md">
                                                <span>{{ ucfirst($room->commune) ?? "" }}</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-md">
                                                @if($room->status == \App\Enums\HouseEnum::VALIDATED_HOUSE)
                                                    <span class="dot bg-success d-mb-none"></span>
                                                    <span
                                                        class="badge badge-sm badge-dot has-bg badge-success d-none d-mb-inline-flex">Confirmer</span>
                                                @else
                                                    <span class="dot bg-warning d-mb-none"></span>
                                                    <span
                                                        class="badge badge-sm badge-dot has-bg badge-warning d-none d-mb-inline-flex">En attente</span>
                                                @endif
                                            </td>
                                            <td class="nk-tb-col tb-col-md">
                                                <span>{{ $room->phone_number ?? "" }}</span>
                                            </td>
                                            <td class="nk-tb-col">
                                            <span class="tb-lead">
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ route('admins.houses.show', $room->id) }}"
                                                       class="btn btn-dim btn-primary btn-sm">
                                                        <em class="icon ni ni-eye"></em>
                                                    </a>
                                                    <a href="{{ route('admins.houses.edit', $room->id) }}"
                                                       class="btn btn-dim btn-primary btn-sm">
                                                        <em class="icon ni ni-edit"></em>
                                                    </a>
                                                    <a
                                                        class="btn btn-dim btn-danger btn-sm"
                                                        href="#"
                                                        onclick="deleteConfirm('delete-apartment-{{$room->id}}')"
                                                    ><em class="icon ni ni-trash"></em></a>

                                                    <form action="{{ route('admins.houses.destroy', $room->id) }}"
                                                          method="POST" id="delete-apartment-{{$room->id}}">
                                                        @method('DELETE')
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    </form>
                                                </div>
                                            </span>
                                            </td>
                                        </tr>
                                    @else
                                        <tr class="nk-tb-item alert alert-danger">
                                            <td class="nk-tb-col tb-col-sm">
                                            <span class="tb-product text-center">
                                                <img src="{{ asset('storage/'.$room->images) }}"
                                                     alt="{{ $room->commune }}" class="thumb">
                                            </span>
                                            </td>
                                            <td class="nk-tb-col tb-col-md">
                                                <span>{{ ucfirst($room->town) ?? "" }}</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-md">
                                                <span>{{ ucfirst($room->commune) ?? "" }}</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-md">
                                                @if($room->status == \App\Enums\HouseEnum::VALIDATED_HOUSE)
                                                    <span class="dot bg-success d-mb-none"></span>
                                                    <span
                                                        class="badge badge-sm badge-dot has-bg badge-success d-none d-mb-inline-flex">Confirmer</span>
                                                @else
                                                    <span class="dot bg-warning d-mb-none"></span>
                                                    <span
                                                        class="badge badge-sm badge-dot has-bg badge-warning d-none d-mb-inline-flex">En attente</span>
                                                @endif
                                            </td>
                                            <td class="nk-tb-col tb-col-md">
                                                <span>{{ $room->phone_number ?? "" }}</span>
                                            </td>
                                            <td class="nk-tb-col">
                                            <span class="tb-lead">
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ route('admins.houses.show', $room->id) }}"
                                                       class="btn btn-dim btn-primary btn-sm">
                                                        <em class="icon ni ni-eye"></em>
                                                    </a>
                                                    <a href="{{ route('admins.houses.edit', $room->id) }}"
                                                       class="btn btn-dim btn-primary btn-sm">
                                                        <em class="icon ni ni-edit"></em>
                                                    </a>
                                                    <a
                                                        class="btn btn-dim btn-danger btn-sm"
                                                        href="#"
                                                        onclick="deleteConfirm('delete-apartment-{{$room->id}}')"
                                                    ><em class="icon ni ni-trash"></em></a>

                                                    <form action="{{ route('admins.houses.destroy', $room->id) }}"
                                                          method="POST" id="delete-apartment-{{$room->id}}">
                                                        @method('DELETE')
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    </form>
                                                </div>
                                            </span>
                                            </td>
                                        </tr>
                                    @endif
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
