<header>
    <nav x-data="{ open: false }">
      <div class="logo-image">
        <a href="{{ route('welcome') }}"><img class="logo-gonly-black-letters" src="{{ Vite::asset('resources/img/Logos/logo-gonly-black-letters.png') }}"></a>
      </div>

      <form id="buscador" class="form-search">
        <i class="fa-solid fa-magnifying-glass"></i>
        <input type="search" class="search hover:outline-none" name="search-products" placeholder="{{__('Search product')}}">
        <input type="submit" class="submit" value="{{__('Search')}}">
      </form>       
        
      <x-translateSwicht />

      <div class="relatve z-10" class="relatve">
        <button id="menuButton" class="w-52 user-configuration bg-transparent px-2 border-2 border-amber-300 py-0.5">
          <img src="{{ Vite::asset('resources/img/Users/Messi.png') }}" alt="">
          <h3>{{ Auth::user()->name }}</h3><i class="fa-solid fa-gear"></i>
        </button>
        <div id="menuDropdown" class="absolute px-2 bg-white rounded-lg shadow-xl hidden">
          
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a href="{{ route('logout') }}" class="block text-center w-48 py-2 text-gray-800 hover:bg-gray-100 " onclick="event.preventDefault(); this.closest('form').submit();">{{ __('Log Out') }}</a>
          </form>
        </div>
      </div>

    </div>

    </nav>
    <div class="menu-user-loged">
      <ul>
        <a href="{{ route('dashboard') }}" class="link-1"><li>Mis balances  <i class="fa-solid fa-scale-balanced"></i></li></a>
        <a href="{{ route('productsUser-index') }}" class="link-2"><li>Mis publicaciones  <i class="fa-solid fa-newspaper"></i></li></a>
        <a href="#" class="link-3"><li>Mis ventas  <i class="fa-solid fa-tag"></i></li></a>
        <a href="#" class="link-4"><li>Mis compras  <i class="fa-solid fa-bag-shopping"></i></li></a>
        <a href="{{ route('profile.edit') }}" class="link-5"><li>Mi perfil <i class="fa-solid fa-user"></i></li></a>
      </ul>
    </div>


    <section class="headers">
            <br>
            <br>
        <input type="checkbox" class="openSidebarMenu" id="openSidebarMenu">
        <label for="openSidebarMenu" class="sidebarIconToggle">
            <div class="spinner diagonal part-1"></div>
            <div class="spinner horizontal"></div>
            <div class="spinner diagonal part-2"></div>
        </label>
        <div id="sidebarMenu">
            <ul class="sidebarMenuInner">
            <li><a href="{{ route('dashboard') }}">Mis balances</a></li>
            <li><a href="{{ route('productsUser-index') }}">Mis publicaciones</a></li>
            <li><a href="#">Mis ventas </a></li>
            <li><a href="#">Mis compras</a></li>
            <li><a href="{{ route('profile.edit') }}">Mi perfil</a></li>
            </ul>
        </div>
        </section>


</header>

