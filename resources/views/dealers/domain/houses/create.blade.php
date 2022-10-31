@extends('dealers.layout.dealer')

@section('title')
    Ajout d'une maison
@endsection

@section('content')
    <div class="nk-content-body">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between g-3">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Ajoutez une maison</h3>
                </div>
                <div class="nk-block-head-content">
                    <a href="{{ route('commissioner.houses.index') }}"
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
                        <div class="row mb-2">
                            <div class="container-fluid" style="width: 100%">
                                <div id="maid" style="height: 250px; border-radius: 5px"></div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                @include('backend.components.errors')
                                @include('dealers.domain.houses._form')
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

@section('scripts')
    <script type="module">
        import * as FilePond from 'filepond';
        import FilePondPluginImagePreview from 'filepond-plugin-image-preview';

        FilePond.registerPlugin(
            FilePondPluginImagePreview
        );

        const inputElement = document.querySelector('input[name="image"]');
        let _token = document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        const pond = FilePond.create(inputElement);

        pond.setOptions({
            server: {
                process: {{ route('commissioner.images.upload') }},
                revert: {{ route('commissioner.images.delete') }},
                headers: {
                    'X-CSRF-Token': _token
                }
            }
        })
    </script>
@endsection
