@extends('auth.layout.app')
@section('form')
    <form action="{{ route('admin.loginReq') }}" method="POST">
        @csrf
        <h4 class="mb-3 f-w-400 text-danger">Sign In to ADMIN</h4>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <input type="text" name="username" class="form-control" placeholder="username">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
            </div>
        </div>
        <div class="form-group text-left mt-2">
            <div class="checkbox checkbox-primary d-inline">
                <input type="checkbox" name="checkbox-fill-1" id="checkbox-fill-a1" checked="">
                <label for="checkbox-fill-a1" class="cr"> Remember me</label>
            </div>
        </div>
        <button class="btn btn-block btn-primary mb-4 rounded-pill text-white">Signin</button>
        <p class="mb-2 text-muted">Forgot password? <a href="{{ route('reset') }}" class="f-w-400">Reset</a></p>
        <p class="mb-0 text-muted">Don’t have an account? <a href="{{ route('register') }}"
                class="f-w-400">Signup</a></p>
    </form>
@endsection
