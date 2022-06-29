<x-layout>
  
  <x-slot name="title">
    {{__('ui.details')}} {{$announce->title}}
  </x-slot>
{{-- @dd($announcements); --}}
<section class="py-5">
  <div class="container px-4 px-lg-5 my-5">
      <div class="row gx-4 gx-lg-5 align-items-center">
          <div class="col-12 col-md-6">
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

              <div class="carousel-indicators" style="margin-bottom: -20px;">
                @foreach ($announce->images as $image)
                <button type="button" data-mdb-target="#carouselMDExample" data-mdb-slide-to="{{$loop->index}}" class="@if($loop->first)active @endif"
                  aria-current="true" aria-label="Slide 1" style="width: 100px;">
                  <img class="d-block w-100 shadow-1-strong rounded"
                    src="{{!$announce->images()->get()->isEmpty() ? $image->getUrl(600,450) : 'https://source.unsplash.com/230x200'}}" class="img-fluid" />
                </button>
                @endforeach
               
             </div>

            </div>
          </div>
          <div class="col-12 col-md-6 mt-5">
              <h1 class="display-5 fw-bolder starry">{{$announce->title}}</h1>
              <div class="fs-5 mb-5">
                <h5 class="ps-1"> {{$announce->category->name}}</h5>
              </div>
              <div class="fs-5 mb-5">
                  <span>{{$announce->price}} €</span>
              </div>
              <p class="descrizioneTest">{{$announce->description}}</p>

              <div class="">
                <p class="mb-0 mt-3 created">{{__('ui.uploadBy')}} {{$announce->user->name}} {{__('ui.at')}} {{$announce->created_at->format('d/m/Y')}}</p>
              </div>

              {{-- <div class="d-flex">
                  <button class="btn btn-outline-dark flex-shrink-0" type="button">
                      <i class="bi-cart-fill me-1"></i>
                      Contatta il venditore!
                  </button>
              </div> --}}
          </div>
      </div>
  </div>
</section>

          <section class="py-5 mt-5">
          @if($announcements)
            <div class="container  bg-light px-4 px-lg-5">
                <h2 class="fw-bolder mb-4 papaya text-center pt-5">Annunci correlati</h2>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-evenly">
                  @foreach ($announcements as $correlato)
                  @if($correlato->id != $announce->id)
                  <div class=" col-12 col-lg-4 mb-5">
                      <div class="card h-100">
                          <!-- Product image-->
                          <img class="card-img-top" src="{{!$correlato->images()->get()->isEmpty() ? $correlato->images()->first()->getUrl(600,450) : 'https://source.unsplash.com/230x200'}}"" alt="...">
                          <!-- Product details-->
                          <div class="card-body p-4">
                              <div class="text-center">
                                  <!-- Product name-->
                                  <h5 class="fw-bolder">{{$correlato->title}}</h5>
                                  <!-- Product price-->
                                  <p>{{$correlato->category->name}}</p>
                                  {{$correlato->price}} €
                              </div>
                          </div>
                      </div>
                  </div> 
                  @endif 
                  @endforeach
                </div>
            </div>
            @else
            <p>Non ci sono annunci</p>
          @endif
        </section>

</x-layout>