<div class="container-fluid p-0 m-0">
    <header class="d-flex  align-items-center justify-content-center justify-content-md-between mb-4 ps-5 papayaBg presto-nav-general">
      <a href="{{route('welcome')}}" class=" title-nav panna d-flex align-items-center text-decoration-none">
        Presto
      </a>
  
      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0" id="generalNavBarUl">
        <li><a href="{{route('welcome')}}" class="nav-link px-4 fs-5 lato">Home</a></li>
        <li><a href="{{route('allAnnouncements')}}" class="nav-link px-4 lato fs-5">Annunci</a></li>
        @guest    
        <li class="nav-item">
            <a class="nav-link px-4 fs-5" href="{{route('register')}}">Registrati</a>
        </li>
        <li class="nav-item">
            <a class="nav-link px-4 fs-5" href="{{route('login')}}">Log-in</a>
        </li>
        @else
        <li class="nav-item">
            <a class="nav-link px-4 fs-5" href="{{route('createAnnouncement')}}">Nuovo annuncio</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle fs-5 pe-0" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Ciao {{Auth::user()->name}}
          </a>
          <ul class="dropdown-menu mt-3" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Profilo</a></li>
              <li><a class="dropdown-item" href="#">I miei annunci</a></li>
              
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
              @endif
              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('frm-logout').submit();">Logout</a>      
              <form id="frm-logout" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
              </form>
          </ul>
      </li>
      @endguest
      </ul>
    </header>
  </div>