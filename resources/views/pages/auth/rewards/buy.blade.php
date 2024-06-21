@extends('layouts.auth')

@section('content')
<div class="main-body">
    <div class="content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-truncate" style="max-width: 500px;">Buy Rewards</h1>
        </div>
        @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif
        <a href="{{route('rewards.index')}}" class="btn btn-primary mb-4">Back</a>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Points</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rewards as $reward)
                    <tr>
                        <td>{{ $reward->name }}</td>
                        <td>{{ $reward->description }}</td>
                        <td>{{ $reward->points }}</td>
                        <td>{{ $reward->price }}</td>
                        <td>
                            <form action="{{ route('rewards.buyReward') }}" method="post">
                                @csrf
                                <input type="hidden" name="reward_id" value="{{ $reward->id }}">
                                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                <button type="submit" class="btn btn-primary">Buy</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
