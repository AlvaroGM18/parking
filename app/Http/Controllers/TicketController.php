<?php

namespace App\Http\Controllers;

use App\Models\Tarifa;
use App\Models\Ticket;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;

//use Illuminate\Support\Facades\PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use function PHPUnit\Framework\isEmpty;

class TicketController extends Controller
{
    public function home()
    {
        return view('welcome');
    }

    public function homeTicket($id)
    {
        $ticket = Ticket::find($id);
        return view('welcome', ['ticket' => $ticket]);
    }

    public function entrada()
    {
        return view('entrada');
    }

    public function administracion()
    {
        $tickets = Ticket::all();
        return view('administracion', ['tickets' => $tickets]);
    }

    public function listaTickets()
    {
        $tickets = Ticket::all();
        return view('lista_tickets', ['tickets' => $tickets], ['existe' => false]);
    }

    public function listaUsuarios()
    {
        $usuarios = User::all();
        return view('lista_usuarios', ['usuarios' => $usuarios]);
    }

    public function editarUsuario($id)
    {
        $usuario = User::find($id);
        return view('editar_usuario', ['usuario' => $usuario]);
    }

    public function ticketsUsuario($id)
    {
        $usuario = User::findOrFail($id); // Obtener usuario por id

        $tickets = $usuario->tickets; // Obtener tickets del usuario

        return view('tickets_usuario', ['usuario' => $usuario, 'tickets' => $tickets]); // Retornar vista con los tickets del usuario
    }

    public function eliminarUsuario($id)
    {
        // Buscar al usuario correspondiente y eliminarlo
        $usuario = User::find($id);
        $usuario->delete();

        $usuarios = User::all();
        return view('lista_usuarios', ['usuarios' => $usuarios]);
    }

    public function createUsuario(Request $request)
    {
        // Validar los datos enviados en la petición

        // Crear un nuevo objeto User con los datos enviados en la petición
        $user = new User();
        $user->name = $request->get('nombre');
        $user->email =$request->get('email');
        $user->matricula = $request->get('matricula');
        $user->password = bcrypt($request->get('password'));
        $user->dni = $request->get('dni');
        $user->telefono = $request->get('telefono');
        $user->direccion = $request->get('direccion');
        $user->tarifa = $request->get('tarifa');

        // Guardar el nuevo objeto User en la base de datos
        $user->save();

        // Redirigir a una página de éxito o mostrar un mensaje
        $usuarios = User::all();
        return view('lista_usuarios', ['usuarios' => $usuarios]);
    }

    public function updateUsuario(Request $request, $id)
    {
        $usuario = User::find($id);
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->matricula = $request->matricula;
        $usuario->save();


        $usuarios = User::all();
        return view('lista_usuarios', ['usuarios' => $usuarios]);
        //return redirect('/usuarios')->with('success', 'Usuario actualizado correctamente');
    }

    public function salidaFinal()
    {
        return view('salida');
    }

    public function filtrarPorFechas(Request $request)
    {
        $fechaInicio = $request->input('fecha_inicio');
        $fechaFin = $request->input('fecha_fin');

        $tickets = Ticket::whereBetween('fecha_entrada', [$fechaInicio, $fechaFin])
            ->orWhereBetween('fecha_salida', [$fechaInicio, $fechaFin])
            ->get();

        return view('administracion', ['tickets' => $tickets]);
    }

    public function comprobacionSalida(Request $request)
    {
        /*        $tickets = Ticket::all();
                $inputCodigo = $request->input('inputCodigo');
                $tickets = Ticket::where('matricula', 'like', "%$matricula%")->get();
                if ($ticket->codigo == $inputCodigo){
                    $ticket->estado = 2;
                    $ticket->fecha_salida = Carbon::now()->addHour();
                    $ticket->save();
                    return view('confirmacionSalida', ['valido' => true], ['ticket' => $ticket]);
                }else{
                    return view('confirmacionSalida', ['valido' => false], ['ticket' => $ticket]);
                }*/

        /* $ticket->estado = 1;
         $ticket->save();
         return view('welcome');*/
        /*
                $codigo = $request->input('codigo');
                $ticket = Ticket::where('codigo', $codigo)->first();
                if ($ticket && $ticket->estado == 1) {
                    $ticket->estado = 2;
                    $ticket->save();
                    //return response()->json(['message' => 'Estado de ticket actualizado con éxito'], 200);
                    return view('confirmacionSalida', ['valido' => true], ['ticket' => $ticket]);
                } else {
                    //return response()->json(['error' => 'El código de ticket no se encuentra en la base de datos'], 404);
                    return view('confirmacionSalida', ['valido' => false], ['ticket' => $ticket]);
                }*/

        $codigo = $request->input('codigo');
        $tickets = Ticket::where('estado', 1)->get();
        foreach ($tickets as $ticket) {
            if ($ticket->codigo == $codigo) {
                $ticket->fecha_salida = Carbon::now()->addHour();
                $ticket->estado = 2;
                $ticket->save();
                return view('confirmacionSalida', ['valido' => true]);
            }
        }
        return view('confirmacionSalida', ['valido' => false]);
    }


