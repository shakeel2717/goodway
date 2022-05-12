@extends('dashboard.layout.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5>Profile Settings</h5>
                </div>
                <div class="card-body">
                    <h5>Change / Update Password</h5>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('profile.passwordReq') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="opassword">Current Password</label>
                                            <input type="password" name="opassword" id="opassword" class="form-control"
                                                placeholder="Current Password" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password">New Password</label>
                                            <input type="password" name="password" id="password" class="form-control"
                                                placeholder="Current Password" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password_confirmation">Confirm New Password</label>
                                            <input type="password" name="password_confirmation" id="password_confirmation"
                                                class="form-control" placeholder="Confirm New Password" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary" value="Update Account Password">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
