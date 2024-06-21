@extends('layouts.auth')

@section('content')
<div class="main-body">
    <div class="content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-truncate" style="max-width: 500px;">My Rewards</h1>
        </div>
        @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif
        @if ($errors->any())
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                {{ $error }}
            </div>
            @endforeach
            
        @endif
        <a href="{{route('rewards.buy')}}" class="btn btn-primary mb-4">Buy Reward</a>
        @if($userRewards->isEmpty())
        <div class="alert alert-info" role="alert">
            You do not have any rewards yet.
        </div>
        @else
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Unique Code</th>
                        <th>Points</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($userRewards as $userReward)
                    <tr>
                        <td>{{ $userReward->reward->name }}</td>
                        <td>{{ $userReward->code }}</td>
                        <td>{{ $userReward->reward->points }}</td>
                        <td>{{ $userReward->reward->price }}</td>
                        <td>{{ ucfirst($userReward->status) }}</td>
                        <td>
                            @if($userReward->status == 'redeemed')
                            <button class="btn btn-secondary" disabled>Redeemed</button>
                            @else
                            <form action="{{ route('rewards.redeem', $userReward->id) }}" method="post">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-primary">Redeem</button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
</div>
@endsection
