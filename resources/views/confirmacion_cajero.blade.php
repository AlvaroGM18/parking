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

        .img {
            width: 10vw;
            height: 20vh;
        / / border: 2 px solid black;
        }

    </style>
</head>
<body>

@if($pagado)
    <div class="message">
        <img class="img" src="{{url('/images/pagado.gif')}}">
        <h1>PAGO REALIZADO CON EXITO</h1>
        <br>
        <h2>GRACIAS POR SU VISITA</h2>
        <br>
        <h3>Dinero a devolver: {{round($ticket->devolucion_dinero,2)}}€</h3>
    </div>

    <script>

        @if(is_int($user))
     {{--   setTimeout(function () {
            window.location.assign('{{ route("ticket.descargaPago",['id' =>  $ticket->id ]) }}');
        }, 1);--}}

        setTimeout(function () {
            window.location.assign(`/descargaPDFPagado/{{ $ticket->id }}/-1`);
        }, 1);
        @else
        setTimeout(function () {
            window.location.assign(`/descargaPDFPagado/{{ $ticket->id }}/{{ $user->id }}`);
        }, 1);
        @endif

        setTimeout(function () {
            window.location.href = "{{ route('ticket.listado') }}";
        }, 3500);
    </script>

@else
    <div class="message">
        <img class="img" src="{{url('/images/no_pagado.gif')}}">
        <h1>Dinero insuficiente</h1>
    </div>

    <script>
        setTimeout(function () {
            history.back();
        }, 2500);
    </script>

@endif

</body>
</html>


