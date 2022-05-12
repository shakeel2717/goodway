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
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>SUM</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($transactions as $transaction)
                                    <tr>
                                        <td>{{ $transaction->user->email }}</td>
                                        <td>{{ $transaction->type }}</td>
                                        <td>{{ $transaction->amount }}</td>
                                        <td>{{ $transaction->status }}</td>
                                        <td>{{ $transaction->sum }}</td>
                                        <td>{{ $transaction->created_at }}</td>
                                    </tr>
                                @empty

                                @endforelse
                            </tbody>
                            <tfoot>
                                <th>Email</th>
                                <th>Type</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>SUM</th>
                                <th>Date</th>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
