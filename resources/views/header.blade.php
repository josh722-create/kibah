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
        <a href="/nosotros">Nosotros</a>
        <a href="https://tupropiedad.kibah.com.mx/" target="_blank" rel="noopener noreferrer">Vende tu propiedad</a>

        {{-- <a href="/propiedades">Propiedades</a> --}}
        {{-- <a href="/#contacto">Contáctanos</a> --}}
    </nav>
 </div>

    <!-- Filtro -->
    <button class="btn-toggle-filtros" id="btnToggleFiltros">
    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <line x1="4" y1="6" x2="20" y2="6"/>
        <line x1="8" y1="12" x2="16" y2="12"/>
        <line x1="10" y1="18" x2="14" y2="18"/>
    </svg>
    Filtros
    <span class="flecha-filtros">▾</span>
</button>
    <form class="filtro-propiedades" method="GET" action="{{ route('buscar') }}" id="formFiltros">
        <select name="estado" id="selectEstado">
            <option value="" selected disabled>Tipo de propiedad</option>
            <option value="" {{ (request('tipo_propiedad') == '' || request('estado') == '') ? 'selected' : '' }}>
                Cualquier tipo de propiedad
            </option>
            <option value="Entrega Inmediata" {{ (request('tipo_propiedad') == 'Entrega Inmediata' || request('estado') == 'Entrega Inmediata') ? 'selected' : '' }}>
                Entrega inmediata
            </option>
            <option value="Preventa" {{ (request('tipo_propiedad') == 'Preventa' || request('estado') == 'Preventa') ? 'selected' : '' }}>
                Preventa
            </option>
        </select>

        <!-- Colonia con multiselect (estilo select normal) -->
        <div class="select-wrapper">
            <select class="fake-select" id="coloniaFakeSelect">
                <option id="coloniaPlaceholder">Colonia</option>
            </select>
            <div class="multiselect-dropdown" id="coloniaDropdown">
                @foreach($colonias as $colonia)
                    <label class="multiselect-option">
                        <input
                            type="checkbox"
                            name="colonias[]"
                            value="{{ $colonia }}"
                            {{ in_array($colonia, request('colonias', [])) ? 'checked' : '' }}
                        >
                        <span>{{ $colonia }}</span>
                    </label>
                @endforeach
            </div>
        </div>

        <!-- Recámaras mínimas -->
        <select name="recamaras_min" id="selectRecamarasMin">
            <option value="" selected disabled>Recámaras mínimas</option>
            <option value="" {{ request('recamaras_min') == '' ? 'selected' : '' }}>Cualquier número de recámaras min</option>
            <option value="1" {{ request('recamaras_min') == '1' ? 'selected' : '' }}>1</option>
            <option value="2" {{ request('recamaras_min') == '2' ? 'selected' : '' }}>2</option>
            <option value="3" {{ request('recamaras_min') == '3' ? 'selected' : '' }}>3</option>
            <option value="4" {{ request('recamaras_min') == '4' ? 'selected' : '' }}>4</option>
            <option value="5" {{ request('recamaras_min') == '5' ? 'selected' : '' }}>5+</option>
        </select>

        <!-- Recámaras máximas -->
        <select name="recamaras_max" id="selectRecamarasMax">
            <option value="" selected disabled>Recámaras máximas</option>
            <option value="" {{ request('recamaras_max') == '' ? 'selected' : '' }}>Cualquier número de recámaras max</option>
            <option value="1" {{ request('recamaras_max') == '1' ? 'selected' : '' }}>1</option>
            <option value="2" {{ request('recamaras_max') == '2' ? 'selected' : '' }}>2</option>
            <option value="3" {{ request('recamaras_max') == '3' ? 'selected' : '' }}>3</option>
            <option value="4" {{ request('recamaras_max') == '4' ? 'selected' : '' }}>4</option>
            <option value="5" {{ request('recamaras_max') == '5' ? 'selected' : '' }}>5+</option>
        </select>

        <!-- Precio mínimo (DESDE) -->
        <select name="precio_min" id="selectPrecioMin">
            <option value="" selected disabled>Precio desde</option>
            <option value="" {{ request('precio_min') == '' ? 'selected' : '' }}>Sin precio mínimo</option>
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
            <option value="" selected disabled>Precio hasta</option>
            <option value="" {{ request('precio_max') == '' ? 'selected' : '' }}>Sin precio máximo</option>
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
    const btnToggleFiltros = document.getElementById('btnToggleFiltros');
