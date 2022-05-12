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
                                    <th>Status</th>
                                    <th>Amount</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($withdraws as $withdraw)
                                    <tr>
                                        <td>{{ $withdraw->user->email }}</td>
                                        <td>{{ $withdraw->status }}</td>
                                        <td>{{ $withdraw->amount }}</td>
                                        <td>{{ $withdraw->created_at }}</td>
                                    </tr>
                                @empty

                                @endforelse
                            </tbody>
                            <tfoot>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Amount</th>
                                <th>Amount</th>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
