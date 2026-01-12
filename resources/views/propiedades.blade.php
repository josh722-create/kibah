<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('css/propie.css') }}">
    <title>Propiedades</title>
</head>

<body>
    {{-- menu --}}
    @include('header')
    {{-- padre propiedades --}}
    <section class="propiedadesvista">
        <h1>Propiedades</h1>
        <div class="grid-propiedades">
            <!-- Tarjeta 1 -->
@foreach($propiedades as $propiedad)
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
        {{ $precio }} {{-- Mostrar el precio original si no se puede limpiar --}}
    @endif
@else
    Precio no disponible
@endif
                    </p>
                    <a class="btn-detalles" onclick="verDetalle({{ $propiedad->id }}, '{{ Str::slug($propiedad->{'Nombre de la Propiedad'}) }}')">Ver detalles</a>
                </div>
            </div>
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
    @include('footer')
</body>

</html>

<script>
function verDetalle(id) {
    // Redirigir a la página de detalles
    window.location.href = `/propiedad/${id}/`;
}
</script>
