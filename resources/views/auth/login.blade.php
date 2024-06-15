@extends('layouts.template')
@section('content')
 @if (session('error'))
    <div class="alert alert-danger" role="alert" id="errorAlert">
        {{ session('error') }}
    </div>
    @endif
  <!-- login section -->
  <div class="d-flex justify-content-center">
    <section class="contact_section long_section">
      <div class="container">
        <div class="row">
          <div class="">
            <div class="form_container">
              <div class="heading_container">
                <h2>
                  Login
                </h2>
              </div>
              @if ($errors->any())
                <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif
              <form action="{{ route('login') }}" method="post">
                @method('POST')
                @csrf
                <div>
                  <input type="text" placeholder="Email"  name="email"/>
                </div>
                <div>
                  <input type="password" placeholder="Password" name="password"/>
                </div>
                <div class="btn_box">
                  <button type="submit">
                    LOGIN
                  </button>
                </div>
              </form>
              
              <!-- New section for registration link -->
              <div class="register_link">
                <p>Belum pernah mendaftar? <a href="{{route('register')}}">Register</a></p>
              </div>
              <!-- End of new section -->
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection