@if ($receiver != '')
    <div class="row">
        <div class="col">
            @foreach ($receiver as $receive)
                <div class="card">
                    <div class="card-body bg-primary">
                        <h2 class="f-24 font-medium text-white">We Have Assigned you to User:
                            {{ App\Models\User::find($receive->sender)->username }}</h2>
                        <p class="m-b-20 text-white">{{ App\Models\User::find($receive->sender)->username }} will send
                            you
                            {{ env('APP_CURRENCY_SYMBOL') }}
                            {{ number_format($receive->amount, 2) }} to
                            your account. if you want to contact directly to
                            {{ App\Models\User::find($receive->sender)->username }} here's the user contact detail.
                        </p>
                        <div class="row mb-2">
                            <div class="col-3 font-weight-bold text-white">Amount</div>
                            <div class="col text-white"><b>{{ env('APP_CURRENCY_SYMBOL') }}
                                    {{ number_format($receive->amount, 2) }}</b>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3 font-weight-bold text-white">Whatsapp</div>
                            <div class="col text-white">
                                {{ App\Models\User::find($receive->sender)->wallet->whatsapp }}
                            </div>
                        </div>
                        <hr>
                        @if ($receive->status == 'Queue')
                            <p class="text-white">Please Click on the Below Button Once you Recieved
                                {{ env('APP_CURRENCY_SYMBOL') }}
                                {{ number_format($receive->amount, 2) }} in your account.</p>
                            <form action="{{ route('user.attatchmentReq') }}" method="POST">
                                @csrf
                                <input type="hidden" name="attachment_id" value="{{ $receive->id }}">
                                <button type="submit" class="btn btn-success btn-sm"><i
                                        class="feather icon-check-square"></i> I Received
                                    {{ env('APP_CURRENCY_SYMBOL') }} {{ number_format($receive->amount, 2) }} in
                                    my
                                    account</button>
                            </form>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif
