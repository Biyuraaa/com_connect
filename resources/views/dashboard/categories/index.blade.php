@extends('dashboard.layouts.template')

@section('content')
    <div class="content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-truncate" style="max-width: 500px;">All Categories</h1>
        </div>
        <div class="table-responsive">
            <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">
                <i class="fas fa-plus"></i> Add Category
            </a>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Actions</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td class="d-flex">
                            <a href="{{ route('categories.edit', $category) }}" class="btn btn-primary mr-2">
                                <i class="fas fa-edit"></i>  Edit
                            </a>
                            <form action="{{ route('categories.destroy', $category) }}" method="post" class="d-inline">
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