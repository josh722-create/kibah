<!DOCTYPE html>
<html lang="en">

<head>
            <!-- Meta Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '939355188912587');
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=939355188912587&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Meta Pixel Code -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/propiedad.css') }}">
    <meta name="robots" content="noindex">
    <title>{{ $propiedad->{'Nombre de la Propiedad'} }}</title>
</head>

<body>
    {{-- header --}}
    @include('header')
    {{-- imagen principal --}}
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

<section class="prop-hero">
    @php
        $tieneImagen = fn($val) => strlen(trim($val ?? '')) >= 5;
        $extrasImagenes = [];
        if ($tieneImagen($propiedad->{'Imagen 1'})) $extrasImagenes[] = $propiedad->{'Imagen 1'};
        if ($tieneImagen($propiedad->{'Imagen 2'})) $extrasImagenes[] = $propiedad->{'Imagen 2'};
        if ($tieneImagen($propiedad->{'Imagen 3'})) $extrasImagenes[] = $propiedad->{'Imagen 3'};
        $usarSlider = count($extrasImagenes) > 0;
        $sliderImagenes = $usarSlider
            ? array_merge([$propiedad->{'Link Imagen'}], $extrasImagenes)
            : [];
    @endphp

    @if ($usarSlider)
        <div class="prop-hero-slider">
            @foreach ($sliderImagenes as $index => $img)
                <div class="prop-slide {{ $index === 0 ? 'active' : '' }}">
                    <img src="{{ $img }}" alt="{{ $propiedad->{'Nombre de la Propiedad'} }} - Imagen {{ $index + 1 }}" class="prop-hero-img">
                </div>
            @endforeach

            <button class="prop-slide-btn prev" onclick="propSlider(-1)" aria-label="Anterior">&#8249;</button>
            <button class="prop-slide-btn next" onclick="propSlider(1)" aria-label="Siguiente">&#8250;</button>
            <div class="prop-slide-dots">
                @foreach ($sliderImagenes as $index => $img)
                    <span class="prop-dot {{ $index === 0 ? 'active' : '' }}" onclick="propSliderGo({{ $index }})"></span>
                @endforeach
            </div>
        </div>
    @elseif ($tieneImagen($propiedad->{'Link Imagen'}))
        <img src="{{ $propiedad->{'Link Imagen'} }}" alt="{{ $propiedad->{'Nombre de la Propiedad'} }}"
            class="prop-hero-img">
    @endif

    <div class="prop-hero-overlay"></div>

    <div class="prop-hero-content">

        <div class="prop-etiquetas">
            @if ($propiedad->{'Entrega Inmediata/Preventa'})
                <span>{{ $propiedad->{'Entrega Inmediata/Preventa'} }}</span>
            @endif
            @if ($propiedad->{'Tipo de Entrega'})
                <span>{{ $propiedad->{'Tipo de Entrega'} }}</span>
            @endif
        </div>

        <h1 class="prop-titulo">{{ $propiedad->{'Nombre Kibah'} }}</h1>

        <p class="prop-precio">
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

        <p class="prop-direccion">
            <img src="{{ asset('imagenes/ubicaciones.png') }}" alt=""> {{ $propiedad->{'Dirección'} ?? '' }}
            {{ $propiedad->{'Colonia'} ?? '' }}, {{ $propiedad->{'Alcaldia'} ?? '' }}
        </p>

    </div>

</section>

{{-- miniaturas del slider --}}
@if ($usarSlider)
<div class="prop-thumbnails">
    @foreach ($sliderImagenes as $index => $img)
        <div class="prop-thumb {{ $index === 0 ? 'active' : '' }}" onclick="propSliderGo({{ $index }})">
            <img src="{{ $img }}" alt="{{ $propiedad->{'Nombre de la Propiedad'} }} - Imagen {{ $index + 1 }}">
        </div>
    @endforeach
