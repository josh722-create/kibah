<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kibah</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    {{-- menu --}}
    @include('header-inicio')
    {{-- banner --}}
    <div class="banner">
        <div class="banner-content">
            <h1>Disfruta tu lugar para vivir</h1>
            <p>Hemos hecho del desarrollo de la calidad una seña de identidad de
                incorporando lo último en arquitectura contemporánea a
                se adapta a tus gustos y presupuesto.</p>
        </div>
        <div class="banner-filtro">
            <div class="filtro-box">

                <div class="filtro-tabs">
                    {{-- @foreach ($tiposEntrega as $tipo)
                        <button class="tab">{{ $tipo }}</button>
                    @endforeach --}}
                    {{-- <button class="tab active">Desarrollo</button> --}}
                    {{-- <button class="tab">Entrega Inmediata</button> --}}
                    {{-- <button class="tab">PreVenta</button> --}}
                    {{-- <button class="tab">Ticket de inversión</button> --}}
                </div>

                <div class="filtro-body">
                    <label>Ubicación principal</label>
                    <select name="colonia">
                        @foreach ($colonias as $colonia)
                            <option value="{{ $colonia }}">{{ $colonia }}</option>
                        @endforeach
                    </select>

                    <label>Recamaras</label>
                    <select name="recamaras">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5+</option>
                    </select>

                    <label>Baños</label>
                    <select name="banos">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5+</option>
                    </select>

                    <label>Tipos de propiedad</label>
                    <select name="tipo_propiedad">
                        <option value="" selected disabled>Tipo de propiedad</option>
                        <option value="Entrega Inmediata">Entrega Inmediata</option>
                        <option value="Preventa">Preventa</option>
                    </select>

                    <button class="btn-search" type="button" onclick="realizarBusqueda()">
                        Buscar
                    </button>
                </div>

            </div>

        </div>
    </div>

    {{-- lista --}}
    <section class="seccion-expertos" id="nosotros">
        <div class="contenedor-expertos">

            <!-- Columna texto -->
            <div class="texto-expertos">
                <h2>EXPERTOS EN CONECTAR PROPIEDADES<br>CON EL CLIENTE IDEAL</h2>

                <p class="subtitulo-expertos">
                    Estás en el lugar correcto si buscas...
                </p>

                <ul class="lista-beneficios">
                    <li class="beneficio">
                        <div class="icono-beneficio">
                            <img src="{{ asset('imagenes/Icono-paloma.webp') }}" alt="Icono validación" loading="lazy">
                        </div>
                        <div class="contenido-beneficio">
                            <h3>Conectar tu Propiedad con el Cliente Ideal</h3>
                            <p>No solo encontramos compradores, creamos conexiones perfectas entre propiedades y
                                prospectos que buscan exactamente lo que ofreces.</p>
                        </div>
                    </li>

                    <li class="beneficio">
                        <div class="icono-beneficio">
                            <img src="{{ asset('imagenes/Icono-paloma.webp') }}" alt="Icono validación" loading="lazy">
                        </div>
                        <div class="contenido-beneficio">
                            <h3>Acompañamiento Completo</h3>
                            <p>Desde el primer paso hasta recibir las llaves, nuestros asesores expertos están contigo,
                                asegurando que cada aspecto de tu compra sea la mejor inversión de tu vida.</p>
                        </div>
                    </li>

                    <li class="beneficio">
                        <div class="icono-beneficio">
                            <img src="{{ asset('imagenes/Icono-paloma.webp') }}" alt="Icono validación" loading="lazy">
                        </div>
                        <div class="contenido-beneficio">
                            <h3>Quieres Valor Desde el Inicio</h3>
                            <p>Nos especializamos en descubrir y ofrecer acceso a precios de preventa exclusivos,
                                garantizando que maximices tu inversión desde el inicio.</p>
                        </div>
                    </li>
                </ul>
            </div>

            <!-- Columna imagen / mockup app -->
            <div class="imagen-expertos">
                <div class="contenedor-movil">
                    <img src="{{ asset('imagenes/Celular-inicio.png') }}" alt="App KIBAH" class="imagen-movil"
                        loading="lazy">
                </div>
            </div>

        </div>
    </section>
    {{-- separador --}}
    <section class="liston">
        <p>Nos aseguramos de que cada aspecto de tu compra sea cuidadosamente gestionado hasta que tengas las llaves en
            la mano.</p>
    </section>
    {{-- contador --}}
    <section class="seccion-contadores">
        <div class="contenedor-contadores">

            <div class="contador">
                <p class="contador-numero">+200</p>
                <p class="contador-texto">DESARROLLOS</p>
            </div>

            <div class="contador">
                <p class="contador-numero">+100</p>
                <p class="contador-texto">CLIENTES SATISFECHOS</p>
            </div>

            <div class="contador">
                <p class="contador-numero">+10</p>
                <p class="contador-texto">CIUDADES PARA ELEGIR TU PROPIEDAD</p>
            </div>

        </div>
    </section>
    {{-- propiedades destacadas --}}
    <section class="seccion-propiedades" id="propiedades">
        <div class="contenedor-propiedades">

            <div class="encabezado-propiedades">
                <h2>PROPIEDADES DESTACADAS</h2>

                <div class="filtros-propiedades">
                    {{-- <button class="filtro-propiedad activo">Todo</button> --}}
                    {{-- <button class="filtro-propiedad">Desarrollo</button> --}}
                    {{-- <button class="filtro-propiedad">En Renta</button> --}}
                    {{-- <button class="filtro-propiedad">En Venta</button> --}}
                    <button class="filtro-propiedad inmediata">Entrega Inmediata</button>
                    <button class="filtro-propiedad preventa">PreVenta</button>
                    {{-- <button class="filtro-propiedad">Ticket de inversión</button> --}}
                    {{-- <button class="filtro-propiedad">Último departamento</button> --}}
                </div>
            </div>
            {{-- contenedor entrega inmediata --}}

            <div class="grid-propiedades inmediata-seccion">
                <!-- Tarjeta 1 -->
        @foreach($entregaInmediata as $propiedad)
        <!-- Tarjeta {{ $loop->iteration }} -->
        <article class="tarjeta-propiedad">
            <div class="imagen-propiedad">
                <div class="tags-propiedad">
                    {{-- insignias --}}
                    {{-- <span class="tag">Desarrollo</span> --}}
                    @if($propiedad->{'Entrega Inmediata/Preventa'})
                        <span class="tag">{{ $propiedad->{'Entrega Inmediata/Preventa'} }}</span>
                    @endif
                </div>
                {{-- <img src="{{ $propiedad->{'Link Drive'} }}" alt="{{ $propiedad->{'Nombre de la Propiedad'} }}" loading="lazy"> --}}

        @if($propiedad->{'Link Imagen'})
            <img src="{{ $propiedad->{'Link Imagen'} }}" alt="{{ $propiedad->{'Nombre de la Propiedad'} }}" class="prop-hero-img">
        @else
            {{-- <img src="{{ asset('imagenes/propiedades/propiedad1.webp') }}" alt="{{ $propiedad->{'Nombre de la Propiedad'} }}" class="prop-hero-img"> --}}
        @endif            </div>
            <div class="contenido-propiedad">
                <h3>{{ $propiedad->{'Nombre Kibah'} }}</h3>
                <p class="direccion-propiedad">
                    {{ $propiedad->Colonia }}, {{ $propiedad->Alcaldía }}
                </p>

                <div class="detalles-propiedad">
                    <span class="item-detalle">
                        <img src="{{ asset('imagenes/cama.png') }}" alt=""> {{ $propiedad->{'Número de Recámaras'} ?? 'N/A' }}
                    </span>
                    <span class="separador-detalle">|</span>
                    <span class="item-detalle">
                        <img src="{{ asset('imagenes/ducha.png') }}" alt=""> {{ $propiedad->{'Número de Baños'} ?? 'N/A' }}
                    </span>
                    @if($propiedad->{'M2 Totales'})
                    <span class="separador-detalle">|</span>
                    <span class="item-detalle">
                        <img src="{{ asset('imagenes/seleccione.png') }}" alt=""> {{ $propiedad->{'M2 Totales'} }} m²
                    </span>
                    @endif
                </div>

                <div class="precio-boton">
                    <p class="precio-propiedad">
