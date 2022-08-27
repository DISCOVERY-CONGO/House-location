<<<<<<<< HEAD:resources/views/backend/domain/slides/create.blade.php
@extends('backend.layout.backend')
========
@extends('backend.layout.admin')
>>>>>>>> 9b43f2e9a7052b85344481473c59fc8acbd66731:resources/views/backend/pages/slides/create.blade.php

@section('title')
    Creation de slide
@endsection

@section('content')
    <div class="nk-content-body">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between g-3">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Ajouter un slide</h3>
                </div>
                <div class="nk-block-head-content">
                    <a href="{{ route('admins.slides.index') }}"
                       class="btn btn-outline-light btn-sm bg-white d-none d-sm-inline-flex">
                        <em class="icon ni ni-arrow-left"></em>
                        <span>Back</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="nk-block">
            <div class="card">
                <div class="card-aside-wrap">
                    <div class="card-inner card-inner-lg">
                        <div class="row justify-content-center">
                            <div class="col-md-7">
                                @include('backend.components.errors')
<<<<<<<< HEAD:resources/views/backend/domain/slides/create.blade.php
                                @include('backend.domain.slides._form')
========
                                @include('backend.pages.slides._form')
>>>>>>>> 9b43f2e9a7052b85344481473c59fc8acbd66731:resources/views/backend/pages/slides/create.blade.php
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
