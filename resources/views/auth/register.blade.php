<x-layout>
    <x-slot name="title">
        {{__('ui.reg')}} 
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
            <div class="col-12 text-center mb-5">
                <h2>{{__('ui.reg-title')}} </h2>
            </div>
            <div class="col-12 col-md-6 offset-md-3">
                <form method="POST" action="{{route('register')}}">
                    @csrf
                    <div class="form-outline mb-4">
                        <label class="form-label">{{__('ui.reg-mail')}}</label>
                        <input type="text"  class="form-control" name="email"/>
                    </div>
                    
                    <div class="form-outline mb-4">
                        <label class="form-label">{{__('ui.reg-user')}}</label>
                        <input type="text" class="form-control" name="name"/>
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label">{{__('ui.reg-pass')}}</label>
                        <input type="password" class="form-control" name="password"/>
                    </div> 
                    <div class="form-outline mb-4">
                        <label class="form-label">{{__('ui.reg-conf')}}</label>
                        <input type="password" class="form-control" name="password_confirmation"/>
                    </div> 
                    
                    <div class="form-outline mb-4 d-flex justify-content-center align-items-center">
                        <button type="submit" class="btn papayaBg panna mb-4">{{__('ui.reg')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    
</x-layout>