    public function filtrarTickets(Request $request)
    {
        $matricula = $request->get('matricula');
        if ($matricula) {
            $tickets = Ticket::where('matricula', 'like', "%$matricula%")->get();
        } else {
            $tickets = Ticket::all();
        }
        return view('administracion', ['tickets' => $tickets], ['existe' => false]);
    }

    public function pagar($id,$idUser, Request $request)
    {
        if ($idUser != -1){
            $user = User::findOrFail($idUser);
        }else{
            $user = -1;
        }

        $ticket = Ticket::findOrFail($id);
        $amount_paid = $request->input('amount_paid');
        //$amount_paid = 30;
        if ($amount_paid < $ticket->importe) {
            return view('confirmacion_cajero', ['ticket' => $ticket, 'pagado' => false,'user' => $user]);
        } else {
            $change = $amount_paid - ($ticket->importe);
            /*         $ticket->update([
                         'dinero_pagado' => $amount_paid,
                         'devolucion_dinero' => $change
                     ]);*/

            $ticket->dinero_pagado = $amount_paid;
            $ticket->devolucion_dinero = $change;
            $ticket->estado = 1;

            $ticket->save();
            // return view('salida', ['ticket' => $ticket]);
            return view('confirmacion_cajero', ['ticket' => $ticket, 'pagado' => true,'user' => $user]);
        }
    }


    public function createTicket()
    {
        // Aqui se debe de crear el ticket
        $ticket = new Ticket();
        $ticket->codigo = uniqid();
        $ticket->fecha_entrada = Carbon::now()->addHour();
        $ticket->matricula = request('matricula');
        $ticket->estado = 0;
        $ticket->save();
        return view('confirmacionEntrada', ['ticket' => $ticket],['existe' => false]);
/*        if (Ticket::where('matricula', $ticket->matricula)->where('estado', 0)->first()) { //ya existe la matricula dentro
            $tickets = Ticket::all();
            return view('lista_tickets', ['tickets' => $tickets], ['existe' => true]);

        } else {
            // $ticket->estado;
            $ticket->save();
            // $tickets = Ticket::all();
            // return view('lista_tickets', ['tickets' => $tickets], ['existe' => false]);
            return view('confirmacionEntrada', ['ticket' => $ticket],['existe' => false]);
        }*/
    }

    public function descargaPDF($id)
    {
        $ticket = Ticket::find($id);
        $pdf = PDF::loadView('pdf', ['ticket' => $ticket]);
        return $pdf->download('ticketEntrada.pdf');
    }

    public function descargaPDFPagado($id,$idUser)
    {
        if ($idUser != -1){//tarifa aplicada
            $user = User::findOrFail($idUser);
            $tarifa = Tarifa::find($user->tarifa);
        }else{
            $user = -1;
            $tarifa = -1;
        }

        $ticket = Ticket::find($id);
        $pdf = PDF::loadView('pdfPagado', ['ticket' => $ticket,'user'=>$user,'tarifa'=>$tarifa]);
        return $pdf->download('ticketPagado.pdf');
    }

    public function comprobarCliente($id,Request $request)
    {
        $dni = request('dni');
/*        $contrasena = request('password');//palabra:password
        // Buscamos el usuario con el email y contraseña proporcionados*/
        $usuarioAux = User::where('dni', $dni)->first();

        $ticket = Ticket::find($id);
        // Si no se encuentra el usuario, devolvemos un mensaje de error
        if (!$usuarioAux) {
            return view('cajero', ['ticket' => $ticket, 'pagado' => false, 'user' => $usuarioAux]);
        }

        $usuario = User::find($usuarioAux->id);
        $tarifa = Tarifa::find($usuarioAux->tarifa);

        // Actualizamos el importe del ticket restando el costo de la tarifa
        $ticket->impoteTarifa = ($ticket->importe * $tarifa->costo)/100;
        $ticket->tarifa = $tarifa->id;
        // Guardamos los cambios en la base de datos
        $ticket->save();
        $usuario->tickets()->attach($ticket->id);
        // Devolvemos el ticket actualizado
        return view('cajero', ['ticket' => $ticket, 'pagado' => false, 'user' => $usuario]);

    }


