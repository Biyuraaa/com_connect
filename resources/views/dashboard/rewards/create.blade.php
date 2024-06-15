@extends('dashboard.layouts.template')

@section('content')
    <div class="content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-truncate" style="max-width: 500px;">Add New Reward</h1>
        </div>
        <a href="{{ route('rewards.index') }}" class="btn btn-primary mb-3">
            <i class="fas fa-backward"></i> Back
        </a>
        @if ($errors->any())
          @foreach ($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
              {{ $error }}
            </div>
          @endforeach
        @endif
        <div class="table-responsive">
          <form action="{{ route('rewards.store') }}" method="POST">
              @csrf
              <div class="mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" class="form-control" id="name" name="name" required>
              </div>
              <div class="mb-3">
                  <label for="description" class="form-label">Description</label>
                  <textarea class="form-control" id="description" name="description"></textarea>
              </div>
              <div class="mb-3">
                  <label for="points" class="form-label">Points</label>
                  <input type="number" class="form-control" id="points" name="points" required>
              </div>
              <div class="mb-3">
                  <label for="price" class="form-label">Price</label>
                  <input type="number" class="form-control" id="price" name="price" step="0.01" required>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
    </div>
@endsection
