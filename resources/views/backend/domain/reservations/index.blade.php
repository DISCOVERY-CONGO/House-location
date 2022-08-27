@php use App\Enums\ReservationEnum; @endphp
@extends('backend.layout.backend')

@section('title')
    Nos reservations
@endsection

@section('content')
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Liste des reservations</h3>
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
                                    <th class="nk-tb-col tb-col-md">
                                        <span class="sub-text">Images</span>
                                    </th>
                                    <th class="nk-tb-col tb-col-md">
                                        <span class="sub-text">Code Maison</span>
                                    </th>
                                    <th class="nk-tb-col tb-col-md">
                                        <span class="sub-text">Nom Client</span>
                                    </th>
                                    <th class="nk-tb-col tb-col-md">
                                        <span class="sub-text">N° Telephone</span>
                                    </th>
                                    <th class="nk-tb-col tb-col-md">
                                        <span class="sub-text">Status</span>
                                    </th>
                                    <th class="nk-tb-col">
                                        <span class="sub-text">Actions</span>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($reservations as $reservation)
                                    @if($reservation->status == ReservationEnum::CONFIRMED_RESERVATION)
                                        <tr class="nk-tb-item text-center alert alert-primary">
                                            <td class="nk-tb-col tb-col-md ">
                                            <span>
                                                <img
                                                    src="{{ asset('storage/'.$reservation->house->images) }}"
                                                    class="img-fluid rounded"
                                                    height="18%"
                                                    width="18%"
                                                    alt="{{ $reservation->house_id }}">
                                            </span>
                                            </td>
                                            <td class="nk-tb-col tb-col-md">
                                                <span>{{ $reservation->house->reference ?? "Pas de code maison" }}</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-md">
                                                <span>{{ ucfirst($reservation->client->name) ?? "" }}</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-md">
                                                <span>{{ $reservation->client->phones_number ?? "" }}</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-md">
                                                @if($reservation->status == \App\Enums\ReservationEnum::CONFIRMED_RESERVATION)
                                                    <span class="dot bg-success d-mb-none"></span>
                                                    <span class="badge badge-sm badge-dot has-bg badge-success d-none d-mb-inline-flex">
                                                    Confirmer
                                                </span>
                                                @else
                                                    <span class="dot bg-warning d-mb-none"></span>
                                                    <span class="badge badge-sm badge-dot has-bg badge-warning d-none d-mb-inline-flex">
                                                    En attente
                                                </span>
                                                @endif
                                            </td>
                                            <td class="nk-tb-col">
                                             <span class="tb-lead">
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ route('admins.reservations.show', $reservation->id) }}" class="btn btn-dim btn-primary btn-sm">
                                                        <em class="icon ni ni-eye"></em>
                                                    </a>
                                                    <a
                                                        class="btn btn-dim btn-danger btn-sm"
                                                        href="#"
                                                        onclick="deleteConfirm('delete-reservation-{{$reservation->id}}')"
                                                    ><em class="icon ni ni-trash"></em></a>
                                                    <form action="{{ route('admins.reservations.destroy', $reservation->id) }}" method="POST" id="delete-reservation-{{$reservation->id}}">
                                                        @method('DELETE')
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    </form>
                                                </div>
                                            </span>
                                            </td>
                                        </tr>
                                    @else
                                        <tr class="nk-tb-item text-center alert alert-danger">
                                            <td class="nk-tb-col tb-col-md">
                                            <span>
                                                <img
                                                    src="{{ asset('storage/'.$reservation->house->images) }}"
                                                    class="img-fluid rounded"
                                                    height="18%"
                                                    width="18%"
                                                    alt="{{ $reservation->house_id }}">
                                            </span>
                                            </td>
                                            <td class="nk-tb-col tb-col-md ">
                                                <span>{{ $reservation->house->reference ?? "Pas de code maison" }}</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-md">
                                                <span>{{ ucfirst($reservation->client->name) ?? "" }}</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-md">
                                                <span>{{ $reservation->client->phones_number ?? "" }}</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-md">
                                                @if($reservation->status == \App\Enums\ReservationEnum::CONFIRMED_RESERVATION)
                                                    <span class="dot bg-success d-mb-none"></span>
                                                    <span class="badge badge-sm badge-dot has-bg badge-success d-none d-mb-inline-flex">
                                                    Confirmer
                                                </span>
                                                @else
                                                    <span class="dot bg-warning d-mb-none"></span>
                                                    <span class="badge badge-sm badge-dot has-bg badge-warning d-none d-mb-inline-flex">
                                                    En attente
                                                </span>
                                                @endif
                                            </td>
                                            <td class="nk-tb-col">
                                             <span class="tb-lead">
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ route('admins.reservations.show', $reservation->id) }}" class="btn btn-dim btn-primary btn-sm">
                                                        <em class="icon ni ni-eye"></em>
                                                    </a>
                                                    <a
                                                        class="btn btn-dim btn-danger btn-sm"
                                                        href="#"
                                                        onclick="deleteConfirm('delete-reservation-{{$reservation->id}}')"
                                                    ><em class="icon ni ni-trash"></em></a>
                                                    <form action="{{ route('admins.reservations.destroy', $reservation->id) }}" method="POST" id="delete-reservation-{{$reservation->id}}">
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
