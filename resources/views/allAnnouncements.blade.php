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
        <livewire:announcement-cards/>
    </div>
    <x-footerGeneral></x-footergeneral>
</x-layout>