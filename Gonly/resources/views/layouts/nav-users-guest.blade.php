    <header>
        <nav>
            <div class="logo-image">
                <a href="{{ route('welcome') }}"><img class="logo-gonly-black-letters" src="{{ Vite::asset('resources/img/Logos/logo-gonly-black-letters.png') }}"></a>
            </div>
            
            <livewire:search-component/>
            
            <x-translateSwicht />
            
            <div class="relatve z-10">
                <button id="menuButton" class="w-52 user-configuration bg-transparent px-2 border-2 border-amber-300 py-0.5">
                    <svg viewBox="0 0 36 36" fill="none" role="img" xmlns="http://www.w3.org/2000/svg" width="80" height="80"><mask id=":r2f:" maskUnits="userSpaceOnUse" x="0" y="0" width="36" height="36"><rect width="36" height="36" rx="72" fill="#FFFFFF"></rect></mask><g mask="url(#:r2f:)"><rect width="36" height="36" fill="#ff005b"></rect><rect x="0" y="0" width="36" height="36" transform="translate(8 8) rotate(214 18 18) scale(1.1)" fill="#ffb238" rx="6"></rect><g transform="translate(4 4) rotate(-4 18 18)"><path d="M13,20 a1,0.75 0 0,0 10,0" fill="#000000"></path><rect x="10" y="14" width="1.5" height="2" rx="1" stroke="none" fill="#000000"></rect><rect x="24" y="14" width="1.5" height="2" rx="1" stroke="none" fill="#000000"></rect></g></g></svg>
                  <h3>
                    @if (Route::has('login'))
                        @auth
                            {{ Auth::user()->name }}
                        @else
                            Gonly - naitor
                        @endauth
                    @endif
                  </h3><i class="fa-solid fa-gear"></i>
                </button>
            </div>

        </nav>
        <section>
            <ul>
                <a href="{{ route('categories') }}"><li><i class="fa-solid fa-cubes-stacked"></i>{{__('Categories')}}</li></a>
                @if (Route::has('login'))
                    @auth
                    <a href="#"><li><i class="fa-solid fa-cart-shopping"></i>Carrito</li></a>
                    <a href="{{ Route('dashboard') }}"><li><i class="fa-solid fa-gauge"></i>Panel</li></a>
                    @else
                        <a href="{{ route('login') }}"><li><i class="fa-solid fa-right-from-bracket"></i>{{__('Log in')}}</li></a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"><li><i class="fa-solid fa-address-card"></i>{{__('Register')}}</li></a>
                        @endif
                    @endauth
                @endif
                <a href="#"><li><i class="fa-solid fa-circle-info"></i>{{__('Information')}}</li></a>
                <a href="#"><li><i class="fa-solid fa-headset"></i>{{__("Contact")}}</li></a>
            </ul>
        </section>
    </header>