<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}

    @if ($errors->any())        
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif

    <form wire:submit.prevent="createAnnouncement">
        <div class="form-floating mb-3">
            <input wire:model="title" type="text" class="form-control" id="floatingTitle" placeholder="Title">
            <label for="floatingTitle">Titolo</label>
        </div>
        <div class="form-floating mb-3">
            <textarea wire:model="description" id="floatingDescription" class="form-control" cols="30" rows="10" placeholder="Description"></textarea>
            <label for="floatingDescription">Descrizione</label>
        </div>
        <div class=" mb-3">
                <select wire:model.defer="category"class="form-control" id="floatingCategory">
                        <option value="">Scegli la categoria</option>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select> 
        </div>
        <div class="form-floating mb-3">
            <input wire:model="price" type="number" class="form-control" id="floatingPrice" placeholder="Price">
            <label for="floatingPrice">Prezzo</label>
        </div>
        <img src="" alt="Immagine-placeholder">
        <button type="submit" class="btn btn-warning">Pubblica</button>
    </form>

</div>