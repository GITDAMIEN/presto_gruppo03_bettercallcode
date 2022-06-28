<form id="languagesMenuForm" action="{{route('set_language_locale', $lang)}}" method="POST" class="position-relative">
    @csrf
    <span id="languageTitle">{{$nation == 'it' ? 'Italiano' : ''}}{{$nation == 'gb' ? 'English' : ''}}{{$nation == 'es' ? 'Español' : ''}}</span>
    <button id="languagesBtns" type="submit" class="nav-link">
        <span class="fi-{{$nation}} fi"></span>
    </button>

</form>