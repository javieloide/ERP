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
    <title>Modificar un empleado</title>
</head>
<body>
<h1>Filtro de un empleado </h1>

<form name="formularioFiltro" method="POST" action="../vista_admin/IndexAdmin.php?principal=empleado/modificarEmpleado.php">
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

require_once '../../pojos/Departamento.php';
require_once '../../persistencia/Departamentos.php';
require_once '../../pojos/Empleado.php';
require_once '../../persistencia/Empleados.php';



$tEmpleado = Empleados::singletonEmpleados();
$tDepartamento = Departamentos::singletonDepartamentos();
$todosDepartamentos = $tDepartamento->getDepartamentosTodos();
if (isset($_POST['buscar'])) { //si se ha pulsado el botón de guardar

if($_POST['nif']!=null){
    $tabla=$tEmpleado->getEmpleadoByNif($_POST['nif']);
} else {
    $tabla = array();
}

?>

<?php
if(empty($tabla)) {
    echo "<div class="."'alert alert-danger'"." role="."'alert'".">
                ADVERTENCIA ---- ¡Ese nif introducido no pertenece a ningun empleado!
               </div>";
} else {
    // echo "<h2>Cliente</h2>";
    // echo "Nombre: ".$tabla[0]->getNombre()."<br>";
    // echo "Apellido1: ".$tabla[0]->getApellido1()."<br>";
    // echo "Apellido2: ".$tabla[0]->getApellido2()."<br>";
    // echo $tabla[0]->getProvincia();
    // echo "Nif: ".$tabla[0]->getNif()."<br>";
    // echo "NumCTA: ".$tabla[0]->getNumCta();


        echo
            "
       
        <form name="."'formularioModificar' method="."POST"." action="."../vista_admin/IndexAdmin.php?principal=empleado/modificarEmpleado.php".">
      <div class="."form-group"."'row'".">
       
        <div class="."col-sm-8".">
        <h1>Modificacion del empleado</h1>
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
          <label for="."nombreCliente"." class="."col-sm-2" ."col-form-label".">Numero cuenta</label>
          <input type="."text"." class="."form-control"." id="."inputEmail3"." 
          name="."numCta"." value='".$tabla[0]->getNumCta()."'>
        </div>
      </div><br>
    
      <div class="."form-group"."'row'".">
        <div class="."col-sm-8".">
          <label for="."nombreCliente"." class="."col-sm-2". "col-form-label".">Localidad</label>
          <input type="."text"." class="."form-control"." id="."inputEmail3"." 
          name="."localidad"." value='".$tabla[0]->getLocalidad()."'>
        </div>
      </div><br>
      <div class="."form-group"."'row'".">
        <!--Hago el input del codPostal más corto y limito la entrada a 5 chars-->
        <div class="."col-sm-3".">
          <label for="."nombreCliente"." class="."col-sm-2". "col-form-label".">Código Postal</label>
          <input type="."text"."maxlength="."5"." class="."form-control"." id="."inputEmail3"." 
          name="."codPostal"." value='".$tabla[0]->getCodPostal()."'>
        </div>
      </div><br>
    
      <div class="."form-group"."'row'".">
        <!--Hago el input del codPostal más corto y limito la entrada a 5 chars-->
        <div class="."col-sm-3".">
          <label for="."nombreCliente"." class="."col-sm-2". "col-form-label".">Provincia</label>
          <input type="."text"." class="."form-control"." id="."inputEmail3"." 
          name="."provincia"." value='".$tabla[0]->getProvincia()."'>
        </div>
      </div><br>
    
      <div class="."form-group"."'row'".">
        <div class="."col-sm-8".">
                <label for="."nombreCliente" ."class="."col-sm-2" ."col-form-label".">País</label>

          <input type="."text"." class="."form-control"." id="."inputEmail3"." 
          name="."pais"." value='".$tabla[0]->getPais()."'>
        </div>
      </div><br>
      
      <div class="."form-group"."'row'".">

        <div class="."col-sm-8".">
                      <label for="."nombreCliente"." class="."col-sm-2". "col-form-label".">Número de Cuenta</label><br>

          <input type="."text" ."class="."form-control"." id="."inputEmail3"." 
          name="."numCta" ." value='".$tabla[0]->getNumCta()."'>
         
        </div>
      </div><br>
       <div class="."form-group"."'row'".">

        <div class="."col-sm-8".">
                      <label for="."nombreCliente"." class="."col-sm-2". "col-form-label".">Movil</label><br>

          <input type="."text" ."class="."form-control"." id="."inputEmail3"." 
          name="."movil" ." value='".$tabla[0]->getMovil()."'>
         
        </div>
      </div><br>
       <div class="."form-group"."'row'".">

        <div class="."col-sm-8".">
                      <label for="."nombreCliente"." class="."col-sm-2". "col-form-label".">Direccion</label><br>

          <input type="."text" ."class="."form-control"." id="."inputEmail3"." 
          name="."direccion" ." value='".$tabla[0]->getDireccion()."'>
         
        </div>
      </div><br>
      <div class="."form-group"."'row'"."> 
        <div class="."col-sm-8".">
			<label for="."nombre"." class="."col-sm-2". "col-form-label".">Departamento:</label>

			<select name="."idDepartamento"." class="."custom-select>";

					foreach ($todosDepartamentos as $f) {
						$idFamilia=$f->getIdDepartamento();

						$nombreFamilia=$f->getNombre();

						echo '<option value="'.$idFamilia.'">'.$nombreFamilia.'</option>';

				}
			echo "	
			</select>
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




}

}
/*/**
     * Class Constructor
     * @param    $id
     * @param    $idEmpleado
     * @param    $idUsuario
     * @param    $nombre
     * @param    $apellido1
     * @param    $apellido2
     * @param    $numCta
     * @param    $movil
     * @param    $localidad
     * @param    $codPostal
     * @param    $provincia
     * @param    $activo
     * @param    $idDepartamento
     * @param    $nif
     * @param    $direccion
     * @param    $pais
     */
if (isset($_POST['modificar'])) { //si se ha pulsado el botón de guardar
    if($_POST['nifM']!=null){
        $tabla=$tEmpleado->getEmpleadoByNif($_POST['nifM']);
    } else {
        $tabla = array();
    }
    if(!empty($tabla)){
        $id_empleado = $tabla[0]->getIdEmpleado();

        // Datos cliente recogidos del formulario
        $nombre = $_POST['nombre'];
        $apellido1 = $_POST['apellido1'];
        $apellido2 = $_POST['apellido2'];
        $numCta = $_POST['numCta'];
        $movil = $_POST['movil'];
        $localidad = $_POST['localidad'];
        $codPostal = $_POST['codPostal'];
        $provinvia = $_POST['provincia'];
        $activo = 1;
        $idDepartamento = $_POST['idDepartamento'];
        $nif = $_POST['nifM'];
        $direccion = $_POST['direccion'];
        $pais = $_POST['pais'];



        $empleado = new Empleado(0,$id_empleado,0,$nombre,$apellido1,$apellido2,$numCta,$movil,$localidad,$codPostal,$provinvia,$activo,$idDepartamento,$nif,$direccion,$pais);
        //var_dump($cliente);
        $tEmpleado->updateEmpleado($empleado);

    } else{
        echo "Error";
    }

}
?>