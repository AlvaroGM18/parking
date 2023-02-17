<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
            text-align: center;
            height: 100vh;
            width: 100vw;
            background-image: url("{{url('/images/entrada_fondo.jpg')}}");
            background-size: cover;
        }

        .card {
            width: 50vw;
            height: 85vh;
            display: flex;
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
        .form-group {
            width: 70vh;
            height: 5vh;
        }

        .label {
            width: 20vh;
            text-align: left;
        }

        .ediccion {
            display: flex;
            width: 100vh;
            justify-content: space-around;
            align-items: center;
        }

    </style>

</head>
<body>

<div class="container">

    <div class="card">
        <div class="card-header"><h1>EDITAR USUARIO</h1></div>

        <div class="card-body">
            <form action="{{ route('ticket.updateTicket', $ticket->id) }}" method="POST">
                @csrf
                <div class="ediccion">
                    <label class="label" for="name">Codigo: </label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="codigo" name="codigo" value="{{ $ticket->codigo }}">
                    </div>
                </div>

                <div class="ediccion">
                    <label class="label" for="name">Matricula: </label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="matricula" name="matricula" value="{{ $ticket->matricula }}">
                    </div>
                </div>

                <div class="ediccion">
                    <label class="label" for="email">Fecha entrada: </label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="fecha_entrada" name="fecha_entrada" value="{{ $ticket->fecha_entrada }}">
                    </div>
                </div>

                <div class="ediccion">
                    <label class="label" for="email">Fecha salida: </label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="fecha_salida" name="fecha_salida" value="{{ $ticket->fecha_salida }}">
                    </div>
                </div>

                <div class="ediccion">
                    <label class="label" for="email">Estado: </label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="estado" name="estado" value="{{ $ticket->estado }}">
                    </div>
                </div>

                <div class="ediccion">
                    <label class="label" for="email">Importe: </label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="importe" name="importe" value="{{ $ticket->importe }}">
                    </div>
                </div>

                <div class="ediccion">
                    <label class="label" for="email">Dinero entregado: </label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="dinero_pagado" name="dinero_pagado" value="{{ $ticket->dinero_pagado }}">
                    </div>
                </div>

                <div class="ediccion">
                    <label class="label" for="email">Devolucion: </label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="devolucion_dinero" name="devolucion_dinero" value="{{ $ticket->devolucion_dinero }}">
                    </div>
                </div>

                <div class="ediccion">
                    <label class="label" for="email">Fecha pago: </label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="fecha_pago" name="fecha_pago" value="{{ $ticket->fecha_pago }}">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>
        </div>
    </div>

</div>

</body>
</html>
