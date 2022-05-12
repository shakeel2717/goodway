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
                                    <th>Donation</th>
                                    <th>Bride ID</th>
                                    <th>Sender</th>
                                    <th>Receiver</th>
                                    <th>Status</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($attachments as $attachment)
                                    <tr>
                                        <td>{{ $attachment->id }}</td>
                                        <td>{{ $attachment->donation->plan->price }}</td>
                                        <td>{{ $attachment->bridge_id }}</td>
                                        <td>{{ App\Models\user::find($attachment->sender)->email }}</td>
                                        <td>{{ App\Models\user::find($attachment->receiver)->email }}</td>
                                        <td>{{ $attachment->status }}</td>
                                        <td>{{ $attachment->amount }}</td>
                                        <td>{{ $attachment->created_at }}</td>
                                    </tr>
                                @empty

                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Donation</th>
                                    <th>Bride ID</th>
                                    <th>Sender</th>
                                    <th>Receiver</th>
                                    <th>Status</th>
                                    <th>Amount</th>
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
