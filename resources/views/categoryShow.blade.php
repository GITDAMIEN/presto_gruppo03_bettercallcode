<x-layout>
  <x-slot name="title">
    {{__('ui.cate')}} {{$category->name}}
  </x-slot>
    <h1 class="text-center my-5">{{__('ui.cate-show')}} {{$category->name}}</h1>
    <div class="container">
        <div class="row">
          @foreach ($category->announcements as $announce)
          <div class="col-12 col-lg-4 text-center">
            <div class="card" style="width: 18rem;">
                <img src="https://source.unsplash.com/200x200" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{$announce->title}}</h5>
                  <p class="card-text">{{$announce->description}}</p>
                  <span class="card-text">{{__('ui.cate')}} :</span>
                  <a href="" class="card-text">{{$announce->category->name}}</a>
                  <p class="card-text mt-2">{{$announce->price}} €</p>
                  <p class="card-text">{{__('ui.create')}} : {{$announce->user->name}}</p>
                  <p class="card-text">{{__('ui.creatAt')}} : {{$announce->created_at->format('d/m/Y')}}</p>
                </div>
              </div>
          </div>
          @endforeach
        </div>
      </div>
      <x-footerGeneral></x-footergeneral>
</x-layout>