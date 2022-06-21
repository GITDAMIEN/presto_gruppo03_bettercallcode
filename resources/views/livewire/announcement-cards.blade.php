<div class="">
  <div class="row">
    @foreach ($announces as $announce)
    <div class="col-12 col-lg-4 text-center">
      <div class="card" style="width: 18rem;">
          <img src="..." class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">{{$announce->title}}</h5>
            <p class="card-text">{{$announce->description}}</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
    </div>
    @endforeach
  </div>
</div>
