@extends('dashboard.layout.app')
@section('content')
    @if (onGoing() > 0)
        <div class="row">
            <div class="col-12">
                <div class="card bg-primary">
                    <div class="card-body">
                        <h4 class="card-title text-white">You are to make donation</h4>
                        <hr>
                        <p class="card-paragraph text-white">You request to make donation has been received and queued in
                            our system for pairing. You will be merged with another participant when it get to your turn.
                            (our system works on first come first serve).</p>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if ($bridge != '')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <p class="card-paragraph">You Sent: {{ env('APP_CURRENCY_SYMBOL') }}
                            {{ number_format($bridge->sent, 2) }} out of: {{ env('APP_CURRENCY_SYMBOL') }}
                            {{ number_format($bridge->total, 2) }}</p>
                        <div class="progress" style="height: 40px; background-color: rgb(236, 225, 225);">
                            <div class="progress-bar progress-bar-striped bg-success progress-bar-animated"
                                role="progressbar" style="width: {{ $complete }}%;" aria-valuenow="{{ $complete }}"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @include('inc.sender')
    @include('inc.receiver')
    <div class="row">
        <!-- Column -->
        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex pb-3 no-block">
                        <div class="align-self-center mr-1 ml-2"><img src="{{ asset('assets/images/icons/coin.png') }}"
                                alt="" title="" width="55"></div>
                        <div class="align-slef-center mr-auto">
                            <h2 class="m-b-2 text-uppercase font-30 font-medium lp-5 text-primary">
                                {{ number_format(balance(), 2) }}</h2>
                            <h6 class="text-muted m-b-0">Wallet</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="card-header d-flex">
                    <h6 class="text-muted m-b-10">You will Receive <a href="{{ route('user.donations') }}"
                            class="text-primary">View All</a> </h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h2 class="m-0"><i
                                    class="feather icon-arrow-up text-warning"></i>{{ number_format(willRecieve(), 2) }}
                            </h2>
                        </div>
                        <div class="col text-right">
                            <h4 class="text-warning m-0">{{ $expireDays != '' ? $expireDays : now() }}</h4>
                            <span class="d-block">{{ $expireDays != null ? 'Days Left' : '' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body p-30">
                    <div class="d-flex pt-3 pb-2 no-block">
                        <div class="align-self-center mr-1 ml-2"><img src="{{ asset('assets/images/icon/box.png') }}"
                                alt="" title="" width="55"></div>
                        <div class="align-slef-center mr-auto">
                            <h2 class="m-b-2 text-uppercase font-30 font-medium lp-5 text-warning">
                                {{ number_format(sendDonations(), 2) }}</h2>
                            <h6 class="text-muted m-b-0">Sent Donations</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body p-30">
                    <div class="d-flex pt-3 pb-2 no-block">
                        <div class="align-self-center mr-1 ml-2"><img src="{{ asset('assets/images/icons/coin.png') }}"
                                alt="" title="" width="55"></div>
                        <div class="align-slef-center mr-auto">
                            <h2 class="m-b-2 text-uppercase font-30 font-medium lp-5 text-primary">
                                {{ number_format(pendingWithdraw(), 2) }}</h2>
                            <h6 class="text-muted m-b-0">Pending Balance</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body p-30">
                    <div class="d-flex pt-3 pb-2 no-block">
                        <div class="align-self-center mr-1 ml-2"><img src="{{ asset('assets/images/icons/coin.png') }}"
                                alt="" title="" width="55"></div>
                        <div class="align-slef-center mr-auto">
                            <h2 class="m-b-2 text-uppercase font-30 font-medium lp-5 text-primary">
                                {{ number_format(activeWithdraw(), 2) }}</h2>
                            <h6 class="text-muted m-b-0">Recieve Balance</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
    <div class="row">
        <div class="col-xl-4 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <img src="{{ asset('assets/images/icon/box.png') }}" alt="" title="" width="55">
                        </div>
                        <div class="col-auto">
                            <h6 class="text-muted m-b-10">Ongoing Donations</h6>
                            <h2 class="m-b-0">{{ number_format(onGoing(), 2) }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <img src="{{ asset('assets/images/icon/box.png') }}" alt="" title="" width="55">
                        </div>
                        <div class="col-auto">
                            <h6 class="text-muted m-b-10">Sponsor Bonus <a href="{{ route('user.collectCommission') }}"
                                    class="text-primary">Collect</a> </h6>
                            <h2 class="m-b-0">{{ number_format(totalCommision(), 2) }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="refer">Referral link</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Recipient's username" id="refer"
                                aria-label="Recipient's username" aria-describedby="basic-addon2"
                                value="{{ route('register', ['username' => session('user')->username]) }}">
                            <div class="input-group-append">
                                <button class="btn btn-primary" onclick="copyClipboard();" type="button">Copy</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
