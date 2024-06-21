@extends('layouts.auth')

@section('content')
<div class="main-body">
    <div class="profile-and-search">
        <div class="profile-container">
            <div class="profile-image">
                @if (Auth::user()->image)
                <img id="profile-picture" src="{{ asset('assets/images/users/'.Auth::user()->image) }}" alt="Profile Picture">
                @else
                <img id="profile-picture" src="{{ asset('assets/images/icon2.jpg') }}" alt="Profile Picture">
                @endif
            </div>
            <div class="profile-details">
                <h2 id="profile-name">My Profile</h2>
                <p>Wallet: {{ Auth::user()->wallet->balance ?? '-'}}</p>
                <p>Poin: {{ Auth::user()->points }}</p>
                <a href="{{ route('profile.edit') }}"> Edit Profile</a>
            </div>
        </div>
        <div class="search_box">
            <input type="text" placeholder="Search">
            <i class="fas fa-search"></i>
        </div>
    </div>

    <div class="promo_card">
        <h1>Halo, {{ Auth::user()->name }}!</h1>
        <span>Reedeem your points here</span>
        <button>Learn More</button>
    </div>

    <div class="projects-section mt-3">
        <h2>Your Projects</h2>
        @if($user_projects->isEmpty())
        <div class="alert alert-info" role="alert">
            You are not participating in any projects yet.
        </div>
        @else
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Project Name</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Location</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($user_projects as $project)
                    <tr>
                        <td>{{ $project->name }}</td>
                        <td>{{ $project->description }}</td>
                        <td>{{ $project->date }}</td>
                        <td>{{ $project->location }}</td>
                        <td>{{ ucfirst($project->status) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>

    <div class="rewards-section">
        <h2>Reward History</h2>
        @if($userRewards->isEmpty())
        <div class="alert alert-info" role="alert">
            You do not have any rewards yet.
        </div>
        @else
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Reward Name</th>
                        <th>Description</th>
                        <th>Points</th>
                        <th>Status</th>
                        <th>Redeemed At</th>
                        <th>Expires At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($userRewards as $userReward)
                    <tr>
                        <td>{{ $userReward->reward->name }}</td>
                        <td>{{ $userReward->code }}</td>
                        <td>{{ $userReward->reward->points }}</td>
                        <td>{{ ucfirst($userReward->status) }}</td>
                        <td>{{ $userReward->redeemed_at ?? 'N/A' }}</td>
                        <td>{{ $userReward->expires_at ?? 'N/A' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
</div>
@endsection
