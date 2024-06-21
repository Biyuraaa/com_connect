@extends('layouts.auth')

@section('content')
<div class="main-body">
    <div class="content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-truncate" style="max-width: 500px;">My Projects</h1>
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
        <a href="{{ route('projects.create') }}" class="btn btn-primary mb-4">Create New Project</a>

        @if($projects->isEmpty())
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
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $project)
                    <tr>
                        <td>{{ $project->name }}</td>
                        <td>{{ $project->description }}</td>
                        <td>{{ $project->date }}</td>
                        <td>{{ $project->location }}</td>
                        <td>{{ ucfirst($project->status) }}</td>
                        <td>
                            <a href="{{ route('projects.show', $project) }}" class="btn btn-primary">View</a>
                            @if ($project->organizer_id == Auth::id())
                            <a href="{{ route('projects.edit', $project) }}" class="btn btn-secondary">Edit</a>
                            <form action="{{ route('projects.destroy', $project) }}" method="post" class="d-inline-flex">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
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
