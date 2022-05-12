@extends('errors.layout.app')
@section('content')
    <div class="row align-items-center">
        <div class="col-sm-6">
            <img src="{{ asset('assets/images/auth/500.png') }}" alt="" class="img-fluid mb-4">
        </div>
        <div class="col-sm-6">
            <img src="{{ asset('assets/images/brand/svg/logo-light.svg') }}" alt="" class="img-fluid mb-4">
            <h1 class="text-primary display-1 font-weight-bolder">500</h1>
            <h2 class="font-weight-bolder">Internal Server Error</h2>
            <h5 class="mb-4">Something went wrong with server</h5>
            <button class="btn btn-primary mb-4 rounded-pill">Go back</button>
        </div>
    </div>
@endsection
