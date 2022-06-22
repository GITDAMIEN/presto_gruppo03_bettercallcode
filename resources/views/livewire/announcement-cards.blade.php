<div class="">
  <form wire:submit.prevent="searching">

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
@if(count($announces)>0)
<div class="row">
  @foreach ($announces as $announce)
  <div class="col-12 col-lg-4 text-center" id=>
    <div class="card" style="width: 18rem;">
        <img src="https://source.unsplash.com/200x200" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">{{$announce->title}}</h5>
          <p class="card-text">{{$announce->description}}</p>
          <span class="card-text">Categoria :</span>
          <a href="{{route('categoryShow',$announce->category)}}" class="card-text">{{$announce->category->name}}</a>
          <p class="card-text mt-2">{{$announce->price}} €</p>
          <p class="card-text">Creato da : {{$announce->user->name}}</p>
          <p class="card-text">Creato il : {{$announce->created_at->format('d/m/Y')}}</p>
          <a href="{{route('detailsAnnounce',$announce)}}" class="btn btn-primary">Dettagli</a>
        </div>
      </div>
  </div>
  @endforeach
</div>
</div>
@else

@endif




