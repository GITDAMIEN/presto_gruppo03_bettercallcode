<x-layout>
    <x-navbarGeneral></x-navbarGeneral>
    <h1 class="text-center tuttigliannunci py-4">TUTTI GLI ANNUNCI</h1>

    @if (session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
    @endif
    
    <div class="container">
        <livewire:announcement-cards/>
    </div>
    <x-footerGeneral></x-footergeneral>
</x-layout>