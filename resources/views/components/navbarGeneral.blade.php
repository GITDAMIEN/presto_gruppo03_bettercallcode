  <nav class="navbar navbar-expand-md presto-nav-general starryBg py-1 ">
    <div class="container-fluid">
      <a class="navbar-brand title-nav panna text-decoration-none fs-2" href="{{route('welcome')}}">Presto</a>
      <button class="navbar-toggler orange" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa-solid fa-ellipsis-vertical"></i>
      </button>
  
      <div class="collapse navbar-collapse" id="navbarsExample04">
        <ul class="navbar-nav ms-auto mb-2  mb-md-0">
          <li class="nav-item">
            <a class="nav-link active fs-6 px-4"  href="{{route('welcome')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fs-6 px-4" href="{{route('allAnnouncements')}}">Annunci</a>
          </li>
          @guest
          <li class="nav-item">
            <a class="nav-link fs-6 px-4" href="{{route('register')}}">Registrati</a>
        </li>
        <li class="nav-item">
            <a class="nav-link fs-6 px-4" href="{{route('login')}}">Log-in</a>
        </li>
        @else
        <li class="nav-item dropdown ">
          <a class="nav-link dropdown-toggle fs-6 px-4" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Ciao {{Auth::user()->name}}
          </a>
          <ul class="dropdown-menu text-center starryBg" aria-labelledby="dropdown04">
            <li>
              <a class="dropdown-item" href="#">Profilo</a>
            </li>
            <li>
              <a class="dropdown-item" href="#">I tuoi annunci</a>
            </li>
            @if (Auth::user()->is_revisor)     {{--  Se l'utente è un revisore  --}}                      
            <li>
              <a class="dropdown-item position-relative" href="{{route('revisor.index')}}">Zona revisore
            <span class="position-absolute top-50 badge-class translate-middle badge rounded-pill bg-danger">
                {{App\Models\Announcement::toBeRevisionedCount()}}
                <span class="visually-hidden">unread messages</span>
            </span>
            </a>
            </li>
            <li><hr class="dropdown-divider"></li>
            @else
            <li>
              <a class="dropdown-item ps-1" href="/#workWithUsContainerFluid">Diventa revisore</a>
            </li>
            <li><hr class="dropdown-divider"></li>
            @endif
            <a class="dropdown-item panna" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('frm-logout').submit();">Logout</a>      
            <form id="frm-logout" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
            </form>
          </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link fs-6 px-4" href="{{route('createAnnouncement')}}">Nuovo annuncio</a>
        </li>
          @endguest
        </ul>
      </div>
    </div>
  </nav>