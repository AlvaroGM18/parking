<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grupo;
use App\Models\User;

class IntromasivaController extends Controller
{
    //
    public function intro($id) {
        return view("grupos.intromasiva", ["grupo" => Grupo::find($id), "usuarios" => User::all()]);
    }

    public function store($id) {
//        dd(\request());
 //       $emails = explode("\n", \request()->lista);
 //       for($i=0; $i<count($emails); $i++) {
 //           $emails[$i] = trim($emails[$i]);
 //       }
//            $usuario = User::where('email', $email)->firstOrFail();

        $grupo = Grupo::find($id);

        foreach(\request()->usuarios as $usuario){
            if ((!$grupo->participantes()->where('user_id', $usuario)->exists())) {
                $grupo->participantes()->attach($usuario);
            }
        }

        return redirect("home");
    }

}
