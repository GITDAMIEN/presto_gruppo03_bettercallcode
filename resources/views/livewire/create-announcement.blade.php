<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}

    <div class="row">
        <div class="col-12 col-md-8 offset-md-2">
            <h2 class="super-main-text-category-cards my-5 text-center pb-4">{{__('ui.add-ann')}}</h2>
        </div>
        <div class="col-12">
            <form wire:submit.prevent="store">
                @csrf
                <div class="col-12 col-md-8 offset-md-2">
                    <p class="text-center main-text-category-cards">{{__('ui.add-title')}}</p>
                    <input wire:model="title" type="text" class="form-control" id="floatingTitle" placeholder="{{__('ui.add-title')}}" @error('title') is-invalid @enderror>
                    @error('title')
                        {{$message}}
                    @enderror
                </div>
                <div class="col-12 col-md-8 offset-md-2">
                    <p class="text-center mt-5 main-text-category-cards">{{__('ui.add-desc')}}</p>
                    <textarea wire:model="description" id="floatingDescription" class="form-control" cols="30" rows="10" placeholder="{{__('ui.placeholder-desc')}}" @error('description') is-invalid @enderror></textarea>
                    @error('description')
                        {{$message}}
                    @enderror
                </div>
                <div class=" col-12 col-md-8 offset-md-2 m-auto">
                    <p class="main-text-category-cards text-center mt-5">{{__('ui.cate')}}</p>
                    <div class="row justify-content-evenly">
                            @foreach ($categories as $x)
                                @if($x->id==6)
                                    <div class="row"></div>
                                @endif
                            <div class="col-12 col-md-2 mt-4">
                                <div class="d-flex justify-content-center align-items-center">
                                    <div wire:click="testClick({{$x->id}})" class="{{$category==$x->id ? 'xxx':''}} p-4">
                                        <img src="{{$x->img}}" id="{{$x->name}}">
                                    </div>
                                </div>
                                <p class="m-0 py-1 text-center category-name-cards">{{$x->name}}</p>
                            </div>
                            @endforeach 
                            @error('category')
                                {{$message}}
                            @enderror
                    </div>
                </div>
                <div class="col-12 col-md-8 offset-md-2">
                    <p class="main-text-category-cards text-center mt-5">{{__('ui.price')}}</p>
                    <input wire:model="price" type="number" class="form-control" id="floatingPrice" placeholder="{{__('ui.price')}}" @error('price') is-invalid @enderror>
                    @error('price')
                        {{$message}}
                    @enderror
                </div>
                <div class="col-12 col-md-8 offset-md-2 mt-5">
                    <input wire:model="temporary_images" type="file" accept="image/*" name="images" multiple class="form-control shadow @error('temporary_images.*') is-invalid @enderror" placeholder="Img"/>
                    @error('temporary_images.*')
                        <p class="text-danger mt-3">{{$message}}</p>
                    @enderror
                </div>
                @if (!@empty($images))
                <div class="col-12 col-md-8 offset-md-2">
                    <div class="row">
                        <div class="col-12 px-4 pt-4 pb-2">
                            <div class="row border py-4 previewbox">
                                @foreach ($images as $key=>$image)
                                    <div class="col my-3">
                                        <div class="img-preview mx-auto" style="background-image: url({{$image->temporaryUrl()}})"></div>
                                        <button type="button" class="btn btn-danger shadow d-block text-center mt-4 mx-auto" wire:click="removeImage({{$key}})">{{__('ui.add-dele')}}</button>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                <div class="col-12 col-md-8 offset-md-2">
                    <div class="d-flex justify-content-center align-items-center">
                        <div>
                            <button type="submit" class="btn papayaBg panna mt-5 text-center btn-category-cards">{{__('ui.add-btn')}}</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>

</div>