</div>
@endif

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
                            <span>{{ $mostrarRango($propiedad->{'Recámaras Min'}, $propiedad->{'Recámaras Max'}) }}</span>
                        </div>
                    </div>

                    <div class="item-resumen">
                        <p class="label-resumen">Baños</p>
                        <div class="valor-resumen">
                            <img src="{{ asset('imagenes/ducha.png') }}" alt="">
                            <span>{{ $mostrarRango($propiedad->{'Baños Min'}, $propiedad->{'Baños Max'}) }}</span>
                        </div>
                    </div>

                    <div class="item-resumen">
                        <p class="label-resumen">Cocheras</p>
                        <div class="valor-resumen">
                            <img src="{{ asset('imagenes/cochera.png') }}" alt="">
                            <span>{{ $mostrarRango($propiedad->{'Estacionamientos Min'}, $propiedad->{'Estacionamientos Max'}) }}</span>
                        </div>
                    </div>

                    <div class="item-resumen">
                        <p class="label-resumen">Área</p>
                        <div class="valor-resumen">
                            <img src="{{ asset('imagenes/seleccione.png') }}" alt="">
                            <span>{{ $mostrarRango($propiedad->{'M2 Totales Min'}, $propiedad->{'M2 Totales Max'}, ' m²') }}</span>
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
                        @if ($propiedad->{'Disponibilidad'})
                            <br>
                            Disponibilidad: {{ $propiedad->{'Disponibilidad'} }}.
                        @endif
                    </p>
{{--
                    @if ($propiedad->Amenidades)
                        <h3 class="subtitulo-descripcion">Amenidades:</h3>
                        <ul class="lista-amenidades">
                            @foreach (explode(',', $propiedad->Amenidades) as $amenidad)
                                <li>{{ trim($amenidad) }}</li>
                            @endforeach
                        </ul>
                    @endif --}}
                    @if (!empty(trim($propiedad->{'Link Maps'} ?? '')))
                        <h3 class="subtitulo-descripcion">Mapa:</h3>
                        <div style="width: 100%; max-width: 800px; margin: 20px 0; position: relative; overflow: hidden; border-radius: 8px;">
                            <div style="position: relative;">
                                {!! str_replace(['width="640"', 'height="480"'], ['width="100%"', 'height="580"', 'style="border:0;"'], $propiedad->{'Link Maps'}) !!}
                            </div>
                            <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100px; background: white; z-index: 10;"></div>
                        </div>
                    @endif
                </div>

                <br>
                <h2>Agenda tu cita</h2>

                @if ($errors->any())
                    <div style="background:#fef2f2;border:1px solid #fca5a5;border-radius:6px;padding:12px 16px;margin-bottom:16px;font-size:14px;color:#b91c1c;">
                        <ul style="margin:0;padding-left:18px;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('contacto.enviar') }}" method="POST" class="form-agenda">
                    @csrf

                    <div class="form-group">
                        <label for="desarrollo">Propiedad de interés</label>
                        <input type="text" id="desarrollo" name="desarrollo" value="{{ old('desarrollo', $propiedad->{'Nombre Kibah'} ?: $propiedad->{'Nombre de la Propiedad'}) }}" placeholder="Nombre de la propiedad" required>
                    </div>

                    <div class="form-group">
                        <label for="nombre">Nombre completo</label>
                        <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" placeholder="Tu nombre" required>
                    </div>

                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input type="tel" id="telefono" name="telefono" value="{{ old('telefono') }}" placeholder="10 dígitos" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Correo electrónico</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="correo@ejemplo.com" required>
                    </div>

                    <div class="form-row-2col">
                        <div class="form-group">
                            <label for="fecha">Fecha</label>
                            <input type="date" id="fecha" name="fecha" value="{{ old('fecha') }}" min="{{ date('Y-m-d') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="hora">Hora</label>
                            <input type="time" id="hora" name="hora" value="{{ old('hora') }}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="presupuesto">Presupuesto aproximado</label>
                        <select id="presupuesto" name="presupuesto" required>
                            <option value="" disabled {{ old('presupuesto') ? '' : 'selected' }}>Selecciona un rango</option>
                            <option value="Menos de $1M"    {{ old('presupuesto') == 'Menos de $1M'    ? 'selected' : '' }}>Menos de $1,000,000</option>
                            <option value="$1M - $2M"       {{ old('presupuesto') == '$1M - $2M'       ? 'selected' : '' }}>$1,000,000 – $2,000,000</option>
                            <option value="$2M - $4M"       {{ old('presupuesto') == '$2M - $4M'       ? 'selected' : '' }}>$2,000,000 – $4,000,000</option>
                            <option value="$4M - $7M"       {{ old('presupuesto') == '$4M - $7M'       ? 'selected' : '' }}>$4,000,000 – $7,000,000</option>
                            <option value="Más de $7M"      {{ old('presupuesto') == 'Más de $7M'      ? 'selected' : '' }}>Más de $7,000,000</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="mensaje">Mensaje <span style="font-weight:400;color:#888;">(opcional)</span></label>
                        <textarea id="mensaje" name="mensaje" rows="3" placeholder="¿Algo más que quieras comentarnos?">{{ old('mensaje') }}</textarea>
                    </div>

                    <button type="submit" class="btn-agenda-submit">Enviar solicitud</button>
                </form>
            </section>


        </div>

        <aside class="propiedad-sidebar">
            {{-- <h2>Contáctanos</h2>
            <iframe src="https://api.leadconnectorhq.com/widget/form/mkE8bcNslcQhE8QNX5KJ"
                style="width:100%;height:100%;border:none;border-radius:3px" id="inline-mkE8bcNslcQhE8QNX5KJ"
                data-layout="{'id':'INLINE'}" data-trigger-type="alwaysShow" data-trigger-value=""
                data-activation-type="alwaysActivated" data-activation-value="" data-deactivation-type="neverDeactivate"
                data-deactivation-value="" data-form-name="Contacto propiedad " data-height="422"
                data-layout-iframe-id="inline-mkE8bcNslcQhE8QNX5KJ" data-form-id="mkE8bcNslcQhE8QNX5KJ"
                title="Contacto propiedad ">
            </iframe>
            <script src="https://link.msgsndr.com/js/form_embed.js"></script> --}}

            <br>
                <h3 class="titulo-seccion">Propiedad destacada</h3>

       {{-- propiedad individual --}}
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

