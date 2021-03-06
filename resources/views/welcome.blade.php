<x-layout>
    <x-slot name="title">{{__('ui.home')}}</x-slot>
    
    @if(session('access.denied'))
    <div class="deniedAccess alert alert-danger text-center">
        {{session('access.denied')}}
        @if(Auth::check())
        <div class="text-center mt-2">
            <a href="/#workWithUsContainerFluid" class="btn btn-warning">{{__('ui.bec-rev')}}!</a>
        </div>
        @else
        <div class="col-12">
            <a href="register" class="btn btn-warning">{{__('ui.reg-bec-rev')}}!</a>
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
                        <p class="subtitle">{{__('ui.home-title')}}</p>
                        <div class="row mx-0 px-0">
                            <div class="col-12 col-md-6">
                                <a href="{{route('allAnnouncements')}}">
                                    <button type="button" class="customBtnBuy mt-4">{{__('ui.buy')}}</button>
                                </a>
                            </div>
                            <div class="col-12 col-md-6">
                                <a href="{{route('createAnnouncement')}}">
                                    <button type="button" class="customBtnSell mt-4">{{__('ui.sell')}}</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container-fluid customBg">
        <p class="text-center fs-2 panna ultimiAnnunci mb-5">{{__('ui.last-ann')}}</p>
        <div class="row">
            <livewire:last-announcements/>
        </div>
    </div>
    
    
    <section class="container">
        <p class="text-center fs-2 nostreCategorie mb-5">{{__('ui.our-cate')}}</p>
        <div class="row justify-content-evenly">
            @foreach ($categories as $category)
            <div class="col-12 col-md-4 col-lg-2 mt-4">
                <a href="{{route('categoryShow',$category->id)}}">
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
    
    <section id="cominciaAGuadagnareSection" class="container test">
        <div class="row align-items-md-center">
            <div class="col-12 col-md-3">
                <img class="img-fluid" src="media/donna.png" alt="">
            </div>
            <div class="col-12 col-md-4 d-flex justify-content-center align-items-center">
                <div class="inserisci-annuncio-box text-center text-md-start py-md-4">
                    <p class="title-annuncio-box">{{__('ui.start-earn')}}</p>
                    <p class="subtitle-annuncio-box">{{__('ui.home-mess')}} !</p>
                </div>
            </div>
            <div class="col-12 col-md-5 d-flex justify-content-center align-items-center my-4 my-md-0">
                <div>
                    <a href="{{route('createAnnouncement')}}" class="btnP bouncy d-block">{{__('ui.add-ann')}} </a>
                </div>
            </div>
        </div>
    </section>

    
    
    @if(!Auth::check())
    <div id="becomeRevisorDiv" class="container">
        <div id="becomeRevisorDiv2" class="row text-center my-5 card shadow">
            <h4 class="my-4">{{__('ui.bec-rev-presto')}}</h4>
            <a class="btn papayaBg panna col-10 offset-1 col-md-6 offset-md-3 mb-4 becRevBtn" href="register">{{__('ui.reg-bec-rev')}} </a>
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
                        <p id="wannaWorkWithUs" class="panna">{{__('ui.work-wu')}}</p>
                        <h6 class="bounce_button fw-bold panna">{{__('ui.bec-rev-g')}}<i class="fa-solid fa-circle-arrow-down ms-2 panna"></i></h6>
                    </div>
                    <img src="/media/contactUsStarry.svg" alt="Contact us image" class="w-100 mb-3 mb-md-0">
                </div>
                <livewire:revisor-form>
            </div>
        </div>
    </section>
    @endif

    
    {{-- RECENSIONI --}}
    <div class="container mb-5 pt-5">
        <p class="text-center fs-2 diconoDiNoi mb-5">{{__('ui.ratingsTitle')}}</p>
        <div class="row g-2">
            <div class="col-md-4">
                <div class="card-rating p-3 text-center px-4">
                    <div class="user-image">                        
                        <img src="https://images.unsplash.com/photo-1542909168-82c3e7fdca5c?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80" class="rounded-circle" width="80">
                    </div>
                    <div class="user-content">
                        <h5 class="mb-0">Luca Ferrero</h5>
                        <span>{{__('ui.firstrevtitle')}}</span>
                        <p>{{__('ui.firstrev')}}</p>
                    </div>
                    <div class="ratings">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-rating p-3 text-center px-4">
                    <div class="user-image">
                        <img src="https://images.unsplash.com/photo-1597223557154-721c1cecc4b0?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80" class="rounded-circle" width="80">
                    </div>
                    <div class="user-content">
                        <h5 class="mb-0">Alessia Ambrosini</h5>
                        <span>{{__('ui.secondrevtitle')}}</span>
                        <p>{{__('ui.secondrev')}}</p>
                    </div>
                    <div class="ratings">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card-rating p-3 text-center px-4">
                    <div class="user-image">
                        <img src="https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80" class="rounded-circle" width="80">
                    </div>
                    <div class="user-content">
                        <h5 class="mb-0">Matteo Spada</h5>
                        <span>{{__('ui.thirdrevtitle')}}</span>
                        <p>{{__('ui.thirdrev')}}</p>
                    </div>
                    <div class="ratings">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <livewire:newsletter/>
    
</x-layout>