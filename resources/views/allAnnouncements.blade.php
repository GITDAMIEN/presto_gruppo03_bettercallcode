<x-layout>
    <h1 class="text-center">TUTTI GLI ANNUNCI</h1>

    @if (session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
    @endif
    
    <div class="container">
        <div class="row">
            <div class="col-3 mt-5">
                <div class="form-floating my-3">
                    <input type="text" class="form-control" id="searchByTextInput" placeholder="Cerca per parola">
                    <label for="searchByTextInput">Cerca per parola</label>
                </div>
                <div class="form-floating my-3">
                    <select id="searchByCategoryInput" class="form-select" id="floatingSelect">
                        <option value="all" selected>Tutte le categorie</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    <label for="floatingSelect">Scegli la categoria</label>
                </div>
                <div class="form-floating my-3">
                    <select class="form-select" id="orderSelect">
                        <option value="recentToOlder" selected>Dal più recente al più vecchio</option>
                        <option value="olderToRecent">Dal più vecchio al più recente</option>
                        <option value="fromCheaper">Dal più economico al più costoso</option>
                        <option value="toCheaper">Dal più costoso al più economico</option>
                        <option value="aToZ">Dalla A alla Z</option>
                        <option value="zToA">Dalla Z alla A</option>
                    </select>
                    <label for="orderSelect">Ordina annunci</label>
                </div>
                <div id="priceSearchRow" class="row mx-auto">
                    <div id="minPriceInputDiv" class="form-floating my-2 pe-1 ps-0 w-50">
                        <input type="number" class="form-control" id="minInput" placeholder="Min price">
                        <label id="priceLabels" for="minInput">Min price</label>
                    </div>
                    <div id="maxPriceInputDiv" class="form-floating my-2 ps-1 pe-0 w-50">
                        <input type="number" class="form-control" id="maxInput" placeholder="Max price">
                        <label id="priceLabels" for="maxInput">Max price</label>
                    </div>
                </div>
                <div id="searchFilterBtnCol" class="col-4 m-auto text-center">
                    <button id="searchFilterBtn" class="">Cerca</button>
                </div>
            </div>
            <div class="col-9 mt-5">
                <livewire:announcement-cards/>
            </div>
        </div>
    </div>

    
</x-layout>