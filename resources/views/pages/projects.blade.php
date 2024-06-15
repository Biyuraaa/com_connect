@extends('layouts.template')
@section('content')
 <section class="blog_section layout_padding">
    @if(session()->has('success'))
    <div class="alert alert-info" role="alert" id="errorAlert">
        {{ session('success') }}
      </div>
    @endif
    <div class="container">
      <div class="heading_container">
        <h2>
          Kegiatan Mendatang
        </h2>
      </div>
      <div class="row">
        @if ($projects->count() == 0)
        <h2>
          Belum ada Kegiatan
        </h2>
        @else
          @foreach ($projects as $project)
          <div class="col-md-6 col-lg-4 mx-auto">
            <div class="box">
              <div class="img-box">
                @if ($project->image)
                  <img src="{{ asset('assets/images/projects/' .$project->image) }}" alt="">
                @else
                  <img src="{{ asset('assets/images/b1.jpg') }}" alt="">
                @endif
              </div>
              <div class="detail-box">
                <h5>
                  {{ $project->name }}
                </h5>
                <p>
                  {{ $project->name }} ini akan dilakukan di {{ $project->location }}, pada {{ $project->date }}
                </p>
                <form action="{{route('projects.join')}}" method="post">
                  @method('POST')
                  @csrf
                  <input type="hidden" name="project_id" value="{{ $project->id }}">
                  @if (Auth::user())
                  <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                  @endif
                  <button type="submit" >
                      Daftar
                  </button>
                </form>
                
                
              </div>
            </div> 
          </div>  
        
          @endforeach
          @endif
        </div> 
         
  </section>
  @include('components.info')
@endsection