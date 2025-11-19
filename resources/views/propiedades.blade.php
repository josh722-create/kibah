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
