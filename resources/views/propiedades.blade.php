<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="robots" content="noindex">
    <link rel="stylesheet" href="{{ asset('css/propie.css') }}">
    <title>Propiedades</title>
</head>

<body>
    {{-- menu --}}
    @include('header')
    {{-- padre propiedades --}}
    <section class="propiedadesvista">
        <h1 style="margin-top: 100px">Propiedades</h1>
        @if(count($coloniasSeleccionadas) > 0)
    <div class="filtros-activos">
        <p>Mostrando propiedades en:
            <strong>{{ implode(', ', $coloniasSeleccionadas) }}</strong>
        </p>
    </div>
@endif
        <div class="grid-propiedades">
            <!-- Tarjeta 1 -->@php
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

@foreach($propiedades as $propiedad)
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
                {{-- Mensaje cuando NO hay propiedades --}}
        @if($propiedades->count() === 0)
        <div class="no-propiedades">
            <p>No se encontraron propiedades con los filtros seleccionados.</p>
            {{-- <a href="{{ url('/') }}" class="btn-volver">Volver a buscar</a> --}}
        </div>
        @endif
        </div>
    </section>

    <!-- footer -->
    @include('whatsapp')
    @include('footer')
</body>

</html>

<script>
function verDetalle(id) {
    // Redirigir a la página de detalles
    window.location.href = `/propiedad/${id}/`;
}
</script>
