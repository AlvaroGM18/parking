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
        // border: 2px solid red;
        // margin: auto;
        }

        .row {
            margin: auto;
            width: 95vw;
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


    </style>

</head>
<body>

<div class="container">

    <div class="row">
        <div class="col-md-12" STYLE="padding: 10px;">
            <button type="button" class="btn btn-primary" onclick="location.href='{{ route('anadirUsuario') }}'">
                AÑADIR USUARIO
            </button>
            <br>
        </div>

        <div class="col-md-12">
            <table class="table" id="myTable">
                <thead>
                <tr>
                    <th><a href="#" style="text-decoration: none; color: white">Id</a></th>
                    <th><a href="#" style="text-decoration: none; color: white">Nombre</a></th>
                    <th><a href="#" style="text-decoration: none; color: white">Email</a></th>
                    <th><a href="#" style="text-decoration: none; color: white">Matricula</a></th>

                    <th><a href="#" style="text-decoration: none; color: white">Dni</a></th>
                    <th><a href="#" style="text-decoration: none; color: white">Telefono</a></th>
                    <th><a href="#" style="text-decoration: none; color: white">Direccion</a></th>
                    <th><a href="#" style="text-decoration: none; color: white">Tarifa</a></th>
                   {{-- //<th>Tarifas</th>--}}
                    <th>Tickets</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
                </thead>
                <tbody>
                @foreach($usuarios as $usuario)

                    <tr>
                        <td>{{ $usuario->id }}</td>
                        <td>{{ $usuario->name }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>{{ $usuario->matricula }}</td>

                        <td>{{ $usuario->dni }}</td>
                        <td>{{ $usuario->telefono }}</td>
                        <td>{{ $usuario->direccion }}</td>
                        <td>{{ $usuario->tarifa }}</td>
                      {{--  <td><a href="{{ route('ticketsUsuario', ['id' =>  $usuario->id]) }}"
                               class="btn btn-info">Mostrar</a></td>--}}
                        <td><a href="{{ route('ticketsUsuario', ['id' =>  $usuario->id]) }}"
                               class="btn btn-success">Ver</a></td>
                        <td><a href="{{ route('editarUsuario', ['id' =>  $usuario->id]) }}"
                               class="btn btn-warning">Editar</a></td>
                        <td>
                            <a href="{{ route('eliminarUsuario', ['id' => $usuario->id]) }}" class="btn btn-danger" onclick="return confirm('¿Está seguro de que desea eliminar este usuario?')">Eliminar</a>
                        </td>
                    </tr>

                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>



