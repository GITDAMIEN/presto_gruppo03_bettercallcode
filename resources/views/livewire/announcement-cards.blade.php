<div class="row min-vh-100 " id="cardsRow">
  <h1 class="text-center tuttigliannunci pt-5"> {{__('ui.all-navigate')}}</h1>
  {{-- <p class="text-center pb-1 counterannunci"> {{count($announces)}} {{__('ui.all-category-number')}}</p> --}}
  
  <div class="col-12 col-lg-2 ps-3 mt-1 px-md-5 pe-lg-0 ps-lg-3">
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
        <label for="orderSelect">{{__('ui.ord-ann')}}</label>
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
      <div class="row mx-auto mt-3">
        <button type="submit" class="searchBtn mx-auto">{{__('ui.searchbtn')}}</button>
      </div>
    </form>
  </div>
  
  @if(count($announces)>0)
    <div class="col-12 col-lg-10 mt-1">
        <div class="row mx-auto">
          @foreach ($announces as $announce)
            <div class="col-12 col-md-6 col-lg-3 pt-4">
              <div class="Mycard mx-auto" style="width: 95%;">
                <div class="d-flex justify-content-center align-items-center">
                    <img src="{{!$announce->images()->get()->isEmpty() ? $announce->images()->first()->getUrl(600,450) : 'https://source.unsplash.com/220x220'}}" class="card-img-top" alt="...">
                </div>
                <div class="card-body">
                  <div class="boxtile text-center">
                    <h6 class="card-title pe-3 pt-1 lato">{{$announce->title}}</h6>
                  </div>
                  <div class="buttonbox mt-3">
                    <p class="lato text-start fw-bolder mt-2 ps-4 ms-3 ">{{$announce->price}}€</p>
                    <a href="{{route('detailsAnnounce',$announce)}}" class="btn custombtnBg panna mb-3 mt-1 ms-pers">{{__('ui.details')}}</a>
                  </div>
                </div>

            </div>
          </div>
          @endforeach
        </div>
    </div>
        {{-- richiamo paginazione --}}
        {{$announces->links()}}


    @else


          <div class="col-8 d-flex justify-content-center align-items-center">
              <div class="aa ps-5">
                  <a href="{{route('createAnnouncement')}}" class="btnPd">{{__('ui.add-first-ann')}}</a>
              </div>
          </div>
    @endif

</div> 




