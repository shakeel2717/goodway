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
                                    <th>Plan Price</th>
                                    <th>Status</th>
                                    <th>Expiery Date</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($donations as $donation)
                                    <tr>
                                        <td>{{ $donation->plan->price }}</td>
                                        <td>{{ $donation->status }}</td>
                                        <td>{{ \Carbon\Carbon::parse($donation->userPlan->exp_date)->diffForhumans() }}</td>
                                        <td>{{ $donation->created_at }}</td>
                                    </tr>
                                @empty

                                @endforelse
                            </tbody>
                            <tfoot>
                                <th>Plan Price</th>
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
