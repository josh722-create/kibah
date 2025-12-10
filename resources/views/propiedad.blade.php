<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/propiedad.css') }}">

    <title>{{ $propiedad->{'Nombre de la Propiedad'} }}</title>
</head>

<body>
    {{-- header --}}
    @include('header')
    {{-- imagen principal --}}
    <section class="prop-hero">
        @if($propiedad->{'Link Imagen'})
            <img src="{{ $propiedad->{'Link Imagen'} }}" alt="{{ $propiedad->{'Nombre de la Propiedad'} }}" class="prop-hero-img">
        @else
            {{-- <img src="{{ asset('imagenes/propiedades/propiedad1.webp') }}" alt="{{ $propiedad->{'Nombre de la Propiedad'} }}" class="prop-hero-img"> --}}
        @endif

        <div class="prop-hero-overlay"></div>

        <div class="prop-hero-content">

            <div class="prop-etiquetas">
                @if($propiedad->{'Entrega Inmediata/Preventa'})
                    <span>{{ $propiedad->{'Entrega Inmediata/Preventa'} }}</span>
                @endif
                @if($propiedad->{'Tipo de Entrega'})
                    <span>{{ $propiedad->{'Tipo de Entrega'} }}</span>
                @endif
            </div>

            <h1 class="prop-titulo">{{ $propiedad->{'Nombre de la Propiedad'} }}</h1>

            <p class="prop-precio">
                @if($propiedad->{'Precio por unidad'})
                    ${{ number_format($propiedad->{'Precio por unidad'}, 0, '.', ',') }}
                @else
                    Precio no disponible
                @endif
            </p>

            <p class="prop-direccion">
                📍 {{ $propiedad->{'Dirección'} ?? '' }} {{ $propiedad->{'Colonia'} ?? '' }}, {{ $propiedad->{'Alcaldia'} ?? '' }}
            </p>

        </div>

    </section>
{{-- descripcion --}}
<div class="propiedad-layout">

    <div class="propiedad-descripcion">
<section class="propiedad-info">

    <!-- RESUMEN -->
    <div class="bloque-resumen">
        <h2 class="titulo-seccion">Resumen</h2>

        <div class="grupo-resumen">

            <div class="item-resumen">
                <p class="label-resumen">Habitaciones</p>
                <div class="valor-resumen">
                    <img src="{{ asset('imagenes/cama.png') }}" alt="">
                    <span>{{ $propiedad->{'Número de Recámaras'} ?? 'N/A' }}</span>
                </div>
            </div>

            <div class="item-resumen">
                <p class="label-resumen">Baños</p>
                <div class="valor-resumen">
                    <img src="{{ asset('imagenes/ducha.png') }}" alt="">
                    <span>{{ $propiedad->{'Número de Baños'} ?? 'N/A' }}</span>
                </div>
            </div>

            <div class="item-resumen">
                <p class="label-resumen">Cocheras</p>
                <div class="valor-resumen">
                    <img src="{{ asset('imagenes/cochera.png') }}" alt="">
                    @if($propiedad->{'Lugares de Estacionamiento'} < 1)
                        <span>N/A</span>
                    @else
                    <span>{{ $propiedad->{'Lugares de Estacionamiento'} }}</span>
                    @endif
                </div>
            </div>

             <div class="item-resumen">
                <p class="label-resumen">Area</p>
                <div class="valor-resumen">
                    <img src="{{ asset('imagenes/seleccione.png') }}" alt="">
                    <span>{{ $propiedad->{'M2 Totales'} ?? 'N/A' }} m²</span>
                </div>
            </div>

            <div class="item-resumen">
                <p class="label-resumen">Fecha de construcción</p>
                <div class="valor-resumen">
                    <img src="{{ asset('imagenes/calendario.png') }}" alt="">
                    <span>{{ $propiedad->{'Fecha de Construcción/Entrega'} ?? 'N/A' }}</span>
                </div>
            </div>

        </div>
    </div>

    <!-- DESCRIPCIÓN -->
    <div class="bloque-descripcion">
        <h2 class="titulo-seccion">Descripción</h2>

<p>
    {{ $propiedad->{'Descripción Desarrollo'} }}
    @if($propiedad->{'Disponibilidad'})
        <br>
        Disponibilidad: {{ $propiedad->{'Disponibilidad'} }}.
    @endif
</p>

        @if($propiedad->Amenidades)
        <h3 class="subtitulo-descripcion">Amenidades:</h3>
        <ul class="lista-amenidades">
            @foreach(explode(',', $propiedad->Amenidades) as $amenidad)
                <li>{{ trim($amenidad) }}</li>
            @endforeach
        </ul>
        @endif
    </div>

    <br>
    <h2>Agenda tu cita</h2>
<iframe
    src="https://api.leadconnectorhq.com/widget/form/vIaBlUNA9zYY0pBcyUqF"
    style="width:100%;height:100%;border:none;border-radius:3px"
    id="inline-vIaBlUNA9zYY0pBcyUqF"
    data-layout="{'id':'INLINE'}"
    data-trigger-type="alwaysShow"
    data-trigger-value=""
    data-activation-type="alwaysActivated"
    data-activation-value=""
    data-deactivation-type="neverDeactivate"
    data-deactivation-value=""
    data-form-name="Agendar cita"
    data-height="561"
    data-layout-iframe-id="inline-vIaBlUNA9zYY0pBcyUqF"
    data-form-id="vIaBlUNA9zYY0pBcyUqF"
    title="Agendar cita"
        >
