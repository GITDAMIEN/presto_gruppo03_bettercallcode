<div >
  <div class="row">
    <div class="col-6 m-auto">
      <form wire:submit.prevent="searching" class="justify-content-center align-items-center">
    </div>
    
  </div>

    <div class="col-3 mt-5">
      <div class="form-floating my-3">
          <input wire:model="title" type="search" class="form-control" id="searchByTextInput" placeholder="Cerca per parola">
          <label for="searchByTextInput">Cerca per parola</label>
      </div>
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
  </div>
  </form>

 <div class="container">
  <div class="row">
    @if(count($announces)>0)
    <div class="row">
      @foreach ($announces as $announce)
      <div class="col-12 col-lg-4 text-center" id=>
        <a href="{{route('detailsAnnounce',$announce)}}">
          <div class="skill-card mb-4">
              <header class="skill-card__header"><img class="skill-card__icon" src="https://source.unsplash.com/350x350" alt="Immagine bella"></header>
              <section class="skill-card__body">
                  <h2 class="skill-card__title">{{$announce->title}}</h2><a href="{{route('categoryShow',$announce->category)}}" class="skill-card__duration__category">{{$announce->category->name}}</a>
                  <p class="skill-card__duration">{{$announce->price}}€</p>
                  <ul class="skill-card__knowledge p-0">
                      <li class="text-center">{{$announce->description}}</li>
          
                      <li class="created my-3">Creato da {{$announce->user->name}} il {{$announce->created_at->format('d/m/Y')}}</li>
                      <li><a href="{{route('detailsAnnounce',$announce)}}" class="btn btnPersonalizzato">Dettagli</a></li>
                  </ul>
              </section>
          </div>
          </a>
      </div>
      @endforeach
    </div>
    
    
    </div>
    @else
    
    <p>Non ci sono annunci</p>
    
    @endif

  </div>
  </div> 




