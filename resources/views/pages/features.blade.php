@extends('layouts.template')
@section('content')
  <section class="furniture_section layout_padding d-flex justify-content-center">
    <div class="container">
     
      <div class="heading_container">
        <h2>
          Our Features
        </h2>
        <p>

        </p>
      </div>
      <div class="row">
        <div class="col-md-6 col-lg-4">
          <div class="box">
            <div class="img-box">
              <img src="{{ asset('assets/images/blood1.png') }}" alt="charity" class="img-fluid">
            </div>
            <div class="detail-box">
              <h5>
                Kegiatan Volounteer
              </h5>
              <div class="price_box">
                <h6 class="price_heading">
                  <span></span> 
                </h6>
                <a href="">
                Selengkapnya
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="box">
            <div class="img-box">
              <img src="{{ asset('assets/images/donasi1.png') }}" alt="slider" class="img-fluid">
            </div>
            <div class="detail-box">
              <h5>
                Poin&Rewards
              </h5>
              <div class="price_box">
                <h6 class="price_heading">
                  <span></span> 
                </h6>
                <a href="">
                  Selengkapnya
                </a>
              </div>
            </div>
          </div>
        </div>
        
        </div>
      </div>
    </div>
  </section>
@include('components.info')
@endsection