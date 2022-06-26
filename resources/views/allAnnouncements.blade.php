<x-layout>
    <x-navbarGeneral></x-navbarGeneral>
    <x-slot name="title">
        Tutti gli annunci 
     </x-slot>
    
    <h1 class="text-center tuttigliannunci py-4">TUTTI GLI ANNUNCI</h1>

    @if (session('message'))
        <div class="alert alert-success text-center">
            {{session('message')}}
        </div>
    @endif
    
    <div class="container">
        <livewire:announcement-cards/>
    </div>
    <x-footerGeneral></x-footergeneral>
</x-layout>