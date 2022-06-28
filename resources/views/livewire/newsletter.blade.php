{{-- If your happiness depends on money, you will never be happy with yourself. --}}
<div class="col-12 col-md-6 offset-md-3 d-block newsletterDiv px-3 py-4">
    <div class="d-none">{{$useremail}}</div>
    <form class="px-3" wire:submit.prevent="newsletter">
        @csrf
        <h5 id="footerH5" class="ps-3">Iscriviti alla nostra newsletter</h5>
        <div class="d-flex gap-2 ps-2">
        <label for="newsletter1" class="visually-hidden">Indirizzo email</label>
        <input id="newsletter1" type="text" wire:model="useremail" class="form-control" placeholder="{{$useremail}}">
        <button id="newsletterBtn" class="btn papayaBg panna" type="submit"> <i class="fa-solid fa-paper-plane"></i> </button>
        </div>
    </form>
</div>
