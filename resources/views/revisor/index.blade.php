<x-layout>
    
    <x-slot name="title">
        {{__('ui.rev-zone')}}
    </x-slot>
    
    <div class="container">
        <div class="row">
            <h2 class="col-12 text-center my-2 papaya fw-bold">
                {{$announcement_to_check ? __('ui.ann-rev') : __('ui.ann-rev-no')}}
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
<div class="container px-4 px-lg-5 mb-2 mb-lg-5 mt-4 mt-md-3 mt-lg-4">
    <div class="row gx-4 gx-lg-5 align-items-center">
        <div class="col-md-6">
            <div id="carouselTest" class="carousel slide carousel-fade" data-mdb-ride="carousel">
                <!-- Slides -->
                
                <div class="carousel-inner shadow-1-strong rounded-3 my-auto">
                    @foreach ($announcement_to_check->images as $image)
                    <div class="carousel-item @if($loop->first)active @endif">
                        <img src="{{!$announcement_to_check->images()->get()->isEmpty() ? $image->getUrl(600,450) : 'https://source.unsplash.com/230x200'}}" alt="Immagine bella" class="d-block w-100">
                    </div>
                    @endforeach
                </div>
                <!-- Slides -->
                
                <!-- Controls -->
                <button class="carousel-control-prev" type="button" data-mdb-target="#carouselTest"
                data-mdb-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-mdb-target="#carouselTest"
                data-mdb-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            
                <div class="carousel-indicators gap-1">
                    @foreach ($announcement_to_check->images as $image)
                    <button id="thumbnailsBtns" type="button" data-mdb-target="#carouselTest" data-mdb-slide-to="{{$loop->index}}" class="@if($loop->first)active @endif" aria-current="true" aria-label="Slide 1" style="width: 100px;">
                        <img class="d-block w-100 shadow-1-strong rounded"
                        src="{{!$announcement_to_check->images()->get()->isEmpty() ? $image->getUrl(600,450) : 'https://source.unsplash.com/230x200'}}" class="img-fluid" />
                    </button>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-6 mt-5 mt-lg-3">
            <h1 class="display-5 fw-bolder starry">{{$announcement_to_check->title}}</h1>
            <h5 class="fs-5"><a href="{{route('categoryShow',$announcement_to_check->category)}}">{{$announcement_to_check->category->name}}</a></h5>
            <div class="fs-5 mb-5">
                <span>{{$announcement_to_check->price}} €</span>
            </div>
            <p class="descrizioneTest">{{$announcement_to_check->description}}</p>
            <div class="d-flex">
                <div class="">
                    <p class="mb-0 mt-5 created">{{__('ui.uploadBy')}} {{$announcement_to_check->user->name}} {{__('ui.at')}} {{$announcement_to_check->created_at->format('d/m/Y')}}</p>
                </div>
            </div>
            <div class="d-none d-lg-flex justify-content-start gap-3">
                <div class="text-lg-end mt-4">
                    <form method="POST" action="{{route('revisor.accept_announcement', ['announcement'=>$announcement_to_check])}}">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-success revisorBtnAccept fs-5">{{__('ui.acc-ann')}}<i class="ms-2 fa-solid fa-circle-check"></i></button>
                    </form>
                </div>
                <div class="text-lg-start mt-4">
                    <form method="POST" action="{{route('revisor.refuse_announcement', ['announcement'=>$announcement_to_check])}}">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-danger revisorBtnRefuse fs-5">{{__('ui.rif-ann')}}<i class="ms-2 fa-solid fa-circle-xmark"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center text-center mt-5 mx-auto px-auto">
        <div class="card-body">
            <h5 class="tc-accent d-inline">{{__('ui.contentcheck')}}:</h5>
            <span class="ms-3">{{__('ui.adult')}}:<span class="{{$image->adult}} ms-2"></span></span>
            <span class="ms-3">{{__('ui.spoof')}}:<span class="{{$image->spoof}} ms-2"></span></span>
            <span class="ms-3">{{__('ui.medical')}}:<span class="{{$image->medical}} ms-2"></span></span>
            <span class="ms-3">{{__('ui.violence')}}:<span class="{{$image->violence}} ms-2"></span></span>
            <span class="ms-3">{{__('ui.racy')}}:<span class="{{$image->racy}} ms-2"></span></span>
        </div>
    </div>
    <div class="d-lg-none d-md-flex gap-3 justify-content-center text-center mx-auto mt-3 px-auto">
        <div class="text-lg-end mt-2">
            <form method="POST" action="{{route('revisor.accept_announcement', ['announcement'=>$announcement_to_check])}}">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-success revisorBtnAccept fs-5">{{__('ui.acc-ann')}}<i class="ms-2 fa-solid fa-circle-check"></i></button>
            </form>
        </div>
        <div class="text-lg-start mt-2">
            <form method="POST" action="{{route('revisor.refuse_announcement', ['announcement'=>$announcement_to_check])}}">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-danger revisorBtnRefuse fs-5">{{__('ui.rif-ann')}}<i class="ms-2 fa-solid fa-circle-xmark"></i></button>
            </form>
        </div>
    </div>
