@extends('dashboard.layouts.template')

@section('content')
    <div class="content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-truncate" style="max-width: 500px;">All Communities</h1>
        </div>
        <div class="table-responsive">
            <a href="{{ route('communities.create') }}" class="btn btn-primary mb-3">
                <i class="fas fa-plus"></i> Add New Community
            </a>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Leader</th>
                        <th>Category</th>
                        <th>Actions</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($communities as $community)
                    <tr>
                        <td>{{ $community->name }}</td>
                        <td>{{ $community->description }}</td>
                        <td>{{ $community->leader->name }}</td>
                        <td>{{ $community->category->name }}</td>
                        <td class="d-flex">
                            <a href="{{ route('communities.edit', $community) }}" class="btn btn-primary mr-2">
                                <i class="fas fa-edit"></i>  Edit
                            </a>
                            <a href="{{ route('communities.show', $community) }}" class="btn btn-info mr-2">
                              <i class="fas fa-eye"></i> View
                            </a>
                            <form action="{{ route('communities.destroy', $community) }}" method="post" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this community?');">
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