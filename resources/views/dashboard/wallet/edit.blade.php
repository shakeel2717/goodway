@extends('dashboard.layout.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">My Wallet Detail</h3>
                    <p class="card-paragraph">Update Your Account Wallet Detail, Keep it up to date to avoid loss your Profit or Deposit</p>
                    <form action="{{ route('wallet.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="type">Wallet Type <span class="text-primary">Selected: {{ $wallet->type }}</span></label>
                                    <select name="type" id="type" class="form-control">
                                        <option value="JazzCash">JazzCash</option>
                                        <option value="EasyPaisa">EasyPaisa</option>
                                        <option value="Bank">Bank</option>
                                        <option value="Omni">Omni</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="number">Account Number</label>
                                    <input type="text" name="number" id="number" class="form-control" value="{{ $wallet->type }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="note">Account note</label>
                                    <input type="text" name="note" id="note" class="form-control" value="{{ $wallet->note }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="whatsapp">Whatsapp</label>
                                    <input type="text" name="whatsapp" id="whatsapp" class="form-control" value="{{ $wallet->whatsapp }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary btn-lg" value="Update Wallet Detail">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
