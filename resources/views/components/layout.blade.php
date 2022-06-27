<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Presto.it | {{$title ?? ''}}</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    {{-- fontawesome --}}
    <script src="https://kit.fontawesome.com/497d6018c2.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Paytone+One&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates&display=swap" rel="stylesheet">

    {{-- Lato Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&display=swap" rel="stylesheet">


    {{-- MDB  --}}
    @if(Route::currentRouteName()=="detailsAnnounce")
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.css"
    rel="stylesheet"
    />
    @endif
    
    @livewireStyles
</head>
<body class="m-0 p-0">

    @if(Route::currentRouteName()=="welcome")
    <x-navbar/>
    @else
    <x-navbarGeneral/>
    @endif
   
        {{$slot}}

    {{-- <x-footer/> --}}

    <script src="{{asset('js/app.js')}}"></script>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

     @if(Route::currentRouteName()=="detailsAnnounce")
    <!-- MDB -->
    <script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.js"
    ></script>
    @endif

    @if(Route::currentRouteName()=="revisor.index")
    <script src="/revisor.js"></script>
    @endif
    
    @livewireScripts
</body>
</html>