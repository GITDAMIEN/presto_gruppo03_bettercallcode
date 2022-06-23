<x-layout>
    <h1 class="text-center">TUTTI GLI ANNUNCI</h1>

    @if (session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
    @endif
    
    <div class="container">
        <livewire:announcement-cards/>
    </div>
    
</x-layout>