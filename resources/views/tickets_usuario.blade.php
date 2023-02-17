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

        .container {
            color: white;
        }

        .row {
            margin: auto;
            width: 90vw;
            height: 70vh;
            overflow: auto;
            display: flex;
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

        .filtrado1 {
            display: flex;
            justify-content: space-around;
            margin: auto;
            align-items: center;
            align-content: center;
        / / margin-bottom: 10 %;
            width: 100vh;
            height: 5vh;
        }

        .form-group2 {
            display: flex;
            justify-content: center;
            margin: auto;
            align-items: center;
            align-content: center;
            width: 70vh;
            height: 10vh;
        // border:2px solid black;
        }

        .top {
            margin: 0;
            padding: 0;
        // border:2px solid greenyellow;
        }

        .form-group {
            display: flex;
            justify-content: center;
            margin: auto;
            align-items: center;
            align-content: center;
            width: 40%;
            height: 10vh;

        }

    </style>

</head>
<body>

<div class="container">
    <br>







    <div class="row">


        <h2>TICKETS DE   -  <span style="color: #68ff00">{{ strtoupper($usuario->name) }}</span></h2>
        <div class="col-md-12">
            <table class="table" id="myTable">
                <thead>
                <tr>
                    <th><a href="#" style="text-decoration: none; color: white">Código</a></th>
                    <th><a href="#" style="text-decoration: none; color: white">Matrícula</a></th>
                    <th><a href="#" style="text-decoration: none; color: white">Fecha Entrada</a></th>
                    <th><a href="#" style="text-decoration: none; color: white">Fecha Salida</a></th>
                    <th><a href="#" style="text-decoration: none; color: white">Estado</a></th>
                    <th><a href="#" style="text-decoration: none; color: white">Importe</a></th>
                    <th><a href="#" style="text-decoration: none; color: white">Importe + Tarifa</a></th>
                    <th><a href="#" style="text-decoration: none; color: white">Tipo Tarifa</a></th>
                    <th><a href="#" style="text-decoration: none; color: white">Dinero Entregado</a></th>
                    <th><a href="#" style="text-decoration: none; color: white">Devolucion</a></th>
                    <th><a href="#" style="text-decoration: none; color: white">Fecha Pago</a></th>
                    <th>Editar</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tickets as $ticket)

                    <tr>
                        <td>{{ $ticket->codigo }}</td>
                        <td>{{ $ticket->matricula }}</td>
                        <td>{{ $ticket->fecha_entrada }}</td>
                        <td>{{ $ticket->fecha_salida }}</td>
                        <td>{{ $ticket->estado }}</td>
                        <td>{{ number_format($ticket->importe, 2) }}€</td>
                        <td>{{ round($ticket->impoteTarifa,2) }}€</td>
                        <td>{{ $ticket->tarifa }}</td>
                        <td>{{ round($ticket->dinero_pagado,2) }}€</td>
                        <td>{{ number_format($ticket->devolucion_dinero, 2) }}€</td>
                        <td>{{ $ticket->fecha_pago }}</td>
                        <td><a href="{{ route('ticket.editarTicket', ['id' =>  $ticket->id]) }}"
                               class="btn btn-info">Editar</a></td>
                    </tr>

                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>