@if($propiedad->{'Precio por unidad'})
    @php
        $precio = $propiedad->{'Precio por unidad'};
        // Limpiar el precio: quitar $, espacios y puntos de miles
        $precio_limpio = preg_replace('/[^0-9.]/', '', $precio);
        // Si tiene puntos de miles (como 3.101.872), convertirlos
        if (substr_count($precio_limpio, '.') > 1) {
            $precio_limpio = str_replace('.', '', $precio_limpio);
        }
    @endphp

    @if(is_numeric($precio_limpio))
        ${{ number_format(floatval($precio_limpio), 0, '.', ',') }}
    @else
        {{ $precio }}
    @endif
@else
    Precio no disponible
@endif
                    </p>
                    <a class="btn-detalles" href="{{ route('propiedad.show', $propiedad->id) }}">Ver detalles</a>
                </div>
            </div>
        </article>
        @endforeach
            </div>
            {{-- contenedor preventa --}}
              <div class="grid-propiedades preventa-seccion">
                <!-- Tarjeta 1 -->
            @foreach($preventa as $propiedad)
        <!-- Tarjeta {{ $loop->iteration }} -->
        <article class="tarjeta-propiedad">
            <div class="imagen-propiedad">
                <div class="tags-propiedad">
                    {{-- insignias --}}
                    {{-- <span class="tag">Desarrollo</span> --}}
                    @if($propiedad->{'Entrega Inmediata/Preventa'})
                        <span class="tag">{{ $propiedad->{'Entrega Inmediata/Preventa'} }}</span>
                    @endif
                </div>
                {{-- <img src="{{ $propiedad->{'Link Drive'} }}" alt="{{ $propiedad->{'Nombre de la Propiedad'} }}" loading="lazy"> --}}

        @if($propiedad->{'Link Imagen'})
            <img src="{{ $propiedad->{'Link Imagen'} }}" alt="{{ $propiedad->{'Nombre de la Propiedad'} }}" class="prop-hero-img">
        @else
            {{-- <img src="{{ asset('imagenes/propiedades/propiedad1.webp') }}" alt="{{ $propiedad->{'Nombre de la Propiedad'} }}" class="prop-hero-img"> --}}
        @endif            </div>
            <div class="contenido-propiedad">
                <h3>{{ $propiedad->{'Nombre Kibah'} }}</h3>
                <p class="direccion-propiedad">
                    {{ $propiedad->Colonia }}, {{ $propiedad->Alcaldía }}
                </p>

                <div class="detalles-propiedad">
                    <span class="item-detalle">
                        <img src="{{ asset('imagenes/cama.png') }}" alt=""> {{ $propiedad->{'Número de Recámaras'} ?? 'N/A' }}
                    </span>
                    <span class="separador-detalle">|</span>
                    <span class="item-detalle">
                        <img src="{{ asset('imagenes/ducha.png') }}" alt=""> {{ $propiedad->{'Número de Baños'} ?? 'N/A' }}
                    </span>
                    @if($propiedad->{'M2 Totales'})
                    <span class="separador-detalle">|</span>
                    <span class="item-detalle">
                        <img src="{{ asset('imagenes/seleccione.png') }}" alt=""> {{ $propiedad->{'M2 Totales'} }} m²
                    </span>
                    @endif
                </div>

                <div class="precio-boton">
                    <p class="precio-propiedad">
