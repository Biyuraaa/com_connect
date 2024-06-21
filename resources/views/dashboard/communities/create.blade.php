@extends('dashboard.layouts.template')

@section('content')
    <div class="content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-truncate" style="max-width: 500px;">Create New Community</h1>
        </div>
        <div class="table-responsive">
            <a href="{{ route('communities.index') }}" class="btn btn-primary mb-3">
                <i class="fas fa-arrow-left"></i> Back
            </a>
            <form action="{{ route('communities.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control mb-2" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control mb-2"></textarea>
                </div>
                <div class="form-group">
                    <label for="leader_id">Leader</label>
                    <select name="leader_id" id="leader_id" class="form-control mb-2" required>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select name="category_id" id="category_id" class="form-control mb-2" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Create Community</button>
            </form>
        </div>
    </div>
@endsection
