@extends('dashboard.layouts.template')

@section('content')
    <div class="content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-truncate" style="max-width: 500px;">All Users</h1>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Alamat</th>
                        <th>Phone</th>
                        <th>Tanggal Lahir</th>
                        <th>Usia</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role == 'admin' ? 'Admin' : 'User' }}</td>
                        <td>{{ $user->address }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->date_of_birth  }}</td>
                        <td>{{ $user->age }}</td>
                        <td class="d-flex">
                            <a href="{{ route('users.edit', $user) }}" class="btn btn-primary mr-2">
                                <i class="fas fa-edit"></i>  Edit
                            </a>
                            <a href="{{ route('users.show', $user) }}" class="btn btn-info mr-2">
                                <i class="fas fa-eye"></i> View
                            </a>
                            <form action="{{ route('users.destroy', $user) }}" method="post" class="d-inline">
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