<nav class="navbar navbar-expand-md {{Route::currentRouteName()=="welcome" ? 'fixed-top presto-nav' : 'presto-nav2'}}">
  <div id="navbarContainerfluid" class="container-fluid">
    <a class="navbar-brand {{Route::currentRouteName()=="welcome" ? 'panna title-nav' : 'starry title-nav2'}} text-decoration-none" href="{{route('welcome')}}">Presto</a>
    <button id="navbarTogglerBtn" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
      <i id="{{Route::currentRouteName()=="welcome" ? 'navbarTogglerIcon' : 'navbarTogglerIcon2'}}" class="fa-solid fa-ellipsis-vertical rotateIcon2"></i>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarsExample04">
      <ul class="navbar-nav ms-auto {{Route::currentRouteName()=="welcome" ? 'dropBgBig1' : 'dropBgBig2'}} mb-2 mb-md-0">
        <li class="nav-item">
          <a class="nav-link active fs-6 px-3 px-lg-4"  href="{{route('welcome')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fs-6 px-3 px-lg-4" href="{{route('allAnnouncements')}}">{{__('ui.ann')}}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fs-6 px-3 px-lg-4" href="{{route('createAnnouncement')}}">{{__('ui.new-ann')}}</a>
        </li>
        @guest
        <li class="nav-item">
          <a class="nav-link fs-6 px-3 px-lg-4" href="{{route('register')}}">{{__('ui.reg')}}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fs-6 px-3 px-lg-4" href="{{route('login')}}">Log-in</a>
        </li>
        @else
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle fs-6 px-3 px-lg-4" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{__('ui.ciao')}} {{Auth::user()->name}}
          </a>
          <ul class="dropdown-menu {{Route::currentRouteName()=="welcome" ? 'dropBgSmall1' : 'dropBgSmall2'}} shadow mx-auto text-center panna" aria-labelledby="dropdown04">
            <li>
              <a class="dropdown-item " href="#">{{__('ui.profilo')}}</a>
            </li>
            <li>
              <a class="dropdown-item" href="#">{{__('ui.your-ann')}}</a>
            </li>
            @if (Auth::user()->is_revisor)     {{--  Se l'utente è un revisore  --}}                      
            <li>
              <a class="dropdown-item position-relative" href="{{route('revisor.index')}}">{{__('ui.rev-zone')}}
                <span class="position-absolute top-50  badge-class translate-middle badge rounded-pill bg-danger">
                  {{App\Models\Announcement::toBeRevisionedCount()}}
                  <span class="visually-hidden">unread messages</span>
                </span>
              </a>
            </li>
            <li><hr class="dropdown-divider"></li>
            @else
            <li>
              <a class="dropdown-item ps-1" href="/#workWithUsContainerFluid">{{__('ui.bec-rev')}}</a>
            </li>
            <li><hr class="dropdown-divider"></li>
            @endif
            <a class="dropdown-item " href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('frm-logout').submit();">Logout</a>      
            <form id="frm-logout" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </ul>
        </li>
        @endguest
        <li id="languageLiDropdown" class="dropdown me-md-3 me-lg-5 mx-auto">
          <div class="d-none">{{$nation='it'}}</div>
          <a id="dropdownMenuLanguages" class="nav-link dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><span class="fi-{{$nation}} fi"></span></a>
          <ul id="languagesMenuUl" class="dropdown-menu shadow" aria-labelledby="dropdownMenuButton1">
            <li>
              <x-_locale class="dropdown-item" lang='it' nation='it'/>
            </li>
            <li>
              <x-_locale class="dropdown-item" lang='en' nation='gb'/>
            </li>
            <li>              
              <x-_locale class="dropdown-item" lang='es' nation='es'/>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>