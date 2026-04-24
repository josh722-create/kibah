<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kibah</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        /* ── Formulario nosotros ── */
        .form-nosotros {
            display: flex;
            flex-direction: column;
            gap: 14px;
            width: 100%;
        }

        .form-nosotros .fn-row2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
        }

        .form-nosotros .fn-group {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .form-nosotros label {
            font-size: 13px;
            font-weight: 600;
            color: #1a1a2e;
            text-transform: uppercase;
            letter-spacing: .4px;
        }

        .form-nosotros input,
        .form-nosotros select,
        .form-nosotros textarea {
            width: 100%;
            padding: 11px 14px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 14px;
            color: #374151;
            background: #fff;
            box-sizing: border-box;
            transition: border-color .2s, box-shadow .2s;
        }

        .form-nosotros input:focus,
        .form-nosotros select:focus,
        .form-nosotros textarea:focus {
            outline: none;
            border-color: #c9a84c;
            box-shadow: 0 0 0 3px rgba(201,168,76,.15);
        }

        .form-nosotros textarea {
            resize: vertical;
            min-height: 80px;
        }

        .btn-nosotros-submit {
            width: 100%;
            padding: 14px;
            background: #c9a84c;
            color: #fff;
            font-size: 15px;
            font-weight: 700;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            letter-spacing: .5px;
            transition: background .2s;
            margin-top: 4px;
        }

        .btn-nosotros-submit:hover {
            background: #a8873a;
        }

        @media (max-width: 560px) {
            .form-nosotros .fn-row2 {
                grid-template-columns: 1fr;
            }
        }
    </style>
    <meta name="description" content="Nos especializamos en descubrir y ofrecer acceso a precios de preventa exclusivos, garantizando que maximices tu inversión desde el inicio.">
    <meta name="google-site-verification" content="YMEajd8zI1kh4yPV0Rx2YiR726MNsrdGDO9FXQqPV2M" />
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
        {{-- <div class="banner-filtro">
            <div class="filtro-box">

                <div class="filtro-tabs">
                    @foreach ($tiposEntrega as $tipo)
                        <button class="tab">{{ $tipo }}</button>
                    @endforeach
                    <button class="tab active">Desarrollo</button>
                    <button class="tab">Entrega Inmediata</button>
                    <button class="tab">PreVenta</button>
                    <button class="tab">Ticket de inversión</button>
                </div> --}}

{{-- <div class="filtro-body">
    <label>Ubicación principal</label>
    <select name="colonia">
        <option value="" {{ !request('colonia') ? 'selected' : '' }}>Todas las colonias</option>
        @foreach ($colonias as $colonia)
            <option value="{{ $colonia }}" {{ request('colonia') == $colonia ? 'selected' : '' }}>
                {{ $colonia }}
            </option>
        @endforeach
    </select>

    <label>Recámaras mínimas</label>
    <select name="recamaras_min">
        <option value="" {{ !request('recamaras_min') ? 'selected' : '' }}>Todas las recámaras</option>
        <option value="1" {{ request('recamaras_min') == '1' ? 'selected' : '' }}>1+</option>
        <option value="2" {{ request('recamaras_min') == '2' ? 'selected' : '' }}>2+</option>
        <option value="3" {{ request('recamaras_min') == '3' ? 'selected' : '' }}>3+</option>
        <option value="4" {{ request('recamaras_min') == '4' ? 'selected' : '' }}>4+</option>
        <option value="5" {{ request('recamaras_min') == '5' ? 'selected' : '' }}>5+</option>
    </select>

    <label>Baños mínimos</label>
    <select name="banos_min">
        <option value="" {{ !request('banos_min') ? 'selected' : '' }}>Todos los baños</option>
        <option value="1" {{ request('banos_min') == '1' ? 'selected' : '' }}>1+</option>
        <option value="2" {{ request('banos_min') == '2' ? 'selected' : '' }}>2+</option>
        <option value="3" {{ request('banos_min') == '3' ? 'selected' : '' }}>3+</option>
        <option value="4" {{ request('banos_min') == '4' ? 'selected' : '' }}>4+</option>
        <option value="5" {{ request('banos_min') == '5' ? 'selected' : '' }}>5+</option>
    </select>

    <label>Tipos de propiedad</label>
    <select name="tipo_propiedad">
        <option value="" {{ !request('tipo_propiedad') ? 'selected' : '' }}>Todos los tipos</option>
        <option value="Entrega Inmediata" {{ request('tipo_propiedad') == 'Entrega Inmediata' ? 'selected' : '' }}>
            Entrega Inmediata
        </option>
        <option value="Preventa" {{ request('tipo_propiedad') == 'Preventa' ? 'selected' : '' }}>
            Preventa
        </option>
    </select>

    <button class="btn-search" type="button" onclick="realizarBusqueda()">
        Buscar
    </button>
</div> --}}

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
                    {{-- <button class="filtro-propiedad inmediata">Entrega Inmediata</button> --}}
                    {{-- <button class="filtro-propiedad preventa">PreVenta</button> --}}
                    {{-- <button class="filtro-propiedad">Ticket de inversión</button> --}}
                    {{-- <button class="filtro-propiedad">Último departamento</button> --}}
                </div>
            </div>
            {{-- contenedor entrega inmediata --}}

            <div class="grid-propiedades inmediata-seccion">
                <!-- Tarjeta 1 -->
@php
    // Función helper para mostrar rangos (Min - Max)
    $mostrarRango = function($min, $max, $sufijo = '') {
        if ($min && $max && $min != $max) {
            return $min . ' - ' . $max . $sufijo;
        } elseif ($max) {
            return $max . $sufijo;
        } elseif ($min) {
            return $min . $sufijo;
        }
        return 'N/A';
    };
@endphp

@foreach($propiedadesDestacadasHome as $propiedad)
<!-- Tarjeta {{ $loop->iteration }} -->
<article class="tarjeta-propiedad">
    <a style="text-decoration: none;" href="{{ route('propiedad.show', $propiedad->id) }}">
        <div class="imagen-propiedad">
            <div class="tags-propiedad">
                @if($propiedad->{'Entrega Inmediata/Preventa'})
                    <span class="tag">{{ $propiedad->{'Entrega Inmediata/Preventa'} }}</span>
                @endif
            </div>

            @if($propiedad->{'Link Imagen'})
                <img src="{{ $propiedad->{'Link Imagen'} }}" alt="{{ $propiedad->{'Nombre de la Propiedad'} }}" class="prop-hero-img">
            @endif
        </div>

        <div class="contenido-propiedad">
            <h3>{{ $propiedad->{'Nombre Kibah'} }}</h3>
            <p class="direccion-propiedad">
                {{ $propiedad->Colonia }}, {{ $propiedad->Alcaldía }}
            </p>

            <div class="detalles-propiedad">
                {{-- Recámaras --}}
                <span class="item-detalle">
                    <img src="{{ asset('imagenes/cama.png') }}" alt="">
                    {{ $mostrarRango($propiedad->{'Recámaras Min'}, $propiedad->{'Recámaras Max'}) }}
                </span>

                <span class="separador-detalle">|</span>

                {{-- Baños --}}
                <span class="item-detalle">
                    <img src="{{ asset('imagenes/ducha.png') }}" alt="">
                    {{ $mostrarRango($propiedad->{'Baños Min'}, $propiedad->{'Baños Max'}) }}
                </span>

                {{-- Estacionamientos (solo si existe) --}}
                @if($propiedad->{'Estacionamientos Min'} || $propiedad->{'Estacionamientos Max'})
                    <span class="separador-detalle">|</span>
                    <span class="item-detalle">
                        <img src="{{ asset('imagenes/cochera.png') }}" alt="">
                        {{ $mostrarRango($propiedad->{'Estacionamientos Min'}, $propiedad->{'Estacionamientos Max'}) }}
                    </span>
                @endif

                {{-- M2 Totales --}}
                {{-- @if($propiedad->{'M2 Totales Min'} || $propiedad->{'M2 Totales Max'})
                    <span class="separador-detalle">|</span>
                    <span class="item-detalle">
                        <img src="{{ asset('imagenes/seleccione.png') }}" alt="">
                        {{ $mostrarRango($propiedad->{'M2 Totales Min'}, $propiedad->{'M2 Totales Max'}, ' m²') }}
                    </span>
                @endif --}}
            </div>

            <div class="precio-boton">
                <p class="precio-propiedad">
                    @php
                        $precioMin = $propiedad->{'Precio Min'} ? preg_replace('/[^0-9.]/', '', $propiedad->{'Precio Min'}) : null;
                        $precioMax = $propiedad->{'Precio Max'} ? preg_replace('/[^0-9.]/', '', $propiedad->{'Precio Max'}) : null;
                    @endphp

                    @if($precioMin && $precioMax)
                        ${{ number_format($precioMin, 0, '.', ',') }} - ${{ number_format($precioMax, 0, '.', ',') }}
                    @elseif($precioMax)
                        ${{ number_format($precioMax, 0, '.', ',') }}
                    @elseif($precioMin)
                        ${{ number_format($precioMin, 0, '.', ',') }}
                    @else
                        Precio no disponible
                    @endif
                </p>
                <a class="btn-detalles" href="{{ route('propiedad.show', $propiedad->id) }}">Ver detalles</a>
            </div>
        </div>
    </a>
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
                <a href="https://wa.me/5215527150540?text=quiero%20informaci%C3%B3n%20sobre%20un%20cr%C3%A9dito%20hipotecario" target="_blank"  class="btn-servicio">COMENZAR MI TRÁMITE</a>
            </div>

            <!-- TARJETA 2 -->
            <div class="tarjeta-servicio">
                <div class="icono-servicio">
                    <img src="{{ asset('imagenes/iconos/icono (2).webp') }}" alt="Casa" loading="lazy" />
                </div>
                <h3>VENTA INTEGRAL PARA DESARROLLADORES</h3>
                <p>Servicio completo de marketing, desde la estrategia hasta la conversión. IA para respuestas y
                    seguimiento precisos.</p>
                <a href="https://tupropiedad.kibah.com.mx/venta?_gl=1*wsgmxp*_ga*MTExMzU3NzE0Ny4xNzM4MjY0ODAy*_ga_2E9TCB8Y9J*czE3NzIxMjU0MTQkbzQ5JGcxJHQxNzcyMTI1Njg1JGo2MCRsMCRoMA.." target="_blank" class="btn-servicio">COMENZAR AHORA</a>
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
                <a href="https://tupropiedad.kibah.com.mx/" target="_blank" class="btn-servicio">COMENZAR AHORA</a>
            </div>

            <!-- TARJETA 4 -->
            <div class="tarjeta-servicio">
                <div class="icono-servicio">
                    <img src="{{ asset('imagenes/iconos/icono (3).webp') }}" alt="Renta" loading="lazy" />
                </div>
                <h3>RENTA TU PROPIEDAD</h3>
                <p>¿Quieres rentar tu casa? Nos encargamos de todo, desde promocionarla en línea hasta manejar los
                    trámites.</p>
                <a href="https://tupropiedad.kibah.com.mx/renta" target="_blank" class="btn-servicio">COMENZAR AHORA</a>
            </div>

            <!-- TARJETA 5 -->
            <div class="tarjeta-servicio">
                <div class="icono-servicio">
                    <img src="{{ asset('imagenes/iconos/icono (5).webp') }}" alt="Inversionista" loading="lazy" />
                </div>
                <h3>ARMA TU PORTAFOLIO INVERSIONISTA</h3>
                <p>Te guiamos para elegir las mejores propiedades para invertir, asegurando que tu dinero trabaje por
                    ti.</p>
                <a href="https://wa.me/5215527150540?text=hola%20quiero%20gu%C3%ADa%20para%20armar%20mi%20portafolio%20inversionista" target="_blank" class="btn-servicio">COMENZAR AHORA</a>
            </div>

            <!-- TARJETA 6 -->
            <div class="tarjeta-servicio">
                <div class="icono-servicio">
                    <img src="{{ asset('imagenes/iconos/icono (1).webp') }}" alt="Equipo" loading="lazy" />
                </div>
                <h3>FORMA PARTE DEL EQUIPO</h3>
                <p>¿Te apasiona el mundo inmobiliario? Envíanos tu CV y descubre cómo crecer con nosotros.</p>
                <a href="https://wa.me/5215527150540?text=hola%2C%20quiero%20ser%20parte%20del%20equipo" target="_blank" class="btn-servicio">COMENZAR AHORA</a>
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

                @if ($errors->any())
                    <div style="background:#fef2f2;border:1px solid #fca5a5;border-radius:6px;padding:12px 16px;margin-bottom:16px;font-size:14px;color:#b91c1c;">
                        <ul style="margin:0;padding-left:18px;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('contacto.enviarNosotros') }}" method="POST" class="form-nosotros">
                    @csrf

                    <div class="fn-row2">
                        <div class="fn-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" placeholder="Tu nombre" required>
                        </div>
                        <div class="fn-group">
                            <label for="apellido">Apellido</label>
                            <input type="text" id="apellido" name="apellido" value="{{ old('apellido') }}" placeholder="Tu apellido" required>
                        </div>
                    </div>

                    <div class="fn-row2">
                        <div class="fn-group">
                            <label for="telefono">Teléfono</label>
                            <input type="tel" id="telefono" name="telefono" value="{{ old('telefono') }}" placeholder="10 dígitos" required>
                        </div>
                        <div class="fn-group">
                            <label for="email">Correo electrónico</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="correo@ejemplo.com" required>
                        </div>
                    </div>

                    <div class="fn-group">
                        <label for="desarrollo">Desarrollo de interés</label>
                        <input type="text" id="desarrollo" name="desarrollo" value="{{ old('desarrollo') }}" placeholder="¿Qué desarrollo te interesa?">
                    </div>

                    <div class="fn-row2">
                        <div class="fn-group">
                            <label for="presupuesto">Rango de presupuesto</label>
                            <select id="presupuesto" name="presupuesto" required>
                                <option value="" disabled {{ old('presupuesto') ? '' : 'selected' }}>Selecciona un rango</option>
                                <option value="Menos de $1M"  {{ old('presupuesto') == 'Menos de $1M'  ? 'selected' : '' }}>Menos de $1,000,000</option>
                                <option value="$1M - $2M"     {{ old('presupuesto') == '$1M - $2M'     ? 'selected' : '' }}>$1M – $2M</option>
                                <option value="$2M - $4M"     {{ old('presupuesto') == '$2M - $4M'     ? 'selected' : '' }}>$2M – $4M</option>
                                <option value="$4M - $7M"     {{ old('presupuesto') == '$4M - $7M'     ? 'selected' : '' }}>$4M – $7M</option>
                                <option value="Más de $7M"    {{ old('presupuesto') == 'Más de $7M'    ? 'selected' : '' }}>Más de $7M</option>
                            </select>
                        </div>
                        <div class="fn-group">
                            <label for="metros">Metros cuadrados deseados</label>
                            <input type="text" id="metros" name="metros" value="{{ old('metros') }}" placeholder="Ej. 80 m²">
                        </div>
                    </div>

                    <div class="fn-group">
                        <label for="comentarios">Comentarios</label>
                        <textarea id="comentarios" name="comentarios" rows="3" placeholder="¿Algo más que quieras comentarnos?">{{ old('comentarios') }}</textarea>
                    </div>

                    <button type="submit" class="btn-nosotros-submit">Enviar solicitud</button>
                </form>

            </div>

        </div>
    </section>
    {{-- footer --}}
    @include('whatsapp')
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
    const recamarasMin = document.querySelector('[name="recamaras_min"]').value;
    const banosMin = document.querySelector('[name="banos_min"]').value;
    const tipoPropiedad = document.querySelector('[name="tipo_propiedad"]').value;

    let url = '/buscar?';
    const params = [];

    if (colonia) params.push(`colonia=${encodeURIComponent(colonia)}`);
    if (recamarasMin) params.push(`recamaras_min=${encodeURIComponent(recamarasMin)}`);
    if (banosMin) params.push(`banos_min=${encodeURIComponent(banosMin)}`);
    if (tipoPropiedad) params.push(`tipo_propiedad=${encodeURIComponent(tipoPropiedad)}`);

    const finalUrl = url + params.join('&');
    window.location.href = finalUrl;
}

function verDetalle(id) {
    // Redirigir a la página de detalles
    window.location.href = `/propiedad/${id}/`;
}
</script>
