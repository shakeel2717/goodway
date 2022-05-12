@extends('dashboard.layout.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5>Donation Center</h5>
                </div>
                <div class="card-body">
                    <h5>Make Donation</h5>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('donation.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="title">Make Donation, Select Package</label>
                                            <select name="plan_id" id="plan_id" class="form-control">
                                                @foreach ($plans as $plan)
                                                    <option value="{{ $plan->id }}">
                                                        {{ env('APP_CURRENCY_SYMBOL') }}{{ $plan->price }} to get
                                                        {{ env('APP_CURRENCY_SYMBOL') }}{{ $plan->total }} in
                                                        {{ $plan->duration }} days</option>
                                                @endforeach
                                                <option value="">50000 to get 75000 in 7 days (Cooming Soon)</option>
                                                <option value="">100000 to get 150000 in 7 days (Cooming Soon)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary" value="Make Donation">
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
