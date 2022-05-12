@extends('admin.layout.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="dt-responsive table-responsive">
                        <table id="user-list-table" class="table nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Donation User</th>
                                    <th>Plan Request</th>
                                    <th>Assign with</th>
                                    <th>Request Date</th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($donations as $donation)
                                    <?php
                                    $amount = $donation->plan->price;
                                    foreach ($donation->donner as $donner) {
                                        $amount = $amount - $donner->amount;
                                    }
                                    ?>
                                    @if ($amount > 0)
                                    <tr>
                                        <td>{{ $donation->id }}</td>
                                        <td>{{ $donation->user->email }}</td>
                                        <td>{{ number_format($amount, 2) }}
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.reAttachmentReq', ['id' => $donation->id]) }}"
                                                method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <input type="hidden" name="donation_id" id="donation_id"
                                                        value="{{ $donation->id }}">
                                                    <select name="withdraw_id" id="withdraw_id" class="form-control">
                                                        <option value="">Select</option>
                                                        @forelse ($withdraws as $withdraw)
                                                            @if ($withdraw->amount > 0 && $amount >= $withdraw->amount)
                                                                <option value="{{ $withdraw->id }}">
                                                                    {{ $withdraw->user->email }}
                                                                    [{{ number_format($withdraw->amount, 2) }}]</option>
                                                                </option>
                                                            @endif
                                                        @empty
                                                            <option value="">No Withdraw Request</option>
                                                        @endforelse
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">Assign</button>
                                                </div>
                                            </form>
                                        </td>
                                        <td>{{ $donation->created_at }}</td>
                                    </tr>
                                    @endif
                                @empty

                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
