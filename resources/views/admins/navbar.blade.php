<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    {{-- <li class="nav-item d-none d-sm-inline-block">
      <a href="index3.html" class="nav-link">Home</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="#" class="nav-link">Contact</a>
    </li> --}}
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
      <i class="far fa-bell"></i>
      <span class="badge badge-warning navbar-badge">15</span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
      <span class="dropdown-item dropdown-header">15 Notifications</span>
      <div class="dropdown-divider"></div>
      <a href="#" class="dropdown-item">
      <i class="fas fa-envelope mr-2"></i> 4 new messages
      <span class="float-right text-muted text-sm">3 mins</span>
      </a>
      <div class="dropdown-divider"></div>
      <a href="#" class="dropdown-item">
      <i class="fas fa-users mr-2"></i> 8 friend requests
      <span class="float-right text-muted text-sm">12 hours</span>
      </a>
      <div class="dropdown-divider"></div>
      <a href="#" class="dropdown-item">
      <i class="fas fa-file mr-2"></i> 3 new reports
      <span class="float-right text-muted text-sm">2 days</span>
      </a>
      <div class="dropdown-divider"></div>
      <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
      </div>
      </li>
    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>
    <li class="nav-item dropdown open" style="padding-left: 15px;">
      <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
           <img class="img-size-50 mr-3 img-circle" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
      </a>
      <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item"  href="" > <i class="fas fa-user "></i> Profil</a>
            <a class="dropdown-item" href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt "></i>  Deconnexion </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
      </div>
  </li>
  </ul>
</nav>