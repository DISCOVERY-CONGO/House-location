@extends('backend.layout.backend')

@section('title')
    Edition de la maison
@endsection

@section('content')
    <div class="nk-content-body">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between g-3">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">
                        Edition de la maison
                    </h3>
                </div>
                <div class="nk-block-head-content">
                    <a href="{{ $viewModel->indexUrl }}"
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
                                <form action="{{ $viewModel->updateUrl }}" method="post" class="form-validate" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row g-gs">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="town">Ville</label>
                                                <div class="form-control-wrap">
                                                    <input
                                                        type="text"
                                                        class="form-control @error('town') error @enderror"
                                                        id="town"
                                                        name="town"
                                                        value="{{ old('town') ?? $viewModel->house()->address->town }}"
                                                        placeholder="Enter town"
                                                        required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="commune">Commune</label>
                                                <div class="form-control-wrap">
                                                    <input
                                                        type="text"
                                                        class="form-control @error('commune') error @enderror"
                                                        id="commune"
                                                        name="commune"
                                                        value="{{ old('commune') ?? $viewModel->house()->address->commune }}"
                                                        placeholder="Enter commune"
                                                        required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="district">Quartier</label>
                                                <div class="form-control-wrap">
                                                    <input
                                                        type="text"
                                                        class="form-control @error('district') error @enderror"
                                                        id="district"
                                                        name="district"
                                                        value="{{ old('district') ?? $viewModel->house()->address->district }}"
                                                        placeholder="Enter district"
                                                        required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="address">Adresse</label>
                                                <div class="form-control-wrap">
                                                    <input
                                                        type="text"
                                                        class="form-control @error('address') error @enderror"
                                                        id="address"
                                                        name="address"
                                                        value="{{ old('address') ?? $viewModel->house()->address->address }}"
                                                        placeholder="Enter address"
                                                        required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="prices">Prix de loyer</label>
                                                <div class="form-control-wrap">
                                                    <input
                                                        type="text"
                                                        class="form-control @error('prices') error @enderror"
                                                        id="prices"
                                                        name="prices"
                                                        value="{{ old('prices') ?? $viewModel->house()->prices }}"
                                                        placeholder="Enter prices"
                                                        required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="warranty_price">Guarantie</label>
                                                <div class="form-control-wrap">
                                                    <input
                                                        type="text"
                                                        class="form-control @error('warranty_price') error @enderror"
                                                        id="warranty_price"
                                                        name="warranty_price"
                                                        value="{{ old('warranty_price') ?? $viewModel->house()->warranty_price }}"
                                                        placeholder="Enter warranty price"
                                                        required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="number_rooms">Nombre des chambres</label>
                                                <div class="form-control-wrap">
                                                    <input
                                                        type="text"
                                                        class="form-control @error('number_rooms') error @enderror"
                                                        id="number_rooms"
                                                        name="number_rooms"
                                                        value="{{ old('number_rooms') ?? $viewModel->detail()->number_rooms }}"
                                                        placeholder="Enter number rooms"
                                                        required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="number_pieces">Nombre des pieces</label>
                                                <div class="form-control-wrap">
                                                    <input
                                                        type="text"
                                                        class="form-control @error('number_pieces') error @enderror"
                                                        id="number_pieces"
                                                        name="number_pieces"
                                                        value="{{ old('number_pieces') ?? $viewModel->detail()->number_pieces }}"
                                                        placeholder="Enter number pieces"
                                                        required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="categories">Categorie</label>
                                                <select
                                                    class="form-control js-select2 @error('categories') error @enderror"
                                                    id="categories"
                                                    name="categories"
                                                    data-placeholder="Select a categories"
                                                    required>
                                                    @foreach($viewModel->categories() as $category)
                                                        <option value="{{ $category->id }}">
                                                            {{ ucfirst($category->name) ?? "" }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="type">Type de maison</label>
                                                <select
                                                    class="form-control js-select2 @error('type') error @enderror"
                                                    id="type"
                                                    name="type"
                                                    data-placeholder="Select a type"
                                                    required>
                                                    @foreach($viewModel->types() as $type)
                                                        <option value="{{ $type->id }}">
                                                            {{ ucfirst($type->name) ?? "" }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="electricity">Electricite</label>
                                                <select
                                                    class="form-control js-select2 @error('electricity') error @enderror"
                                                    id="electricity"
                                                    name="electricity"
                                                    data-placeholder="Select a electricity"
                                                    required>
                                                    <option value="1">Avec Electricite</option>
                                                    <option value="0">Pas d'electricite</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="toilet">Type de toilette</label>
                                                <select
                                                    class="form-control js-select2 @error('toilet') error @enderror"
                                                    id="toilet"
                                                    name="toilet"
                                                    data-placeholder="Select a toilet"
                                                    required>
                                                    <option value="externe">externe</option>
                                                    <option value="interne">interne</option>
                                                    <option value="autres">Autres</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="latitude">Latitude</label>
                                                <div class="form-control-wrap">
                                                    <input
                                                        type="text"
                                                        class="form-control @error('latitude') error @enderror"
                                                        id="latitude"
                                                        name="latitude"
                                                        value="{{ old('latitude') ?? $viewModel->house()->latitude }}"
                                                        placeholder="Enter latitude"
                                                        required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="longitude">Longitude</label>
                                                <div class="form-control-wrap">
                                                    <input
                                                        type="text"
                                                        class="form-control @error('longitude') error @enderror"
                                                        id="longitude"
                                                        name="longitude"
                                                        value="{{ old('longitude') ?? $viewModel->house()->longitude }}"
                                                        placeholder="Enter longitude"
                                                        required>
                                                </div>
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
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label" for="description">Description</label>
                                                <div class="form-control-wrap">
                                                    <textarea
                                                        class="form-control form-control-sm"
                                                        id="description"
                                                        name="description"
                                                        placeholder="Write the description"
                                                    >{{ old('description') ?? $viewModel->detail()->description  }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group text-center">
                                                <button type="submit" class="btn btn-md btn-outline-primary">
                                                    Mettre a jours
                                                </button>
                                            </div>
                                        </div>
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

@section('styles')
    @parent
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"/>
@endsection
