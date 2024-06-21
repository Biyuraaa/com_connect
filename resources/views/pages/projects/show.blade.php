@extends('layouts.template')

@section('content')
<section class="blog_section layout_padding" style="padding: 20px;">
    @if(session()->has('success'))
    <div class="alert alert-info" role="alert" id="errorAlert" style="margin-bottom: 20px;">
        {{ session('success') }}
    </div>
    @endif
    <div class="container">
        <div class="heading_container" style="margin-bottom: 20px;">
            <h2>
                Detail Project
            </h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="project-detail" style="padding: 20px; border: 1px solid #ddd; border-radius: 5px; background-color: #f9f9f9;">
                    @if($project->image)
                    <img src="{{ asset('assets/image/projects/' . $project->image) }}" alt="{{ $project->name }}" class="img-fluid" style="width: 100%; height: auto; margin-bottom: 20px;">
                    @endif
                    <h3 style="margin-top: 20px; margin-bottom: 20px;">{{ $project->name }}</h3>
                    <p>{{ $project->description }}</p>
                    <p><strong>Date:</strong> {{ $project->date }}</p>
                    <p><strong>Location:</strong> {{ $project->location }}</p>
                    <p><strong>Organizer:</strong> {{ $organizer->name }}</p>
                    <p><strong>Category:</strong> {{ $category->name }}</p>
                    <p><strong>Status:</strong> {{ ucfirst($project->status) }}</p>
                    <p><strong>Capacity:</strong> {{ $project->capacity }}</p>
                    <form action="{{ route('projects.join') }}" method="post" style="margin-bottom: 20px;">
                        @method('POST')
                        @csrf
                        <input type="hidden" name="project_id" value="{{ $project->id }}">
                        @if (Auth::user())
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        @endif
                        <button type="submit" class="btn btn-primary">
                            Daftar
                        </button>
                    </form>
                    <h4 style="margin-top: 20px; margin-bottom: 20px;">Participants:</h4>
                    @if ($participants->count() == 0)
                    <p>No participants yet</p>
                    @else
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($participants as $participant)
                                <tr>
                                    <td>{{ $participant->user->name }}</td>
                                    <td>{{ $participant->user->email }}</td>
                                    <td>{{ $participant->user->phone }}</td>
                                    <td>{{ $participant->user->address }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@include('components.info')
@endsection
