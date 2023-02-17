{{--<head>
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            text-align: center;

            background-image: url("./amigoinvisible.png");
            background-size: cover;
            background-position-x: -10vh;
            background-repeat: no-repeat;
        }
    </style>
</head>

<div class="container">
    <form action="{{ route('ticket.create') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="matricula">Matricula</label>
            <input type="text" class="form-control" id="matricula" name="matricula" placeholder="Introduce la matricula del vehiculo">
        </div>
        <button type="submit" class="btn btn-primary">Generar Ticket</button>
    </form>
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

        .container {
            width: 50vw;
            height: 50vh;
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

        .matricula {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            align-content: center;
        }

        .form-control {
            opacity: 0.5;
        }

        .label {
            margin-right: 15px;
            margin-top: 10px;
        }

    </style>

</head>
<body>

<div class="container">
    <form action="{{ route('ticket.create') }}" method="post">
        @csrf
        <div class="form-group">
            <h1>INTRODUZCA SU MATRÍCULA</h1>
            <p>Bienvenido a nuestro parking, esperamos que le guste nuestro establecimiento.</p>
            <label for="matricula">Matricula:</label>
            <div class="matricula">
                <label class="label">(OPCIONAL)</label>
                <input type="text" class="form-control" id="matricula" name="matricula" placeholder="Introduce la matricula del vehiculo">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Generar Ticket</button>
    </form>
</div>


</body>
</html>
