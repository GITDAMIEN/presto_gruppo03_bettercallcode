<div class="">
  <div class="row">
    @foreach ($announces as $announce)
    <div class="col-12 col-lg-4 text-center">
      <div class="card" style="width: 18rem;">
          <img src="https://source.unsplash.com/200x200" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">{{$announce->title}}</h5>
            <p class="card-text">{{$announce->description}}</p>
            <p class="card-text">{{$announce->category->name}}</p>
            <p class="card-text">{{$announce->price}} €</p>
            <a href="#" class="btn btn-primary">Dettagli</a>
          </div>
        </div>
    </div>
    @endforeach
  </div>
</div>
