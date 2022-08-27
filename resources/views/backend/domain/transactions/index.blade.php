@extends('backend.layout.backend')

@section('title')
    Liste des transactions
@endsection

@section('content')
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Liste des transactions</h3>
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
                                        <span class="sub-text">Code Transaction</span>
                                    </th>
                                    <th class="nk-tb-col tb-col-md">
                                        <span class="sub-text">Date Paiement</span>
                                    </th>
                                    <th class="nk-tb-col tb-col-md">
                                        <span class="sub-text">Nom du Client</span>
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
                                @foreach($transactions as $transaction)
                                    <tr class="nk-tb-item text-center">
                                        <td class="nk-tb-col tb-col-md font-weight-bold">
                                            <span>{{ $transaction->code_transaction ?? 0 }}</span>
                                        </td>
                                        <td class="nk-tb-col tb-col-md">
                                            <span>{{ $transaction->payment_date ?? "" }}</span>
                                        </td>
                                        <td class="nk-tb-col tb-col-md">
                                            <span>{{ ucfirst($transaction->client->name) ?? "" }}</span>
                                        </td>
                                        <td class="nk-tb-col tb-col-md">
                                            <span>{{ $transaction->client->phones_number ?? "" }}</span>
                                        </td>
                                        <td class="nk-tb-col">
                                             <span class="tb-lead">
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ route('admins.transaction.show', $transaction->id) }}" class="btn btn-dim btn-primary btn-sm">
                                                        <em class="icon ni ni-eye"></em>
                                                    </a>
                                                    <a
                                                        class="btn btn-dim btn-danger btn-sm"
                                                        href="#"
                                                        onclick="deleteConfirm('delete-transaction-{{$transaction->id}}')"
                                                    ><em class="icon ni ni-trash"></em></a>
                                                    <form action="{{ route('admins.transaction.destroy', $transaction->id) }}" method="POST" id="delete-transaction-{{$transaction->id}}">
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