</iframe>
<script src="https://link.msgsndr.com/js/form_embed.js"></script>
</section>


    </div>

    <aside class="propiedad-sidebar">
        <h2>Contáctanos</h2>
        <iframe
    src="https://api.leadconnectorhq.com/widget/form/mkE8bcNslcQhE8QNX5KJ"
    style="width:100%;height:100%;border:none;border-radius:3px"
    id="inline-mkE8bcNslcQhE8QNX5KJ"
    data-layout="{'id':'INLINE'}"
    data-trigger-type="alwaysShow"
    data-trigger-value=""
    data-activation-type="alwaysActivated"
    data-activation-value=""
    data-deactivation-type="neverDeactivate"
    data-deactivation-value=""
    data-form-name="Contacto propiedad "
    data-height="422"
    data-layout-iframe-id="inline-mkE8bcNslcQhE8QNX5KJ"
    data-form-id="mkE8bcNslcQhE8QNX5KJ"
    title="Contacto propiedad "
        >
</iframe>
<script src="https://link.msgsndr.com/js/form_embed.js"></script>

<br>
<div class="prop-tipos">
    <h3 class="titulo-seccion">Tipos de propiedad</h3>

    <ul class="lista-tipos">
        <li><a href="/propiedades/casa-familiar">Casa Familiar</a></li>
        <li><a href="/propiedades/departamento">Departamento</a></li>
        <li><a href="/propiedades/oficina">Oficina</a></li>
        <li><a href="/propiedades/villa">Villa</a></li>
        <li><a href="/propiedades/casas">Casas</a></li>
        <li><a href="/propiedades/edificio-apartamentos">Edificio De Apartamentos</a></li>
        <li><a href="/propiedades/tienda">Tienda</a></li>
    </ul>
</div>

    </aside>

</div>

{{-- propiedades similares --}}
<section class="similares-propiedades">
<h2>Propiedades Similares</h2>
<br>
<div class="grid-propiedades">
            <!-- Tarjeta 1 -->
            <article class="tarjeta-propiedad">
                <div class="imagen-propiedad">
                    <div class="tags-propiedad">
                        {{-- insignias --}}
                        <span class="tag">Desarrollo</span>
                        <span class="tag">PreVenta</span>
                    </div>
                    <img src="{{ asset('imagenes/propiedades/propiedad1.jpg') }}" alt="Nuevo León II" loading="lazy">
                </div>
                <div class="contenido-propiedad">
                    <h3>Nuevo León II</h3>
                    <p class="direccion-propiedad">
                        Hipódromo Condesa, Ciudad de México, Cuauhtémoc
                    </p>

                    <div class="detalles-propiedad">
                        <span class="item-detalle">
                            <!-- Iconos de ejemplo, puedes cambiarlos por imágenes -->
                            🛏 2
                        </span>
                        <span class="separador-detalle">|</span>
                        <span class="item-detalle">
                            🛁 2
                        </span>
                    </div>

                    <div class="precio-boton">
                        <p class="precio-propiedad">$7,789,328</p>
                        <a href="#" class="btn-detalles">Ver detalles</a>
                    </div>
                </div>
            </article>

            <!-- Tarjeta 2 -->
            <article class="tarjeta-propiedad">
                <div class="imagen-propiedad">
                    <div class="tags-propiedad">
                        {{-- insignias --}}
                        <span class="tag">Desarrollo</span>
                        <span class="tag">PreVenta</span>
                    </div>
                    <img src="{{ asset('imagenes/propiedades/propiedad2.webp') }}" alt="Juárez I" loading="lazy">
                </div>
                <div class="contenido-propiedad">
                    <h3>Juárez I</h3>
                    <p class="direccion-propiedad">
                        Avenida Juárez, Barrio Chino, Centro, Ciudad de México
                    </p>

                    <div class="detalles-propiedad">
                        <span class="item-detalle">🛏 1</span>
                        <span class="separador-detalle">|</span>
                        <span class="item-detalle">🛁 1</span>
                    </div>

                    <div class="precio-boton">
                        <p class="precio-propiedad">$5,008,607</p>
                        <a href="#" class="btn-detalles">Ver detalles</a>
                    </div>
                </div>
            </article>

            <!-- Tarjeta 3 -->
            <article class="tarjeta-propiedad">
                <div class="imagen-propiedad">
                    <div class="tags-propiedad">
                        {{-- insignias --}}
                        <span class="tag">Desarrollo</span>
                        <span class="tag">PreVenta</span>
                    </div>
                    <img src="{{ asset('imagenes/propiedades/propiedad1.webp') }}" alt="Tabacalera I" loading="lazy">
                </div>
                <div class="contenido-propiedad">
                    <h3>Tabacalera I</h3>
                    <p class="direccion-propiedad">
                        Tabacalera, Ciudad de México, Cuauhtémoc
                    </p>

                    <div class="detalles-propiedad">
                        <span class="item-detalle">🛏 1–2</span>
                        <span class="separador-detalle">|</span>
                        <span class="item-detalle">🛁 1</span>
                    </div>

                    <div class="precio-boton">
                        <p class="precio-propiedad">$5,110,783</p>
                        <a href="#" class="btn-detalles">Ver detalles</a>
                    </div>
                </div>
            </article>
        </div>
</section>

    <!-- footer -->
    @include('footer')
</body>

</html>
