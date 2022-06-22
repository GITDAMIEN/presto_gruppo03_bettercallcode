<x-layout>

    <div class="container">
        <div class="row">
            <div class="col-12">
                {{$announcement_to_check ? "Annuncio da revisionare:" : "Non ci sono annunci da revisionare"}}
            </div>
        </div>
    </div>

    @if(session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
    @endif

    @if($announcement_to_check)
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h5>Titolo annuncio: {{$announcement_to_check->title}}</h5>
                <p>Categoria: {{$announcement_to_check->category->name}}</p>
                <p>Descrizione: {{$announcement_to_check->description}}</p>
                <p>Prezzo: {{$announcement_to_check->price}}€</p>
                <p>Caricato il: {{$announcement_to_check->created_at->format('d/m/Y')}}</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-2">
                <form method="POST" action="{{route('revisor.accept_announcement', ['announcement'=>$announcement_to_check])}}">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-success">Accetta</button>
                </form>
            </div>
            <div class="col-2">
                <form method="POST" action="{{route('revisor.refuse_announcement', ['announcement'=>$announcement_to_check])}}">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-danger">Rifiuta</button>
                </form>
            </div>
        </div>
    </div>
    @endif
</x-layout>