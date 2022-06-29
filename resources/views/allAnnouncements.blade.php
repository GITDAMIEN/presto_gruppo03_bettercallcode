<x-layout>
    <x-slot name="title">
        {{__('ui.all-ann')}}
     </x-slot>

    @if (session('message'))
        <div class="alert alert-success text-center">
            {{session('message')}}
        </div>
    @endif
    
    <div class="container-fluid">
        
        {{-- richiamo di livewire senza paginazione --}}

        <livewire:announcement-cards/>

        {{-- richiamo di livewire con paginazione --}}
        {{-- @include('livewire.announcement-cards',['announces'=> $announces]) --}}
        
    </div>
</x-layout>