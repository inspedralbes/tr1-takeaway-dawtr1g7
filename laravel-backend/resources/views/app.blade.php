<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administració</title>

    <script>
      let localhost = window.location.hostname == '127.0.0.1'

      if (localhost) {
        let link1 = document.createElement('link');
        link1.rel = 'stylesheet';
        link1.href = '/css/bulma.css'; // Ruta al fitxer CSS en desenvolupament
        document.head.appendChild(link1);

        let link2 = document.createElement('link');
        link2.rel = 'stylesheet';
        link2.href = '/css/styles.css'; // Ruta al fitxer CSS en desenvolupament
        document.head.appendChild(link2);
      } else {
        let link1 = document.createElement('link');
        link1.rel = 'stylesheet';
        link1.href = '/laravel-backend/public/css/bulma.css'; // Ruta al fitxer CSS en producció
        document.head.appendChild(link1);

        let link2 = document.createElement('link');
        link2.rel = 'stylesheet';
        link2.href = '/laravel-backend/public/css/styles.css'; // Ruta al fitxer CSS en producció
        document.head.appendChild(link2);
      }
    </script>

  </head>

  <body>

    <header>
      <div class="header__icon">
        <img class="iconsLanding" src="https://cdn-icons-png.flaticon.com/512/3596/3596149.png" alt="LogOut" onclick="redirectToLandingPage()">
      </div>
      <div class="header__title" onclick="redirectToLandingPage()">Galaxia Gutenberg</div>
    </header>

    <nav class="navbar" role="navigation" aria-label="main navigation">
      <div class="navbar-brand">
        <a class="navbar-item" href="{{route('admin')}}">ADMINISTRACIÓ</a>
        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
        </a>
      </div>
      <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">
          <a class="navbar-item" href="{{route('llibres')}}">Llibres</a>
          <a class="navbar-item" href="{{route('categories')}}">Categories</a>
          <a class="navbar-item" href="{{route('comandes')}}">Comandes</a>
          <a class="navbar-item" href="{{route('usuaris')}}">Usuaris</a>
        </div>
      </div>
    </nav>

    @yield('content')

    <footer>
      <p>© Biblioteca Galaxia Gutenberg All rights reserved.</p>
    </footer>
    
    <script> // CODI EXTRET DE: "https://bulma.io/documentation/components/navbar/"
      document.addEventListener('DOMContentLoaded', () => {

        // Get all "navbar-burger" elements
        const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

        // Add a click event on each of them
        $navbarBurgers.forEach(el => {
          el.addEventListener('click', () => {

            // Get the target from the "data-target" attribute
            const target = el.dataset.target;
            const $target = document.getElementById(target);

            // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
            el.classList.toggle('is-active');
            $target.classList.toggle('is-active');
          });
        });
      });
    </script>
    <script>
    function redirectToLandingPage() {
        let localhost = window.location.hostname == '127.0.0.1'

        if (localhost) {
            window.location.href = 'http://127.0.0.1:5501/FrontEnd/'
        } else {
            window.location.href = '../../FrontEnd'
        }
    }
</script>

  </body>

</html>