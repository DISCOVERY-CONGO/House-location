@extends('backend.layout.admin')

@section('title')
    Liste des slides
@endsection

@section('content')
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Slides</h3>
                    </div>
                    <div class="nk-block-head-content">
                        <div class="toggle-wrap nk-block-tools-toggle">
                            <div class="toggle-expand-content" data-content="pageMenu">
                                <ul class="nk-block-tools g-3">
                                    <li class="preview-item">
                                        <a href="{{ route('admins.slides.create') }}"
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
                                <tr class="nk-tb-item nk-tb-head text-center">
                                    <th class="nk-tb-col tb-col-md">
                                        <span class="sub-text">Images</span>
                                    </th>
                                    <th class="nk-tb-col tb-col-md">
                                        <span class="sub-text">Titre</span>
                                    </th>
                                    <th class="nk-tb-col tb-col-md">
                                        <span class="sub-text">Description</span>
                                    </th>
                                    <th class="nk-tb-col nk-tb-col-tools text-right">
                                        <span class="sub-text">Actions</span>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sliders as $slide)
                                    <tr class="nk-tb-item text-center">
                                        <td class="nk-tb-col tb-col-md">
                                                <span class="tb-product text-center">
                                                    <img
                                                        src="{{ $slide->images() }}"
                                                        alt="{{ $slide->title ?? "" }}"
                                                        class="thumb">
                                                </span>
                                        </td>
                                        <td class="nk-tb-col tb-col-md">
                                            <span>{{ ucfirst(substr($slide->title, 0, 50)) ?? "" }}</span>
                                        </td>
                                        <td class="nk-tb-col tb-col-md">
                                            <span>{{ ucfirst(substr($slide->description, 0, 50)) ?? "" }} ...</span>
                                        </td>
                                        <td class="nk-tb-col nk-tb-col-tools">
                                            <ul class="nk-tb-actions gx-1">
                                                <li>
                                                    <div class="drodown">
                                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                                           data-toggle="dropdown">
                                                            <em class="icon ni ni-more-h"></em>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <ul class="link-list-opt no-bdr">
                                                                <li>
                                                                    <a href="{{ route('admins.slides.edit', $slide->key) }}">
                                                                        <em class="icon ni ni-edit"></em>
                                                                        <span>Editer</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <form action="{{ route('admins.slides.destroy', $slide->key) }}"
                                                                          method="POST"
                                                                          onsubmit="return confirm('Voulez vous supprimer');">
                                                                        @method('DELETE')
                                                                        <input type="hidden" name="_token"
                                                                               value="{{ csrf_token() }}">
                                                                        <button type="submit" class="btn btn-dim">
                                                                            <em class="icon ni ni-cross-sm"></em>
                                                                            <span>Supprimer</span>
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

