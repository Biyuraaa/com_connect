  @if (Auth::user()->role == 'user')
  <nav id="sidebar">
    <div class="side_navbar" id="side_navbar">
      <span class="hidden-text">Main Menu</span>
      <a class="item-nav" href="{{route('dashboard')}}"><i class="fas fa-home"></i> Back to Home</a>
      <a class="item-nav" href="{{route('profile.index')}}"><i class="fas fa-user"></i> My Profile</a>
      <a class="item-nav" href="{{route('projects.index')}}"><i class="fas fa-tasks"></i> My Projects</a>
      <a class="item-nav" href="{{route('wallets.index')}}"><i class="fas fa-wallet"></i> My Wallets</a>
      <a class="item-nav" href="{{route('rewards.index')}}"><i class="fas fa-coins"></i> My Rewards</a>
      <a class="item-nav" href="{{route('communities')}}"><i class="fas fa-users"></i> My Communities</a>

      <div class="links">
        <span class="hidden-text">Lainnya</span>
        <a class="item-nav" href="#"><i class="fas fa-cog"></i> Settings</a>
        <a class="item-nav" href="#"><i class="fas fa-address-book"></i> Contact</a>
        <a class="item-nav" href="#"><i class="fas fa-question-circle"></i> Help</a>
        <a class="item-nav" href="{{route('logout')}}"><i class="fas fa-sign-out-alt"></i> Log Out</a>
      </div>
    </div>
    <div class="toggle-btn" onclick="toggleSidebar()">
      <i class="fas fa-bars"></i>
    </div>
  </nav>
  @else
    <nav id="sidebar">
        <div class="side_navbar">
            <a href="{{route('dashboard')}}"><i class="fas fa-home"></i> Home</a>
            <a href="{{route('users.index')}}"><i class="fas fa-user-shield"></i> User</a>
            <a href="/admin/reward"><i class="fas fa-users"></i> Reward</a>
            <a href="#"><i class="fas fa-calendar-alt"></i> Event</a>
            <a href="#"><i class="fas fa-envelope"></i> Massage</a>
            <div class="links">
                <a href="#"><i class="fas fa-cog"></i> Settings</a>
                <a href="#"><i class="fas fa-question-circle"></i> Helpdesk</a>
                <a href="/logout"><i class="fas fa-sign-out-alt"></i> Log Out</a>
            </div>
        </div>
        <div class="toggle-btn" onclick="toggleSidebar()">
            <i class="fas fa-bars"></i>
        </div>
    </nav>
  @endif