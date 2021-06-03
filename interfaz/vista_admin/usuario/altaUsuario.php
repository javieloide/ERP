<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Alta de Usuarios</title>


	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
     <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
 	
</head>
<body>


<?php

require_once '../../pojos/Rol.php';
require_once '../../persistencia/Roles.php';
require_once '../../pojos/Usuario.php';
require_once '../../persistencia/Usuarios.php';


//print_r($_POST);
#if (isset($_POST['submit']) lo podemos sustituir tb x filter_input
$submit = filter_input(INPUT_POST, 'submit');

if (isset($submit)) {

	$tUsuario = Usuarios::singletonUsuarios();

	//aislamos las variables que vienen del formulario

	$login = filter_input(INPUT_POST, 'login');

	$password = filter_input(INPUT_POST, 'password');

	$idRol = filter_input(INPUT_POST, 'idRol');

 	$codigo = $tUsuario->getNumeroUsuarios() + 1;


   //ahora tengo que concatenarlo con el codPostal
    $idUsuario='0'.$codigo;
    $activo=1;

	    
	       	$u = new Usuario(0, $idUsuario, $idRol, $login, $password, $activo);

	       	$insertado = $tUsuario->addUnUsuario($u);
	       	if ($insertado) {
				echo "<div class="."'alert alert-success'"." role="."'success'".">
				Usuario insertado correctamente
			</div>";
	       	} else {
				echo "<div class="."'alert alert-danger'"." role="."'danger'".">
				El usuario no se ha insertado correctamente
			</div>";
	       	}
       
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Alta de un usuario</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>


	<div class="container-fluid" id="contenedorPrincipal">

		<div class="row">
			<div class="col-xs-12">
				<center><h2>Formulario de alta de usuarios</h2></center>
			</div>
		</div>

	<?php 
    $tRol = Roles::singletonRoles();
	$todosRoles = $tRol->getRolesTodos();
	?>
<!-- Este div está centrado con color de fondo azul claro y con una altura vh=100-->
<div class="row bg-light align-items-center vh-100">
	<div class="col-sm-8">
		<form class="form-horizontal" name="formularioEmpleados"
			action="../vista_admin/IndexAdmin.php?principal=usuario/altaUsuario.php"
			method="POST" enctype="multipart/form-data">

		<div class="form-group"> 
			<label for="nombre" class="control-label">Rol:</label>

			<select name="idRol" class="custom-select">
				<?php 
					foreach ($todosRoles as $f) {
                        $idRol = $f->getIdRol();
						$nombreRol = $f->getNombre();

						echo '<option value="'.$idRol.'">'.$nombreRol.'</option>';
				}
				?>
			</select>
		</div> 

		<div class="form-group"> 
			<label for="descripcion" class="control-label">Login:</label>
			<input type="text" class="form-control" id="descripcion" name="login" placeholder="login">
		</div>
		<div class="form-group"> 
			<label for="pvp" class="control-label">Password:</label>
			<input type="password" class="form-control" id="pvp" name="password" placeholder="password">
		</div>

		<div class="form-group"> 
			<button type="submit" name="submit" class="btn btn-primary">Guardar</button>
			<button type="reset" name="limpiar" class="btn btn-danger">Limpiar</button>
		</div>     

	</form>
	</div> <!-- div class row-->
</div>
</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>