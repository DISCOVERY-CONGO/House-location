@extends('dealers.layout.dealer')

@section('title')
    Mais maisons
@endsection

@section('content')
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Liste des Maisons</h3>
                    </div>
                    <div class="nk-block-head-content">
                        <div class="toggle-wrap nk-block-tools-toggle">
                            <div class="toggle-expand-content" data-content="pageMenu">
                                <ul class="nk-block-tools g-3">
                                    <li class="preview-item">
                                        <a href="{{ route('commissioner.houses.create') }}"
                                           class="btn btn-dim btn-primary btn-sm">
                                            <em class="icon ni ni-plus mr-1"></em> Create
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
                                    <th class="nk-tb-col tb-col-md">
                                        <span class="sub-text">Ville</span>
                                    </th>
                                    <th class="nk-tb-col tb-col-md">
                                        <span class="sub-text">Commune</span>
                                    </th>
                                    <th class="nk-tb-col tb-col-md">
                                        <span class="sub-text">Quartier</span>
                                    </th>
                                    <th class="nk-tb-col tb-col-md">
                                        <span class="sub-text">Garantie</span>
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
                                @foreach($houses as $room)
                                    <tr class="nk-tb-item {{ $room->status === 0 ? 'alert alert-danger' : '' }}">
                                        <td class="nk-tb-col tb-col-md">
                                            <span>
                                                {{ $room->address->town ?? "" }}
                                            </span>
                                        </td>
                                        <td class="nk-tb-col tb-col-md">
                                            <span>
                                                {{ ucfirst($room->address->commune) ?? "" }}
                                            </span>
                                        </td>
                                        <td class="nk-tb-col tb-col-md">
                                            <span>
                                                {{ ucfirst($room->address->district) ?? "" }}
                                            </span>
                                        </td>
                                        <td class="nk-tb-col tb-col-md">
                                            <span>$ {{ $room->warranty_price ?? "" }}</span>
                                        </td>
                                        <td class="nk-tb-col tb-col-md">
                                            <span>{{ $room->phone_number ?? "" }}</span>
                                        </td>
                                        <td class="nk-tb-col">
                                            <div class="tb-lead justify-content-center">
                                                <a href="{{ route('commissioner.houses.show', $room->id) }}"
                                                   class="btn btn-outline-primary btn-sm" title="">
                                                    <em class="icon ni ni-eye-alt-fill"></em>
                                                    <span>Detail Maison</span>
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
