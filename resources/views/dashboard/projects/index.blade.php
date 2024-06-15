@extends('dashboard.layouts.template')

@section('content')
    <div class="content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-truncate" style="max-width: 500px;">All Projects</h1>
        </div>
        <div class="table-responsive">
            <a href="{{ route('projects.create') }}" class="btn btn-primary mb-3">
                <i class="fas fa-plus"></i> Add New Project
            </a>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Location</th>
                        <th>Organizer</th>
                        <th>Status</th>
                        <th>Category</th>
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
                        <td>{{ $project->organizer->name }}</td>
                        <td>{{ $project->status }}</td>
                        <td>{{ $project->category->name }}</td>
                        <td class="d-flex">
                            <a href="{{ route('projects.edit', $project) }}" class="btn btn-primary mr-2">
                                <i class="fas fa-edit"></i>  Edit
                            </a>
                            <a href="{{ route('projects.show', $project) }}" class="btn btn-info mr-2">
                                <i class="fas fa-eye"></i> View
                            </a>
                            <form action="{{ route('projects.destroy', $project) }}" method="post" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-trash-alt"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection