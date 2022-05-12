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
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Uplier</th>
                                <th>Status</th>
                                <th>Join Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($refers as $user)
                                <tr>
                                    <td>{{ $user->fname }} {{ $user->lname }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->refer }}</td>
                                    <td>{{ $user->status }}</td>
                                    <td>{{ $user->created_at }}</td>
                                </tr>
                            @empty

                            @endforelse
                        </tbody>
                        <tfoot>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Uplier</th>
                            <th>Status</th>
                            <th>Join Date</th>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
