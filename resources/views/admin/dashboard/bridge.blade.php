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
                                    <th>ID</th>
                                    <th>Email</th>
                                    <th>Donation</th>
                                    <th>Sent</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($bridges as $bridge)
                                    <tr>
                                        <td>{{ $bridge->id }}</td>
                                        <td>{{ $bridge->user->email }}</td>
                                        <td>{{ $bridge->donation->plan->price }}</td>
                                        <td>{{ $bridge->sent }}</td>
                                        <td>{{ $bridge->total }}</td>
                                        <td>{{ $bridge->status }}</td>
                                        <td>{{ $bridge->created_at }}</td>
                                    </tr>
                                @empty

                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Email</th>
                                    <th>Donation</th>
                                    <th>Sent</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
