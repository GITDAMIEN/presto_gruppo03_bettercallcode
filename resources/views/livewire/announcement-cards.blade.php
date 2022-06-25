<div class="row" >
  
  <div class="col-12 col-lg-3 mt-5">
    <form wire:submit.prevent="searching" class="justify-content-center align-items-center">
      <div class="form-floating my-3">
        <input wire:model="title" type="search" class="form-control" id="searchByTextInput" placeholder="Cerca per parola">
        <label for="searchByTextInput">Cerca per parola</label>
      </div>
      {{-- RICERCA PER UTENTE --}}
      {{-- <div class="form-floating my-3">
        <input wire:model="user" type="search" class="form-control" id="searchByUserInput" placeholder="Cerca per utente">
        <label for="searchByUserInput">Cerca per utente</label>
      </div> --}}
      <div class="form-floating my-3">
        <select wire:model="category" id="searchByCategoryInput" class="form-select" id="floatingSelect">
          <option value="all" selected>Tutte le categorie</option>
          @foreach ($categories as $category)
          <option value="{{$category->id}}">{{$category->name}}</option>
          @endforeach
        </select>
        <label for="floatingSelect">Scegli la categoria</label>
      </div>
      <div class="form-floating my-3">
        <select wire:model="sort" class="form-select" id="orderSelect">
          <option value="newest" selected>Dal più recente al più vecchio</option>
          <option value="oldest">Dal più vecchio al più recente</option>
          <option value="fromCheaper">Dal più economico al più costoso</option>
          <option value="toCheaper">Dal più costoso al più economico</option>
          <option value="AtoZ">Dalla A alla Z</option>
          <option value="ZtoA">Dalla Z alla A</option>
        </select>
        <label for="orderSelect">Ordina annunci</label>
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
  
  <div class="col-12 col-lg-9 mt-5">
    @if(count($announces)>0)
      <div class="row my-1 mx-3">
        @foreach ($announces as $announce)
        <div class="allCards col-12 card px-0 my-2">
          <div class="row justify-content-between">
            <div class="col-3 ps-2 pe-0">
              <img src="{{!$announce->images()->get()->isEmpty() ? Storage::url($announce->images()->first()->path) : 'https://source.unsplash.com/230x200'}}" alt="Immagine bella" class="img-fluid">
            </div>
            <div id="infoDiv" class="col-9 pt-3 px-0">
              <p class="cardH2"><a href="{{route('detailsAnnounce',$announce)}}">{{$announce->title}}</a></p>
              <span class="priceSpan">{{$announce->price}}€</span>
              <a href="{{route('categoryShow',$announce->category)}}" class="d-block categoryA">{{$announce->category->name}}</a>
              <p class="descriptionP">{{$announce->description}}</p>
              <p class="detailsP"><a href="{{route('detailsAnnounce',$announce)}}" class="btn btnPersonalizzato">Dettagli</a></p>
              <span class="my-3 createdSpan">Creato da {{$announce->user->name}} il {{$announce->created_at->format('d/m/Y')}}</span>
            </div>
          </div>
        </div>
        @endforeach
        {{-- {{$announces->links()}} --}}
      </div>
    @else
      <p>Non ci sono annunci</p>
    @endif
  </div>
</div> 




