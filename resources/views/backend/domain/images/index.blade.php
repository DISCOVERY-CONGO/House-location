@extends('backend.layout.backend')

@section('title')
    Images pour les apartements
@endsection

@section('content')
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Images</h3>
                    </div>
                    <div class="nk-block-head-content">
                        <div class="toggle-wrap nk-block-tools-toggle">
                            <div class="toggle-expand-content" data-content="pageMenu">
                                <ul class="nk-block-tools g-3">
                                    <li class="preview-item">
                                        <a href="{{ route('admins.image.create') }}"
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
                                        <span class="sub-text">Image</span>
                                    </th>
                                    <th class="nk-tb-col tb-col-md">
                                        <span class="sub-text">Apartement</span>
                                    </th>
                                    <th class="nk-tb-col tb-col-md">
                                        <span class="sub-text">Utilisateurs</span>
                                    </th>
                                    <th class="nk-tb-col nk-tb-col-tools text-right">
                                        <span class="sub-text">Actions</span>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($images as $image)
                                    <tr class="nk-tb-item">
                                        <td class="nk-tb-col tb-col-sm">
                                            <span class="tb-product text-center">
                                                <img
                                                    src="{{ asset('storage/'.$image->images) }}"
                                                    alt="{{ $image->id }}" class="thumb">
                                            </span>
                                        </td>
                                        <td class="nk-tb-col tb-col-md">
                                            <span>{{ $image->houses->reference ?? "" }}</span>
                                        </td>
                                        <td class="nk-tb-col tb-col-md">
                                            <span>{{ ucfirst($image->user->name) ?? "" }}</span>
                                        </td>
                                        <td class="nk-tb-col">
                                            <span class="tb-lead">
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ route('admins.image.edit', $image->id) }}" class="btn btn-dim btn-primary btn-sm">
                                                        <em class="icon ni ni-edit"></em>
                                                    </a>
                                                     <a
                                                         class="btn btn-dim btn-danger btn-sm"
                                                         href="#"
                                                         onclick="deleteConfirm('delete-images-{{$image->id}}')"
                                                     ><em class="icon ni ni-trash"></em></a>
                                                    <form action="{{ route('admins.image.destroy', $image->id) }}" method="POST" id="delete-images-{{$image->id}}">
                                                        @method('DELETE')
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    </form>
                                                </div>
                                            </span>
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

