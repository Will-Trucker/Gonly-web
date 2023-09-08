<form action="{{ $actionForm }}" method="POST" class="form-container" enctype="multipart/form-data">
    <div class="form-logo">
        <img src="{{ Vite::Asset('resources/img/Logos/logo-gonly-icon.png') }}" alt="">
        <h1>{{ $nameLook }}</h1>
    </div>
    <div>
            @if (count($errors)>0)
                <div style="padding: 5px 14em 15px 20em;" class="mt-1 mx-80 pl-11 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                    <span class=" text-lg -mx-60">Advertencia</span>
                    @foreach ($errors->all() as $error)
                        <ol class=" -mx-60">- {{ $error }}</ol>
                    @endforeach
                </div>
            @endif
        <div>
            <label for="title">{{__('Title')}}</label>
            <input name="tittle" id="tittle" value="{{ isset($products ->tittle)?$products ->tittle:old('tittle') }}" type="input escalable" autofocus autocomplete="tittle" placeholder="Ingrese el nombre de su producto">
        </div>

        <div>
            <label for="description">{{__('Description')}}</label>
            <textarea name="description" style="max-height: 15em; overflow: hidden;" id="description" autofocus autocomplete="description" placeholder="Ingrese el nombre de su producto">{{ isset($products ->description)?$products ->description:old('description') }}</textarea>
        </div>

        <div>
            <label for="specifications">{{__('Specifications')}}</label>
            <textarea name="specifications" style="max-height: 40em; overflow: hidden;" id="specifications" autofocus autocomplete="specifications" placeholder="Ingrese las especificacipnes del producto">{{ isset($products ->specifications)?$products ->specifications:old('specifications') }}</textarea>
        </div>

        @livewire('category-dropdown-component')

        <div class="container-price">
            <label for="price">{{__('Price')}}</label>
            <section class="container-price-sigma">
                <p style="color:#78892ccc;">$</p>
                <input style="outline: none !important;" name="price" id="price" value="{{ isset($products ->price)?$products ->price:old('price') }}" {{--min="0" max="50000" step="0.01"--}} type="number" autofocus autocomplete="price" placeholder="Ingrese el precio de su producto (Menor a $50,000 )" />
            </section> 
        </div>

        <div class="container-price">
            <label for="photos">{{__('Media')}}</label>
            <input name="photos" id="photos" type="file" autofocus autocomplete="photos" accept="image/*" multiple/>
            {{--
                @error('photos')
                    <small>Solamente se pueden agregar imágenes</small>
                @enderror
            --}}
        </div>

        <input type="submit" class="submit" value="{{ $submitForm }}">
    </div>
    {{ isset($methodForm)?$methodForm:'' }}
    @csrf
</form>