<div class="grid-propiedades">
    @foreach($propiedadIndividual as $propiedadI)
    <article class="tarjeta-propiedad">
        <a style="text-decoration: none;" href="{{ route('propiedad.show', $propiedadI->id) }}">
            <div class="imagen-propiedad">
                <div class="tags-propiedad">
                    @if($propiedadI->{'Entrega Inmediata/Preventa'})
                        <span class="tag">{{ $propiedadI->{'Entrega Inmediata/Preventa'} }}</span>
                    @endif
                    @if($propiedadI->{'Tipo de Entrega'})
                        <span class="tag">{{ $propiedadI->{'Tipo de Entrega'} }}</span>
                    @endif
                </div>

                @if($propiedadI->{'Link Imagen'})
                    <img src="{{ $propiedadI->{'Link Imagen'} }}" alt="{{ $propiedadI->{'Nombre Kibah'} }}" loading="lazy">
                @else
                    <img src="{{ asset('imagenes/propiedades/propiedad1.jpg') }}" alt="{{ $propiedadI->{'Nombre Kibah'} }}" loading="lazy">
                @endif
            </div>

            <div class="contenido-propiedad">
                <h3>{{ $propiedadI->{'Nombre Kibah'} }}</h3>
                <p class="direccion-propiedad">
                    {{ $propiedadI->{'Dirección'} ?? '' }} {{ $propiedadI->{'Colonia'} ?? '' }}, {{ $propiedadI->{'Alcaldia'} ?? '' }}
                </p>

                <div class="detalles-propiedad">
                    {{-- Recámaras --}}
                    <span class="item-detalle">
                        <img src="{{ asset('imagenes/cama.png') }}" alt="">
                        {{ $mostrarRango($propiedadI->{'Recámaras Min'}, $propiedadI->{'Recámaras Max'}) }}
                    </span>

                    <span class="separador-detalle">|</span>

                    {{-- Baños --}}
                    <span class="item-detalle">
                        <img src="{{ asset('imagenes/ducha.png') }}" alt="">
                        {{ $mostrarRango($propiedadI->{'Baños Min'}, $propiedadI->{'Baños Max'}) }}
                    </span>

                    {{-- Estacionamientos (solo si existe) --}}
                    @if($propiedadI->{'Estacionamientos Min'} || $propiedadI->{'Estacionamientos Max'})
                        <span class="separador-detalle">|</span>
                        <span class="item-detalle">
                            <img src="{{ asset('imagenes/cochera.png') }}" alt="">
                            {{ $mostrarRango($propiedadI->{'Estacionamientos Min'}, $propiedadI->{'Estacionamientos Max'}) }}
                        </span>
                    @endif

                    {{-- M2 Totales --}}
                    {{-- @if($propiedadI->{'M2 Totales Min'} || $propiedadI->{'M2 Totales Max'})
                        <span class="separador-detalle">|</span>
                        <span class="item-detalle">
                            <img src="{{ asset('imagenes/seleccione.png') }}" alt="">
                            {{ $mostrarRango($propiedadI->{'M2 Totales Min'}, $propiedadI->{'M2 Totales Max'}, ' m²') }}
                        </span>
                    @endif --}}
                </div>

                <div class="precio-boton">
                    <p class="precio-propiedad">
                        @php
                            $precioMin = $propiedadI->{'Precio Min'} ? preg_replace('/[^0-9.]/', '', $propiedadI->{'Precio Min'}) : null;
                            $precioMax = $propiedadI->{'Precio Max'} ? preg_replace('/[^0-9.]/', '', $propiedadI->{'Precio Max'}) : null;
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
                    <a class="btn-detalles" href="{{ route('propiedad.show', $propiedadI->id) }}">Ver detalles</a>
                </div>
            </div>
        </a>
    </article>
    @endforeach

        {{-- Mensaje si no hay propiedades --}}
        @if($propiedadIndividual->count() === 0)
        <div class="sin-resultados">
            <p>No hay propiedades destacadas disponibles en este momento.</p>
        </div>
        @endif
    </div>
            {{-- <div class="prop-tipos">
                <h3 class="titulo-seccion">Tipos de propiedad</h3>

                <ul class="lista-tipos">
                    <li><a href="/propiedades/casa-familiar">Casa Familiar</a></li>
                    <li><a href="/propiedades/departamento">Departamento</a></li>
                    <li><a href="/propiedades/oficina">Oficina</a></li>
                    <li><a href="/propiedades/villa">Villa</a></li>
                    <li><a href="/propiedades/casas">Casas</a></li>
                    <li><a href="/propiedades/edificio-apartamentos">Edificio De Apartamentos</a></li>
                    <li><a href="/propiedades/tienda">Tienda</a></li>
                    <li><a href="/propiedades/tienda">Entrega Inmediata</a></li>
                    <li><a href="/propiedades/tienda">Preventa</a></li>

                </ul>
            </div> --}}

        </aside>

    </div>

   {{-- propiedades similares --}}
