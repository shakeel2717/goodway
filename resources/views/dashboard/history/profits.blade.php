@extends('dashboard.layout.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="dt-responsive table-responsive">
                        <table id="user-list-table" class="table nowrap">
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($profits as $profit)
                                    <tr>
                                        <td>{{ $profit->type }}</td>
                                        <td>{{ $profit->amount }}</td>
                                        <td>{{ $profit->status }}</td>
                                        <td>{{ $profit->created_at }}</td>
                                    </tr>
                                @empty

                                @endforelse
                            </tbody>
                            <tfoot>
                                <th>Type</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
