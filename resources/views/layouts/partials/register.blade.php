<?php
    $errores="";
    if(isset($_POST['sanitizacion'])){
        $boleano = TRUE;
        $name = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $repeatPassword = $_POST['repeatPassword'];

        if (!empty ($name)){
            $name = filter_var ($name, FILTER_SANITIZE_STRING);
            if ($name==""){
                $errores .= "Por favor, agrega tu nombre <br />";
            }
        }else{
            $errores .= "Por favor, agrega tu nombre <br />";
        }

        if (!empty ($lastName)){
            $lastName = filter_var ($lastName, FILTER_SANITIZE_STRING);
            if ($lastName==""){
                $errores .= "Por favor, agrega tus apellidos <br />";
            }
        }else{
            $errores .= "Por favor, agrega tus apellidos <br />";
        }

        if (!empty($email)){
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);
            if (!filter_var ($email, FILTER_VALIDATE_EMAIL)){
                $errores.='Por favor ingresa un correo valido <br />';
            }
        }else{
            $errores .= 'Por favor ingresa un correo <br />';
        }

        if (!empty ($password)){
            $password = filter_var ($password, FILTER_SANITIZE_STRING);
            if ($password==""){
                $errores .= "Por favor, agrega una contraseña <br />";
            }
        }else{
            $errores .= "Por favor, agrega una contraseña <br />";
        }

        if (!empty ($repeatPassword)){
            $repeatPassword = filter_var ($repeatPassword, FILTER_SANITIZE_STRING);
            if ($repeatPassword==""){
                if (!empty ($password)) {
                    $errores .= "Por favor, repite tu contraseña <br />";
                }
            }
        }else{
            if (!empty ($password)) {
                $errores .= "Por favor, repite tu contraseña <br />";
            }
            }

        if ($password!=$repeatPassword && !empty ($repeatPassword) && !empty ($password)) {
            $errores .= "Las contraseñas no son las mismas, favor de rectificar";
        }
        
    }else{
        $boleano=FALSE;
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Rgistro de Usuarios</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset ('libs/fontawesome/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('libs/sbadmin/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block"><img src="{{asset('libs/images/Imagen1.png')}}"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Registrarse</h1>
                            </div>
                            
                            <form action="<?php echo htmlspecialchars($_SERVER ['PHP_SELF']); ?>" method='POST' class="user">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Nombre(s)" name="firstName" value="<?php if (!empty ($name)){echo $name;} else{ echo "";}?>">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Apellido(s)" name="lastName" value="<?php if (!empty ($lastName)){echo $lastName;} else{ echo "";}?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Correo Electrónico" name="email" value="<?php if (!empty ($email)){echo $email;} else{ echo "";}?>">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Contraseña" name="password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Repetir Contraseña" name="repeatPassword">
                                    </div>
                                </div>
                                <input type="submit" value="Registrar" name='<?php if(!empty($errores) && $boleano){echo 'sanitizacion';}elseif($boleano){echo 'registro';}else{echo "sanitizacion";}?>' class="btn btn-primary btn-user btn-block">
                                <div>
                                    <hr>
                                    <?php
                                    if (!empty($errores) && $boleano){?>
                                        <style type="text/css">
                                            .alertError {
                                                color: rgb(255, 255, 255);
                                                background-color: #ff0000; 
                                                text-align: center;
                                            }
                                            </style>
                                        <div class = "alertError"> <?php echo $errores; ?></div>
                                    <?php }elseif($boleano){?>
                                        <style type="text/css">
                                            .alertSucessfull{
                                                color: rgb(255, 255, 255);
                                                background-color: #00ff11;
                                                text-align: center;
                                            }
                                            </style>
                                        <div class = "alertSucessfull">REGISTRADO CON EXITO</div>
                                    <?php } ?>
                                </div>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="registro">¿Ya tienes cuenta? Ingresa aquí!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>