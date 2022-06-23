<x-layout>
    <x-slot name="title">Homepage</x-slot>
    
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

    @if(session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
    @endif

    <div class="container-fluid p-0 m-0">
        <div class="row">
            <div class="col-12">
                <div class="cover d-flex justify-content-start align-items-center">
                    <div class="boxTitle">
                        <h1 class="title">Presto.it</h1>
                        <p class="paytone fs-5 panna">Compra e vendi con facilità... Ovunque ti trovi !</p>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <button type="button" class="customBtnBuy mt-4">Compra</button>
                            </div>
                            <div class="col-12 col-md-6">
                                <button type="button" class="customBtnSell mt-4">Vendi</button>
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
        <p class="text-center fs-2 panna nostreCategorie mb-5">LE NOSTRE CATEGORIE</p>
        <div class="row justify-content-evenly">
                @foreach ($categories as $category)
                    <div class="col-12 col-md-2 mt-4">
                        <a href="{{route('categoryShow',$category->id)}}"">
                        <div class="cardCategory d-flex justify-content-center align-items-center">
                            <div>
                                <p class="lato bold fs-5 uppercase text-center">{{$category->name}}</p>
                                <p class="lato counterAnnunci text-center">+100 annunci</p>
                            </div>
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

    @if(Auth::check() && !Auth::user()->is_revisor)
        <div class="container">
            <div class="row text-center my-5">
                <h5>Diventa revisore per Presto.it!</h5>
                <a class="btn btn-success" href="{{route('becomeRevisor')}}">Diventa revisore</a>
            </div>
        </div>
    @endif
</x-layout>