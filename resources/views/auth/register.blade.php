@extends('auth.layout.app')
@section('form')
    <form action="{{ route('registerReq') }}" method="POST">
        @csrf
        <h4 class="mb-3 f-w-400">Create free Account</h4>
        @if ($refer != "Default")
        <h4 class="mb-3 f-w-400">Your Sponser: {{ $refer }}</h4>
        @endif
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" name="fname" class="form-control" placeholder="First Name" value="{{ old('fname') }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" name="lname" class="form-control" placeholder="Last Name" value="{{ old('lname') }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <input type="text" name="username" class="form-control" placeholder="Username" value="{{ old('username') }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <input type="text" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <input type="hidden" name="refer" value="{{ $refer }}">
                </div>
            </div>
        </div>
        <div class="form-group text-left mt-2">
            <div class="checkbox checkbox-primary d-inline">
                <input type="checkbox" name="checkbox-fill-1" id="checkbox-fill-a1" checked="">
                <label for="checkbox-fill-a1" class="cr"> I agree {{ env('APP_NAME') }} Terms</label>
            </div>
        </div>
        <button class="btn btn-block btn-primary mb-4 rounded-pill">Create Account</button>
        <p class="mb-0 text-muted">Already have an account? 
            <a href="{{route('login')}}" class="sweet f-w-400">Sign In</a>
        </p>
    </form>
@endsection
