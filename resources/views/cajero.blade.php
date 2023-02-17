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
            width: 50vw;
            height: 100vh;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            border-radius: 40px;
            color: white;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .container {
            width: 50vw;
            height: 100vh;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            border-radius: 40px;
            color: white;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }


        .card1 {
            float: left;
            width: 40vw;
            height: 50vh;
        / / border-radius: 30 px 0 0 30 px;
            background-color: white;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }

        .card3 {
            float: left;
            width: 80vw;
            height: 50vh;
            border-radius: 30px 0 0 30px;
            background-color: white;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }

        .card2 {
            float: right;
            width: 40vw;
            height: 50vh;
            border-radius: 0 30px 30px 0;
            background-color: white;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.18);
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
            width: 20vw;
            height: 40vh;
        }
    </style>

</head>
<body>
@if(!$pagado)
    <div class="container">

        @if(!isset($user))
            {{-- no existe la variable, con lo cual puede iniciar sesion --}}
            <div class="card3">
                <div class="card-header">
                    <h1>¿ERES CLIENTE?</h1>
                </div>
                <div class="card-body">

                    <form action="{{ route('comprobarCliente',$ticket->id) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="dni">DNI</label>
                            <input type="text" name="dni" id="dni" class="form-control">
                            <button type="submit" class="btn btn-primary">Iniciar Sesion</button>
                        </div>
                    </form>
                </div>
            </div>
        @else
            <div class="card3">
                <div class="card-header">
                    <h1>CLIENTE APLICADO {{  $user->dni }}</h1>
                </div>
            </div>
        @endif

        <div class="card1">
            <div class="card-header">
                <h1>TICKET</h1>
            </div>
            <div class="card-body">
                <p>Codigo: {{ $ticket->id }}</p>
                <p>Fecha entrada: {{ $ticket->fecha_entrada }}</p>
                <p>Matricula: {{ $ticket->matricula }}</p>
                <p>Estado: {{ $ticket->estado }}</p>


            </div>
        </div>

        @if(!isset($user))

            <div class="card2">
                <div class="card-header">
                    <h1>IMPORTE</h1>
                </div>
                <div class="card-body">
                    <form action="/ticket/pagar/{{ $ticket->id }}/-1" method="post">
                        @csrf
                        <div class="form-group">
                            {{--   <p>diferencia de minutos: {{ $dif->$diffInMinutes }}</p>--}}
                            @if($ticket->importe)
                                <p>Importe a pagar: {{ round($ticket->importe,2) }}€</p>
                                {{--  <p>Fecha de salida: {{ $ticket->fecha_salida }}</p>--}}
                            @endif
                            <label for="amount_paid">Dinero entregado</label>
                            <input type="text" name="amount_paid" id="amount_paid" class="form-control">
                            <br>
                            <button type="submit" class="btn btn-primary">Pagar</button>
                        </div>
                    </form>
                </div>
            </div>
        @else
            <div class="card2">
                <div class="card-header">
                    <h1>IMPORTE</h1>
                </div>
                <div class="card-body">
                    {{-- <form action="{{ route('ticket.pagar', $ticket->id) }}" method="post">--}}
                    <form action="/ticket/pagar/{{ $ticket->id }}/{{ $user->id }}"
                          method="post">
                        @csrf
                        <div class="form-group">
                            {{--   <p>diferencia de minutos: {{ $dif->$diffInMinutes }}</p>--}}
                            @if($ticket->importe)
                                <p>Importe a pagar: {{ round($ticket->importe,2) }}€</p>
                                {{--  <p>Fecha de salida: {{ $ticket->fecha_salida }}</p>--}}
                            @endif
                            <label for="amount_paid">Dinero entregado</label>
                            <input type="text" name="amount_paid" id="amount_paid" class="form-control">
                            <br>
                            <button type="submit" class="btn btn-primary">Pagar</button>
                        </div>
                    </form>
                </div>
            </div>
        @endif

    </div>
@else
    <div class="message">
        <img class="img" src="{{url('/images/no_pagado.gif')}}">
        <h1>Ticket inexistente o ya pagado</h1>
        <h2>Estado: Inválido</h2>
    </div>



    {{--
        <div class="container">
            <h1>No existe el ticket o ya esta pagado</h1>
        </div>
    --}}

    <script>
        setTimeout(function () {
            window.location.assign('{{ route("ticket.listado") }}');
        }, 2500);
    </script>
@endif


</body>
</html>
