<nav class="navbar navbar-expand-md navbar-dark  bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{route('welcome')}}">Store</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav ms-auto mb-2 mb-md-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('welcome')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('allAnnouncements')}}">Annunci</a>
        </li>
        @guest
        <li class="nav-item">
          <a class="nav-link" href="{{route('register')}}">Registrati</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('login')}}">Login</a>
        </li>
        @else
        <li class="nav-item">
          <a class="nav-link" href="">Ciao {{Auth::user()->name}}</a>
        </li class="nav-item">
        <a  class="nav-link"  href="/logout" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
          Logout
        </a> 
        <form id="frm-logout" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form>
        <li class="nav-item">
          <a class="nav-link " href="{{route('createAnnouncement')}}" tabindex="-1" aria-disabled="true">Aggiungi annuncio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">I tuoi annunci</a>
        </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>