@extends('layouts.auth')
@section('content')
    <div class="main-body">
      @if (session('error'))
      <div class="alert alert-danger" role="alert" id="errorAlert">
          {{ session('error') }}
      </div>
      @endif
      <h2>Rewards</h2>
      <div class="rewards-container">
        @foreach ($rewards as $reward)
        {{-- <form action="{{ route('reward.claim', $reward->id_reward) }}" method="POST"> --}}
        <form action="" method="POST">
          @method('POST')
          @csrf
          <div class="reward-reward">
            <div class="details">
              <h3>{{ $reward->name }}</h3>
              <p>Butuh {{ $reward->points }} point</p>
            </div>
            <button class="claim-btn" type="submit">Claim</button>
          </div>
        </form>
        
            
        @endforeach
        <!-- Daftar voucher -->
       
       
        <!-- Tambahkan voucher lainnya sesuai kebutuhan -->
      </div>
    </div>
@endsection