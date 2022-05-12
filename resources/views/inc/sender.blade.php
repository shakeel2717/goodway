@if ($senders->count() > 0)
    <div class="row">
        <div class="col">
            @foreach ($senders as $sender)
                <div class="card">
                    <div class="card-body bg-primary">
                        <h2 class="f-24 font-medium text-white">You Have Assigned to User:
                            {{ App\Models\user::find($sender->receiver)->username }}</h2>
                        <div class="bg-white p-2">
                            <h2 class="f-24 font-medium text-warning mb-0">Expiration Time:
                                {{ $sender->created_at->addDays(1) }}
                                [{{ \Carbon\Carbon::parse($sender->created_at->addDays(1))->diffForhumans() }}]</h2>
                        </div>
                        <p class="m-b-20 text-white">Please Send {{ env('APP_CURRENCY_SYMBOL') }}
                            {{ number_format($sender->amount, 2) }} to
                            {{ App\Models\User::find($sender->receiver)->username }} User's Account to Complete your
                            donation</p>
                        <div class="row mb-2">
                            <div class="col-3 font-weight-bold text-white">Amount</div>
                            <div class="col text-white"><b>{{ env('APP_CURRENCY_SYMBOL') }}
                                    {{ number_format($sender->amount, 2) }}</b>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3 font-weight-bold text-white">Whatsapp</div>
                            <div class="col text-white">
                                {{ App\Models\user::find($sender->receiver)->wallet->whatsapp }}
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3 font-weight-bold text-white">Note</div>
                            <div class="col text-white">Please Send your amount within 24 Hour, otherwise your account
                                will
                                be suspended Automatically, if you face any problem, contact admin.</div>
                        </div>
                        <hr>
                        {{-- <p class="text-white">Please Double Check before sending donation to this user, after sent,
                        Click on Below Button to
                        Confirm your Donation. You can Contact Admin if anything goes wrong.</p> --}}
                        {{-- <form action="{{ route('user.sender.attatchmentReq') }}" method="POST">
                        @csrf
                        <input type="hidden" name="attachment_id" value="{{ $sender->id }}">
                        <button type="submit" class="btn btn-success btn-sm"><i class="feather icon-check-square"></i> I
                            Sent
                            {{ env('APP_CURRENCY_SYMBOL') }}
                            {{ number_format($sender->amount, 2) }} to This User</button>
                    </form> --}}
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endif
