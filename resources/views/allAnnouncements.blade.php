<x-layout>
    <h1>TUTTI GLI ANNUNCI</h1>

    @if (session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>        
    @endif
    
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="form-floating">
                    <select class="form-select" id="floatingSelect">
                        <option selected>Tutte le categorie</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    <label for="floatingSelect">Scegli la categoria</label>
                  </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="form-floating">
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
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <livewire:announcement-cards/>
    </div>
    
</x-layout>