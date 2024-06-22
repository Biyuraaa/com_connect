@extends('layouts.auth')

@section('content')
<div class="main-body">
    <div class="content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-truncate" style="max-width: 500px;">Detail Project</h1>
        </div>
        @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif
        @if ($errors->any())
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                {{ $error }}
            </div>
            @endforeach
        @endif
        <a href="{{ route('projects.index') }}" class="btn btn-primary mb-4">Back</a>
        <div class="card mb-4">
            <div class="card-body">
                <h2>{{ $project->name }}</h2>
                <p>{{ $project->description }}</p>
                <p><strong>Date:</strong> {{ $project->date }}</p>
                <p><strong>Location:</strong> {{ $project->location }}</p>
                <p><strong>Organizer:</strong> {{ $organizer->name }}</p>
                <p><strong>Category:</strong> {{ $category->name }}</p>
                <p><strong>Status:</strong> {{ ucfirst($project->status) }}</p>
                <p><strong>Capacity:</strong> {{ $project->capacity }}</p>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h3>Participants</h3>
                @if ($participants->isEmpty())
                <p>No participants yet.</p>
                @else
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($participants as $participant)
                            <tr>
                                <td>{{ $participant->user->name }}</td>
                                <td>{{ $participant->user->email }}</td>
                                <td>{{ $participant->user->phone }}</td>
                                <td>{{ $participant->user->address }}</td>
                                <td>{{ $participant->role }}</td>
                                <td>
                                  <a href="{{route('projects.participant' , ['user' => $participant->user_id, 'project' => $project->id])}}" class="btn btn-info">View Participant</a>
                                    @if (Auth::user()->id == $project->organizer_id)
                                    <button class="btn btn-success" data-toggle="modal" data-target="#giveRewardModal" data-participant="{{ $participant->id }}">Give Reward</button>
                                    <form action="{{ route('projects.remove', ['project' => $project->id, 'user' => $participant->user_id]) }}" method="post" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Remove</button>
                                    </form>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
<div class="modal fade" id="giveRewardModal" tabindex="-1" role="dialog" aria-labelledby="giveRewardModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{ route('rewards.give') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="giveRewardModalLabel">Give Reward</h5>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="user_id" id="user_id" value="{{$participant->id}}">
                    <input type="hidden" name="project_id" id="project_id" value="{{$project->id}}">
                    <div class="form-group">
                        <label for="reward_id" class="col-form-label">Select Reward</label>
                        <select name="reward_id" id="reward_id" class="form-control custom-select" required>
                            @foreach($rewards as $reward)
                                <option value="{{ $reward->id }}">{{ $reward->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Give Reward</button>
                </div>
            </form>
        </div>
    </div>
</div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Give Reward Modal -->



<script>
    $('#giveRewardModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var participantId = button.data('participant');
        var modal = $(this);
        modal.find('.modal-body #participant_id').val(participantId);
    });
</script>

@endsection
