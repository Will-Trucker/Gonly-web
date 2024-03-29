<header>
<!-- responsive: -->
<!-- mobile-display-logo, input y label de abajo, off-canva-menu -->
    <div class="mobile-display-logo">
      <div class="logo-image2">
          <a href="{{ route('welcome') }}"><img class="logo-gonly-black-letters" src="{{ Vite::asset('resources/img/Logos/logo-gonly-black-letters.png') }}"></a>
      </div>
    </div>

    <input type="checkbox" name="" class="off-canvas-btn">
    <label class="off-canvas-burger">☰</label>

  <div class="off-canva-menu">
      <nav x-data="{ open: false }">
        <div class="logo-image">
          <a href="{{ route('welcome') }}"><img class="logo-gonly-black-letters" src="{{ Vite::asset('resources/img/Logos/logo-gonly-black-letters.png') }}"></a>
        </div>

        <livewire:search-component/>     
          
        <x-translateSwicht />

        <div class="relatve z-10" class="relatve">
          <button id="menuButton" class="w-52 user-configuration bg-transparent px-2 border-2 border-amber-300 py-0.5">
            <svg viewBox="0 0 36 36" fill="none" role="img" xmlns="http://www.w3.org/2000/svg" width="80" height="80"><mask id=":r2f:" maskUnits="userSpaceOnUse" x="0" y="0" width="36" height="36"><rect width="36" height="36" rx="72" fill="#FFFFFF"></rect></mask><g mask="url(#:r2f:)"><rect width="36" height="36" fill="#ff005b"></rect><rect x="0" y="0" width="36" height="36" transform="translate(8 8) rotate(214 18 18) scale(1.1)" fill="#ffb238" rx="6"></rect><g transform="translate(4 4) rotate(-4 18 18)"><path d="M13,20 a1,0.75 0 0,0 10,0" fill="#000000"></path><rect x="10" y="14" width="1.5" height="2" rx="1" stroke="none" fill="#000000"></rect><rect x="24" y="14" width="1.5" height="2" rx="1" stroke="none" fill="#000000"></rect></g></g></svg>
            <h3>{{ Auth::user()->name }}</h3><i class="fa-solid fa-gear"></i>
          </button>
          <div id="menuDropdown" class="absolute px-2 bg-white rounded-lg shadow-xl hidden">
            
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <a href="{{ route('logout') }}" class="block text-center w-48 py-2 text-gray-800 hover:bg-gray-100 " onclick="event.preventDefault(); this.closest('form').submit();">{{ __('Log Out') }}</a>
            </form>
          </div>
        </div>

    </nav>
    <div class="menu-user-loged">
      <ul>
        <a href="{{ route('dashboard') }}" class="link-1"><li>Mis balances  <i class="fa-solid fa-scale-balanced"></i></li></a>
        <a href="{{ route('productsUser-index') }}" class="link-2"><li>Mis publicaciones  <i class="fa-solid fa-newspaper"></i></li></a>
        <a href="{{ route('profile.edit') }}" class="link-5"><li>Mi perfil <i class="fa-solid fa-user"></i></li></a>
      </ul>
    </div>
  </div>



    <!-- <section class="headers">
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

-->


</header>

