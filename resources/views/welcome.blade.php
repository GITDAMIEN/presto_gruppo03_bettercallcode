<x-layout>
    <x-slot name="title">Homepage</x-slot>
    
    @if(session('access.denied'))
        <div class="deniedAccess alert alert-danger text-center">
            {{session('access.denied')}}
            @if(Auth::check())
            <div class="text-center mt-2">
                <a href="/#workWithUsContainerFluid" class="btn btn-warning">Diventa revisore!</a>
            </div>
            @else
            <div class="text-center mt-2">
                <a href="register" class="btn btn-warning">Registrati e diventa revisore!</a>
            </div>
            @endif
        </div>
    @endif

    @if(session('message'))
        <div class="alert alert-success text-center welcomePageMessage">
            {{session('message')}}
        </div>
    @endif

    <div class="container-fluid p-0 m-0">
        <div class="row p-0 m-0">
            <div class="col-12 p-0 m-0">
                <div class="cover d-flex justify-content-start align-items-center">
                    <div class="boxTitle">
                        <h1 class="title">Presto.it</h1>
                        <p class="subtitle">Compra e vendi con facilità... Ovunque ti trovi !</p>
                        <div class="row mx-0 px-0">
                            <div class="col-12 col-md-6">
                                <a href="{{route('allAnnouncements')}}">
                                    <button type="button" class="customBtnBuy mt-4">Compra</button>
                                </a>
                            </div>
                            <div class="col-12 col-md-6">
                                <a href="{{route('createAnnouncement')}}">
                                    <button type="button" class="customBtnSell mt-4">Vendi</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid customBg">
            <p class="text-center fs-2 panna ultimiAnnunci mb-5">GLI ULTIMI ANNUNCI INSERITI</p>
        <div class="row">
            <livewire:last-announcements/>
        </div>
    </div>


    <section class="container">
        <p class="text-center fs-2 nostreCategorie mb-5">LE NOSTRE CATEGORIE</p>
        <div class="row justify-content-evenly">
                @foreach ($categories as $category)
                    <div class="col-12 col-md-2 mt-4">
                        <a href="{{route('categoryShow',$category->id)}}"">
                        <div class="cardCategory d-flex justify-content-center align-items-center mx-auto" style='background-image: url("{{$category->coverImg}}")'>
                            {{-- <div>
                                <p class="lato bold fs-5 uppercase text-center">{{$category->name}}</p>
                                <p class="lato counterAnnunci text-center">+100 annunci</p>
                            </div> --}}
                        </div>
                        </a>
                    </div>
                    @if($category->id==5)
                    <div class="row">    
                    </div>
                    @endif
                @endforeach
        </div>
    </section>

    <section class="container test">
        <div class="row">
                <div class="col-12 col-md-3">
                     <img class="img-fluid" src="media/donna.png" alt="">
                </div>
                <div class="col-12 col-md-4 d-flex justify-content-center align-items-center">
                    <div class="inserisci-annuncio-box">
                        <p class="title-annuncio-box">Comicia a guadagnare</p>
                        <p class="subtitle-annuncio-box">Vendi il più presto possibile i prodotti che non usi piu' !</p>
                    </div>
                </div>
                <div class="col-12 col-md-4 d-flex justify-content-center align-items-center">
                    <div>
                        <a href="{{route('createAnnouncement')}}" class="btnP bouncy">Inserisci annuncio</a>
                    </div>
                </div>
        </div>
    </section>

    @if(!Auth::check())
    <div id="becomeRevisorDiv" class="container">
        <div class="row text-center my-5 card">
            <h4 class="my-4">Diventa revisore per Presto.it!</h4>
            <a class="btn btn-success col-4 offset-md-4 mb-4" href="register">Registrati e diventa revisore</a>
        </div>
    </div>
    @endif
    
    <!-- Work with us -->
    
    @if(Auth::check() && !Auth::user()->is_revisor)
    <section id="workWithUsContainerFluid" class="container-fluid d-flex justify-content-center px-0 mt-5">
        <div class="container my-5 mx-md-0 px-md-0">
            <div id="contactUsRow" class="row mx-4 mx-md-0">
                <div id="contactUsLeftPart" class="col-12 col-md-5 customBlack ubuntuFont mx-5 mx-md-3 mt-md-4 mt-lg-5">
                    <div id="contactUsWords">
                        <p id="wannaWorkWithUs" class="">Lavora con noi!</p>
                        <h6 class="bounce_button fw-bold">DIVENTA REVISORE<i class="fa-solid fa-circle-arrow-down ms-2"></i></h6>
                    </div>
                    <img src="/media/contactUsGialloCiocco.svg" alt="Contact us image" class="w-100 mb-3 mb-md-0">
                </div>
                <livewire:revisor-form>
            </div>
        </div>
    </section>
    @endif

<x-footer></x-footer>
</x-layout>