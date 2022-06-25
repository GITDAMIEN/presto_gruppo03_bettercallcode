<div>

    {{-- Barra categorie per ultimi annunci homepage --}}

    {{-- <form form wire:submit.prevent="searching">
        <ul class="test text-center">
            @foreach ($categories as $category)
            <li class="test2">
                <a wire:click="testClick({{$category->id}})" class="test3 btnPers bluScuro pannaBg">{{$category->name}}</a>
            </li>
            @endforeach
        </ul>
    </form> --}}
    
    @if(count($announces)>0)
    <div class="container">
        <div class="row">
        @foreach ($announces as $announce)
        <div class="col-12 col-lg-4 text-center" id=>

            <a href="{{route('detailsAnnounce',$announce)}}">
            <div class="skill-card mb-4">
                <header class="skill-card__header"><img src="{{!$announce->images()->get()->isEmpty() ? Storage::url($announce->images()->first()->path) : 'https://source.unsplash.com/230x200'}}" alt="Immagine bella" class="skill-card__icon"></header>
                
                <section class="skill-card__body">
                    <h2 class="skill-card__title">{{$announce->title}}</h2><a href="{{route('categoryShow',$announce->category)}}" class="skill-card__duration__category mb-5">{{$announce->category->name}}</a>
                    <p class="skill-card__duration lato pt-1">{{$announce->price}}€</p>
                    <ul class="skill-card__knowledge p-0">
                        <li class="description">{{$announce->description}}</li>
            
                        <li><a href="{{route('detailsAnnounce',$announce)}}" class="btn btnPersonalizzato lato">Dettagli</a></li>
                        <li class="created pt-4 lato">Creato da {{$announce->user->name}} il {{$announce->created_at->format('d/m/Y')}}</li>
                    </ul>
                </section>
            </div>
            </a>

        </div>
        @endforeach
        </div>
        
        
        @else
        
        <p>Non ci sono annunci</p>
        
        @endif
    </div>
</div>
