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

            background-image: url("./amigoinvisible.png");
            background-size: cover;
            background-position-x: -10vh;
            background-repeat: no-repeat;
        }

        /*    .container {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }*/
        .btn {
            width: 450px;
            height: 600px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 21px;
        }

        .ticket-info {
            width: 450px;
            height: 600px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: gray;
            border-radius: 20px;
            box-shadow: 10px -4px 5px 0px rgba(0, 0, 0, 0.75);
            -webkit-box-shadow: 10px -4px 5px 0px rgba(0, 0, 0, 0.75);
            -moz-box-shadow: 10px -4px 5px 0px rgba(0, 0, 0, 0.75);
            padding: 20px;
            color: white;
        }

        .abs-center {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        a:nth-child(1) {
            background-image: url("{{url('/images/entrada.png')}}");
            background-size: cover;
            background-position-x: -40vh;
            background-repeat: no-repeat;
         /*   filter: blur(10px);
            -webkit-filter: blur(10px);*/
        }

        a:nth-child(2) {
            background-image: url("{{url('/images/cajero.jpg')}}");
            background-size: cover;
            background-position-x: -10vh;
            background-repeat: no-repeat;
        }

        a:nth-child(3) {
            background-image: url("{{url('/images/salida.jpg')}}");
            background-size: cover;
            background-position-x: -55vh;
            background-repeat: no-repeat;
        }

        a:nth-child(4) {
            background-image: url("{{url('/images/admin.jpg')}}");
            background-size: cover;
            background-position-x: -45vh;
            background-repeat: no-repeat;
            color: white;
        }

    </style>

</head>

<body>
<div class="container">
    <div class="abs-center">
        @if(!isset($ticket))
            <a class="btn btn-primary mr-2" href="{{ route('ticket.entrada') }}">ENTRADA</a>
            <a class="btn btn-secondary mr-2 disabled" href="{{ route('ticket.listado') }}" style="
              filter: grayscale(100%) brightness(0.5);

              ">CAJERO</a>
            <a class="btn btn-danger mr-2 disabled" href="{{ route('ticket.salidaFinal' , ['id' => -1]) }}" style="
              filter: grayscale(100%) brightness(0.5);

              ">SALIDA</a>
            <a class="btn btn-warning mr-2 " href="{{ route('ticket.administracion') }}" >ADMINISTRACION</a>
            {{--<div class="ticket-info">
                <h2 class="mt-4">SU TICKET</h2>
                <p>Código de ticket: </p>
                <p>Fecha de entrada: </p>
                <p>Matrícula: </p>
                <p>Estado: </p>
                <p>Importe: </p>
                <p>Pagado:</p>
                <p>Devuelto: </p>
                <p>Fecha de pago: </p>
            </div>--}}
        @else
            @if($ticket->estado == 1)
                <a class="btn btn-primary mr-2 disabled" href="{{ route('ticket.entrada') }}" style="filter: grayscale(100%) brightness(0.5);')">ENTRADA</a>
                <a class="btn btn-secondary mr-2 disabled" href="{{ route('ticket.listado') }}" style="filter: grayscale(100%) brightness(0.5);">CAJERO</a>
                <a class="btn btn-danger mr-2" href="{{ route('ticket.salidaFinal', ['id' =>  $ticket->id]) }}" style="background-position-x: -59vh;">SALIDA</a>
                <a class="btn btn-warning mr-2" href="{{ route('ticket.administracion') }}" style="background-position-x: -49vh;">ADMINISTRACION</a>


                <div class="ticket-info">
                    <h2 class="mt-4">SU TICKET</h2>
                    <p>Código de ticket: {{ $ticket->codigo }}</p>
                    <p>Fecha de entrada: {{ $ticket->fecha_entrada }}</p>
                    <p>Matrícula: {{ $ticket->matricula }}</p>
                    <p>Estado: {{ $ticket->estado }}</p>
                    <p>Importe: {{ $ticket->importe }}</p>
                    <p>Pagado: {{ $ticket->dinero_pagado }}</p>
                    <p>Devuelto: {{ $ticket->devolucion_dinero }}</p>
                    <p>Fecha de pago: {{ $ticket->fecha_pago }}</p>
                </div>

            @else
                <a class="btn btn-primary mr-2 disabled" href="{{ route('ticket.entrada') }}" style="filter: grayscale(100%) brightness(0.5);">ENTRADA</a>
                <a class="btn btn-secondary mr-2" href="{{ route('ticket.listado') }}">CAJERO</a>
                <a class="btn btn-danger mr-2"
                   href="{{ route('ticket.salidaFinal', ['id' =>  $ticket->id]) }}" style="background-position-x: -59vh;">SALIDA</a>
                <a class="btn btn-warning mr-2" href="{{ route('ticket.administracion') }}" style="background-position-x: -49vh;">ADMINISTRACION</a>

                <div class="ticket-info">
                    <h2 class="mt-4">SU TICKET</h2>
                    <p>Código de ticket: {{ $ticket->codigo }}</p>
                    <p>Fecha de entrada: {{ $ticket->fecha_entrada }}</p>
                    <p>Matrícula: {{ $ticket->matricula }}</p>
                    <p>Estado: {{ $ticket->estado }}</p>
                </div>
            @endif
        @endif

    </div>
</div>
</body>
</html>
