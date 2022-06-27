<div class="row min-vh-100">
  <h1 class="text-center tuttigliannunci pt-5"> NAVIGA TRA I NOSTRI ANNUNCI</h1>
  <p class="text-center pb-1 counterannunci"> {{count($announces)}} annunci disponibili</p>
  
  @if(count($announces)>0)
  <div class="col-12 col-lg-3 mt-1">
    <form wire:submit.prevent="searching" class="justify-content-center align-items-center">
      <div class="form-floating my-3">
        <input wire:model="title" type="search" class="form-control" id="searchByTextInput" placeholder="{{__('ui.search-word')}}">
        <label for="searchByTextInput">{{__('ui.search-word')}}</label>
      </div>
      {{-- RICERCA PER UTENTE --}}
      {{-- <div class="form-floating my-3">
        <input wire:model="user" type="search" class="form-control" id="searchByUserInput" placeholder="Cerca per utente">
        <label for="searchByUserInput">Cerca per utente</label>
      </div> --}}
      <div class="form-floating my-3">
        <select wire:model="category" id="searchByCategoryInput" class="form-select" id="floatingSelect">
          <option value="all" selected>{{__('ui.all-cate')}}</option>
          @foreach ($categories as $category)
          <option value="{{$category->id}}">{{$category->name}}</option>
          @endforeach
        </select>
        <label for="floatingSelect">{{__('ui.search-cate')}}</label>
      </div>
      <div class="form-floating my-3">
        <select wire:model="sort" class="form-select" id="orderSelect">
          <option value="newest" selected>{{__('ui.newToOld')}}</option>
          <option value="oldest">{{__('ui.oldToNew')}}</option>
          <option value="fromCheaper">{{__('ui.cheapToHigh')}}</option>
          <option value="toCheaper">{{__('ui.highToCheap')}}</option>
          <option value="AtoZ">{{__('ui.AtoZ')}}</option>
          <option value="ZtoA">{{__('ui.ZtoA')}}</option>
        </select>
        <label for="orderSelect">{{__('ui.ord-ann')}}}}</label>
      </div>
      <div id="priceSearchRow" class="row mx-auto">
        <div id="minPriceInputDiv" class="form-floating my-2 pe-1 ps-0 w-50">
          <input wire:model="minPrice" type="number" class="form-control" id="minInput" placeholder="Min price">
          <label id="priceLabels" for="minInput">Min price</label>
        </div>
        <div id="maxPriceInputDiv" class="form-floating my-2 ps-1 pe-0 w-50">
          <input wire:model="maxPrice" type="number" class="form-control" id="maxInput" placeholder="Max price">
          <label id="priceLabels" for="maxInput">Max price</label>
        </div>
      </div>
    </form>
  </div>
  
    <div class="col-12 col-lg-9 mt-1">
        <div class="row">
          @foreach ($announces as $announce)
          <div class="allCards col-12 card px-0 mt-4 mobile-center">
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




