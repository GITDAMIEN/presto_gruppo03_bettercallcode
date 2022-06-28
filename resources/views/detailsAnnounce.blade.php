<x-layout>
  
  <x-slot name="title">
    {{__('ui.details')}} {{$announce->title}}
  </x-slot>

   
{{-- <div class="container mt-5 min-vh-100">
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

</div> --}}

<section class="py-5">
  <div class="container px-4 px-lg-5 my-5">
      <div class="row gx-4 gx-lg-5 align-items-center">
          <div class="col-md-6">
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
                    src="{{!$announce->images()->get()->isEmpty() ? $image->getUrl(600,450) : 'https://source.unsplash.com/230x200'}}"" class="img-fluid" />
                </button>
                @endforeach
               
             </div>

            </div>
          </div>
          <div class="col-md-6">
              <h1 class="display-5 fw-bolder starry">{{$announce->title}}</h1>
              <div class="fs-5 mb-5">
                  <span>{{$announce->price}} €</span>
              </div>
              <p class="lead">{{$announce->description}}</p>
              <div class="d-flex">
                  <button class="btn btn-outline-dark flex-shrink-0" type="button">
                      <i class="bi-cart-fill me-1"></i>
                      Contatta il venditore!
                  </button>
              </div>
          </div>

          <section class="py-5 bg-light mt-5">
            <div class="container px-4 px-lg-5 mt-5">
                <h2 class="fw-bolder mb-4 starry">Annunci correlati</h2>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="...">
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Fancy Product</h5>
                                    <!-- Product price-->
                                    $40.00 - $80.00
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                      <div class="card h-100">
                          <!-- Product image-->
                          <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="...">
                          <!-- Product details-->
                          <div class="card-body p-4">
                              <div class="text-center">
                                  <!-- Product name-->
                                  <h5 class="fw-bolder">Fancy Product</h5>
                                  <!-- Product price-->
                                  $40.00 - $80.00
                              </div>
                          </div>
                      </div>
                  </div>

                  <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="...">
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">Fancy Product</h5>
                                <!-- Product price-->
                                $40.00 - $80.00
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col mb-5">
                  <div class="card h-100">
                      <!-- Product image-->
                      <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="...">
                      <!-- Product details-->
                      <div class="card-body p-4">
                          <div class="text-center">
                              <!-- Product name-->
                              <h5 class="fw-bolder">Fancy Product</h5>
                              <!-- Product price-->
                              $40.00 - $80.00
                          </div>
                      </div>
                  </div>
              </div>
                    
                </div>
            </div>
        </section>
      </div>
  </div>
</section>

</x-layout>