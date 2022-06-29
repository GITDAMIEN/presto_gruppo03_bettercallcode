<x-layout>
  <x-slot name="title">
    {{__('ui.yourAnnouncements')}}
  </x-slot>
  
  <div class="container min-vh-100">
    <h1 class="text-center my-5 tuttigliannunci">{{__('ui.annunciCaricati')}} {{Auth::user()->name}}</h1>
    
    <div class="row">
      {{-- <p class="text-center pb-1 counterannunci"> {{count($announces)}} annunci disponibili</p> --}}
      @if(count($announcements)>0)
      
      <div class="col-12 mt-1">
        <div class="row mx-auto">
          @foreach ($announcements as $announcement)
          <div class="col-12 col-md-6 col-lg-3 pt-4">
            <div class="Mycard mx-auto" style="width: 95%;">
              <div class="d-flex justify-content-center align-items-center">
                <img src="{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(600,450) : 'https://source.unsplash.com/220x220'}}" class="card-img-top" alt="...">
              </div>
              <div class="card-body">
                <div class="boxtile text-center">
                  <h6 class="card-title pe-3 pt-1 lato">{{$announcement->title}}</h6>
                </div>
                <div class="buttonbox mt-3">
                  <p class="lato text-start fw-bolder mt-2 ps-4 ms-3 ">{{$announcement->price}}€</p>
                  <a href="{{route('detailsAnnounce',$announcement)}}" class="btn custombtnBg panna mb-3 mt-1 ms-pers">{{__('ui.details')}}</a>
                </div>
              </div>
              
            </div>
          </div>
          @endforeach
        </div>
      </div>
      
      @else
      <div class="container mt-5 py-5">
        <div class="row">
          <div class="col-12 d-flex justify-content-center align-items-center">
            <div class="aa ps-5">
              <a href="{{route('createAnnouncement')}}" class="btnPd">{{__('ui.add-first-ann')}}</a>
            </div>
          </div>
        </div>
      </div>
      @endif
      
    </div>
    
  </div>
</x-layout>
