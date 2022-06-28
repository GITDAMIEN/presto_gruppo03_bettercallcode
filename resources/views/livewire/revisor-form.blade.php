{{-- Care about people's approval and you will be their prisoner. --}}
<form id="contactUsFormCard" class="card col-12 col-md-6 customBlack ubuntuFont text-center d-flex align-items-center mx-3 ms-md-0 me-md-4 needs-validation" novalidate wire:submit.prevent="sendForm">
    @csrf
    <h4 id="contactUsH5"><i id="formArrows" class="fa-solid fa-circle-arrow-right me-3 secColor"></i>{{__('ui.add-req')}}<i id="formArrows" class="fa-solid fa-circle-arrow-left ms-3 secColor"></i></h4>
    <div class="customInput mb-2">
        <input type="text" class="form-control" id="floatingPassword" placeholder="{{Auth::user()->name}}" readonly>
        <small class="invalid-feedback ps-3">{{__('ui.obb-camp')}}</small>
    </div>
    <div class="customInput mb-2">
        <input type="email" class="form-control" id="floatingInput" placeholder="{{Auth::user()->email}}" readonly>
        <small class="invalid-feedback ps-3">{{__('ui.add-email-corr')}}</small>
    </div>
    <div class="form-floating">
        <textarea name="messagetxt" wire:model="messagetxt" class="form-control" placeholder="Messaggio" id="floatingTextarea" required  @error('messagetxt') is-invalid @enderror></textarea>
        <label for="floatingTextarea">{{__('ui.mess')}}</label>
        @error('messagetxt')
            {{$message}}
        @enderror
        <small class="invalid-feedback ps-3">{{__('ui.obb.camp')}}</small>
    </div>
    <div id="revisorFormBtnsDiv" class="text-center">
        <label id="inputFileLabel" for="inputFile">{{__('ui.add-CV')}}
            @if ($cv)
                <i id="okCVIcon" class="ms-2 fa-solid fa-circle-check"></i>
            @endif
            <input wire:model="cv" type="file" id="inputFile" accept="application/pdf">
        </label>
        @error('cv')
            {{$message}}
        @enderror
        <button type="submit" id="sendApplicationBtn" class="btn btn-main">{{__('ui.send-req')}}</button>
    </div>
</form>
