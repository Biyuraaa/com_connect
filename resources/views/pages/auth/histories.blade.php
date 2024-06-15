@extends('layouts.auth')

@section('content')
    <div class="main-body">
        <div class="content">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="text-truncate" style="max-width: 500px;">My Projects</h1>
            </div>
            <div class="table-responsive">
                @if($projects->isEmpty())
                    <p>You are not following any projects yet.</p>

                @else

                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Date</th>
                                <th>Location</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                            <tr>
                                <td>{{ $project->name }}</td>
                                <td>{{ $project->description }}</td>
                                <td>{{ $project->date }}</td>
                                <td>{{ $project->location }}</td>
                                <td>{{ ucfirst($project->status) }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('projects.show', $project) }}" class="btn btn-info mr-2">
                                        <i class="fas fa-eye"></i> View
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection
