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
            width: 60vw;
            height: 85vh;
            display: flex;
            justify-content: center;
        //border: 2px solid red;
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
        //border: 2px solid cyan;
            height: 5vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .label {
            width: 20vh;
            text-align: left;
        //border: 2px solid green;
        }

        .ediccion {
            display: flex;
        //border: 2px solid yellow;
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
            <form action="{{ route('updateUsuario', $usuario->id) }}" method="POST">
                @csrf
                <div class="ediccion">
                    <div class="form-group">
                        <label class="label" for="name">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $usuario->name }}">
                    </div>
                </div>

                <div class="ediccion">
                    <div class="form-group">
                        <label class="label" for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $usuario->email }}">
                    </div>
                </div>

                <div class="ediccion">
                    <div class="form-group">
                        <label class="label" for="matricula">Matricula</label>
                        <input type="text" class="form-control" id="matricula" name="matricula" value="{{ $usuario->matricula }}">
                    </div>
                </div>

                <div class="ediccion">
                    <div class="form-group">
                        <label class="label" for="matricula">Contraseña</label>
                        <input type="text" class="form-control" id="password" name="password" value="{{ $usuario->password }}">
                    </div>
                </div>

                <div class="ediccion">
                    <div class="form-group">
                        <label class="label" for="matricula">Dni</label>
                        <input type="text" class="form-control" id="dni" name="dni" value="{{ $usuario->dni }}">
                    </div>
                </div>

                <div class="ediccion">
                    <div class="form-group">
                        <label class="label" for="matricula">Telefono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $usuario->telefono }}">
                    </div>
                </div>

                <div class="ediccion">
                    <div class="form-group">
                        <label class="label" for="matricula">Direcion</label>
                        <input type="text" class="form-control" id="direcion" name="direcion" value="{{ $usuario->direcion }}">
                    </div>
                </div>

                <div class="ediccion">
                    <div class="form-group">
                        <label class="label" for="matricula">Tarifa</label>
                        <input type="text" class="form-control" id="tarifa" name="tarifa" value="{{ $usuario->tarifa }}">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>
        </div>
    </div>

</div>

</body>
</html>