<section class="similares-propiedades">
    <h2>Propiedades Similares</h2>
    <br>
    <div class="grid-propiedades">
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

@foreach($propiedadesDestacadas as $propiedadDest)
<article class="tarjeta-propiedad">
    <a style="text-decoration: none;" href="{{ route('propiedad.show', $propiedadDest->id) }}">
        <div class="imagen-propiedad">
            <div class="tags-propiedad">
                @if($propiedadDest->{'Entrega Inmediata/Preventa'})
                    <span class="tag">{{ $propiedadDest->{'Entrega Inmediata/Preventa'} }}</span>
                @endif
                @if($propiedadDest->{'Tipo de Entrega'})
                    <span class="tag">{{ $propiedadDest->{'Tipo de Entrega'} }}</span>
                @endif
            </div>

            @if($propiedadDest->{'Link Imagen'})
                <img src="{{ $propiedadDest->{'Link Imagen'} }}" alt="{{ $propiedadDest->{'Nombre Kibah'} }}" loading="lazy">
            @else
                <img src="{{ asset('imagenes/propiedades/propiedad1.jpg') }}" alt="{{ $propiedadDest->{'Nombre Kibah'} }}" loading="lazy">
            @endif
        </div>

        <div class="contenido-propiedad">
            <h3>{{ $propiedadDest->{'Nombre Kibah'} }}</h3>
            <p class="direccion-propiedad">
                {{ $propiedadDest->{'Dirección'} ?? '' }} {{ $propiedadDest->{'Colonia'} ?? '' }}, {{ $propiedadDest->{'Alcaldia'} ?? '' }}
            </p>

            <div class="detalles-propiedad">
                {{-- Recámaras --}}
                <span class="item-detalle">
                    <img src="{{ asset('imagenes/cama.png') }}" alt="">
                    {{ $mostrarRango($propiedadDest->{'Recámaras Min'}, $propiedadDest->{'Recámaras Max'}) }}
                </span>

                <span class="separador-detalle">|</span>

                {{-- Baños --}}
                <span class="item-detalle">
                    <img src="{{ asset('imagenes/ducha.png') }}" alt="">
                    {{ $mostrarRango($propiedadDest->{'Baños Min'}, $propiedadDest->{'Baños Max'}) }}
                </span>

                {{-- Estacionamientos (solo si existe) --}}
                @if($propiedadDest->{'Estacionamientos Min'} || $propiedadDest->{'Estacionamientos Max'})
                    <span class="separador-detalle">|</span>
                    <span class="item-detalle">
                        <img src="{{ asset('imagenes/cochera.png') }}" alt="">
                        {{ $mostrarRango($propiedadDest->{'Estacionamientos Min'}, $propiedadDest->{'Estacionamientos Max'}) }}
                    </span>
                @endif

                {{-- M2 Totales --}}
                {{-- @if($propiedadDest->{'M2 Totales Min'} || $propiedadDest->{'M2 Totales Max'})
                    <span class="separador-detalle">|</span>
                    <span class="item-detalle">
                        <img src="{{ asset('imagenes/seleccione.png') }}" alt="">
                        {{ $mostrarRango($propiedadDest->{'M2 Totales Min'}, $propiedadDest->{'M2 Totales Max'}, ' m²') }}
                    </span>
                @endif --}}
            </div>

            <div class="precio-boton">
                <p class="precio-propiedad">
                    @php
                        $precioMin = $propiedadDest->{'Precio Min'} ? preg_replace('/[^0-9.]/', '', $propiedadDest->{'Precio Min'}) : null;
                        $precioMax = $propiedadDest->{'Precio Max'} ? preg_replace('/[^0-9.]/', '', $propiedadDest->{'Precio Max'}) : null;
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
                <a class="btn-detalles" href="{{ route('propiedad.show', $propiedadDest->id) }}">Ver detalles</a>
            </div>
        </div>
    </a>
