<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}

    <form wire:submit.prevent="createAnnouncement">
        @csrf
        <div class="form-floating mb-3">
            <input wire:model="title" type="text" class="form-control" id="floatingTitle" placeholder="Title" @error('title') is-invalid @enderror>
            <label for="floatingTitle">Titolo</label>
            @error('title')
                {{$message}}
            @enderror
        </div>
        <div class="form-floating mb-3">
            <textarea wire:model="description" id="floatingDescription" class="form-control" cols="30" rows="10" placeholder="Description" @error('description') is-invalid @enderror></textarea>
            <label for="floatingDescription">Descrizione</label>
            @error('description')
                {{$message}}
            @enderror
        </div>
        <div class=" mb-3">
            <select wire:model.defer="category"class="form-control" id="floatingCategory" @error('description') is-invalid @enderror>
                <option value="">Scegli la categoria</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select> 
            @error('category')
                {{$message}}
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input wire:model="price" type="number" class="form-control" id="floatingPrice" placeholder="Price" @error('price') is-invalid @enderror>
            <label for="floatingPrice">Prezzo</label>
            @error('price')
                {{$message}}
            @enderror
        </div>
        <img src="https://via.placeholder.com/200" alt="Immagine-placeholder">
        <br>
        <div class="d-flex justify-content-center align-items-center">
            <div>
                <button type="submit" class="btn orangeBg panna mt-3 text-center">Pubblica</button>
            </div>
        </div>
    </form>

</div>