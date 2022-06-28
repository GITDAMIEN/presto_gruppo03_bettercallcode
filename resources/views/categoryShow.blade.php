<x-layout>
  <x-slot name="title">
    {{__('ui.cate')}} {{$category->name}}
  </x-slot>
    {{-- <h1 class="text-center my-5">Stai visualizzando la categoria {{$category->name}}</h1>
    <div class="container">
        <div class="row">
          @foreach ($category->announcements as $announce)
          <div class="col-12 col-lg-4 text-center">
            <div class="card" style="width: 18rem;">
                <img src="https://source.unsplash.com/200x200" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{$announce->title}}</h5>
                  <p class="card-text">{{$announce->description}}</p>
                  <span class="card-text">{{__('ui.cate')}} :</span>
                  <a href="" class="card-text">{{$announce->category->name}}</a>
                  <p class="card-text mt-2">{{$announce->price}} €</p>
                  <p class="card-text">{{__('ui.create')}} : {{$announce->user->name}}</p>
                  <p class="card-text">{{__('ui.creatAt')}} : {{$announce->created_at->format('d/m/Y')}}</p>
                </div>
              </div>
          </div>
          @endforeach
        </div>
      </div> --}}
<div class="container min-vh-100">
  <h1 class="text-center my-5 tuttigliannunci">{{$category->name}}</h1>
  
  <div class="row">
    {{-- <p class="text-center pb-1 counterannunci"> {{count($announces)}} annunci disponibili</p> --}}
    @if(count($category->announcements)>0)

    
      <div class="col-12 mt-1">
          <div class="row">
            @foreach ($category->announcements as $announce)
            <div class="allCardsCat col-12 card px-0 mt-4 mobile-center">
              <div class="row">
                <div class="col-12 col-md-3 ps-2 pe-0">
                  <img src="{{!$announce->images()->get()->isEmpty() ? $announce->images()->first()->getUrl(600,450) : 'https://source.unsplash.com/220x220'}}" alt="Immagine bella" class="img-fluid">
                </div>
                <div class="col-12 col-md-6 px-4 mt-3">
                  <a class="lato fw-bolder fs-5" href="{{route('detailsAnnounce',$announce)}}">{{$announce->title}}</a>
                  <a href="{{route('categoryShow',$announce->category)}}"><p>{{$announce->category->name}}</p></a>
                  <p> {{$announce->description}}</p>
                  <a href="{{route('detailsAnnounce',$announce)}}" class="panna"> <p class="btn starryBg panna mt-1">{{__('ui.details')}}</p></a>
                </div>
                <div class="col-12 col-md-3 px-4">
                    <p class="lato btn bg-success panna text-end mb-0 mt-3">{{$announce->price}}€</p>
                    <div class="row">
                      <div class="col-12">
                        <p class=" lato fs-pers mt-pers mb-0">{{__('ui.create')}} {{$announce->user->name}} {{__('ui.at')}} {{$announce->created_at->format('d/m/Y')}}</p>
                      </div>
                    </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
      </div>
  
  
  
      @else
      <div class="container mt-5 py-5">
        <div class="row">
            <div class="col-12 d-flex justify-content-center align-items-center">
                <div class="aa ps-5">
                    <a href="{{route('createAnnouncement')}}" class="btnPd">{{__('ui.add-first-ann')}}</a>
                </div>
            </div>
        </div>
    </div>
    @endif

  </div>

</div>
      <x-footerGeneral></x-footergeneral>
</x-layout>
