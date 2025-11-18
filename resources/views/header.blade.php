<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/header.css') }}">

<header class="header-propiedades">

    <div class="contenedor-header-propiedades">
        <a href="/" class="logo-prop">
            <img src="{{ asset('imagenes/logo.png') }}" alt="">
        </a>

        <!-- botón hamburguesa -->
        <button class="btn-menu-prop" id="menuMovilPropiedades">
            <span></span>
            <span></span>
            <span></span>
        </button>


    <!-- MENÚ MÓVIL FUERA DEL CONTENEDOR -->
    <nav class="nav-prop" id="navPropiedades">
        <button class="btn-cerrar-menu" id="btnCerrarMenu">&times;</button>

        <a href="/">Inicio</a>
        <a href="#">Nosotros</a>
        <a href="/propiedades">Propiedades</a>
        <a href="/#contacto">Contáctanos</a>
    </nav>
 </div>
    <!-- Filtro -->
    <form class="filtro-propiedades">
        <select><option>Todo el estado</option></select>
        <select><option>Todas las ubicaciones principales</option></select>
        <select><option>Todos los tipos</option></select>
        <button class="btn-buscar-prop">Buscar</button>
    </form>

</header>


<script>
const btnMenu   = document.getElementById("menuMovilPropiedades");
const nav       = document.getElementById("navPropiedades");
const btnCerrar = document.getElementById("btnCerrarMenu");

function toggleMenu() {
    nav.classList.toggle("activo");
    document.body.classList.toggle("no-scroll");
}

btnMenu.addEventListener("click", toggleMenu);
btnCerrar.addEventListener("click", toggleMenu);

// opcional: cerrar al hacer clic en cualquier link del menú
nav.querySelectorAll("a").forEach(link => {
    link.addEventListener("click", () => {
        nav.classList.remove("activo");
        document.body.classList.remove("no-scroll");
    });
});
</script>

