<div class="container">
  <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 p-nav ">
    <a class="navbar-brand fs-1 montsterrant panna" href="{{route('welcome')}}">Presto</a>

    <ul class="nav col-12 col-md-auto justify-content-center mb-md-0 test-ul">
      <li>
        <a class="nav-link active pt-2 align-items-center" aria-current="page" href="{{route('welcome')}}">Home</a>
      </li>
      <li>
        <a class="nav-link " href="{{route('allAnnouncements')}}">Annunci</a>
      </li>
      @guest
      <li>
          <a class="nav-link btn btn-reg " href="{{route('register')}}">Registrati</a>
      </li>
      <li class="nav-item">
          <a class="nav-link btn btn-log " href="{{route('login')}}">Login</a>
      </li>
      @else
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-bs-toggle="dropdown" aria-expanded="false">Ciao {{Auth::user()->name}}</a>
        <ul class="dropdown-menu" aria-labelledby="dropdown03">
          <li class="nav-item">
            <a class="nav-link" href="#">I tuoi annunci</a>
          </li>
          <li>
            <a class="dropdown-item" href="#">Il tuo profilo</a>
          </li>
          <li>
            <a  class="nav-link"  href="/logout" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
              Logout
            </a>
            <form id="frm-logout" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link btn btn-reg " href="{{route('createAnnouncement')}}" tabindex="-1" aria-disabled="true">Aggiungi annuncio</a>
      </li>
      @endguest
    </ul>

    
  </header>
</div>

