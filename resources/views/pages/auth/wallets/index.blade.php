@extends('layouts.auth')

@section('content')
<div class="main-body">
    <div class="content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-truncate" style="max-width: 500px;">My Wallet</h1>
        </div>
        @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif

        @if(!Auth::user()->wallet)
        <div class="alert alert-info" role="alert">
            You do not have a wallet yet. Click the button below to create one.
        </div>
        <a href="{{route('wallets.create')}}" class="btn btn-primary">Create Wallet</a>
        @else
        <div class="wallet-detail mb-4">
          <p><strong>Balance:</strong> {{ $wallet->balance }}</p>
          <a href="{{route('wallets.deposit')}}" class="btn btn-primary">Deposit</a>
        </div>
        
        <h2>Transaction History</h2>
        @if($transactions->isEmpty())
        <p>No transactions yet.</p>
        @else
        <table class="table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Type</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->created_at }}</td>
                    <td style="color: {{ $transaction->type == 'purchase' ? 'red' : 'green' }}">{{ ucfirst(str_replace('_', ' ', $transaction->type)) }}</td>
                    <td style="color: {{ $transaction->type == 'purchase' ? 'red' : 'green' }}">{{ $transaction->amount }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
        @endif
    </div>
</div>

@endsection