<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Ticket</title>
    <style>

        body {
            //border: 2px solid cyan;
            font-family: 'Nunito', sans-serif;
            color: #cbd5e0;
        }

        .asd {

           // border: 2px solid red;
            text-align: center;
            color: #ffffff;
            background-color: #79797a;

            border-radius: 40px;

            padding: 4px;
margin: auto;
            width: 320px;
            height: 450px;

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

    <div style="text-align: start">
        <br>


    <p><strong>Código:</strong> {{ $ticket->codigo }}</p>
        <p><strong>Fecha de entrada:</strong> {{ $ticket->fecha_entrada }}</p>
        <p><strong>Matrícula:</strong> {{ $ticket->matricula }}</p>
        <p><strong>Estado:</strong> {{ $ticket->estado }}</p>
        <img src="https://media.discordapp.net/attachments/771511955973472287/1075837786608910346/arrow-up.png"
             width="40px"
             height="40px" alt="sda"><br>
    </div>

</div>

</body>
</html>

