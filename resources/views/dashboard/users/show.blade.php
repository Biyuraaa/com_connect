@extends('dashboard.layouts.template')

@section('content')
    <div class="content">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="text-truncate" style="max-width: 500px;">Details User</h1>
        </div>
        <a href="{{ route('users.index') }}" class="btn btn-primary">Back</a>
        <div class="card mt-3">
            <div class="card-header">
                <h2>User Information</h2>
            </div>
            <div class="card-body">
                <h3>{{ $user->name }}</h3>
                <p>Email: {{ $user->email }}</p>
                <p>Address: {{ $user->address }}</p>
                <p>Phone: {{ $user->phone }}</p>
                <p>Date of Birth: {{ $user->date_of_birth }}</p>
                <p>Age: {{ $user->age }}</p>
            </div>
            <div class="card-header">
                <h2>User Communites</h2>
            </div>
            <div class="card-body">
                @if($user->user_communities->isEmpty())
                    <p>No communities joined.</p>
                @else
                    <ul>
                        @foreach($user->user_communities as $community)
                            <li>{{ $community->community->name }} - {{ $community->community->description }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
            <div class="card-header">
                <h2>User Projects</h2>
            </div>
            <div class="card-body">
                @if($user->user_projects->isEmpty())
                    <p>No projects participated.</p>
                @else
                    <ul>
                        @foreach($user->projects as $project)
                            <li>{{ $project->name }} - {{ $project->description }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>

    </div>
@endsection