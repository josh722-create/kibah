<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/header.css') }}">

<header class="header-propiedades">

    <div class="contenedor-header-propiedades">
        <a href="/" class="logo-prop">
            <img src="{{ asset('../imagenes/logo.png') }}" alt="">
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
<form class="filtro-propiedades" method="GET" action="{{ route('buscar') }}">
<select name="estado">
    <option value="" disabled {{ !request('tipo_propiedad') && !request('estado') ? 'selected' : '' }}>Tipo de propiedad</option>
    <option value="Entrega Inmediata" {{ (request('tipo_propiedad') == 'Entrega Inmediata' || request('estado') == 'Entrega Inmediata') ? 'selected' : '' }}>
        Entrega inmediata
    </option>
    <option value="Preventa" {{ (request('tipo_propiedad') == 'Preventa' || request('estado') == 'Preventa') ? 'selected' : '' }}>
        Preventa
    </option>
</select>

    <select name="colonia">
        <option value="" disabled {{ !request('colonia') ? 'selected' : '' }}>Colonia</option>
        @foreach($colonias as $colonia)
            <option value="{{ $colonia }}" {{ request('colonia') == $colonia ? 'selected' : '' }}>
                {{ $colonia }}
            </option>
        @endforeach
    </select>

<button type="button" class="btn-buscar-prop" onclick="realizarBusquedaHeader()">Buscar</button></form>

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

function realizarBusquedaHeader() {
    const form = document.querySelector('.filtro-propiedades');
    const formData = new FormData(form);
    const params = new URLSearchParams(formData);
    window.location.href = `/buscar?${params.toString()}`;
}
</script>

