<x-layout>
    <x-slot name="title">
        Tutti gli annunci 
     </x-slot>

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