</article>
@endforeach

        {{-- Mensaje si no hay propiedades --}}
        @if($propiedadesDestacadas->count() === 0)
        <div class="sin-resultados">
            <p>No hay propiedades destacadas disponibles en este momento.</p>
        </div>
        @endif
    </div>
</section>

    <!-- footer -->
    @include('whatsappdinamico', ['propiedad' => $propiedad])
    @include('footer')
</body>

</html>

<script>
function verDetalle(id) {
    window.location.href = `/propiedad/${id}/`;
}

(function() {
    var currentSlide = 0;
    var slides = document.querySelectorAll('.prop-slide');
    var dots = document.querySelectorAll('.prop-dot');
    var thumbs = document.querySelectorAll('.prop-thumb');

    function showSlide(n) {
        if (!slides.length) return;
        slides[currentSlide].classList.remove('active');
        if (dots[currentSlide]) dots[currentSlide].classList.remove('active');
        if (thumbs[currentSlide]) thumbs[currentSlide].classList.remove('active');
        currentSlide = (n + slides.length) % slides.length;
        slides[currentSlide].classList.add('active');
        if (dots[currentSlide]) dots[currentSlide].classList.add('active');
        if (thumbs[currentSlide]) thumbs[currentSlide].classList.add('active');
    }

    window.propSlider = function(dir) { showSlide(currentSlide + dir); };
    window.propSliderGo = function(n) { showSlide(n); };
})();
</script>