    public function cajeroTicket(Request $request)
    {

        $ticketCode = $request->get('codigo');
        $ticketAux = Ticket::where('codigo', $ticketCode)->first();
        $ticket = null;
        if ($ticketAux && $ticketAux->estado == 0){
            $ticket = Ticket::find($ticketAux->id);
            $ticket->fecha_pago = Carbon::now()->addHour();
            $diffInHours = Carbon::parse($ticket->fecha_entrada)->diffInSeconds(Carbon::parse($ticket->fecha_pago)) / 3600;
            $costo_hora = 10;
            $importe = $diffInHours * $costo_hora;
            $ticket->importe = $importe;
            //  $ticket->estado = 1;
            $ticket->save();
            return view('cajero', ['ticket' => $ticket], ['pagado' => false],['user' => true] );
        }else{
            if ($ticketAux && $ticketAux->estado == 1){
                return view('cajero', ['ticket' => $ticket, 'pagado' => true, 'user' => true]);
            }
        }

        return view('cajero', ['ticket' => $ticket, 'pagado' => true, 'user' => true]);

/*        $ticket = Ticket::find($id);*/


/*
        if (Ticket::where('matricula', $ticket->matricula)->where('estado', 0)->first()) { //ya existe la matricula dentro de la bd
            $tickets = Ticket::all();
            return view('confirmacionEntrada', ['tickets' => $tickets], ['existe' => true]);
        }


        if ($id == -1) {
            return view('ticket', ['mensaje' => "No se ha ingresado en el parking. No puedes introducir ningun Ticket. Entra primero"]);
        } else {
            $ticket = Ticket::find($id);
            $ticket->fecha_pago = Carbon::now()->addHour();
            $diffInHours = Carbon::parse($ticket->fecha_entrada)->diffInSeconds(Carbon::parse($ticket->fecha_pago)) / 3600;
            $costo_hora = 10;
            $importe = $diffInHours * $costo_hora;
            $ticket->importe = $importe;
            //  $ticket->estado = 1;
            $ticket->save();
            return view('cajero', ['ticket' => $ticket]);
        }*/
    }

    public function pagadoTicket($id)
    {
        $ticket = Ticket::find($id);
        $ticket->estado = 1;
        $ticket->save();
        return view('welcome');
    }

    public function barreraSalida($id)
    {
        $ticket = Ticket::find($id);
        $ticket->estado = 1;
        $ticket->save();
        return view('welcome', ['ticket' => $ticket]);
    }

    public function updateTicket(Request $request, $id)
    {
        $ticket = Ticket::find($id);
        $ticket->codigo = $request->codigo;
        $ticket->matricula = $request->matricula;
        $ticket->fecha_entrada = $request->fecha_entrada;
        $ticket->fecha_salida = $request->fecha_salida;
        $ticket->estado = $request->estado;
        $ticket->importe = $request->importe;
        $ticket->dinero_pagado = $request->dinero_pagado;
        $ticket->devolucion_dinero = $request->devolucion_dinero;
        $ticket->fecha_pago = $request->fecha_pago;
        $ticket->save();


        $tickets = Ticket::all();
        return view('administracion', ['tickets' => $tickets]);
        //return redirect('/usuarios')->with('success', 'Usuario actualizado correctamente');
    }

    public function filtrarCodigo(Request $request) {
        $codigo = $request->get('codigo');
        $tickets = Ticket::where('codigo', $codigo)->get();
        return view('administracion', ['tickets' => $tickets]);
    }

    public function filtrarEstado(Request $request) {
        $estado = $request->get('estado');
        $tickets = Ticket::where('estado', $estado)->get();
        return view('administracion', ['tickets' => $tickets]);
    }

    public function filtrarFecha(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        // Realizar la consulta para obtener los tickets filtrados por fecha
        $tickets = Ticket::whereBetween('fecha_entrada', [$start_date, $end_date])->get();

        return view('administracion', ['tickets' => $tickets]);
    }
    public function editarTicket($id)
    {
        $ticket = Ticket::find($id);
        return view('editar_tickets', ['ticket' => $ticket]);
    }

}
