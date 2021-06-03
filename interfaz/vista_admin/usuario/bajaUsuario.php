<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset= "utf-8" >
    <meta name= "viewport" content= "width=device-width, initial-scale=1, shrink-to-fit=no" >
    <meta name="author" content="José Javier Acosta Blasco">


    <!-- Bootstrap CSS en la web-->

    <link rel= "stylesheet" href= "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity= "sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin= "anonymous" >
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
     <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
 	
    <title>Modificar un Usuario</title>
</head>
<body>
<h1>Filtro de un Usuario </h1>
<?php
    require_once '../../pojos/Usuario.php';
    require_once '../../persistencia/Usuarios.php'; 

    $tUsuario = Usuarios::singletonUsuarios();
    $todosUsuarios = $tUsuario->getUsuariosTodos();

?>
<form name="formularioFiltro" method="POST" action="../vista_admin/IndexAdmin.php?principal=usuario/bajaUsuario.php">
    <div class="form-group"> 
        <label for="nombre" class="control-label">Codigo Usuario:</label>

            <select id="myselect" name="codigo" class="custom-select">
                <?php 
                    foreach ($todosUsuarios as $f) {
                        $codigoUsuario=$f->getIdUsuario();
                        echo '<option value="'.$codigoUsuario.'">'.$codigoUsuario.'</option>';

                    }
                        echo '<option id="seleccionado" value="'.$codigoUsuario.'" selected>...</option>';
                ?>
            </select>
    </div> 

    <div class="form-row">
        <div class="form-group col-md-4 text-right ">
            <button type="submit" id="buscar" name="buscar" class="btn btn-primary">Eliminar</button>
        </div>

        <div class="form-group col-md-4 text-left">
            <button type="reset" name="cerrar" class="btn btn-secondary">Cancelar</button>
        </div>
    </div>
</form>

<?php


//if (isset($_POST['buscar'])) {
if(isset($_POST["buscar"])){
    if($_POST['codigo']!=null){
       if($tUsuario->deleteUsuarioById($_POST['codigo'])){
        echo "<div class="."'alert alert-success'"." role="."'success'".">
        Usuario borrado correctamente
    </div>";
       } else {
        echo "<div class="."'alert alert-danger'"." role="."'danger'".">
        El usuario no se ha borrado correctamente
    </div>";
       }
    
    } 
}
?>
</body>