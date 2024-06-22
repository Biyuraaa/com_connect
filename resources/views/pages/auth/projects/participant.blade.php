@extends('layouts.auth')

@section('content')
<div class="main-body">
    <div class="content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-truncate" style="max-width: 500px;">Detail Participant</h1>
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
        <a href="{{ route('projects.show', $project->id) }}" class="btn btn-primary mb-4">Back</a>
        <div class="card mb-4">
            <div class="card-body">
                <h4>{{ $user->name }}'s Details</h4>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Phone:</strong> {{ $user->phone }}</p>
                <p><strong>Address:</strong> {{ $user->address }}</p>
                <p><strong>Date of Birth:</strong> {{ $user->date_of_birth }}</p>
                <p><strong>Age:</strong> {{ $user->age }}</p>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-body">
                <h4>Communities</h4>
                @if($communities->count() == 0)
                    <p>No communities joined.</p>
                @else
                    <ul>
                        @foreach($communities as $community)
                            <li>{{ $community->name }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-body">
                <h4>Projects Participated</h4>
                @if($projects->count() == 1)
                    <p>No projects participated in.</p>
                @else
                    <ul>
                        @foreach($projects as $project)
                            <li>{{ $project->name }} - {{ $project->date }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
