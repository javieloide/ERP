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
 	
    <title>Modificar un Rol</title>
</head>
<body>
<h1>Filtro de un Rol </h1>
<?php
    require_once '../../pojos/Rol.php';
    require_once '../../persistencia/Roles.php';
    require_once '../../pojos/FamiliaProducto.php';
    require_once '../../persistencia/FamiliasProductos.php';
    
    $tRol = Roles::singletonRoles();
    $todosRoles = $tRol->getRolesTodos();
?>
<form name="formularioFiltro" method="POST" action="../vista_admin/IndexAdmin.php?principal=rol/modificarRol.php">
    <div class="form-group"> 
        <label for="nombre" class="control-label">Codigo de Rol:</label>

            <select id="myselect" name="codigo" class="custom-select">
                <?php 
                    foreach ($todosRoles as $f) {
                        $codigoRol=$f->getIdRol();
                        $nombreRol=$f->getNombre();
                        echo '<option value="'.$codigoRol.'">'.$nombreRol.'</option>';

                    }
                        echo '<option id="seleccionado" value="'.$codigoRol.'" selected>...</option>';
                ?>
            </select>
    </div> 

    <div class="form-row">
        <div class="form-group col-md-4 text-right ">
            <button type="submit" id="buscar" name="buscar" class="btn btn-primary">Buscar</button>
        </div>

        <div class="form-group col-md-4 text-left">
            <button type="reset" name="cerrar" class="btn btn-secondary">Cancelar</button>
        </div>
    </div>
</form>

<?php


//if (isset($_POST['buscar'])) {
if(isset($_POST["buscar"])){
//echo "Entramos en buscar";
if($_POST['codigo']!=null){
    $tabla=$tRol->getRolById($_POST['codigo']);
    //var_dump($tabla[0]);
    
} else {
    $tabla = array();
}

?>

<?php
    if(empty($tabla)) {
        echo "<div class="."'alert alert-danger'"." role="."'alert'".">
                ADVERTENCIA ---- ¡Ese codigo introducido no pertenece a ningun rol!
              </div>";
    } else {
  
		//$tFamilia = FamiliasProductos::singletonFamiliasProductos();
        //$todasFamilias = $tFamilia->getFamiliasProductosTodos();
?>
        <div class="container-fluid" id="contenedorPrincipal">

        <div class="row">
            <div class="col-xs-12">
                <center><h2>Formulario de modificacion de un rol</h2></center>
            </div>
        </div>

        <!-- Este div está centrado con color de fondo azul claro y con una altura vh=100-->
        <div class="row bg-light align-items-center vh-100">
        <div class="col-sm-8">
        <form class="form-horizontal" name="formularioProductos"  
            action="../vista_admin/IndexAdmin.php?principal=rol/modificarRol.php"
            method="POST" enctype="multipart/form-data"> 

        <div class="form-group"> 
            <label for="descripcion" class="control-label">Nombre:</label>
            <input type="text" class="form-control" id="descripcion" name="nombre" value='<?php echo $tabla[0]->getNombre() ?>'>
        </div>

        <div class="form-group"> 
            <input type="text" class="form-control"  name="codigoRol" value='<?php echo $tabla[0]->getIdRol() ?>' hidden>
        </div>
       
        <div class="form-group"> 
            <button type="submit" name="modificar" class="btn btn-primary">Enviar</button>
            <button type="reset" name="limpiar" class="btn btn-danger">Limpiar</button>
        </div>     

        </form>
        </div> <!-- div class row-->
        </div>
        </div>
    <?php  
    
    }

}

if (isset($_POST['modificar'])) { //si se ha pulsado el botón de guardar
    
        if($_POST['codigoRol']!=null){
            $tabla=$tRol->getRolById($_POST['codigoRol']);
        } else {
            $tabla = array();
        }
        
      
        $nombre = $_POST['nombre'];
        $codigoRol = $_POST['codigoRol'];
        $activo = 1;
        $r = new Rol(0, $codigoRol, $nombre);
        //var_dump($p);
        $update = $tRol->updateRol($r);
        if ($update) {
            echo "<br><br><div class="."'alert alert-success'"." role="."'success'".">
            Rol actualizado correctamente
       </div>";
        } else {
            echo "<br><br><div class="."'alert alert-danger'"." role="."'danger'".">
            El rol no se ha actualizado correctamente
       </div>";
        }
    }


?>
</body>
