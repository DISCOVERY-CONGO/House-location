@extends('dealers.layout.dealer')

@section('title')
    Ajout des images / Modification des images
@endsection

@section('content')
    <div class="nk-content-body">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between g-3">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Creation des images</h3>
                </div>
                <div class="nk-block-head-content">
                    <a href="{{ route('commissioner.imageHouses.index') }}"
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
                            <div class="col-md-6">
                                @include('backend.components.errors')
                                <form action="{{ route('commissioner.imageHouses.store') }}" method="post" id="upload-images" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row gy-4">
                                        <div class="col-md-md-12 col-lg-12">
                                            <div class="form-group">
                                                <label class="form-label">Images</label>
                                                <div class="form-control-wrap">
                                                    <div class="form-file">
                                                        <input
                                                            type="file"
                                                            class="form-control-file form-control"
                                                            name="images"
                                                            id="images">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @php
                                            $apartments = \App\Models\House::query()
                                                ->where('user_id', '=', auth()->id())
                                                ->orderBy('created_at', 'desc')
                                                ->get();
                                        @endphp
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label" for="house">Apartements</label>
                                                <select
                                                    class="form-control js-select2 select2-hidden-accessible @error('house') error @enderror"
                                                    data-search="on"
                                                    id="house"
                                                    name="house"
                                                    data-placeholder="Select apartments"
                                                    required>
                                                    <option label="Select apartments" value=""></option>
                                                    @foreach($apartments as $apartment)
                                                        <option value="{{ $apartment->id }}">
                                                            {{ $apartment->reference ?? "" }} / {{ $apartment->phone_number ?? "" }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mt-3">
                                        <button type="submit" class="btn btn-primary btn-action">
                                            Save
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
