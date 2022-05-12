@extends('dashboard.layout.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Requet Withdraw</h3>
                    <p class="card-paragraph">Send a Withdraw Request to Admin, you will get paid in 24 hours. your withdraw
                        status will be auto marked as a Complete, if anything goes wrong, you can contact Admin anytime.</p>
                    <form action="{{ route('withdraw.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="amount">Amount</label>
                                    <input type="text" name="amount" id="amount" class="form-control" placeholder="Amount">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="wallet">Wallet</label>
                                    <input type="text" name="wallet" id="wallet" class="form-control" value="{{ $wallet->type }} | {{ $wallet->number }}" readonly>
                                    <small><a href="{{ route('wallet.edit') }}">Click here</a> to change the Account Wallet Detail</small>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary btn-lg" value="Withdraw Request">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
