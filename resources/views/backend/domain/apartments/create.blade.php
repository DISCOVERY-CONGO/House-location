@extends('backend.layout.backend')

@section('title', "Administration des appartements")

@section('content')
    <div class="nk-content-body">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between g-3">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Creation des appartements</h3>
                </div>
                <div class="nk-block-head-content">
                    <a href="{{ route('admins.houses.index') }}"
                       class="btn btn-outline-primary btn-sm d-none d-sm-inline-flex">
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
                        <div class="row mb-2">
                            <div class="container-fluid" style="width: 100%">
                                <div id="maid" style="height: 250px; border-radius: 5px"></div>
                            </div>
                        </div>
                        <div class="row gy-4 justify-content-center">
                            <div class="col-md-9">
                                @if ($errors->any())
                                    <div class="alert alert-danger mt-4">
                                        <ul class="list-unstyled">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                @include('backend.domain.apartments._form')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    @parent
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"/>
@endsection
