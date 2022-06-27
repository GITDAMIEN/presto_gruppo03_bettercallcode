<x-layout>
    <x-slot name="title">
        {{__('ui.all-ann')}}
     </x-slot>
    
    <h1 class="text-center tuttigliannunci py-4">{{__('ui.all-ann-g')}}</h1>

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