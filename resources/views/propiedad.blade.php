<!DOCTYPE html>
<html lang="en">

<head>
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
    <section class="prop-hero">
        @if ($propiedad->{'Link Imagen'})
            <img src="{{ $propiedad->{'Link Imagen'} }}" alt="{{ $propiedad->{'Nombre de la Propiedad'} }}"
                class="prop-hero-img">
        @else
            {{-- <img src="{{ asset('imagenes/propiedades/propiedad1.webp') }}" alt="{{ $propiedad->{'Nombre de la Propiedad'} }}" class="prop-hero-img"> --}}
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
        {{ $precio }} {{-- Mostrar el precio original si no se puede limpiar --}}
    @endif
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
                                @if ($propiedad->{'Lugares de Estacionamiento'} < 1)
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
                <iframe src="https://api.leadconnectorhq.com/widget/form/vIaBlUNA9zYY0pBcyUqF"
                    style="width:100%;height:100%;border:none;border-radius:3px" id="inline-vIaBlUNA9zYY0pBcyUqF"
                    data-layout="{'id':'INLINE'}" data-trigger-type="alwaysShow" data-trigger-value=""
                    data-activation-type="alwaysActivated" data-activation-value=""
                    data-deactivation-type="neverDeactivate" data-deactivation-value="" data-form-name="Agendar cita"
                    data-height="561" data-layout-iframe-id="inline-vIaBlUNA9zYY0pBcyUqF"
                    data-form-id="vIaBlUNA9zYY0pBcyUqF" title="Agendar cita">
                </iframe>
                <script src="https://link.msgsndr.com/js/form_embed.js"></script>
            </section>


        </div>

        <aside class="propiedad-sidebar">
            <h2>Contáctanos</h2>
            <iframe src="https://api.leadconnectorhq.com/widget/form/mkE8bcNslcQhE8QNX5KJ"
                style="width:100%;height:100%;border:none;border-radius:3px" id="inline-mkE8bcNslcQhE8QNX5KJ"
                data-layout="{'id':'INLINE'}" data-trigger-type="alwaysShow" data-trigger-value=""
                data-activation-type="alwaysActivated" data-activation-value="" data-deactivation-type="neverDeactivate"
                data-deactivation-value="" data-form-name="Contacto propiedad " data-height="422"
                data-layout-iframe-id="inline-mkE8bcNslcQhE8QNX5KJ" data-form-id="mkE8bcNslcQhE8QNX5KJ"
                title="Contacto propiedad ">
            </iframe>
            <script src="https://link.msgsndr.com/js/form_embed.js"></script>

            <br>
                <h3 class="titulo-seccion">Propiedad destacada</h3>

            {{-- propiedad individual --}}
             <div class="grid-propiedades">
        @foreach($propiedadIndividual as $propiedadI)
        <article class="tarjeta-propiedad">
                        <a  style="text-decoration: none;" href="{{ route('propiedad.show', $propiedadI->id) }}">

            <div class="imagen-propiedad">
                <div class="tags-propiedad">
                    {{-- insignias --}}
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
                    <span class="item-detalle">
                        <img src="{{ asset('imagenes/cama.png') }}" alt="">
                        {{ $propiedadI->{'Número de Recámaras'} ?? 'N/A' }}
                    </span>
                    <span class="separador-detalle">|</span>
                    <span class="item-detalle">
                        <img src="{{ asset('imagenes/ducha.png') }}" alt="">
                        {{ $propiedadI->{'Número de Baños'} ?? 'N/A' }}
                    </span>
                    <span class="separador-detalle">|</span>
                    <span class="item-detalle">
                        <img src="{{ asset('imagenes/seleccione.png') }}" alt="">
                        {{ $propiedadI->{'M2 Totales'} ?? 'N/A' }} m²
                    </span>
                </div>

                <div class="precio-boton">
                    <p class="precio-propiedad">
                        @if($propiedadI->precio_formateado ?? false)
                            {{ $propiedadI->precio_formateado }}
                        @elseif($propiedadI->{'Precio por unidad'} && is_numeric(floatval(str_replace(['$', '.', ','], '', $propiedadI->{'Precio por unidad'}))))
                            @php
                                $precio = $propiedadI->{'Precio por unidad'};
                                $precio_limpio = preg_replace('/[^0-9.]/', '', $precio);
                                if (substr_count($precio_limpio, '.') > 1) {
                                    $precio_limpio = str_replace('.', '', $precio_limpio);
                                }
                            @endphp
                            ${{ number_format(floatval($precio_limpio), 0, '.', ',') }}
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
        @foreach($propiedadesDestacadas as $propiedadDest)
        <article class="tarjeta-propiedad">
        <a  style="text-decoration: none;" href="{{ route('propiedad.show', $propiedadDest->id) }}">
            <div class="imagen-propiedad">
                <div class="tags-propiedad">
                    {{-- insignias --}}
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
                    <span class="item-detalle">
                        <img src="{{ asset('imagenes/cama.png') }}" alt="">
                        {{ $propiedadDest->{'Número de Recámaras'} ?? 'N/A' }}
                    </span>
                    <span class="separador-detalle">|</span>
                    <span class="item-detalle">
                        <img src="{{ asset('imagenes/ducha.png') }}" alt="">
                        {{ $propiedadDest->{'Número de Baños'} ?? 'N/A' }}
                    </span>
                    <span class="separador-detalle">|</span>
                    <span class="item-detalle">
                        <img src="{{ asset('imagenes/seleccione.png') }}" alt="">
                        {{ $propiedadDest->{'M2 Totales'} ?? 'N/A' }} m²
                    </span>
                </div>

                <div class="precio-boton">
                    <p class="precio-propiedad">
                        @if($propiedadDest->precio_formateado ?? false)
                            {{ $propiedadDest->precio_formateado }}
                        @elseif($propiedadDest->{'Precio por unidad'} && is_numeric(floatval(str_replace(['$', '.', ','], '', $propiedadDest->{'Precio por unidad'}))))
                            @php
                                $precio = $propiedadDest->{'Precio por unidad'};
                                $precio_limpio = preg_replace('/[^0-9.]/', '', $precio);
                                if (substr_count($precio_limpio, '.') > 1) {
                                    $precio_limpio = str_replace('.', '', $precio_limpio);
                                }
                            @endphp
                            ${{ number_format(floatval($precio_limpio), 0, '.', ',') }}
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
    // Redirigir a la página de detalles
    window.location.href = `/propiedad/${id}/`;
}
</script>
