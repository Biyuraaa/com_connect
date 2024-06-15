@extends('dashboard.layouts.template')

@section('content')
    <div class="content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-truncate" style="max-width: 500px;">Project {{ $project->name }}</h1>
        </div>
        <div class="table-responsive">
            <a href="{{ route('projects.index') }}" class="btn btn-primary mb-3">
                <i class="fas fa-backward"></i> Back
            </a>
        </div>
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Project Information</h5>
                <p><strong>Name:</strong> {{ $project->name }}</p>
                <p><strong>Description:</strong> {{ $project->description }}</p>
                <p><strong>Date:</strong> {{ $project->date }}</p>
                <p><strong>Location:</strong> {{ $project->location }}</p>
                <p><strong>Status:</strong> {{ ucfirst($project->status) }}</p>
                <p><strong>Capacity:</strong> {{ $project->capacity }}</p>
                <p><strong>Category:</strong> {{ $category->name }}</p>
                <p><strong>Organizer:</strong> {{ $organizer->name }}</p>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Participants</h5>
                <ul>
                    @foreach ($participants as $participant)
                        <li>{{ $participant->name }} ({{ $participant->email }})</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
