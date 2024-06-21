@extends('layouts.auth')

@section('content')
<div class="main-body">
    <div class="content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-truncate" style="max-width: 500px;">Deposite</h1>
        </div>
        @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif

        <form action="{{ route('wallets.storeDeposit') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="balance">Balance</label>
                <input type="number" class="form-control" id="balance" name="balance" min="0" required>
            </div>
            <input type="hidden" name="wallet_id" value="{{Auth::user()->wallet->id}}">
            <button type="submit" class="btn btn-primary mt-4">Deposit</button>
        </form>

    </div>
</div>
@endsection