@extends('layouts.template')
@section('content')
    <section class="slider_section long_section">
      <div id="customCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container ">
              <div class="row">
                <div class="col-md-5">
                  <div class="detail-box">
                    <h1>
                      Community Connect <br>
                      for connecting communities
                    </h1>
                    <p>
                      Community Connect siap menjadi wadah tempat berbagai komunitas sosial menyebarkan juga memberikan partisipasi dalam berbagai kegiatan sosial.
                    </p>
                    <div class="btn-box">
                      <a href="" class="btn1">
                        Contact Us
                      </a>
                      <a href="" class="btn2">
                        About Us
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-7">
                  <div class="img-box">
                    <img src="{{ asset('assets/images/connect1.png') }}" alt="slider" class="img-fluid">

                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container ">
              <div class="row">
                <div class="col-md-5">
                  <div class="detail-box">
                    <h1>
                      Community Connect <br>
                      for better social welfare
                    </h1>
                    <p>
                      Dengan Community Connect, segala kegiatan sosial dapat terfasilitasi dengan baik.
                    </p>
                    <div class="btn-box">
                      <a href="" class="btn1">
                        Contact Us
                      </a>
                      <a href="" class="btn2">
                        About Us
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-7">
                  <div class="img-box">
                    <img src="{{ asset('assets/images/connect2.png') }}" alt="slider" class="img-fluid">
                  </div>
                </div>
              </div>
            </div>
          </div>                
        </div>
        <ol class="carousel-indicators">
          <li data-target="#customCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#customCarousel" data-slide-to="1"></li>
          <li data-target="#customCarousel" data-slide-to="2"></li>
        </ol>
      </div>
    </section>
    <!-- end slider section -->
  </div>

  <!-- furniture section -->
  

  <section class="furniture_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          Our Features
        </h2>
        <p>
          
        </p>
      </div>
      <div class=" d-flex flex-row justify-content-center">
        <div class=" col-lg-4">
          <div class="box">
            <div class="img-box">
              <img src="{{ asset('assets/images/blood1.png') }}" alt="slider" class="img-fluid">
            </div>
            <div class="detail-box">
              <h5>
                Kegiatan Volunteer
              </h5>
              <div class="price_box">
                <h6 class="price_heading">
                  Kegiatan volunteer dibagi menjadi beberapa kategori, seperti kesehatan, lingkungan, pengabdian masyarakat, kampanye, dan sebagainya.
                </h6>
                <a href="">
                  Selengkapnya
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class=" col-lg-4">
          <div class="box">
            <div class="img-box">
              <img src="{{ asset('assets/images/rewards.png') }}" alt="slider" class="img-fluid">
            </div>
            <div class="detail-box">
              <h2>
                Poin dan Rewards
              </h2>
              <div class="price_box">
                <h6>
                  Pengguna yang telah menyelesaikan kontribusinya pada suatu kegiatan sosial dapat mengoleksi poin dan menukarkannya dengan rewards.
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
    
  </section>

  <!-- end furniture section -->


  <!-- about section -->

  <section class="about_section layout_padding long_section">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="img-box">
            <img src="{{ asset('assets/images/about.png') }}" alt="slider" class="img-fluid">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                About Us
              </h2>
            </div>
            <p>
              Community Connect adalah platform yang menyediakan fitur kepada pengguna untuk membagikan informasi kegiatan sosial juga menjadi partisipan dalam kegiatan sosial lainnya.
            </p>
            <a href="">
              Selengkapnya
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->

  <!-- blog section -->

  <section class="blog_section layout_padding">
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
                <img src="{{ asset('assets/assets/images/projects/' .$project->image) }}" alt="">
                @else
                <img src="{{ asset('assets/assets/images/b1.jpg') }}" alt="">
                @endif
              </div>
              <div class="detail-box">
                <h5>
                  {{ $project->name }}
                </h5>
                <p>
                  {{ $project->name }} ini akan dilakukan di {{ $project->location }}, pada {{ $project->date }}
                </p>
                <form action="" method="post">
                  @method('POST')
                  @csrf
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
    </div>
  </section>

  <!-- end blog section -->

  <!-- client section -->

  <section class="client_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container">
        <h2>
          Documentations
        </h2>
      </div>
      <div id="carouselExample2Controls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="row">
              <div class="col-md-11 col-lg-10 mx-auto">
                <div class="box">
                  <div class="img-box">
                    <img src="{{ asset('assets/images/client.jpg') }}" alt="" />
                  </div>
                  <div class="detail-box">
                    <div class="name">
                      <i class="fa fa-quote-left" aria-hidden="true"></i>
                      <h6>
                        Penggalangan Donasi
                      </h6>
                    </div>
                    <p>
                      Penggalangan Donasi yang ditujukan untuk para korban bencana banjir di Cianjur telah disampaikan kepada para warga setempat.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="row">
              <div class="col-md-11 col-lg-10 mx-auto">
                <div class="box">
                  <div class="img-box">
                    <img src="{{ asset('assets/images/client.jp') }}g" alt="" />
                  </div>
                  <div class="detail-box">
                    <div class="name">
                      <i class="fa fa-quote-left" aria-hidden="true"></i>
                      <h6>
                        Pengabdian Masyarakat
                      </h6>
                    </div>
                    <p>
                      Pengabdian Masyarakat yang diadakan di Desa A, Sidoarjo membuahkan para siswa yang menjadi semakin paham tentang penggunaan tools desain.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="row">
              <div class="col-md-11 col-lg-10 mx-auto">
                <div class="box">
                  <div class="img-box">
                    <img src="{{ asset('assets/images/client.jpg') }}" alt="" />
                  </div>
                  <div class="detail-box">
                    <div class="name">
                      <i class="fa fa-quote-left" aria-hidden="true"></i>
                      <h6>
                        From Waste to Use
                      </h6>
                    </div>
                    <p>
                      Kegiatan From Waste to Use telah berhasil meningkatkan keterampilan serta motivasi warga Kampung B, Banyuwangi untuk senantiasa mengurangi limbah plastik dengan memanfaatkannya kembali.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel_btn-container">
          <a class="carousel-control-prev" href="#carouselExample2Controls" role="button" data-slide="prev">
            <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExample2Controls" role="button" data-slide="next">
            <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- end client section -->

 <!-- login section -->

<!-- end contact section -->

 

  <!-- info section -->
  <section class="info_section long_section">

    <div class="container">
      <div class="contact_nav">
        <a href="">
          <i class="fa fa-phone" aria-hidden="true"></i>
          <span>
            Call : +01 123455678990
          </span>
        </a>
        <a href="">
          <i class="fa fa-envelope" aria-hidden="true"></i>
          <span>
            Email : community_connect@gmail.com
          </span>
        </a>
        <a href="">
          <i class="fa fa-map-marker" aria-hidden="true"></i>
          <span>
            Surabaya, Indonesia
          </span>
        </a>
      </div>

      
          </div>
          <div class="col-md-4">
            <div class="info_form">
              <h4>
                SIGN UP TO OUR NEWSLETTER
              </h4>
              <form action="">
                <input type="text" placeholder="Enter Your Email" />
                <button type="submit">
                  Subscribe
                </button>
              </form>
              <div class="social_box">
                <a href="">
                  <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
                <a href="">
                  <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
                <a href="">
                  <i class="fa fa-linkedin" aria-hidden="true"></i>
                </a>
                <a href="">
                  <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection