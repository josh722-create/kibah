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
        <a href="/#nosotros">Nosotros</a>
        <a href="/propiedades">Propiedades</a>
        <a href="/#contacto">Contáctanos</a>
    </nav>
 </div>

    <!-- Filtro -->
    <form class="filtro-propiedades" method="GET" action="{{ route('buscar') }}" id="formFiltros">
        <select name="estado" id="selectEstado">
            <option value="" selected>Tipo de propiedad</option>
            <option value="Entrega Inmediata" {{ (request('tipo_propiedad') == 'Entrega Inmediata' || request('estado') == 'Entrega Inmediata') ? 'selected' : '' }}>
                Entrega inmediata
            </option>
            <option value="Preventa" {{ (request('tipo_propiedad') == 'Preventa' || request('estado') == 'Preventa') ? 'selected' : '' }}>
                Preventa
            </option>
        </select>

        <select name="colonia" id="selectColonia">
            <option value="" selected>Colonia</option>
            @foreach($colonias as $colonia)
                <option value="{{ $colonia }}" {{ request('colonia') == $colonia ? 'selected' : '' }}>
                    {{ $colonia }}
                </option>
            @endforeach
        </select>

        <!-- Número de recámaras -->
        <select name="recamaras" id="selectRecamaras">
            <option value="" selected>Recámaras</option>
            <option value="1" {{ request('recamaras') == '1' ? 'selected' : '' }}>1</option>
            <option value="2" {{ request('recamaras') == '2' ? 'selected' : '' }}>2</option>
            <option value="3" {{ request('recamaras') == '3' ? 'selected' : '' }}>3</option>
            <option value="4" {{ request('recamaras') == '4' ? 'selected' : '' }}>4</option>
            <option value="5" {{ request('recamaras') == '5' ? 'selected' : '' }}>5+</option>
        </select>

        <!-- Precio mínimo (DESDE) -->
        <select name="precio_min" id="selectPrecioMin">
            <option value="" selected>Precio desde</option>
            <option value="800000" {{ request('precio_min') == '800000' ? 'selected' : '' }}>$800,000</option>
            <option value="1000000" {{ request('precio_min') == '1000000' ? 'selected' : '' }}>$1,000,000</option>
            <option value="2000000" {{ request('precio_min') == '2000000' ? 'selected' : '' }}>$2,000,000</option>
            <option value="3000000" {{ request('precio_min') == '3000000' ? 'selected' : '' }}>$3,000,000</option>
            <option value="4000000" {{ request('precio_min') == '4000000' ? 'selected' : '' }}>$4,000,000</option>
            <option value="5000000" {{ request('precio_min') == '5000000' ? 'selected' : '' }}>$5,000,000</option>
            <option value="6000000" {{ request('precio_min') == '6000000' ? 'selected' : '' }}>$6,000,000</option>
        </select>

        <!-- Precio máximo (HASTA) -->
        <select name="precio_max" id="selectPrecioMax">
            <option value="" selected>Precio hasta</option>
            <option value="10000000" {{ request('precio_max') == '10000000' ? 'selected' : '' }}>$10,000,000</option>
            <option value="15000000" {{ request('precio_max') == '15000000' ? 'selected' : '' }}>$15,000,000</option>
            <option value="20000000" {{ request('precio_max') == '20000000' ? 'selected' : '' }}>$20,000,000</option>
            <option value="25000000" {{ request('precio_max') == '25000000' ? 'selected' : '' }}>$25,000,000</option>
            <option value="30000000" {{ request('precio_max') == '30000000' ? 'selected' : '' }}>$30,000,000</option>
            <option value="35000000" {{ request('precio_max') == '35000000' ? 'selected' : '' }}>$35,000,000</option>
            <option value="40000000" {{ request('precio_max') == '40000000' ? 'selected' : '' }}>$40,000,000</option>
            <option value="45000000" {{ request('precio_max') == '45000000' ? 'selected' : '' }}>$45,000,000</option>
            <option value="50000000" {{ request('precio_max') == '50000000' ? 'selected' : '' }}>$50,000,000</option>
        </select>

        <button type="button" class="btn-buscar-prop" onclick="realizarBusquedaHeader()">Buscar</button>

        <!-- Botón limpiar filtros -->
        <button type="button" class="btn-limpiar-filtros" onclick="limpiarFiltros()" title="Limpiar filtros">
            Limpiar filtros
        </button>
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

function realizarBusquedaHeader() {
    const form = document.querySelector('.filtro-propiedades');
    const formData = new FormData(form);

    // Filtrar valores vacíos
    const params = new URLSearchParams();
    for (const [key, value] of formData.entries()) {
        if (value && value.trim() !== '') {
            params.append(key, value);
        }
    }

    window.location.href = `/buscar?${params.toString()}`;
}

// Función limpiar filtros: solo resetea, NO busca
function limpiarFiltros() {
    document.getElementById('selectEstado').selectedIndex = 0;
    document.getElementById('selectColonia').selectedIndex = 0;
    document.getElementById('selectRecamaras').selectedIndex = 0;
    document.getElementById('selectPrecioMin').selectedIndex = 0;
    document.getElementById('selectPrecioMax').selectedIndex = 0;
}
</script>

<style>
/* Estilos para el botón limpiar filtros */
.btn-limpiar-filtros {
    background: #ff4444;
    color: white;
    border: none;
    padding: 10px 15px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 18px;
    font-weight: bold;
    transition: background 0.3s ease;
}

.btn-limpiar-filtros:hover {
    background: #cc0000;
}

/* Responsive */
@media (max-width: 768px) {
    .btn-limpiar-filtros {
        padding: 8px 12px;
        font-size: 16px;
    }
}
</style>
