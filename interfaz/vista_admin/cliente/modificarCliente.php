<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset= "utf-8" >
    <meta name= "viewport" content= "width=device-width, initial-scale=1, shrink-to-fit=no" >
    <meta name="author" content="José Antonio Guijarro">


    <!-- Bootstrap CSS en la web-->

    <link rel= "stylesheet" href= "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity= "sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin= "anonymous" >
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
     <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
 	
    <link rel="stylesheet" href="estilos.css">
    <title>Alta de un cliente</title>
</head>
<body>
<h1>Filtro de un cliente </h1>

<form name="formularioFiltro" method="POST" action="../vista_admin/IndexAdmin.php?principal=cliente/modificarCliente.php">
    <div class="form-group row">
        <label for="nif" class="form-label">NIF</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="nif"
                   name="nif" placeholder="Teclea el nif a buscar">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-4 text-right ">
            <button type="submit" name="buscar" class="btn btn-primary">Buscar</button>
        </div>

        <div class="form-group col-md-4 text-left">
            <button type="reset" name="cerrar" class="btn btn-secondary">Cancelar</button>
        </div>
    </div>
</form>

<?php

require_once '../../pojos/Cliente.php';
require_once '../../persistencia/Clientes.php';

require_once '../../pojos/DireccionesCliente.php';
require_once '../../persistencia/DireccionesClientes.php';


$tCliente = Clientes::singletonClientes();
$tDireccion = DireccionesClientes::singletonDireccionesClientes();

