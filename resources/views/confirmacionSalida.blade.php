<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
            text-align: center;
            height: 100vh;
            width: 100vw;
            background-image: url("{{url('/images/entrada_fondo.jpg')}}");
            background-size: cover;
        }

        .message {
            width: 40vw;
            height: 60vh;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            align-content: center;
            border-radius: 40px;
            color: white;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }

        .img{
            width: 20vw;
            height: 40vh;
        }


    </style>
</head>
<body>

<div class="message">
    @if($valido)
        <h1>Barrera Abierta</h1>
        <img class="img" src="{{url('/images/salida.gif')}}">
        <h2>GRACIAS POR SU VISITA</h2>
        <h2>Estado: Válido</h2>
    @else
        <img class="img" src="{{url('/images/no_pagado.gif')}}">
        <h1>Ticket inválido o no pagado</h1>
        <h2>Estado: Inválido</h2>
    @endif
</div>

<script>
    setTimeout(function() {
        window.location.assign('{{ route("ticket.salidaFinal") }}');
    }, 3500);
</script>

</body>
</html>
