{{--<?php
sleep(5);
header("Location: welcome.blade.php");
exit;
?>

<div class="container">
    <h1>PAGO REALIZADO CON EXITO</h1>
    <h2>GRACIAS POR SU VISITA</h2>
{{--</div>--}}{{--
@if($existe)
    <div class="container">
        <p>ESTE VEHICULO YA SE ENCUENTRA EN NUESTRA ESTANCIA, DISCULPE LAS MOLESTIAS</p>
        <form action="{{ route('ticket.entrada') }}" method="get">
            <button type="submit" class="btn btn-primary">Volver</button>
        </form>
    </div>
@else
    <div class="message">
        <h1>Barrera Abierta</h1>
        <p>Codigo de ticket: {{ $ticket->id }}</p>
        <p>Fecha entrada: {{ $ticket->fecha_entrada }}</p>
        <p>Matricula: {{ $ticket->matricula }}</p>
        <p>Estado: {{ $ticket->estado }}</p>
    </div>
@endif
<script>
    /*    setTimeout(function() {
            window.location.assign('{{ route("ticket.homeTicket", ['id' =>  $ticket->id ]) }}');
    }, 2500);*/
    /*setTimeout(function() {
        window.location.assign('{{ route("ticket.entrada") }}');
    }, 3500);*/

    setTimeout(function () {
        window.location.assign('{{ route("ticket.descarga",['id' =>  $ticket->id ]) }}');
    }, 1);

    setTimeout(function () {
        window.location.assign('{{ route("ticket.entrada") }}');
    }, 2500);
</script>--}}


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
            width: 50vw;
            height: 70vh;
        //display: flex;
            justify-content: center;
            align-items: center;
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
        .container2{
            width: 50vw;
            height: 50vh;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            border-radius: 40px;
            color: white;

            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: rgba( 255, 255, 255, 0.05 );
            backdrop-filter: blur( 5px );
            -webkit-backdrop-filter: blur( 5px );
            border: 1px solid rgba( 255, 255, 255, 0.18 );
        }

    </style>
</head>
<body>

@if($existe)

    <div class="container">
        <p>ESTE VEHICULO YA SE ENCUENTRA EN NUESTRA ESTANCIA, DISCULPE LAS MOLESTIAS</p>
        <form action="{{ route('ticket.entrada') }}" method="get">
            <button type="submit" class="btn btn-primary">Volver</button>
        </form>
    </div>
@else
<div class="message">
    <h1>Barrera Abierta</h1>
    <img class="img" src="{{url('/images/open_parking.gif')}}">
    <p>Codigo de ticket: {{ $ticket->codigo }}</p>
    <p>Fecha entrada: {{ $ticket->fecha_entrada }}</p>
    <p>Matricula: {{ $ticket->matricula }}</p>
    <p>Estado: {{ $ticket->estado }}</p>
</div>
@endif
</body>
</html>

<script>
    setTimeout(function () {
        window.location.assign('{{ route("ticket.descarga",['id' =>  $ticket->id ]) }}');
    }, 1);

    setTimeout(function () {
        window.location.assign('{{ route("ticket.entrada") }}');
    }, 4500);
</script>




