<div id="seccion-destino"></div>
<footer>
    <div class="container">
      <div class="wrapper">
        <div class="footer-widget">
          <a href="{{ route('welcome') }}">
            <img src="{{ Vite::asset('resources/img/Logos/logo-gonly-black-letters.png') }}" class="logo" style="width: 16em;" />
          </a>
          <p class="desc">
            Gracias por elegir Gonly, tu tienda en línea de confianza para satisfacer todas tus necesidades de compra. ¡Regresa pronto y descubre más!
          </p>
          <ul class="socials">
            <li>
              <a target="_blank" href="https://www.facebook.com/profile.php?id=61550688284067">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
            <li>
              <a target="_blank" href="https://twitter.com/Gonly_7">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
            <li>
              <a target="_blank" href="https://www.instagram.com/gonlystore/">
                <i class="fab fa-instagram"></i>
              </a>
            </li>
            <li>
              <a target="_blank" href="https://linktr.ee/GonlyStore" >
                <i class="fab fa-linkedin-in"></i>
              </a>
            </li>
          </ul>
        </div>
        <div class="footer-widget">
          <h6>Opciones principales</h6>
          <ul class="links">
            @if (Route::has('login'))
              @auth  
                @else
                <li><a href="{{ route('login') }}">Ingreso</a></li>
                @if (Route::has('register'))
                  <li><a href="{{ route('register') }}">Registro</a></li>
                @endif
              @endauth
            @endif
            <li><a href="{{ route('welcome') }}">Inicio</a></li>
            <li><a href="#">Información</a></li>
          </ul>
        </div>
        <div class="footer-widget">
          <h6>Servicios</h6>
          <ul class="links">
            <li><a href="/shop">Categorías</a></li>
            <li><a target="_blank" href="https://linktr.ee/GonlyStore">Redes Sociales</a></li>
          </ul>
        </div>
        <div class="footer-widget">
          <h6>Contactos &amp; Ayuda</h6>
          <ul class="links">
            <li>+503 6006 - 9752</li>
            <li>gonlycontact@gmail.com</li>
          </ul>
        </div>
      </div>
      <div class="copyright-wrapper">
        <p>
          Copyrright
          <a href="#" target="blank"> ⓇGonly</a>
        </p>
      </div>
    </div>
</footer>