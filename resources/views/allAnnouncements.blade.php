<x-layout>
    <h1>TUTTI GLI ANNUNCI</h1>

    @if (session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>        
    @endif
    
    <div class="container mt-5">
        <livewire:announcement-cards/>
    </div>
    
</x-layout>