</div>
@endif


<section id="lastRevisionedAnnouncements">
    {{-- ULTIMI ANNUNCI ACCETTATI --}}
    <div class="container mt-2 pt-2 mt-lg-5 pt-lg-5">
        <div class="row justify-content-center">
            <h2 class="col-12 text-center my-4 mt-lg-5 py-2">{{__('ui.last-ann-acc')}}</h2>
            @if($announcesOK)
            <p class="d-none">{{$countOK=0}}</p>
            @foreach ($announcesOK as $announceOK)
            <p class="d-none">{{$countOK++}}</p>
            <div class="row py-2 align-items-start announceCard justify-content-between mb-1 mt-3 my-lg-2">
                <div class="col-12 col-lg-9 mt-2 mx-lg-0">
                    <div class="d-flex justify-content-between">
                        <div>
                            <span class="titleSpan me-2">{{$announceOK->title}}</span>
                            <span>({{$announceOK->category->name}})</span>
                        </div>
                        <span id="priceSpanRevisor" class="text-end">{{__('ui.price')}}: {{$announceOK->price}}€</span>
                    </div>
                    <div class="row position-relative">
                        <div class="col-12 col-md-8 my-2">{{$announceOK->description}}</div>
                        <div class="col-12 col-md-4 created createdOKNO text-center text-md-end mt-2">{{__('ui.uploadBy')}} {{$announceOK->user->name}} il {{$announceOK->created_at->format('d/m/Y')}}</div>    
                    </div>   
                </div>
                <div class="d-none d-lg-block col-lg-3 text-center mx-lg-0 align-self-lg-center undoLgBtn">
                    <form method="POST" action="{{route('revisor.refuse_announcement', ['announcement'=>$announceOK])}}">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-warning revisorBtns">{{__('ui.rif-ann-btn')}}</button>
                    </form>
                </div>
            </div>
            <div class="d-lg-none col-12 text-center">
                <form method="POST" action="{{route('revisor.refuse_announcement', ['announcement'=>$announceOK])}}">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-warning revisorBtns">{{__('ui.rif-ann-btn')}}</button>
                </form>
            </div>
            @endforeach
            @endif
            @if ($countOK<=0)
            <p class="text-center">{{__('ui.rif-ann-no')}}</p>                    
            @endif
        </div>
    </div>
    
    
    {{-- ULTIMI ANNUNCI RIFIUTATI --}}
    <div class="container">
        <div class="row justify-content-center">
            <h2 class="col-12 text-center my-4 mt-lg-5 py-2">{{__('ui.last-ann-rif')}}</h2>
            @if($announcesNO)
            <p class="d-none">{{$countNO=0}}</p>
            @foreach ($announcesNO as $announceNO)
            <p class="d-none">{{$countNO++}}</p>
            <div class="row py-2 align-items-start announceCard justify-content-between mb-1 mt-3 my-lg-2">
                <div class="col-12 col-lg-9 mt-2 mx-lg-0">
                    <div class="d-flex justify-content-between">
                        <div>
                            <span class="titleSpan me-2">{{$announceNO->title}}</span>
                            <span>({{$announceNO->category->name}})</span>
                        </div>
                        <span id="priceSpanRevisor" class="text-end">{{__('ui.price')}}: {{$announceNO->price}}€</span>
                    </div>
                    <div class="row position-relative">
                        <div class="col-12 col-md-8 my-2">{{$announceNO->description}}</div>
                        <div class="col-12 col-md-4 created createdOKNO text-center text-md-end mt-2">{{__('ui.uploadBy')}} {{$announceNO->user->name}} {{__('ui.at')}} {{$announceNO->created_at->format('d/m/Y')}}</div>    
                    </div>   
                </div>
                <div class="d-none d-lg-block col-lg-3 text-center mx-lg-0 align-self-lg-center undoLgBtn">
                    <form method="POST" action="{{route('revisor.accept_announcement', ['announcement'=>$announceNO])}}">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-warning revisorBtns">{{__('ui.rif-ann-btn')}}</button>
                    </form>
                </div>
            </div>
            <div class="d-lg-none col-12 text-center">
                <form method="POST" action="{{route('revisor.accept_announcement', ['announcement'=>$announceNO])}}">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-warning revisorBtns">{{__('ui.ann-rev-acc-ann')}}</button>
                </form>
            </div>
            @endforeach
            @endif
            @if ($countNO<=0)
            <p class="text-center">{{__('ui.acc-ann-no')}}</p>                    
            @endif
        </div>
    </div>
    
</section>

</x-layout>