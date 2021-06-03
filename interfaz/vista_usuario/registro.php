<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset= "utf-8" > 
  <meta name= "viewport" content= "width=device-width, initial-scale=1, shrink-to-fit=no" > 
  <meta name="author" content="José Antonio Guijarro">
  <title>Alta/Registro de un usuario</title>
  <!-- Bootstrap CSS en la web--> 
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <link rel="stylesheet" href="estilos.css">
</head>

<body>
<!------ Include the above in your HEAD tag ---------->
    <div class="container">    
        <div id="loginbox" style="margin:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Sign In</div>
                        <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form id="loginform" class="form-horizontal" role="form" method="POST" action="IndexInicial.php?principal=interfaz/vista_usuario/registro.php">
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="username or email">                                        
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
                                    </div>
                        
                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="col-sm-12 controls">
                                        <button id="btn-login" type="submit" name="inicioSesion" class="btn btn-success">Guardar</button>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-md-12 control">
                                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                            Don't have an account! 
                                        <a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">
                                            Sign Up Here
                                        </a>
                                        </div>
                                    </div>
                                </div>    
                            </form>     
                        </div>                     
                    </div>  
        </div>
        <div id="signupbox" style="display:none; margin:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">Sign Up</div>
                            <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">Sign In</a></div>
                        </div>  
                        <div class="panel-body" >
                            <form id="signupform" class="form-horizontal" role="form" method="POST" action="IndexInicial.php?principal=interfaz/vista_usuario/registro.php">
                                
                                <div id="signupalert" style="display:none" class="alert alert-danger">
                                    <p>Error:</p>
                                    <span></span>
                                </div>
                                
                                  
                                <div class="form-group">
                                    <label for="login" class="col-md-3 control-label">Login</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="login" placeholder="Login">
                                    </div>
                                </div>
                                    
                                <div class="form-group">
                                    <label for="nombre" class="col-md-3 control-label">Nombre</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="nombre" placeholder="Nombre">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="apellido1" class="col-md-3 control-label">Apellido1</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="apellido1" placeholder="Apellido1">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="apellido2" class="col-md-3 control-label">Apellido2</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="apellido2" placeholder="Apellido2">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="passwd" placeholder="Password">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="nif" class="col-md-3 control-label">Nif</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="nif" placeholder="Nif">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="numcta" class="col-md-3 control-label">Nº Cuenta</label>
                                    <div class="col-md-9">
                                        <input type="numcta" class="form-control" name="numcta" placeholder="Nº Cuenta">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="direccion" class="col-md-3 control-label">Direccion</label>
                                    <div class="col-md-9">
                                        <input type="direccion" class="form-control" name="direccion" placeholder="Direccion">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="codpostal" class="col-md-3 control-label">Codigo postal</label>
                                    <div class="col-md-9">
                                        <input type="codpostal" class="form-control" name="codpostal" placeholder="Codigo postal">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="provincia" class="col-md-3 control-label">Provincia</label>
                                    <div class="col-md-9">
                                        <input type="provincia" class="form-control" name="provincia" placeholder="Provincia">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="localidad" class="col-md-3 control-label">Localidad</label>
                                    <div class="col-md-9">
                                        <input type="localidad" class="form-control" name="localidad" placeholder="Localidad">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="pais" class="col-md-3 control-label">Pais</label>
                                    <div class="col-md-9">
                                        <input type="provincia" class="form-control" name="pais" placeholder="Pais">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="genero" class="col-md-3 control-label">Genero</label>
                                    <select name="genero" class="custom-select col-md-9">
                                        <option value="1">Masculino</option>
                                        <option value="0">Femenino</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-3 col-md-9">
                                        <button id="btn-signup" type="submit" name="registro" class="btn btn-info"><i class="icon-hand-right"></i> &nbsp Sign Up</button>
                                    </div>
                                </div>   
                            </form>
                         </div>
                    </div>    
            </div> 
    </div>

    <?php
        require_once 'pojos/Usuario.php';
        require_once 'persistencia/Usuarios.php';
        
        require_once 'pojos/Cliente.php';
        require_once 'persistencia/Clientes.php';

        require_once 'pojos/DireccionesCliente.php';
        require_once 'persistencia/DireccionesClientes.php';
        
        $tUsuario = Usuarios::singletonUsuarios();
        $tCliente = Clientes::singletonClientes();
        $tDireccionesCliente = DireccionesClientes::singletonDireccionesClientes();
        if(isset($_POST["inicioSesion"])){
            $password = $_POST["password"];
            $passwdCifrada = hash("sha256", $password);
            $u = $tUsuario->getUsuario($_POST["username"], $passwdCifrada);
           if(!empty($u)){
             $paswdUser = $u[0]->getPassword();
             password_verify($paswdUser, $passwdCifrada);
             $idRol = $u[0]->getIdRol();
             $idUsuario = $u[0]->getIdUsuario();
             $_SESSION['user'] = $idRol;
             $_SESSION['idCliente'] = $idUsuario;
             if($_SESSION['user'] != '06'){
                print "<script>window.setTimeout(function() { window.location = 'http://localhost/ERP/IndexInicial.php?principal=interfaz/vista_usuario/catalogoProductosCarrito.php' }, 100);</script>";
             } else {
                print "<script>window.setTimeout(function() { window.location = 'http://localhost/ERP/interfaz/vista_admin/IndexAdmin.php' }, 100);</script>";
             }

           } else {

            echo "<div class="."'alert alert-danger'"." role="."'alert'".">
                     Introduce la datos correctos
                  </div>";
           }
           
        } else if(isset($_POST["registro"])){
            $login = $_POST["login"];
            $passwd = $_POST["passwd"];
            $nombre = $_POST["nombre"];
            $apellido1 = $_POST["apellido1"];
            $apellido2 = $_POST["apellido2"];
            $nif = $_POST["nif"];
            $numcta = $_POST["numcta"];
            $direccion = $_POST["direccion"];
            $codpostal = $_POST["codpostal"];
            $provincia = $_POST["provincia"];
            $localidad = $_POST["localidad"];
            $pais = $_POST["pais"];
            $genero = $_POST["genero"];
            $activo=1;
            $idRol="04";

            $paswdCifrada = hash("sha256",$passwd);
            $codigo=$tCliente->getNumeroClienteMismoCodPostal($codpostal)+1;
            
            //Vamos a preparar el código para que tenga 4 posiciones
            $codigoString=(string)$codigo;
            $numCaracteres= strlen($codigo); 
            $resta=4-$numCaracteres; //esto es el número de ceros que voy a añadir
            for ($i=1;$i<=$resta;$i++){
                $codigoString='0'.$codigoString;
            }

            //ahora tengo que concatenarlo con el codPostal
            $idCliente=$codpostal . $codigoString;
            $idUsuario = $idCliente;
            //Instancia a la clase Cliente
            $c = new Cliente(0, $idCliente, $idUsuario, $nombre,
            $apellido1, $apellido2, $nif, $genero, $numcta,"Por internet",
            $activo);

            //Instancia a la clase DireccionesCliente
            $dc = new DireccionesCliente(0, $idCliente, $idUsuario,$direccion,$codpostal,$localidad,$provincia, $pais, $activo);

            
            $insertado = $tCliente->addUnCliente($c);
            if (!$insertado) {
                echo "<h3>Ha habido algún error en el alta</h3>";
            } else {
                //insertamos un modal de bootstrap 
                echo "<h3>Se ha insertado correctamente el cliente</h3>";
            }

            
            $insertado = $tDireccionesCliente->addUnaDireccionCliente($dc);
            if (!$insertado) {
                echo "<h3>Ha habido algún error en el alta de direccion de cliente</h3>";
            } else {
                echo "<h3>Se ha dado de alta de forma satisfactoria direccion de cliente</h3>";
            }

            
            $u = new Usuario(0,$idUsuario,$idRol,$login,$paswdCifrada,$activo);
            $insertado = $tUsuario->addUnUsuario($u);
            if(!$insertado){
                echo "<h3>Ha habido algún error en el alta de Usuario</h3>";
            } else {
                echo "<h3>Se ha dado de alta de Usuario de forma satisfactoria</h3>";

            }

        }


    
    ?>
    