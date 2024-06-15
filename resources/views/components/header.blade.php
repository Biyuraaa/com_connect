<header class="header_section long_section px-0">
  <nav class="navbar navbar-expand-lg custom_nav-container">
    <a class="navbar-brand" href="/">
      <span>
      C-connect
      </span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class=""> </span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <div class="d-flex mx-auto flex-column flex-lg-row align-items-center">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('about')}}"> About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('features')}}">Features</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('projects')}}">Projects</a>
          </li>
          @if (Auth::user())
          <li class="nav-item">
            <a class="nav-link" href="{{route('profile.index')}}">
              <i class="fa fa-user" aria-hidden="true"></i> Profile
            </a>
          </li>
          @else
          <li class="nav-item">
            <a class="nav-link" href="{{route('login')}}">login</a>
          </li> 
          @endif
           
          
          
        </ul>
        <div class="quote_btn-container">
          <form class="form-inline">
            <button class="btn my-2 my-sm-0 nav_search-btn" type="submit">
              <i class="fa fa-search" aria-hidden="true"></i>
            </button>
          </form>
        </div>
      </div>
    </div>
  </nav>
</header>