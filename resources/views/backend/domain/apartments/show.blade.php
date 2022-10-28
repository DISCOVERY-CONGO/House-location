@extends('backend.layout.backend')

@section('title')
    Detail de l'appartement
@endsection

@section('content')
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-md">
                <div class="nk-block-between g-3">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">
                            Détail / <strong class="text-primary small"></strong>
                        </h3>
                    </div>
                    <div class="nk-block-head-content">
                        <div class="toggle-wrap nk-block-tools-toggle">
                            <div class="toggle-expand-content" data-content="pageMenu">
                                <ul class="nk-block-tools g-3">
                                    <li class="preview-item">
                                        <div class="custom-control custom-control-md custom-switch">
                                            <input
                                                type="checkbox"
                                                class="custom-control-input"
                                                name="activated"
                                                data-id="{{ $room->id }}"
                                                {{ $room->status ? 'checked': '' }}
                                                onclick="changeCampusStatus(event.target,{{ $room->id }} );"
                                                id="activated">
                                            <label class="custom-control-label" for="activated"></label>
                                        </div>
                                    </li>
                                    <li class="preview-item">
                                        <a class="btn btn-outline-primary btn-sm" href="">
                                            <em class="icon ni ni-arrow-long-left"></em>
                                            <span>Touts les maison</span>
                                        </a>
                                    </li>
                                    <li class="preview-item">
                                        <a
                                            href=""
                                            class="btn btn-outline-primary btn-sm">
                                            <em class="icon ni ni-edit mr-1"></em>
                                            Editer
                                        </a>
                                    </li>
                                    <li class="preview-item">
                                        <form
                                            action=""
                                            method="POST"
                                            class="d-inline-block"
                                            onsubmit="return confirm('Are you sure you want to delete this item?');"
                                        >
                                            @method('DELETE')
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button type="submit" class="btn btn-outline-danger btn-sm">
                                                <em class="icon ni ni-trash-empty-fill"></em>
                                                Delete le campus
                                            </button>
                                        </form>
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
                            <div class="tab-content">
                                <div class="tab-pane active" id="room-info">
                                    <div class="nk-block">
                                        <div class="profile-ud-list">
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Ville</span>
                                                    <span class="profile-ud-value"></span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Commune</span>
                                                    <span class="profile-ud-value"></span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Quartier</span>
                                                    <span class="profile-ud-value"></span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Adresse</span>
                                                    <span class="profile-ud-value"></span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Telephone</span>
                                                    <span class="profile-ud-value"></span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Email</span>
                                                    <span class="profile-ud-value"></span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Prix</span>
                                                    <span class="profile-ud-value"></span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Type </span>
                                                    <span class="profile-ud-value font-bold"></span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Nombre de Pieces</span>
                                                    <span class="profile-ud-value"></span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Nombre de Chambre</span>
                                                    <span class="profile-ud-value"></span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Garantie</span>
                                                    <span class="profile-ud-value"></span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Electricite</span>
                                                    <span class="profile-ud-value"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        let changeCampusStatus = async (_this, id) => {
            const status = $(_this).prop('checked') === true ? 1 : 0;
            let _token = $('meta[name="csrf-token"]').attr('content');
            let data = {
                status: status,
                campus: id
            }
            let headers = {
                'Content-type': 'application/json; charset=UTF-8',
                'x-csrf-token': _token,
            }
            await fetch('/admins/', {
                method: "POST",
                body: JSON.stringify(data),
                headers: headers
            })
                .then(response => response.json())
                .then((data) => {
                    var result = Object.values(data)
                    Swal.fire(`Status ${result[1].name}`, `${result[0]}`, 'success')
                })
                .catch((error) => {
                    Swal.fire("Bonne nouvelle", "Operation executez avec success","success")
                })
        }
    </script>
    </script>
@endsection