@if($propiedad->{'Precio por unidad'})
    @php
        $precio = $propiedad->{'Precio por unidad'};
        // Limpiar el precio: quitar $, espacios y puntos de miles
        $precio_limpio = preg_replace('/[^0-9.]/', '', $precio);
        // Si tiene puntos de miles (como 3.101.872), convertirlos
        if (substr_count($precio_limpio, '.') > 1) {
            $precio_limpio = str_replace('.', '', $precio_limpio);
        }
    @endphp

    @if(is_numeric($precio_limpio))
        ${{ number_format(floatval($precio_limpio), 0, '.', ',') }}
    @else
        {{ $precio }}
    @endif
@else
    Precio no disponible
@endif
                    </p>
                    <a class="btn-detalles" href="{{ route('propiedad.show', $propiedad->id) }}">Ver detalles</a>
            </div>
        </article>
        @endforeach
            </div>
        </div>
    </section>
    {{-- tarjetas --}}
    <section class="seccion-servicios">
        <h2 class="titulo-servicios">LO QUE ESTAMOS PROPORCIONANDO</h2>

        <div class="grid-servicios">

            <!-- TARJETA 1 -->
            <div class="tarjeta-servicio">
                <div class="icono-servicio">
                    <img src="{{ asset('imagenes/iconos/icono (6).webp') }}" alt="Créditos" loading="lazy" />
                </div>
                <h3>CRÉDITOS HIPOTECARIOS</h3>
                <p>Te ayudamos a conseguir tu préstamo con facilidad y claridad, asegurando que obtengas las mejores
                    condiciones posibles.</p>
                <a href="#" class="btn-servicio">COMENZAR MI TRÁMITE</a>
            </div>

            <!-- TARJETA 2 -->
            <div class="tarjeta-servicio">
                <div class="icono-servicio">
                    <img src="{{ asset('imagenes/iconos/icono (2).webp') }}" alt="Casa" loading="lazy" />
                </div>
                <h3>VENTA INTEGRAL PARA DESARROLLADORES</h3>
                <p>Servicio completo de marketing, desde la estrategia hasta la conversión. IA para respuestas y
                    seguimiento precisos.</p>
                <a href="#" class="btn-servicio">COMENZAR AHORA</a>
            </div>

            <!-- TARJETA 3 -->
            <div class="tarjeta-servicio">
                <div class="icono-servicio">
                    <img src="{{ asset('imagenes/iconos/icono (4).webp') }}" alt="Vender propiedad"
                        loading="lazy" />
                </div>
                <h3>VENDE TU PROPIEDAD</h3>
                <p>Hacemos que vender tu casa sea fácil y rentable. Nos ocupamos de todo, desde analizar el precio hasta
                    encontrar al comprador perfecto.</p>
                <a href="#" class="btn-servicio">COMENZAR AHORA</a>
            </div>

            <!-- TARJETA 4 -->
            <div class="tarjeta-servicio">
                <div class="icono-servicio">
                    <img src="{{ asset('imagenes/iconos/icono (3).webp') }}" alt="Renta" loading="lazy" />
                </div>
                <h3>RENTA TU PROPIEDAD</h3>
                <p>¿Quieres rentar tu casa? Nos encargamos de todo, desde promocionarla en línea hasta manejar los
                    trámites.</p>
                <a href="#" class="btn-servicio">COMENZAR AHORA</a>
            </div>

            <!-- TARJETA 5 -->
            <div class="tarjeta-servicio">
                <div class="icono-servicio">
                    <img src="{{ asset('imagenes/iconos/icono (5).webp') }}" alt="Inversionista" loading="lazy" />
                </div>
                <h3>ARMA TU PORTAFOLIO INVERSIONISTA</h3>
                <p>Te guiamos para elegir las mejores propiedades para invertir, asegurando que tu dinero trabaje por
                    ti.</p>
                <a href="#" class="btn-servicio">COMENZAR AHORA</a>
            </div>

            <!-- TARJETA 6 -->
            <div class="tarjeta-servicio">
                <div class="icono-servicio">
                    <img src="{{ asset('imagenes/iconos/icono (1).webp') }}" alt="Equipo" loading="lazy" />
                </div>
                <h3>FORMA PARTE DEL EQUIPO</h3>
                <p>¿Te apasiona el mundo inmobiliario? Envíanos tu CV y descubre cómo crecer con nosotros.</p>
                <a href="#" class="btn-servicio">COMENZAR AHORA</a>
            </div>

        </div>
    </section>
    {{-- formulario de contarcto --}}
    <section id="contacto" class="seccion-contacto">
        <div class="contenedor-contacto">

            <!-- Columna izquierda: imagen -->
            <div class="columna-imagen">
                <img src="{{ asset('imagenes/edi.webp') }}" alt="Edificio Kibah">
            </div>

            <!-- Columna derecha: texto + iframe -->
            <div class="columna-formulario">

                <h2>¿ESTÁS BUSCANDO LA CASA DE TUS SUEÑOS?</h2>
                <p class="subtexto-form">
                    Podemos ayudarle a hacer realidad su sueño de un nuevo hogar.
                </p>

                <!-- Aquí va tu iframe de GHL -->
                <div class="contenedor-iframe">
                    <iframe src="https://api.leadconnectorhq.com/widget/form/JX0UXsO8XNsQLwyHASpj"
                        style="width:100%;height:100%;border:none;border-radius:3px" id="inline-JX0UXsO8XNsQLwyHASpj"
                        data-layout="{'id':'INLINE'}" data-trigger-type="alwaysShow" data-trigger-value=""
                        data-activation-type="alwaysActivated" data-activation-value=""
                        data-deactivation-type="neverDeactivate" data-deactivation-value=""
                        data-form-name="Página kibah principal" data-height="575"
                        data-layout-iframe-id="inline-JX0UXsO8XNsQLwyHASpj" data-form-id="JX0UXsO8XNsQLwyHASpj"
                        title="Página kibah principal">
                    </iframe>
                    <script src="https://link.msgsndr.com/js/form_embed.js"></script>
                </div>

            </div>

        </div>
    </section>
    {{-- footer --}}
    @include('footer')
