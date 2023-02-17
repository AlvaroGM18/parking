{{--<!DOCTYPE html>
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

        .row {
            width: 70vw;
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
            background: rgba( 255, 255, 255, 0.05 );
            backdrop-filter: blur( 5px );
            -webkit-backdrop-filter: blur( 5px );
            border: 1px solid rgba( 255, 255, 255, 0.18 );
        }

        .form-group{
            display: flex;
            justify-content: center;
            margin: auto;
            align-items: center;
            align-content: center;
            width: 40%;
        }

    </style>

</head>
<body>


    <div class="container">
        <br>
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('tickets.filtrar') }}" method="get">
                    <div class="form-group">
                        <label for="matricula">Filtrar por matrícula:</label>
                        <input type="text" class="form-control" id="matricula" name="matricula">
                        <button type="submit" class="btn btn-primary">Filtrar</button>
                    </div>
                </form>
                <br>
            </div>

            <div class="col-md-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Código</th>
                        <th>Matrícula</th>
                        <th>Fecha Entrada</th>
                        <th>Estado</th>
                        <th>Seleccionar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tickets as $ticket)
                        @if($ticket->estado == 0)
                            <tr>
                                <td>{{ $ticket->codigo }}</td>
                                <td>{{ $ticket->matricula }}</td>
                                <td>{{ $ticket->fecha_entrada }}</td>
                                <td>{{ $ticket->estado }}</td>
                                <td><a href="{{ route('ticket.cajero', ['id' =>  $ticket->id]) }}"
                                       class="btn btn-primary">Seleccionar</a></td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>--}}


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

        .row {
            width: 70vw;
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

        .container2 {
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
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }

        /*
        .form-group{
            display: flex;
            justify-content: center;
            margin: auto;
            align-items: center;
            align-content: center;
            width: 40%;
        }
        */

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
    <form action="{{ route('ticket.cajero') }}" method="get">
        @csrf
        <div class="form-group">
            <h1>Codigo del Ticket</h1>
            <p>Introduce el codigo del ticket proporcionado en la entrada</p>
            <input type="text" name="codigo" id="codigo" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Salir</button>
    </form>
</div>

{{-- <br>
 <div class="row">
     <div class="col-md-12">
         <form action="{{ route('tickets.filtrar') }}" method="get">
             <div class="form-group">
                 <label for="matricula">Filtrar por matrícula:</label>
                 <input type="text" class="form-control" id="matricula" name="matricula">
                 <button type="submit" class="btn btn-primary">Filtrar</button>
             </div>
         </form>
         <br>
     </div>

     <div class="col-md-12">
         <table class="table">
             <thead>
             <tr>
                 <th>Código</th>
                 <th>Matrícula</th>
                 <th>Fecha Entrada</th>
                 <th>Estado</th>
                 <th>Seleccionar</th>
             </tr>
             </thead>
             <tbody>
             @foreach($tickets as $ticket)
                 @if($ticket->estado == 0)
                     <tr>
                         <td>{{ $ticket->codigo }}</td>
                         <td>{{ $ticket->matricula }}</td>
                         <td>{{ $ticket->fecha_entrada }}</td>
                         <td>{{ $ticket->estado }}</td>
                         <td><a href="{{ route('ticket.cajero', ['id' =>  $ticket->id]) }}"
                                class="btn btn-primary">Seleccionar</a></td>
                     </tr>
                 @endif
             @endforeach
             </tbody>
         </table>
     </div>
 </div>--}}

</body>
</html>
{{--<div class="container">
    <form action="{{ route('ticket.confirmacionSalida') }}" method="post">
        @csrf
        <div class="form-group">
            <h1>Codigo del Ticket</h1>
            <input type="text" name="codigo" id="codigo" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Salir</button>
    </form>
    --}}{{--<a href="javascript: history.back()">Volver atrÃ¡s</a>--}}{{--
</div>--}}
