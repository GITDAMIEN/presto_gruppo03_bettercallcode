<x-layout>
    <x-slot name="title">
       Registrati
    </x-slot>
    {{-- utilizzo l if per il messaggio d errore --}}
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
                <form method="POST" action="{{route('register')}}">
                    @csrf
                    <div class="form-outline mb-4">
                        <label class="form-label">Inserisci la tua email</label>
                        <input type="text"  class="form-control" name="email"/>
                    </div>
                    
                    <div class="form-outline mb-4">
                        <label class="form-label">Inserisci il tuo username</label>
                        <input type="text" class="form-control" name="name"/>
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label">Inserisci la tua password</label>
                        <input type="password" class="form-control" name="password"/>
                    </div> 
                    <div class="form-outline mb-4">
                        <label class="form-label">Conferma password</label>
                        <input type="password" name="password_confirmation"/>
                    </div>
                    <button type="submit" class="btn btn-primary mb-4">Registrati</button>
                </form>
            </div>
        </div>
    </div>
    
    
</x-layout>