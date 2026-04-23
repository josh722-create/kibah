<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kibah</title>
    <meta name="description" content="Nos especializamos en descubrir y ofrecer acceso a precios de preventa exclusivos, garantizando que maximices tu inversión desde el inicio.">
    <meta name="google-site-verification" content="YMEajd8zI1kh4yPV0Rx2YiR726MNsrdGDO9FXQqPV2M" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/propie.css') }}">
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
</head>

<body>
    @include('header-inicio')
    @include('header')

    <section class="propiedadesvista">
        <h1 style="margin-top: 100px">Propiedades</h1>
        <div class="grid-propiedades" id="grid-propiedades">
@php
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
            <p class="direccion-propiedad">{{ $propiedad->Colonia }}, {{ $propiedad->Alcaldía }}</p>
            <div class="detalles-propiedad">
                <span class="item-detalle">
                    <img src="{{ asset('imagenes/cama.png') }}" alt="">
                    {{ $mostrarRango($propiedad->{'Recámaras Min'}, $propiedad->{'Recámaras Max'}) }}
                </span>
                <span class="separador-detalle">|</span>
                <span class="item-detalle">
                    <img src="{{ asset('imagenes/ducha.png') }}" alt="">
                    {{ $mostrarRango($propiedad->{'Baños Min'}, $propiedad->{'Baños Max'}) }}
                </span>
                @if($propiedad->{'Estacionamientos Min'} || $propiedad->{'Estacionamientos Max'})
                    <span class="separador-detalle">|</span>
                    <span class="item-detalle">
                        <img src="{{ asset('imagenes/cochera.png') }}" alt="">
                        {{ $mostrarRango($propiedad->{'Estacionamientos Min'}, $propiedad->{'Estacionamientos Max'}) }}
                    </span>
                @endif
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

        <div style="text-align:center; margin: 2rem 0;" id="contenedor-btn-mas">
            @if($totalPropiedades > 12)
            <button id="btn-cargar-mas" class="btn-search" onclick="cargarMas()">Cargar más propiedades</button>
            @endif
        </div>
    </section>

    @include('whatsapp')
    @include('footer')

<script>
    const propiedadBaseUrl = "{{ url('/propiedad') }}";
    const imagenCama     = "{{ asset('imagenes/cama.png') }}";
    const imagenDucha    = "{{ asset('imagenes/ducha.png') }}";
    const imagenCochera  = "{{ asset('imagenes/cochera.png') }}";
    let offset = 12;
    const total = {{ $totalPropiedades }};

    function rango(min, max, sufijo) {
        sufijo = sufijo || '';
        if (min && max && min != max) return min + ' - ' + max + sufijo;
        if (max) return max + sufijo;
        if (min) return min + sufijo;
        return 'N/A';
    }

    function formatPrecio(valor) {
        if (!valor) return null;
        const num = parseFloat(String(valor).replace(/[^0-9.]/g, ''));
        if (isNaN(num)) return null;
        return '$' + num.toLocaleString('en-US', { maximumFractionDigits: 0 });
    }

    function construirTarjeta(p) {
        const tag = p['Entrega Inmediata/Preventa']
            ? `<span class="tag">${p['Entrega Inmediata/Preventa']}</span>` : '';
        const img = p['Link Imagen']
            ? `<img src="${p['Link Imagen']}" alt="${p['Nombre de la Propiedad'] || ''}" class="prop-hero-img">` : '';

        const recamaras = rango(p['Recámaras Min'], p['Recámaras Max']);
        const banos     = rango(p['Baños Min'], p['Baños Max']);

        let estacionamiento = '';
        if (p['Estacionamientos Min'] || p['Estacionamientos Max']) {
            estacionamiento = `
                <span class="separador-detalle">|</span>
                <span class="item-detalle">
                    <img src="${imagenCochera}" alt="">
                    ${rango(p['Estacionamientos Min'], p['Estacionamientos Max'])}
                </span>`;
        }

        const precioMin = formatPrecio(p['Precio Min']);
        const precioMax = formatPrecio(p['Precio Max']);
        let precioTexto = 'Precio no disponible';
        if (precioMin && precioMax) precioTexto = precioMin + ' - ' + precioMax;
        else if (precioMax) precioTexto = precioMax;
        else if (precioMin) precioTexto = precioMin;

        return `
        <article class="tarjeta-propiedad">
            <a style="text-decoration:none;" href="${propiedadBaseUrl}/${p.id}">
                <div class="imagen-propiedad">
                    <div class="tags-propiedad">${tag}</div>
                    ${img}
                </div>
                <div class="contenido-propiedad">
                    <h3>${p['Nombre Kibah'] || ''}</h3>
                    <p class="direccion-propiedad">${p['Colonia'] || ''}, ${p['Alcaldía'] || ''}</p>
                    <div class="detalles-propiedad">
                        <span class="item-detalle">
                            <img src="${imagenCama}" alt="">${recamaras}
                        </span>
                        <span class="separador-detalle">|</span>
                        <span class="item-detalle">
                            <img src="${imagenDucha}" alt="">${banos}
                        </span>
                        ${estacionamiento}
                    </div>
                    <div class="precio-boton">
                        <p class="precio-propiedad">${precioTexto}</p>
                        <a class="btn-detalles" href="${propiedadBaseUrl}/${p.id}">Ver detalles</a>
                    </div>
                </div>
            </a>
        </article>`;
    }

    function cargarMas() {
        const btn = document.getElementById('btn-cargar-mas');
        btn.disabled = true;
        btn.textContent = 'Cargando...';

        fetch(`/cargar-mas?offset=${offset}`)
            .then(r => r.json())
            .then(propiedades => {
                const grid = document.getElementById('grid-propiedades');
                propiedades.forEach(p => {
                    grid.insertAdjacentHTML('beforeend', construirTarjeta(p));
                });
                offset += propiedades.length;
                if (offset >= total) {
                    document.getElementById('contenedor-btn-mas').style.display = 'none';
                } else {
                    btn.disabled = false;
                    btn.textContent = 'Cargar más propiedades';
                }
            });
    }
</script>
</body>

</html>
