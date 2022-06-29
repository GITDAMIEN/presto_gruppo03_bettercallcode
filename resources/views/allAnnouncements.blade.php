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
            {{-- richiamo di livewire e paginazione --}}
            
        {{-- <livewire:announcement-cards/> --}}
        @include('livewire.announcement-cards',['announces'=> $announces])
        
    </div>
</x-layout>