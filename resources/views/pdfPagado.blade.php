<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ticket</title>
    <style>

        body {
        / / border: 2 px solid cyan;
            font-family: 'Nunito', sans-serif;
            color: #cbd5e0;
        }

        .asd {

        / / border: 2 px solid red;
            text-align: center;
            color: #ffffff;
            background-color: #79797a;

            border-radius: 40px;

            padding: 4px;
            margin: auto;
            width: 350px;
            height: 710px;

        }
    </style>
</head>
<body>

<div class="asd">
    <h1>TICKET</h1>
    <span>- - - - - - - - - - - - - - - - - - - - - - - - - - - - -</span>
    <img src="https://media.discordapp.net/attachments/771511955973472287/1075829458684084284/signage.png"
         width="100px"
         height="100px" alt="sda"><br>
    <span>- - - - - - - - - - - - - - - - - - - - - - - - - - - - -</span>


  {{--  @if(!isset($ticket->tarifa))
        <br>
        <p><strong>Código:</strong> {{ $ticket->codigo }}</p>
        <p><strong>Fecha de entrada:</strong> {{ $ticket->fecha_entrada }}</p>
        <p><strong>Matrícula: </strong>{{ $ticket->matricula }}</p>
        <p><strong>Estado:</strong> {{ $ticket->estado }}</p>
        <p><strong>Fecha de Pago: </strong>{{ $ticket->fecha_pago }}</p>
        <p><strong>Importe:</strong> {{ round($ticket->importe,2) }}€</p>
        <p><strong>Dinero Pagado: </strong>{{ round($ticket->dinero_pagado,2) }}€</p>
        <p><strong>Devolución:</strong> {{ round($ticket->devolucion_dinero ,2)}}€</p>
        <img src="https://media.discordapp.net/attachments/771511955973472287/1075837786608910346/arrow-up.png"
             width="40px"
             height="40px" alt="sda"><br>
    @else
    @endif--}}
        @if(!is_int($user) && !is_int($tarifa) ){{-- usuario iniciado sesion y tarifa aplicada --}}
            <br>
            <p><strong>Código:</strong> {{ $ticket->codigo }}</p>
            <p><strong>Fecha de entrada:</strong> {{ $ticket->fecha_entrada }}</p>
            <p><strong>Matrícula:</strong> {{ $ticket->matricula }}</p>
            <p><strong>Estado:</strong> {{ $ticket->estado }}</p>
            <p><strong>Importe: </strong>{{ round($ticket->importe,2) }}€</p>
            <p><strong>Importe con la tarifa aplicada ({{$tarifa->descripcion}}): </strong>{{ round($ticket->impoteTarifa,2)}}€</p>
            <p><strong>Tarifa Aplicada:</strong>{{ $ticket->tarifa }}</p>
            <p><strong>Fecha de Pago:</strong> {{ $ticket->fecha_pago }}</p>
            <p><strong>Dinero Pagado: </strong>{{ round($ticket->dinero_pagado ,2)}}€</p>
            <p><strong>Devolución: </strong>{{ round($ticket->devolucion_dinero ,2)}}€</p>
            <p><strong>Cliente Aplicado: </strong>{{ $user->name }} - {{ $user->dni }}</p>
            <img src="https://media.discordapp.net/attachments/771511955973472287/1075837786608910346/arrow-up.png"
                 width="40px"
                 height="40px" alt="sda"><br>
        @else
            <br>
            <p><strong>Código:</strong> {{ $ticket->codigo }}</p>
            <p><strong>Fecha de entrada:</strong> {{ $ticket->fecha_entrada }}</p>
            <p><strong>Matrícula: </strong>{{ $ticket->matricula }}</p>
            <p><strong>Estado:</strong> {{ $ticket->estado }}</p>
            <p><strong>Fecha de Pago: </strong>{{ $ticket->fecha_pago }}</p>
            <p><strong>Importe:</strong> {{ round($ticket->importe,2) }}€</p>
            <p><strong>Dinero Pagado: </strong>{{ round($ticket->dinero_pagado,2) }}€</p>
            <p><strong>Devolución:</strong> {{ round($ticket->devolucion_dinero ,2)}}€</p>
            <img src="https://media.discordapp.net/attachments/771511955973472287/1075837786608910346/arrow-up.png"
                 width="40px"
                 height="40px" alt="sda"><br>
        @endif

</div>
</body>
</html>


