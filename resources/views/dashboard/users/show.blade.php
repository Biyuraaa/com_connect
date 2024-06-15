@extends('layouts.auth')

@section('content')
 <div class="main-body">
   <div class="row justify-content-center">
       <div class="col-md-8">
            <a href="{{ route('users.index') }}" class="btn btn-primary">Back</a>
           <div class="card mt-5">
               <div class="card-header">
                   <h2>User Details</h2>
               </div>
               <div class="card-body">
                   <h3>{{ $user->name }}</h3>
                   <p>Email: {{ $user->email }}</p>
                    <p>Address: {{ $user->address }}</p>
                    <p>Phone: {{ $user->phone }}</p>
                    <p>Date of Birth: {{ $user->date_of_birth }}</p>
                    <p>Age: {{ $user->age }}</p>
                    <p>Gender {{$user->gender}}</p>
                   <p>Role: {{ ucfirst($user->role) }}</p>

                   <hr>

                   <h4>Communities</h4>
                   @if($user->user_communities->isEmpty())
                       <p>No communities joined.</p>
                   @else
                       <ul>
                           @foreach($user->user_communities as $community)
                               <li>{{ $community->community->name }} - {{ $community->community->description }}</li>
                           @endforeach
                       </ul>
                   @endif

                   <hr>

                   <h4>Projects</h4>
                   @if($user->user_projects->isEmpty())
                       <p>No projects participated.</p>
                   @else
                       <ul>
                           @foreach($user->projects as $project)
                               <li>{{ $project->name }} - {{ $project->description }}</li>
                           @endforeach
                       </ul>
                   @endif

                   <hr>

                   <h4>Reward History</h4>
                   @if($user->user_rewards->isEmpty())
                       <p>No rewards claimed.</p>
                   @else
                       <ul>
                           @foreach($user->rewards as $reward)
                               <li>{{ $reward->name }} - {{ $reward->status }} - {{ $reward->points }} points</li>
                           @endforeach
                       </ul>
                   @endif
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
