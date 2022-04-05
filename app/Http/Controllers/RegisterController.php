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
        $primerNombre = ($request->firstName);
        $segundoNombre = ($request->lastName);
        
        $usuario->email = $request->email;
        $usuario->password = $request->password;
        $repeatPassword = $request ->repeatPassword;

        $errores="";
        
        if (!empty ($primerNombre)){
            $primerNombre = filter_var ($primerNombre, FILTER_SANITIZE_STRING);
            if ($primerNombre==""){
                $errores .= "Por favor, agrega tu nombre <br />";
            }
        }else{
            $errores .= "Por favor, agrega tu nombre <br />";
        }

        if (!empty ($segundoNombre)){
            $segundoNombre = filter_var ($segundoNombre, FILTER_SANITIZE_STRING);
            if ($segundoNombre==""){
                $errores .= "Por favor, agrega tus apellidos <br />";
            }
        }else{
            $errores .= "Por favor, agrega tus apellidos <br />";
        }

        $nombreCompleto= $primerNombre." ".$segundoNombre;
        $usuario->name = $nombreCompleto;

        if (!empty($usuario->email)){
            $usuario->email = filter_var($usuario->email, FILTER_SANITIZE_EMAIL);
            if (!filter_var ($usuario->email, FILTER_VALIDATE_EMAIL)){
                $errores.='Por favor ingresa un correo valido <br />';
            }
        }else{
            $errores .= 'Por favor ingresa un correo <br />';
        }

        if (!empty ($usuario->password)){
            $usuario->password = filter_var ($usuario->password, FILTER_SANITIZE_STRING);
            if ($usuario->password==""){
                $errores .= "Por favor, agrega una contraseña <br />";
            }
        }else{
            $errores .= "Por favor, agrega una contraseña <br />";
        }

        if (!empty ($repeatPassword)){
            $repeatPassword = filter_var ($repeatPassword, FILTER_SANITIZE_STRING);
            if ($repeatPassword==""){
                if (!empty ($usuario->password)) {
                    $errores .= "Por favor, repite tu contraseña <br />";
                }
            }
        }else{
            if (!empty ($usuario->password)) {
                $errores .= "Por favor, repite tu contraseña <br />";
            }
            }

        if ($usuario->password!=$repeatPassword && !empty ($repeatPassword) && !empty ($usuario->password)) {
            $errores .= "Las contraseñas no son las mismas, favor de rectificar";
        }
        
        if (empty($errores)){
            $usuario -> save();
        }
            
        return view(view:'layouts.partials.register');
    }

    public function sanitizacion(Request $request){
        return view(view:'layouts.partials.register');
    }
}
