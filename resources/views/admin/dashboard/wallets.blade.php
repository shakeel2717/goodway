@extends('admin.layout.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="dt-responsive table-responsive">
                        <table id="user-list-table" class="table nowrap">
                            <thead>
                                <tr>
                                    <th>Email</th>
                                    <th>Type</th>
                                    <th>Account #</th>
                                    <th>Note</th>
                                    <th>Whatsapp</th>
                                    <th>Last Update</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($wallets as $wallet)
                                    <tr>
                                        <td>{{ $wallet->user->email }}</td>
                                        <td>{{ $wallet->type }}</td>
                                        <td>{{ $wallet->number }}</td>
                                        <td>{{ $wallet->note }}</td>
                                        <td>{{ $wallet->whatsapp }}</td>
                                        <td>{{ $wallet->updated_at }}</td>
                                    </tr>
                                @empty

                                @endforelse
                            </tbody>
                            <tfoot>
                                <th>Email</th>
                                <th>Type</th>
                                <th>Account #</th>
                                <th>Note</th>
                                <th>Whatsapp</th>
                                <th>Last Update</th>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
