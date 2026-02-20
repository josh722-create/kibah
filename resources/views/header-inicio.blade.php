<link rel="stylesheet" href="{{ asset('css/header-inicio.css') }}">
<!-- HEADER -->
<header class="header-kibah">
    <div class="header-contenido">

        <a href="/" class="logo-kibah">
            <img src="{{ asset('imagenes/logo.png') }}" alt="">
        </a>

        <nav class="nav-kibah" id="menuNavegacion">
            <button class="cerrar-menu" id="cerrarMenu">✕</button>

            <a href="/">INICIO</a>
            <a href="/#nosotros">NOSOTROS</a>
            <a href="{{ route('propiedades.all') }}">PROPIEDADES</a>
            <a href="/#contacto">CONTACTANOS</a>
        </nav>

        <button class="menu-btn" id="btnMenu">
            <span></span><span></span><span></span>
        </button>

    </div>
</header>

<script>
    const btnMenu = document.getElementById('btnMenu');
    const menuNav = document.getElementById('menuNavegacion');
    const cerrarMenu = document.getElementById('cerrarMenu');

    btnMenu.addEventListener('click', () => {
        menuNav.classList.add('activo');
        document.body.style.overflow = 'hidden'; // Bloquear scroll
    });

    cerrarMenu.addEventListener('click', () => {
        menuNav.classList.remove('activo');
        document.body.style.overflow = 'auto'; // Restaurar scroll
    });
</script>


