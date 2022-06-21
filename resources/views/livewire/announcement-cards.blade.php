<div class="">
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