const filtroForm = document.querySelector('.filtro-propiedades');

btnToggleFiltros.addEventListener('click', function () {
    filtroForm.classList.toggle('abierto');
    btnToggleFiltros.classList.toggle('filtros-abiertos');
});
</script>
<script>
const btnMenuProp   = document.getElementById("menuMovilPropiedades");
const navProp       = document.getElementById("navPropiedades");
const btnCerrarProp = document.getElementById("btnCerrarMenu");

function toggleMenuProp() {
    navProp.classList.toggle("activo");
    document.body.classList.toggle("no-scroll");
}

btnMenuProp.addEventListener("click", toggleMenuProp);
btnCerrarProp.addEventListener("click", toggleMenuProp);

navProp.querySelectorAll("a").forEach(link => {
    link.addEventListener("click", () => {
        navProp.classList.remove("activo");
        document.body.classList.remove("no-scroll");
    });
});

// Multiselect de colonias
const coloniaFakeSelect = document.getElementById('coloniaFakeSelect');
const coloniaDropdown = document.getElementById('coloniaDropdown');
const coloniaPlaceholder = document.getElementById('coloniaPlaceholder');

coloniaFakeSelect.addEventListener('click', function(e) {
    e.stopPropagation();
    coloniaDropdown.classList.toggle('show');
});

// Cerrar dropdown al hacer click fuera
document.addEventListener('click', function() {
    coloniaDropdown.classList.remove('show');
});

coloniaDropdown.addEventListener('click', function(e) {
    e.stopPropagation();
});

// Actualizar el texto del select cuando cambian los checkboxes
coloniaDropdown.addEventListener('change', function() {
    const checkboxes = coloniaDropdown.querySelectorAll('input[type="checkbox"]:checked');
    if (checkboxes.length === 0) {
        coloniaPlaceholder.textContent = 'Colonia';
    } else if (checkboxes.length === 1) {
        coloniaPlaceholder.textContent = checkboxes[0].nextElementSibling.textContent;
    } else {
        coloniaPlaceholder.textContent = `${checkboxes.length} colonias seleccionadas`;
    }
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

// Función limpiar filtros
function limpiarFiltros() {
    document.getElementById('selectEstado').selectedIndex = 1;

    // Limpiar colonias
    const checkboxes = coloniaDropdown.querySelectorAll('input[type="checkbox"]');
    checkboxes.forEach(cb => cb.checked = false);
    coloniaPlaceholder.textContent = 'Colonia';

    document.getElementById('selectRecamarasMin').selectedIndex = 1;
    document.getElementById('selectRecamarasMax').selectedIndex = 1;
    document.getElementById('selectPrecioMin').selectedIndex = 1;
    document.getElementById('selectPrecioMax').selectedIndex = 1;
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

/* Wrapper para el multiselect */
.select-wrapper {
    position: relative;
    display: inline-block;
}

.fake-select {
    cursor: pointer;
    pointer-events: auto;
}

.multiselect-dropdown {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    background: white;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    max-height: 300px;
    overflow-y: auto;
    z-index: 1000;
    min-width: 100%;
    margin-top: 4px;
}

.multiselect-dropdown.show {
    display: block;
}

.multiselect-option {
    display: flex;
    align-items: center;
    padding: 8px 12px;
    cursor: pointer;
    transition: background 0.2s;
}

.multiselect-option:hover {
    background: #f0f0f0;
}

.multiselect-option input[type="checkbox"] {
    margin-right: 8px;
    cursor: pointer;
}

.multiselect-option span {
    flex: 1;
}

/* Responsive */
@media (max-width: 768px) {
    .btn-limpiar-filtros {
        padding: 8px 12px;
        font-size: 16px;
    }
}
</style>
