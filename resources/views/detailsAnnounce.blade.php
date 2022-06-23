<x-layout>
  <x-navbarGeneral></x-navbarGeneral>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">{{$announce->title}}</h1>
            </div>
        </div>
    </div>

   <div class="container">
    <div class="row">
        <div class="col-12">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="https://source.unsplash.com/600x200" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="https://source.unsplash.com/600x200" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="https://source.unsplash.com/600x200" class="d-block w-100" alt="...">
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-12">
            <p>Titolo : {{$announce->title}}</p>
        </div>
        <div class="col-12">
            <p>Decrizione : {{$announce->description}}</p>
        </div>
        <div class="col-12">
            <p>Prezzo : {{$announce->price}}</p>
        </div>
        <div class="col-12">
            <a href="{{route('categoryShow',$announce->category)}}" class="card-text">{{$announce->category->name}}</a>
        </div>
        <div class="col-12 mt-3">
            <p class="card-text">Creato il : {{$announce->created_at->format('d/m/Y')}}</p>
        </div>
    </div>
   </div>

   <x-footerGeneral></x-footergeneral>
</x-layout>