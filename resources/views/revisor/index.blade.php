<x-layout>
    <x-navbarGeneral></x-navbarGeneral>
    
    <x-slot name="title">
        Zona revisore
    </x-slot>
    
    <div class="container">
        <div class="row">
            <h2 class="col-12 text-center my-4">
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
    <div class="container mt-4 position-relative">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="row revisionBox justify-content-center justify-content-lg-between mx-auto">
                    <div class="col-12 col-lg-3 imgDiv mx-lg-0 px-0 d-flex justify-content-center align-items-center">
                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" data-bs-interval="false">
                            <div class="carousel-inner divDiv">
                                @foreach ($announcement_to_check->images as $image)
                                <div class="carousel-item {{$loop->index==0 ? 'active' : ''}} bellaFotoDiv">
                                    <img src="{{!$announcement_to_check->images()->get()->isEmpty() ?  $image->getUrl(600,450) : 'https://source.unsplash.com/220x220'}}" alt="Immagine bella" class="bellaFoto img-fluid">
                                </div>
                                @endforeach
                            </div>
                            <button id="prevNext" class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                <i class="fa-solid fa-circle-left fs-4 text-danger"></i>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button id="prevNext" class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                <i class="fa-solid fa-circle-right fs-4 text-danger"></i>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                    <div class="infoBox col-12 col-lg-8 mx-lg-0 mt-2 mt-lg-0 ms-lg-2 text-center text-lg-start">
                        <div class="row">
                            <div class="col-12 col-lg-8 mt-2 mt-lg-0 rowToCheck ms-lg-2 text-center text-lg-start">
                                <label id="titleToCheckLabel" for="titleToCheck" class="revisionLabels mt-lg-2">Titolo annuncio:</label>
                                <h4 id="titleToCheck" class="titleToCheck my-0 py-0">{{$announcement_to_check->title}}</h4>
                                <label id="categoryToCheckLabel" for="categoryToCheck" class="revisionLabels">Categoria:</label>
                                <h5 id="categoryToCheck" class="mb-0 categoryToCheck"><a href="{{route('categoryShow',$announcement_to_check->category)}}">{{$announcement_to_check->category->name}}</a></h5>
                                <label id="descriptionToCheckLabel" for="descriptionToCheck" class="revisionLabels">Descrizione:</label>
                                <h5 id="descriptionToCheck" class="my-0 descriptionToCheck mx-auto">{{$announcement_to_check->description}}</h5>
                            </div>
                            <div class="col-12 col-lg-3 mt-5 pt-4 mt-lg-1 pt-lg-2 priceAndCreated text-center text-lg-end">
                                <div class="priceToCheckDiv">
                                    <label id="priceLabel" for="priceToCheck" class="revisionLabels">Prezzo:</label>
                                    <h5 id="priceToCheck" class="mb-0 priceToCheck">{{$announcement_to_check->price}}€</h5>
                                </div>
                                <div class="createdToCheckDiv">
                                    <p class="mb-0 mt-3 created createdToCheck">Caricato da {{$announcement_to_check->user->name}} il {{$announcement_to_check->created_at->format('d/m/Y')}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="buttonsRow row justify-content-center text-center mx-auto px-auto">
            <div class="col-12 col-lg-6 text-lg-end my-2">
                <form method="POST" action="{{route('revisor.accept_announcement', ['announcement'=>$announcement_to_check])}}">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-success revisorBtns fs-5">Accetta annuncio<i class="ms-2 fa-solid fa-circle-check"></i></button>
                </form>
            </div>
            <div class="col-12 col-lg-6 text-lg-start my-2">
                <form method="POST" action="{{route('revisor.refuse_announcement', ['announcement'=>$announcement_to_check])}}">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-danger revisorBtns fs-5">Rifiuta annuncio<i class="ms-2 fa-solid fa-circle-xmark"></i></button>
                </form>
            </div>
        </div>
    </div>
    @endif
    
    <section id="lastRevisionedAnnouncements">
        {{-- ULTIMI ANNUNCI ACCETTATI --}}
        <div class="container mt-5 pt-5">
            <div class="row justify-content-center">
                <h2 class="col-12 text-center my-4 mt-lg-5 py-2">Gli ultimi annunci accettati</h2>
                @if($announcesOK)
                    <p class="d-none">{{$countOK=0}}</p>
                @foreach ($announcesOK as $announceOK)
                <p class="d-none">{{$countOK++}}</p>
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
                @if ($countOK<=0)
                    <p class="text-center">Nessun annuncio accettato finora</p>                    
                @endif
            </div>
        </div>
        
        
        {{-- ULTIMI ANNUNCI RIFIUTATI --}}
        <div class="container mt-5">
            <div class="row justify-content-center">
                <h2 class="col-12 text-center my-3 py-2">Gli ultimi annunci rifiutati</h2>
                @if($announcesNO)
                    <p class="d-none">{{$countNO=0}}</p>
                @foreach ($announcesNO as $announceNO)
                <p class="d-none">{{$countNO++}}</p>
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
                @if ($countNO<=0)
                    <p class="text-center">Nessun annuncio rifiutato finora</p>                    
                @endif
            </div>
        </div>
        
    </section>
    
    <x-footerGeneral></x-footergeneral>
    </x-layout>