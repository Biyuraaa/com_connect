<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #151414b6;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #6ba488bc;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        button,
        input[type="text"],
        input[type="date"],
        input[type="file"],
        input[type="number"] {
            padding: 10px;
            border: none;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        button {
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .fa-edit,
        .fa-trash-alt {
            color: #007bff;
            cursor: pointer;
            margin-right: 5px;
        }

        nav {
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            width: 250px;
            background-color: #454f48e0;
            padding-top: 50px;
            transition: all 0.3s;
            z-index: 9999;
            color: white;
            overflow-x: hidden;
            scrollbar-width: none;
        }

        .side_navbar a,
        .side_navbar span {
            color: #f9f9f9;
        }

        .side_navbar i {
            color: #dadfce;
        }

        .side_navbar a:hover {
            background-color: #6ba488bc;
            color: #fbfffde0;
            border-radius: 25px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 9998;
            display: none;
        }

        .toggle-btn {
            position: absolute;
            top: 10px;
            right: 5px;
            color: #dadfce;
            cursor: pointer;
            z-index: 9999;
        }

        #sidebar.hide {
            width: 60px;
        }

        .overlay.collapsed {
            display: none;
        }

        .summary {
            margin-top: 20px;
            display: flex;
            flex-wrap: nowrap;
            overflow-x: auto;
        }

        .summary-item {
            width: calc(25% - 20px);
            margin-right: 20px;
            margin-bottom: 20px;
            padding: 20px;
            border-radius: 10px;
            background-color: #f8f9fa;
        }

        .summary-item.icon-wrapper {
            display: flex;
            align-items: center;
        }

        .summary-item.icon-counter {
            margin-left: 5px;
            padding: 5px 10px;
            background-color: #007bff;
            color: white;
            border-radius: 15px;
            font-weight: bold;
            font-size: 1.5rem;
        }

        .summary-item i {
            font-size: 36px;
            margin-right: 10px;
            padding: 10px;
            background-color: rgba(255, 255, 255, 0.5);
            border-radius: 50%;
        }

        .profile-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: block;
            margin-right: 10px;
        }

        .username-cell {
            display: flex;
            align-items: center;
        }
    </style>
</head>

<body>
    <header class="header">
        <div class="profile-and-search">
            <div class="logo"></div>
        </div>
    </header>
    @include('components.sidebar')
    <div class="overlay" onclick="toggleSidebar()"></div>

    <div class="main-body">
        <div class="user-table">
            <h2>User Data</h2>
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <table>
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Role</th>
                        <th>Usia</th>
                        <th colspan="2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->address }}</td>
                        <td>{{ $user->role == 'admin' ? 'Admin' : 'User' }}</td>
                        <td>{{ $user->age }}</td>
                        <td>
                            <button type="button" data-toggle="modal" data-target="#Edit_{{ $user->id }}">
                                <i class="fas fa-edit"></i>
                            </button>
                            <form action="" method="post" style="display:inline-block;">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    <div class="modal fade" id="Edit_{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Edit User</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="post" id="KegiatanEdit_{{ $user->id }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="name_{{ $user->id }}" class="col-form-label">Nama User:</label>
                                            <input type="text" class="form-control" id="name_{{ $user->id }}" name="name" value="{{ $user->name }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="address_{{ $user->id }}" class="col-form-label">Alamat:</label>
                                            <input type="text" class="form-control" id="address_{{ $user->id }}" name="address" value="{{ $user->address }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="age_{{ $user->id }}" class="col-form-label">Usia:</label>
                                            <input type="number" class="form-control" id="age_{{ $user->id }}" name="age" value="{{ $user->age }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="role_{{ $user->id }}" class="col-form-label">Role:</label>
                                            <select class="form-control" id="role_{{ $user->id }}" name="role">
                                                <option value="">Select Role</option>
                                                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                                <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                                            </select>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.querySelector('.overlay');
            sidebar.classList.toggle('hide');
            overlay.classList.toggle('collapsed');
        }

        if (document.getElementById('errorAlert')) {
            setTimeout(function() {
                document.getElementById('errorAlert').style.display = 'none';
            }, 5000); // Hide after 5 seconds
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
