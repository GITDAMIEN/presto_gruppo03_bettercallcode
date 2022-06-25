<x-layout>
    <x-navbarGeneral></x-navbarGeneral>
    
    <x-slot name="title">
        Zona revisore
    </x-slot>

    <div class="container">
        <div class="row">
            <h2 class="col-12 text-center my-3">
                {{$announcement_to_check ? "Annuncio da revisionare:" : "Non ci sono annunci da revisionare"}}
            </h2>
        </div>
    </div>
    
    @if(session('message'))
    <div class="alert alert-success text-center">
        {{session('message')}}
    </div>
    @endif
    
    {{-- ANNUNCI DA REVISIONARE --}}
    @if($announcement_to_check)
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="row revisionBox justify-content-between">
                    <div class="col-3 imgDiv px-0 d-flex justify-content-center align-items-center">
                        @foreach ($announcement_to_check->images as $image)
                            <img src="{{Storage::url($image->path)}}" class="bellaFoto img-fluid">
                        @endforeach
                    </div>
                    <div class="col-8 rowToCheck ms-2">
                        <h4 class="titleToCheck">Titolo annuncio: {{$announcement_to_check->title}}</h4>
                        <p class="mb-0 categoryToCheck">Categoria: {{$announcement_to_check->category->name}}</p>
                        <p class="mb-0 descriptionToCheck">Descrizione: {{$announcement_to_check->description}}</p>
                        <div class="priceAndCreated">
                            <p class="mb-0 priceToCheck">Prezzo: {{$announcement_to_check->price}}€</p>
                            <p class="mb-0 created createdToCheck">Caricato da {{$announcement_to_check->user->name}} il {{$announcement_to_check->created_at->format('d/m/Y')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center text-center mt-4">
            <div class="col-3 text-end">
                <form method="POST" action="{{route('revisor.accept_announcement', ['announcement'=>$announcement_to_check])}}">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-success revisorBtns fs-5">Accetta annuncio<i class="ms-2 fa-solid fa-circle-check"></i></button>
                </form>
            </div>
            <div class="col-3 text-start">
                <form method="POST" action="{{route('revisor.refuse_announcement', ['announcement'=>$announcement_to_check])}}">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-danger revisorBtns fs-5">Rifiuta annuncio<i class="ms-2 fa-solid fa-circle-xmark"></i></button>
                </form>
            </div>
        </div>
    </div>
    @endif
    
    {{-- ULTIMI ANNUNCI ACCETTATI --}}
    <div class="container mt-5">
        <div class="row justify-content-center">
            <h2 class="col-12 text-center my-3 py-2">Gli ultimi annunci accettati</h2>
            @if($announcesOK)
            @foreach ($announcesOK as $announceOK)
            <div class="row my-2 py-2 align-items-center announceCard justify-content-between">
                <div class="col-9">
                    <div class="d-flex justify-content-between">
                        <div>
                            <span class="titleSpan me-2">{{$announceOK->title}}</span>
                            <span>({{$announceOK->category->name}})</span>
                        </div>
                        <span>Prezzo: {{$announceOK->price}}€</span>
                    </div>
                    <div class="row position-relative">
                        <div class="col-8">{{$announceOK->description}}</div>
                        <div class="col-4 created createdOKNO text-end">Caricato da {{$announceOK->user->name}} il {{$announceOK->created_at->format('d/m/Y')}}</div>    
                    </div>   
                </div>
                <div class="col-3 text-end">
                    <form method="POST" action="{{route('revisor.refuse_announcement', ['announcement'=>$announceOK])}}">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-warning revisorBtns">Annulla revisione e rifiuta annuncio</button>
                    </form>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>

        
    {{-- ULTIMI ANNUNCI RIFIUTATI --}}
    <div class="container mt-5">
        <div class="row justify-content-center">
            <h2 class="col-12 text-center my-3 py-2">Gli ultimi annunci rifiutati</h2>
            @if($announcesNO)
            @foreach ($announcesNO as $announceNO)
            <div class="row my-2 py-2 align-items-center announceCard justify-content-between">
                <div class="col-9">
                    <div class="d-flex justify-content-between">
                        <div>
                            <span class="titleSpan me-2">{{$announceNO->title}}</span>
                            <span>({{$announceNO->category->name}})</span>
                        </div>
                        <span>Prezzo: {{$announceNO->price}}€</span>
                    </div>
                    <div class="row position-relative">
                        <div class="col-8">{{$announceNO->description}}</div>
                        <div class="col-4 created createdOKNO text-end">Caricato da {{$announceNO->user->name}} il {{$announceNO->created_at->format('d/m/Y')}}</div>    
                    </div>   
                </div>
                <div class="col-3 text-end">
                    <form method="POST" action="{{route('revisor.accept_announcement', ['announcement'=>$announceNO])}}">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-warning revisorBtns">Annulla revisione e accetta annuncio</button>
                    </form>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
    
    <x-footerGeneral></x-footergeneral>
    </x-layout>