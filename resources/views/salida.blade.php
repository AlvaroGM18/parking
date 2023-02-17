{{--
@if($ticket->estado == 0)
    <div class="container">
        <h1>Ticket no pagado</h1>
    </div>
    <script>
        setTimeout(function() {
           history.back();
        }, 2500);
    </script>

@else
    <div class="container">
        <form action="{{ route('ticket.confirmacionSalida',$ticket->id) }}" method="post">
            @csrf
            <div class="form-group">
                <label for="inputCodigo">Codigo del Ticket</label>
                <input type="text" name="inputCodigo" id="inputCodigo" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Salir</button>
        </form>
        <a href="javascript: history.back()">Volver atrás</a>
    </div>
@endif
--}}

{{--<div class="container">
    <form action="{{ route('ticket.confirmacionSalida') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="codigo">Codigo del Ticket</label>
            <input type="text" name="codigo" id="codigo" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Salir</button>
    </form>
    --}}{{--<a href="javascript: history.back()">Volver atrás</a>--}}{{--
</div>--}}


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

    </style>
</head>
<body>
<div class="container">
    <form action="{{ route('ticket.confirmacionSalida') }}" method="post">
        @csrf
        <div class="form-group">
            <h1>Codigo del Ticket</h1>
            <p>Introduce el codigo del ticket proporcionado en cajero</p>
            <input type="text" name="codigo" id="codigo" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Salir</button>
    </form>
    {{--<a href="javascript: history.back()">Volver atrÃ¡s</a>--}}
</div>

</body>
</html>
