<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){
        return view(view:'layouts.partials.register');
    }

    public function register(Request $request){
        $usuario = new User();
        $nombreCompleto=($request->firstName)." ".($request->lastName);
        $usuario->name = $nombreCompleto;
        $usuario->email = $request->email;
        $usuario->password = $request->password;
        $repeatPassword = $request ->repeatPassword;

        if ($usuario->password == $repeatPassword){
            $usuario -> save();
            echo "Usuario registrado correctamente";
        }else{
            echo "Las contraseñas no coinciden, intente de nuevo";
        }
    }
}