</body>

</html>


<script>
    let preventaBtn = document.querySelector('.preventa');
    let inmediataBtn = document.querySelector('.inmediata')
    let preventaSeccion = document.querySelector('.preventa-seccion')
    let inmediataSeccion = document.querySelector('.inmediata-seccion')
    preventaSeccion.style.display = 'none'

    preventaBtn.addEventListener('click', ()=>{
        preventaSeccion.style.display = 'flex'
        inmediataSeccion.style.display = 'none'
    })

    inmediataBtn.addEventListener('click', ()=>{
        inmediataSeccion.style.display = 'flex'
        preventaSeccion.style.display = 'none'
    })


    function realizarBusqueda() {
        const colonia = document.querySelector('[name="colonia"]').value;
        const recamaras = document.querySelector('[name="recamaras"]').value;
        const banos = document.querySelector('[name="banos"]').value;
        const tipoPropiedad = document.querySelector('[name="tipo_propiedad"]').value;

        console.log('Parámetros de búsqueda:', {
            colonia: colonia,
            recamaras: recamaras,
            banos: banos,
            tipoPropiedad: tipoPropiedad
        });

        let url = '/buscar?';
        const params = [];

        if (colonia) params.push(`colonia=${encodeURIComponent(colonia)}`);
        if (recamaras) params.push(`recamaras=${encodeURIComponent(recamaras)}`);
        if (banos) params.push(`banos=${encodeURIComponent(banos)}`);
        if (tipoPropiedad) params.push(`tipo_propiedad=${encodeURIComponent(tipoPropiedad)}`);

        const finalUrl = url + params.join('&');
        console.log('URL final:', finalUrl);

        window.location.href = finalUrl;
    }

function verDetalle(id) {
    // Redirigir a la página de detalles
    window.location.href = `/propiedad/${id}/`;
}
</script>
