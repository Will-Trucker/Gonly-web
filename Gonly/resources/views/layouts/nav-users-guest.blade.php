    <header>
        <nav>
            <div class="logo-image">
                <a href="{{ route('welcome') }}"><img class="logo-gonly-black-letters" src="{{ Vite::asset('resources/img/Logos/logo-gonly-black-letters.png') }}"></a>
            </div>

            <form action="">
              <i class="fa-solid fa-magnifying-glass"></i>
              <input type="search" class="search hover:outline-none" name="search-products" placeholder="{{__('Search product')}}">
              <input type="submit" class="submit" value="{{__('Search')}}">
            </form>       
            
            <x-translateSwicht />

            
            <div class="relatve z-10">
                <button id="menuButton" class="w-52 user-configuration bg-transparent px-2 border-2 border-amber-300 py-0.5">
                  <img src="{{ Vite::asset('resources/img/Users/Messi.png') }}" alt="">
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