if (isset($_POST['buscar'])) { //si se ha pulsado el botón de guardar

if($_POST['nif']!=null){
    $tabla=$tCliente->getClienteByNif($_POST['nif']);
} else {
    $tabla = array();
}

?>

<?php
    if(empty($tabla)) {
        echo "<div class="."'alert alert-danger'"." role="."'alert'".">
                ADVERTENCIA ---- ¡Ese nif introducido no pertenece a ningun cliente!
               </div>";
    } else {
       // echo "<h2>Cliente</h2>";
       // echo "Nombre: ".$tabla[0]->getNombre()."<br>";
       // echo "Apellido1: ".$tabla[0]->getApellido1()."<br>";
       // echo "Apellido2: ".$tabla[0]->getApellido2()."<br>";
       // echo $tabla[0]->getProvincia();
       // echo "Nif: ".$tabla[0]->getNif()."<br>";
       // echo "NumCTA: ".$tabla[0]->getNumCta();
        $direccion=$tDireccion->getDireccionCliente($tabla[0]);

        if(!empty($direccion)){
            //echo "<h2>Direcciones del Cliente</h2>";
            //echo "Direccion: " . $direccion[0]->getDireccion()."<br>";
            //echo "Localidad: " .$direccion[0]->getLocalidad()."<br>";
            //echo "CodPostal: " .$direccion[0]->getCodPostal()."<br>";
            //echo "Provincia: " .$direccion[0]->getProvincia()."<br>";
            //echo "Pais: " .$direccion[0]->getPais();


            echo
                "
       
        <form name="."'formularioModificar' method="."POST"." action="."../vista_admin/IndexAdmin.php?principal=cliente/modificarCliente.php".">
      <div class="."form-group"."'row'".">
       
        <div class="."col-sm-8".">
        <h1>Modificacion del cliente</h1>
          <label for="."nombreCliente"." class="."col-sm-2.". "col-form-label".">Nombre</label>
          <input type="."text"." class="."form-control"." id="."inputEmail3"." 
          name="."nombre"." value='".$tabla[0]->getNombre()."'>
        </div><br>
      </div>
      <div class="."form-group"."'row'".">
        <div class="."col-sm-8".">
          <label for="."nombreCliente"." class="."col-sm-2." ."col-form-label".">Primer Apellido</label>
          <input type="."text"." class="."form-control"." id="."inputEmail3"." 
          name="."apellido1"." value='".$tabla[0]->getApellido1()."'>
        </div>
      </div><br>
    
      <div class="."form-group"."'row'".">
        <div class="."col-sm-8".">
          <label for="."nombreCliente"." class="."col-sm-2." ."col-form-label".">Segundo Apellido</label>
          <input type="."text"." class="."form-control"." id="."inputEmail3"." 
          name="."apellido2"." value='".$tabla[0]->getApellido2()."'>
        </div>
      </div><br>
    
      <div class="."form-group"."'row'".">
        <div class="."col-sm-8".">
          <label for="."nombreCliente"." class="."col-sm-2" ."col-form-label".">Dirección</label>
          <input type="."text"." class="."form-control"." id="."inputEmail3"." 
          name="."direccion"." value='".$direccion[0]->getDireccion()."'>
        </div>
      </div><br>
    
      <div class="."form-group"."'row'".">
        <div class="."col-sm-8".">
          <label for="."nombreCliente"." class="."col-sm-2". "col-form-label".">Localidad</label>
          <input type="."text"." class="."form-control"." id="."inputEmail3"." 
          name="."localidad"." value='".$direccion[0]->getLocalidad()."'>
        </div>
      </div><br>
      <div class="."form-group"."'row'".">
        <!--Hago el input del codPostal más corto y limito la entrada a 5 chars-->
        <div class="."col-sm-3".">
          <label for="."nombreCliente"." class="."col-sm-2". "col-form-label".">Código Postal</label>
          <input type="."text"."maxlength="."5"." class="."form-control"." id="."inputEmail3"." 
          name="."codPostal"." value='".$direccion[0]->getCodPostal()."'>
        </div>
      </div><br>
    
      <div class="."form-group"."'row'".">
        <div class="."col-sm-4".">
                <label for="."nombreCliente"." class="."col-sm-2". "col-form-label".">Provincia</label>

          <select name="."provincia"." class="."form-control".">
                    <option value='".$direccion[0]->getProvincia()."'>".$direccion[0]->getProvincia()."</option>
                    <option value="."04".">Almería</option>
                    <option value="."06".">Badajoz</option>
                    <option value="."10".">Cáceres</option>
                    <option value="."28".">Madrid</option>
          </select> 
        </div>
      </div><br>
    
      <div class="."form-group"."'row'".">
        <div class="."col-sm-8".">
                <label for="."nombreCliente" ."class="."col-sm-2" ."col-form-label".">País</label>

          <input type="."text"." class="."form-control"." id="."inputEmail3"." 
          name="."pais"." value='".$direccion[0]->getPais()."'>
        </div>
      </div><br>
      
      <div class="."form-group"."'row'".">

        <div class="."col-sm-8".">
                      <label for="."nombreCliente"." class="."col-sm-2". "col-form-label".">Número de Cuenta</label><br>

          <input type="."text" ."class="."form-control"." id="."inputEmail3"." 
          name="."numCta" ." value='".$tabla[0]->getNumCta()."'>
         
        </div>
      </div>
    <div class="."form-group"."'row'".">
        <div class="."col-sm-8".">
          <input type="."text"." class="."form-control"." id="."inputEmail3"." 
          name="."nifM" ." value='".$tabla[0]->getNif()."' hidden>
        </div>
      </div>
      <br>
      <div class="."form-group"."'row'".">
      
        <div class="."form-group". "col-sm-8" .">
            &nbsp&nbsp&nbsp<button type="."submit"." name="."modificar"." class="."'btn btn-primary'".">Modificar</button>
        </div>
        </div>
    </form>
    ";

        } else {
            echo "<div class="."'alert alert-danger'"." role="."'alert'".">
                ADVERTENCIA ---- ¡Ese cliente no tiene ninguna direccion asociada!
               </div>";
        }



}

}
if (isset($_POST['modificar'])) { //si se ha pulsado el botón de guardar
    if($_POST['nifM']!=null){
        $tabla=$tCliente->getClienteByNif($_POST['nifM']);
    } else {
        $tabla = array();
    }
    if(!empty($tabla)){
        $id_cliente = $tabla[0]->getIdCliente();

        // Datos cliente recogidos del formulario
        $nombre = $_POST['nombre'];
        $apellido1 = $_POST['apellido1'];
        $apellido2 = $_POST['apellido2'];
        $nif = $_POST['nifM'];
        $varon = 0;
        $numCta = $_POST['numCta'];
        $comoNosConocio = "Por Internet";
        $cliente = new Cliente(0,$id_cliente,0,$nombre,$apellido1,$apellido2,$nif,$varon,$numCta,$comoNosConocio,1);
        //var_dump($cliente);
        $tCliente->updateCliente($cliente);

        // Datos de las direcciones del cliente del formulario
        $direccion = $_POST['direccion'];
        $localidad = $_POST['localidad'];
        $codPostal = $_POST['codPostal'];
        $provinvia = $_POST['provincia'];
        $pais = $_POST['pais'];
        $direccionCliente = new DireccionesCliente(0, $id_cliente, 0,$direccion,$localidad,$codPostal,$provinvia,$pais,1);
        //var_dump($direccionCliente);
        $tDireccion->updateDireccionCliente($direccionCliente);
    } else{
        echo "Error";
    }

}
?>