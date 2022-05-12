@extends('errors.layout.app')
@section('content')
    <div class="row align-items-center">
        <div class="col-sm-6">
            <img src="{{ asset('assets/images/auth/404.png') }}" alt="" class="img-fluid mb-4">
        </div>
        <div class="col-sm-6">
            <img src="{{ asset('assets/images/brand/svg/logo-light.svg') }}" alt="" class="img-fluid mb-4" width="200">
            <h1 class="text-primary display-1 font-weight-bolder">404</h1>
            <h2 class="font-weight-bolder">Not found</h2>
            <h5 class="mb-4">Page you’re looking for is not found</h5>
            <a href="{{ route('dashboard') }}" class="btn btn-primary mb-4 rounded-pill text-white">Go back</a>
        </div>
    </div>
@endsection
