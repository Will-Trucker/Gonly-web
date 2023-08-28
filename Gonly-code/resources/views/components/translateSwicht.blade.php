<div class="relatve z-10">
    <button id="menuButton" class="bg-transparent p-0.7 w-48 border-2 border-amber-300 py-2">{{__('Languages')}}:  {{ Config::get('languages')[App::getLocale()] }}  <i class="ml-2 fa-solid fa-caret-down"></i></button>
    <div id="menuDropdown" class="absolute w-48 bg-white rounded-lg shadow-xl hidden ">
      @foreach (Config::get('languages') as $lang => $language)
        @if ($lang != App::getLocale())
          <a class="block text-center px-4 py-3 text-gray-800 hover:bg-gray-100 w-full" href="{{ route('lang.switch', $lang) }}"> {{$language}}</a>
        @endif
      @endforeach
    </div>
</div>