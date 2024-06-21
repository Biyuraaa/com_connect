@extends('dashboard.layouts.template')

@section('content')
    <div class="content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-truncate" style="max-width: 500px;">Detail Communities</h1>
        </div>
        <div class="table-responsive">
            <a href="{{ route('communities.index') }}" class="btn btn-primary mb-3">
                <i class="fas fa-backspace"></i> Back
            </a>

            <div class="card">
                <div class="card-header">
                    <h3>{{ $community->name }}</h3>
                </div>
                <div class="card-body">
                    <p><strong>Description:</strong> {{ $community->description }}</p>
                    <p><strong>Category:</strong> {{ $community->category->name }}</p>
                    <p><strong>Leader:</strong> {{ $community->leader->name }}</p>
                    <h4>Members</h4>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Joined at</th>
                                <th>Is Active</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($community->user_communities as $user_community)
                                <tr>
                                    <td>{{ $user_community->user->name }}</td>
                                    <td>{{ $user_community->user->email }}</td>
                                    <td>{{ $user_community->role }}</td>
                                    <td>{{ $user_community->created_at }}</td>
                                    <td>{{ $user_community->is_active ? 'Yes' : 'No' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
