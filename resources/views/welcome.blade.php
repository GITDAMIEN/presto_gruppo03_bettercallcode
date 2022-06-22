<x-layout>

    <x-slot name="title">Homepage</x-slot>
    <h1>Helloooo</h1>

    
    @if(session('access.denied'))
        <div class="alert alert-danger">
            {{session('access.denied')}}
        </div>
        @if(Auth::check())
            <a href="{{route('allAnnouncements')}}">Diventa revisore!</a>
        @else
            <a href="register">Registrati e diventa revisore!</a>
        @endif
    @endif

</x-layout>