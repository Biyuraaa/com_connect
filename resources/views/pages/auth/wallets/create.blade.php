@extends('layouts.auth')

@section('content')
<div class="main-body">
    <div class="content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-truncate" style="max-width: 500px;">Create New Wallet</h1>
        </div>
        @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif

        <form action="{{ route('wallets.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="balance">Initial Balance</label>
                <input type="number" class="form-control" id="balance" name="balance" min="0" required>
            </div>
            <input type="hidden" name="user_id" value="{{Auth::id()}}">
            <button type="submit" class="btn btn-primary mt-4">Create Wallet</button>
        </form>

    </div>
</div>
@endsection