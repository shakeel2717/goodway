@extends('dashboard.layout.app')
@section('content')
    <div class="row">
        <div class="col-md-12 col-xl-8 mx-auto">
            <div class="card ">
                <div class="card-header d-flex justify-content-between">
                    <h5>Wallet Detail</h5>
                    <a class="btn btn-sm btn-primary" href="{{ route('wallet.edit') }}">Update Record</a>
                </div>
                <hr>
                <div class="card-body ">
                    <div class="browser-card p-b-15 ">
                        <p class="d-inline-block m-0 ">Account Type</p>
                        <label class="badge badge-primary rounded-pill float-right btn-browser">{{ $wallet->type }}</label>
                    </div>
                    <hr>
                    <div class="browser-card p-b-15 ">
                        <p class="d-inline-block m-0 ">Account Number</p>
                        <label class="badge badge-primary rounded-pill float-right btn-browser">{{ $wallet->number }}</label>
                    </div>
                    <hr>
                    <div class="browser-card p-b-15 ">
                        <p class="d-inline-block m-0 ">Account Note</p>
                        <label class="badge badge-primary rounded-pill float-right btn-browser">{{ $wallet->note }}</label>
                    </div>
                    <hr>
                    <div class="browser-card p-b-15 ">
                        <p class="d-inline-block m-0 ">Account Whatsapp</p>
                        <label class="badge badge-primary rounded-pill float-right btn-browser">{{ $wallet->whatsapp }}</label>
                    </div>
                    <hr>
                </div>
                <div class="card-footer">
                    <a class="btn btn-sm btn-primary" href="{{ route('wallet.edit') }}">Edit Record</a>
                </div>
            </div>
        </div>
    </div>
@endsection
