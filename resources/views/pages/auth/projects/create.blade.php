@extends('layouts.auth')

@section('content')
<div class="main-body">
    <div class="content">
        <h1 class="mb-4">Create New Project</h1>
        
        @if ($errors->any())
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                {{ $error }}
            </div>
            @endforeach
        @endif

        <a href="{{ route('projects.index') }}" class="btn btn-primary mb-2">Back</a>

        <form action="{{ route('projects.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group mt-2">
                <label for="name">Project Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="form-group mt-2">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>

            <div class="form-group mt-2">
                <label for="image" class="d-block">Image</label>
                <input type="file" class="form-control-file" id="image" name="image">
            </div>

            <div class="form-group mt-2">
                <label for="date">Date</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>

            <div class="form-group mt-2">
                <label for="location">Location</label>
                <input type="text" class="form-control" id="location" name="location" required>
            </div>

            <div class="form-group mt-2">
                <label for="category_id">Category</label>
                <select class="form-control" id="category_id" name="category_id" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <input type="hidden" name="organizer_id" value="{{Auth::user()->id}}">
            <input type="hidden" name="status" id="status" value="progress">
            <div class="form-group">
                <label for="capacity">Capacity</label>
                <input type="number" class="form-control" id="capacity" name="capacity" required>
            </div>

            <button type="submit" class="btn btn-primary mt-5">Create Project</button>
        </form>
    </div>
</div>
@endsection
