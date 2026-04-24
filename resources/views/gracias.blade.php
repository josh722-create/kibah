<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gracias por contactarnos</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <style>
        .gracias-section {
            min-height: 70vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 80px 20px;
            text-align: center;
        }

        .gracias-card {
            max-width: 560px;
            width: 100%;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0px 6px 32px rgba(0,0,0,0.1);
            padding: 60px 48px;
        }

        .gracias-icon {
            width: 72px;
            height: 72px;
            background: var(--color-accent);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 28px;
            font-size: 36px;
            color: #fff;
            margin-top: 100px;
        }

        .gracias-card h1 {
            font-family: 'ArialCustom', Arial, sans-serif;
            font-size: 32px;
            font-weight: 700;
            color: var(--color-primary);
            margin-bottom: 16px;
        }

        .gracias-card p {
            font-size: 16px;
            color: var(--color-gray);
            line-height: 1.6;
            margin-bottom: 36px;
        }

        .btn-ver-propiedades {
            display: inline-block;
            background: var(--color-accent);
            color: #fff;
            font-size: 16px;
            font-weight: 600;
            padding: 14px 36px;
            border-radius: 6px;
            text-decoration: none;
            transition: background 0.2s;
        }

        .btn-ver-propiedades:hover {
            background: var(--color-accent-dark);
        }
    </style>
</head>
<body>
    @include('header')

    <section class="gracias-section">
        <div class="gracias-card">
            <div class="gracias-icon">&#10003;</div>
            <h1>¡Gracias por contactarnos!</h1>
            <p>Hemos recibido tu solicitud. Un asesor se pondrá en contacto contigo a la brevedad para confirmar tu cita.</p>
            <a href="{{ route('home') }}" class="btn-ver-propiedades">Ver más propiedades</a>
        </div>
    </section>

    @include('footer')
</body>
</html>
