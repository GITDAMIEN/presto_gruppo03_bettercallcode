<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}

    <div class="row">
        <div class="col-12 col-md-8 offset-md-2">
            <h2 class="super-main-text-category-cards my-5 text-center pb-4">Inserisci annuncio</h2>
        </div>
        <div class="col-12">
            <form wire:submit.prevent="createAnnouncement">
                @csrf
                <div class="col-12 col-md-8 offset-md-2">
                    <p class="text-center main-text-category-cards">Titolo</p>
                    <input wire:model="title" type="text" class="form-control" id="floatingTitle" placeholder="Titolo" @error('title') is-invalid @enderror>
                    @error('title')
                        {{$message}}
                    @enderror
                </div>
                <div class="col-12 col-md-8 offset-md-2">
                    <p class="text-center mt-5 main-text-category-cards">Descivi ciò che stai vendendo</p>
                    <textarea wire:model="description" id="floatingDescription" class="form-control" cols="30" rows="10" placeholder="Descrizione" @error('description') is-invalid @enderror></textarea>
                    @error('description')
                        {{$message}}
                    @enderror
                </div>
                <div class=" col-12 col-md-8 offset-md-2 m-auto">
                    <p class="main-text-category-cards text-center mt-5">Categoria</p>
                    <div class="row justify-content-evenly">
                            @foreach ($categories as $x)
                                @if($x->id==6)
                                    <div class="row"></div>
                                @endif
                            <div class="col-12 col-md-2 mt-4">
                                <div class="d-flex justify-content-center align-items-center">
                                    <div wire:click="testClick({{$x->id}})" class="{{$category==$x->id ? 'xxx':''}} p-4">
                                        <img src="{{$x->img}}" id="{{$x->name}}"></img>
                                    </div>
                                </div>
                                <p class="m-0 py-1 text-center category-name-cards">{{$x->name}}</p>
                            </div>
                            @endforeach 
                            @error('category')
                                {{$message}}
                            @enderror
                    </div>
                </div>
                <div class="col-12 col-md-8 offset-md-2">
                    <p class="main-text-category-cards text-center mt-5">Prezzo</p>
                    <input wire:model="price" type="number" class="form-control" id="floatingPrice" placeholder="Prezzo" @error('price') is-invalid @enderror>
                    @error('price')
                        {{$message}}
                    @enderror
                </div>
                <div class="col-12 col-md-8 offset-md-2">
                    <div class="d-flex justify-content-center align-items-center mt-5">
                        <img src="https://via.placeholder.com/200" alt="Immagine-placeholder">
                    </div>
                </div>
                <div class="col-12 col-md-8 offset-md-2">
                    <div class="d-flex justify-content-center align-items-center">
                        <div>
                            <button type="submit" class="btn papayaBg panna mt-5 text-center btn-category-cards">Pubblica</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>

</div>