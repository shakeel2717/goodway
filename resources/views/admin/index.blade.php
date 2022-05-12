@extends('admin.layout.app')
@section('content')
    <div class="row">
        <div class="col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body p-30">
                    <div class="d-flex pt-3 pb-2 no-block">
                        <div class="align-self-center mr-5 ml-4"><img src="{{ asset('assets/images/icon/note.svg') }}"
                                alt="" title="" width="55"></div>
                        <div class="align-slef-center mr-auto">
                            <h2 class="m-b-2 text-uppercase font-30 font-medium lp-5 text-danger">
                                {{ $users->count() }}</h2>
                            <h6 class="text-muted m-b-0">All Users</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body p-30">
                    <div class="d-flex pt-3 pb-2 no-block">
                        <div class="align-self-center mr-5 ml-4"><img src="{{ asset('assets/images/icon/note.svg') }}"
                                alt="" title="" width="55"></div>
                        <div class="align-slef-center mr-auto">
                            <h2 class="m-b-2 text-uppercase font-30 font-medium lp-5 text-danger">
                                {{ $users->where('status', 'Pending')->count() }}</h2>
                            <h6 class="text-muted m-b-0">Pending Users</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body p-30">
                    <div class="d-flex pt-3 pb-2 no-block">
                        <div class="align-self-center mr-5 ml-4"><img src="{{ asset('assets/images/icon/note.svg') }}"
                                alt="" title="" width="55"></div>
                        <div class="align-slef-center mr-auto">
                            <h2 class="m-b-2 text-uppercase font-30 font-medium lp-5 text-danger">
                                {{ $users->where('status', 'Active')->count() }}</h2>
                            <h6 class="text-muted m-b-0">Active Users</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body p-30">
                    <div class="d-flex pt-3 pb-2 no-block">
                        <div class="align-self-center mr-5 ml-4"><img src="{{ asset('assets/images/icon/note.svg') }}"
                                alt="" title="" width="55"></div>
                        <div class="align-slef-center mr-auto">
                            <h2 class="m-b-2 text-uppercase font-30 font-medium lp-5 text-danger">
                                {{ $totalOnGoingDonations }}</h2>
                            <h6 class="text-muted m-b-0">Total Ongoing Donations</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body p-30">
                    <div class="d-flex pt-3 pb-2 no-block">
                        <div class="align-self-center mr-5 ml-4"><img src="{{ asset('assets/images/icon/note.svg') }}"
                                alt="" title="" width="55"></div>
                        <div class="align-slef-center mr-auto">
                            <h2 class="m-b-2 text-uppercase font-30 font-medium lp-5 text-danger">
                                {{ $totalCompleteDonations }}</h2>
                            <h6 class="text-muted m-b-0">Total Complete Donations</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body p-30">
                    <div class="d-flex pt-3 pb-2 no-block">
                        <div class="align-self-center mr-5 ml-4"><img src="{{ asset('assets/images/icon/note.svg') }}"
                                alt="" title="" width="55"></div>
                        <div class="align-slef-center mr-auto">
                            <h2 class="m-b-2 text-uppercase font-30 font-medium lp-5 text-danger">
                                {{ $plans->where('status', 'Active')->count() }}</h2>
                            <h6 class="text-muted m-b-0">Total System Active Plan</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body p-30">
                    <div class="d-flex pt-3 pb-2 no-block">
                        <div class="align-self-center mr-5 ml-4"><img src="{{ asset('assets/images/icon/note.svg') }}"
                                alt="" title="" width="55"></div>
                        <div class="align-slef-center mr-auto">
                            <h2 class="m-b-2 text-uppercase font-30 font-medium lp-5 text-danger">
                                {{ $plans->where('status', 'In-Active')->count() }}</h2>
                            <h6 class="text-muted m-b-0">Total System Freeze Plan</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Run Blockchain</h4>
                    <a href="{{ route('blockchain') }}" class="btn btn-primary btn-block btn-lg">Run Blockchain Query</a>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Balance Insert</h4>
                    <form action="{{ route('balanceAdd') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" placeholder="Enter User Email" name="email">
                        </div>
                        <div class="form-group">
                            <input type="amount" class="form-control" id="amount" placeholder="Amount" name="amount">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Insert balance</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Activate Donation</h4>
                    <form action="{{ route('donationAdd') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" placeholder="Enter User Email" name="email">
                        </div>
                        <div class="form-group">
                            <select name="plan_id" id="plan_id" class="form-control">
                                @foreach ($plans as $plan)
                                    <option value="{{ $plan->id }}">{{ $plan->price }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Insert balance</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
