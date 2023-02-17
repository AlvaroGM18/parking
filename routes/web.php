<?php

use App\Http\Controllers\AmigoController;
use App\Http\Controllers\GrupoAmigoController;
use App\Http\Controllers\GrupoController;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Grupo;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SorteoController;
use App\Http\Controllers\IntromasivaController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if (auth()->user()) {
        return view("home");
    } else {
        return view('entrada'); // Venía con welcome
    }
});

Auth::routes();


//Lista de Usuarios de ejemplo
// resources/views/usuarios/lista.blade.app
// https://laravel.com/docs/9.x/views
// Proteccion middleware
// https://spatie.be/docs/laravel-permission/v5/basic-usage/middleware
// Añadimos los 3 middleware en la variable $routeMiddleware del archivo app/Http/Kernel.php

Route::group(['middleware' => ['role:admin']], function () {
    Route::get("listausuarios", function () {
        return view("usuarios.todos", ["usuarios" => User::all()]);
    })->name("listausuaris");
    Route::get("listagrupos", function () {
        return view("grupos.todos", ["grupos" => Grupo::all()]);
    });
 });

Route::group(['middleware' => ['auth']], function (){
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get("grupos/{grupoid}/sortear", [SorteoController::class, 'sortear'])->name("grupos.sortear");
    Route::get("grupos/{grupoid}/anularsorteo", [SorteoController::class, 'anularsorteo'])->name("grupos.anularsorteo");
    Route::resource("grupos", GrupoController::class);
    Route::resource('grupos.participantes',GrupoAmigoController::class);
    Route::resource("amigos", AmigoController::class);
});

Route::get('grupos/{grupoid}/intromasiva', [IntromasivaController::class,"intro"])->name("grupos.intromasiva");
Route::post('grupos/{grupoid}/store', [IntromasivaController::class, "store"])->name("grupos.storemasiva");

Route::get('/ticket/filtrarTickets',[\App\Http\Controllers\TicketController::class, "filtrarTickets"])->name('tickets.filtrar');
Route::post('/ticket',[\App\Http\Controllers\TicketController::class, "createTicket"])->name('ticket.create');
Route::get('/ticket/pagar', [\App\Http\Controllers\TicketController::class, "cajeroTicket"])->name('ticket.cajero');
Route::post('/ticket/pagado/{id}', [\App\Http\Controllers\TicketController::class, "pagadoTicket"])->name('ticket.pagado');
Route::get('/ticket/home', [\App\Http\Controllers\TicketController::class, "home"])->name('ticket.home');
Route::get('/ticket/cajero', [\App\Http\Controllers\TicketController::class, "listaTickets"])->name('ticket.listado');
Route::get('/ticket/salida', [\App\Http\Controllers\TicketController::class, "salidaFinal"])->name('ticket.salidaFinal');
Route::get('/ticket/entrada', [\App\Http\Controllers\TicketController::class, "entrada"])->name('ticket.entrada');
Route::get('/administracion/tickets', [\App\Http\Controllers\TicketController::class, "administracion"])->name('ticket.administracion');
Route::get('/ticket/barreraopen', [\App\Http\Controllers\TicketController::class, "barreraopen"])->name('ticket.open');
Route::get('/ticket/homeTicket/{id}', [\App\Http\Controllers\TicketController::class, "homeTicket"])->name('ticket.homeTicket');
Route::post('/ticket/pagar/{id}/{userid}', [\App\Http\Controllers\TicketController::class, "pagar"])->name('ticket.pagar');
Route::get('/ticket/barreraSalida/{id}', [\App\Http\Controllers\TicketController::class, "barreraSalida"])->name('ticket.barreraSalida');
Route::post('/ticket/confirmacionSalida', [\App\Http\Controllers\TicketController::class, "comprobacionSalida"])->name('ticket.confirmacionSalida');
Route::post('/ticket/administracionFechas', [\App\Http\Controllers\TicketController::class, "filtrarPorFechas"])->name('ticket.filtradoFechas');
Route::get('/ticket/filtrarFecha', [\App\Http\Controllers\TicketController::class, "filtrarFecha"])->name('ticket.filtrarFecha');
Route::get('/ticket/filtrarCodigo', [\App\Http\Controllers\TicketController::class, "filtrarCodigo"])->name('ticket.filtrarCodigo');
Route::get('/ticket/filtrarEstado', [\App\Http\Controllers\TicketController::class, "filtrarEstado"])->name('ticket.filtrarEstado');
Route::get('/ticket/editarUsuario/{id}', [\App\Http\Controllers\TicketController::class, "editarUsuario"])->name('ticket.editarUsuario');
Route::get('/ticket/editarTicket/{id}', [\App\Http\Controllers\TicketController::class, "editarTicket"])->name('ticket.editarTicket');
Route::post('/ticket/updateTicket/{id}', [\App\Http\Controllers\TicketController::class, "updateTicket"])->name('ticket.updateTicket');
/*Route::get('/descargarPdf', function () {
    $pdf = PDF::loadView('pdf', ['ticket' => $ticket]);
    return $pdf->download('ticket.pdf');
});*/
Route::get('/descargaPDF/{id}', [\App\Http\Controllers\TicketController::class, "descargaPDF"])->name('ticket.descarga');
Route::get('/descargaPDFPagado/{id}/{userid}', [\App\Http\Controllers\TicketController::class, "descargaPDFPagado"])->name('ticket.descargaPago');
Route::get('/administracion/usuarios', [\App\Http\Controllers\TicketController::class, "listaUsuarios"])->name('listaUsuarios');
Route::get('/administracion/usuarios/editar/{id}', [\App\Http\Controllers\TicketController::class, "editarUsuario"])->name('editarUsuario');
Route::post('/administracion/usuarios/update/{id}', [\App\Http\Controllers\TicketController::class, "updateUsuario"])->name('updateUsuario');
Route::post('/administracion/usuario/create', [\App\Http\Controllers\TicketController::class, "createUsuario"])->name('createUsuario');
Route::get('/administracion/usuario/tickets/{id}', [\App\Http\Controllers\TicketController::class, "ticketsUsuario"])->name('ticketsUsuario');
Route::get('/administracion/anadirUsuario', function () {return view("anadirUsuario");})->name('anadirUsuario');
Route::get('/administracion/eliminarUsuario/{id}', function () {return view("eliminarUsuario");})->name('eliminarUsuario');
Route::post('/comprobarCliente/{id}', [\App\Http\Controllers\TicketController::class, "comprobarCliente"])->name('comprobarCliente');
Route::get('/administracion/eliminarUsuario/{id}', [\App\Http\Controllers\TicketController::class, "eliminarUsuario"])->name('eliminarUsuario');
