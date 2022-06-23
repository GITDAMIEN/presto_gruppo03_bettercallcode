<x-layout>
    <x-navbarGeneral></x-navbarGeneral>
    <x-slot name="title">
       Accedi 
    </x-slot>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-md-6 offset-md-3">
                <form method="POST" action="{{route('login')}}">
                    @csrf
                    <div class="form-outline mb-4">
                        <label class="form-label">Inserisci la tua email</label>
                        <input type="email"  class="form-control" name="email"/>
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label">Inserisci la tua password</label>
                        <input type="password" class="form-control" name="password"/>
                    </div> 
                    <div class="form-outline mb-4">
                        <label class="form-label">Ricordati di me</label>
                        <input type="checkbox" class="form-check-input" name="remember"/>
                    </div>
                    <div class="form-outline mb-4 d-flex justify-content-center align-items-center">
                        <button type="submit" class="btn orangeBg panna mb-4">Accedi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    
</x-layout>