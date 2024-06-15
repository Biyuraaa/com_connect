@extends('layouts.auth')
@section('content')
  <div class="main-body">
    <div class="profile-and-search">
      <div class="profile-container">
        <div class="profile-image">
          @if (Auth::user()->image)
          <img id="profile-picture" src="{{ asset('assets/images/users/'.Auth::user()->image) }}" alt="Profile Picture">   
          @else
          <img id="profile-picture" src="{{ asset('assets/images/icon2.jpg') }}" alt="Profile Picture">
          @endif
         
        </div>
        <div class="profile-details">
          <h2 id="profile-name">My Profile</h2>
          <p>Usia: {{ Auth::user()->age }}</p>
          <p>Poin: {{ Auth::user()->point }}</p>
          <a href="{{route('profile.edit')}}"> Edit Profile</a>
        </div>
      </div>
      <div class="search_box">
        <input type="text" placeholder="Search">
        <i class="fas fa-search"></i>
      </div>
    </div>

    <div class="promo_card">
      <h1>Halo, {{ Auth::user()->name }}!</h1>
      <span>Lorem ipsum dolor sit amet.</span>
      <button>Learn More</button>
    </div>

    <div class="history_lists">
      <div class="list1">
        <div class="row">
          <h4>History</h4>
          <a href="#">See all</a>
        </div>
        <table>
          <thead>
            <tr>
              <th>Name</th>
              <th>Amouth</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($rewardHistory as $reward)
                <tr>
                    <td>
                      {{ $reward->name }}
                    </td>
                    <td>
                      {{ $reward->points }}
                    </td>
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <div class="list2">
        <div class="row">
          <h4>Documents</h4>
          <a href="#">Upload</a>
        </div>
        <table>
          <thead>
            <tr>
              <th>#</th>
              <th>Title</th>
              <th>Type</th>
              <th>Uploaded</th>
            </tr>
          </thead>
          <tbody>
            <!-- Isi tabel di sini -->
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection