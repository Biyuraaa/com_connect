@extends('dashboard.layouts.template')

@section('content')
    <div class="content">
        <h1 class="mb-4">Dashboard</h1>
        <p>Welcome to the admin dashboard</p>

        <div class="row mt-3">
            <div class="col-md-3">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-header">Total Users</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $users->count() }}</h5>
                        <p class="card-text">Registered users</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-success mb-3">
                    <div class="card-header">Total Books</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $communities->count() }}</h5>
                        <p class="card-text">Books available</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-header">Total Sales</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $projects->count() }}</h5>
                        <p class="card-text">Completed sales</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-header">Total Revenue</div>
                    <div class="card-body">
                        <h5 class="card-title">Rp. </h5>
                        <p class="card-text">Total earnings</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Upcoming Projects</div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Orginazer</th>
                                    <th>Date</th>
                                    <th>Location</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($upcomingProjects->isEmpty())
                                    <tr>
                                        <td colspan="5">No upcoming projects</td>
                                    </tr>
                                @else
                                @foreach ($upcomingProjects as $project)
                                <tr>
                                    <td>{{ $project->name }}</td>
                                    <td>{{ $project->organizer }}</td>
                                    <td>{{ $project->date }}</td>
                                    <td>{{ $project->location }}</td>
                                    <td>{{ $project->status }}</td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Books Sold by Category</div>
                    <div class="card-body">
                        <div id="categorySalesChart"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Sales Status Comparison</div>
                    <div class="card-body">
                        <div id="salesStatusPieChart"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Books Count by Category</div>
                    <div class="card-body">
                        <div id="bookChart"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Monthly Sales</div>
                    <div class="card-body">
                        <div id="monthlySalesChart"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Top Users by Spending</div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Total Spending</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
   
@endsection




