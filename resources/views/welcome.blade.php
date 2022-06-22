<x-layout>
    <x-slot name="title">Homepage</x-slot>
    
    @if(session('access.denied'))
        <div class="alert alert-danger">
            {{session('access.denied')}}
        </div>
        @if(Auth::check())
            <a href="{{route('allAnnouncements')}}">Diventa revisore!</a>
        @else
            <a href="register">Registrati e diventa revisore!</a>
        @endif
    @endif

    <div class="container-fluid p-0 m-0">
        <div class="row">
            <div class="col-12">
                <div class="cover d-flex justify-content-start align-items-center">
                    <div class="boxTitle">
                        <h1 class="title">Presto.it</h1>
                        <p class="paytone fs-5 panna">Compra e vendi con facilità... Ovunque ti trovi !</p>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <button type="button" class="customBtnBuy mt-4">Compra</button>
                            </div>
                            <div class="col-12 col-md-6">
                                <button type="button" class="customBtnSell mt-4">Vendi</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>