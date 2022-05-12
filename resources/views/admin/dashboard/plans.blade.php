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
                                    <th>Plan Name</th>
                                    <th>Plan Price</th>
                                    <th>Daily Profit</th>
                                    <th>Total Return</th>
                                    <th>Duration</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($plans as $plan)
                                    <tr>
                                        <td>{{ $plan->name }}</td>
                                        <td>{{ $plan->price }}</td>
                                        <td>{{ $plan->profit }}</td>
                                        <td>{{ $plan->total }}</td>
                                        <td>{{ $plan->duration }} days</td>
                                        <td>{{ $plan->status }}</td>
                                    </tr>
                                @empty

                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Plan Name</th>
                                    <th>Plan Price</th>
                                    <th>Daily Profit</th>
                                    <th>Total Return</th>
                                    <th>Duration</th>
                                    <th>Status</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
