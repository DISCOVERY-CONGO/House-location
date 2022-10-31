@extends('backend.layout.backend')

@section('title', "Administration des images")

@section('content')
    <div class="nk-content-body">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between g-3">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Creation des images</h3>
                </div>
                <div class="nk-block-head-content">
                    <a href="{{ $viewModel->indexUrl }}"
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
                                <form action="{{ $viewModel->storeUrl }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row gy-4">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label" for="house">Reference Maison</label>
                                                <select
                                                    class="form-control js-select2 @error('house') error @enderror"
                                                    id="house"
                                                    name="house"
                                                    data-placeholder="Select a house"
                                                    required>
                                                    @foreach($viewModel->houses() as $house)
                                                        <option value="{{ $house->id }}">
                                                            {{ $house->reference ?? "" }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input
                                                        type="file"
                                                        name="file"
                                                        multiple
                                                        data-allow-reorder="true"
                                                        data-max-file-size="3MB"
                                                        data-max-files="4"
                                                    >
                                                </div>
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
