<x-layout>
  
  <x-slot name="title">
    {{__('ui.details')}} {{$announce->title}}
  </x-slot>

   
<div class="container mt-5 min-vh-100">
  <div class="row shadow pt-4 roundd">
    <div class="col-12 col-md-6 paddingdetails">
      <!-- Carousel wrapper -->
     <div id="carouselMDExample" class="carousel slide carousel-fade" data-mdb-ride="carousel">
       <!-- Slides -->

       <div class="carousel-inner mb-5 shadow-1-strong rounded-3">
          @foreach ($announce->images as $image)
            <div class="carousel-item @if($loop->first)active @endif">
              <img src="{{!$announce->images()->get()->isEmpty() ? $image->getUrl(600,450) : 'https://source.unsplash.com/230x200'}}" alt="Immagine bella" class="d-block w-100">
            </div>
          @endforeach
       </div>
       <!-- Slides -->
     
       <!-- Controls -->
       <button class="carousel-control-prev" type="button" data-mdb-target="#carouselMDExample"
         data-mdb-slide="prev">
         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
         <span class="visually-hidden">Previous</span>
       </button>
       <button class="carousel-control-next" type="button" data-mdb-target="#carouselMDExample"
         data-mdb-slide="next">
         <span class="carousel-control-next-icon" aria-hidden="true"></span>
         <span class="visually-hidden">Next</span>
       </button>
       <!-- Controls -->
     
       <!-- Thumbnails -->
       <div class="carousel-indicators" style="margin-bottom: -20px;">
          @foreach ($announce->images as $image)
          <button type="button" data-mdb-target="#carouselMDExample" data-mdb-slide-to="{{$loop->index}}" class="@if($loop->first)active @endif"
            aria-current="true" aria-label="Slide 1" style="width: 100px;">
            <img class="d-block w-100 shadow-1-strong rounded"
              src="{{!$announce->images()->get()->isEmpty() ? $image->getUrl(600,450) : 'https://source.unsplash.com/230x200'}}"" class="img-fluid" />
          </button>
          @endforeach
         
       </div>
       <!-- Thumbnails -->
     </div>
    </div>

    <div class="col-12 col-md-6">
      <div class="row mt-5">
          <div class="col-12">
              <p class="titleDetails">{{$announce->title}}</p>
          </div>
          <div class="col-12">
              <p class="fs-5 lato">{{$announce->description}}</p>
          </div>
          <div class="col-12 lato fs-5">
              <p>{{__('ui.price')}} : {{$announce->price}} €</p>
          </div>
          <div class="col-12 lato fs-5">
              <a href="{{route('categoryShow',$announce->category)}}" class="card-text">{{$announce->category->name}}</a>
          </div>
          <div class="col-12 mt-3">
              <p class="lato fs-6 mt-5 created">{{__('ui.create')}} {{$announce->user->name}} {{__('ui.at')}} {{$announce->created_at->format('d/m/Y')}}</p>
          </div>
      </div>
    </div>

  </div>

</div>







    

   <x-footerGeneral></x-footergeneral>
</x-layout>