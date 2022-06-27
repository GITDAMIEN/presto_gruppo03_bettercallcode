<x-layout>

    <x-slot name="title">
        {{__('ui.new-ann')}}
      </x-slot>

    <div class="container">
        <livewire:create-announcement/>
    </div>
    <x-footerGeneral></x-footergeneral>
</x-layout>