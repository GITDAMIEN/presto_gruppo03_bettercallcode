<x-layout>
    <h1 class="text-center">TUTTI GLI ANNUNCI</h1>

    @if (session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
    @endif
    
    <div class="container">
        <div class="row">
            
            <div class="col-12 mt-5">
                <livewire:announcement-cards/>
            </div>
        </div>
    </div>

    
</x-layout>