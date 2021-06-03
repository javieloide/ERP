<!DOCTYPE html>
<?php
//index.php
$minimum_range = 0;
$maximum_range = 9999;
?>
<html lang="es">
    <head>
        <meta charset= "utf-8" >
        <meta name= "viewport" content= "width=device-width, initial-scale=1, shrink-to-fit=no" >
        <meta name="author" content="José Javier Acosta Blasco">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <link rel="stylesheet" href= "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity= "sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin= "anonymous" >
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
     <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
 	
        
        <title>Filtro de un producto</title>
        <style>
            .categoriaSection{
                height: 180px; 
                overflow-y: auto; 
                overflow-x: hidden;
            }
            
            input[type=range] {
            -webkit-appearance: none;
            margin: 10px 0;
            width: 100%;
            }
            input[type=range]:focus {
            outline: none;
            }
            input[type=range]::-webkit-slider-runnable-track {
            width: 100%;
            height: 12.8px;
            cursor: pointer;
            box-shadow: 0px 0px 0px #000000, 0px 0px 0px #0d0d0d;
            background: #ac51b5;
            border-radius: 100px;
            border: 0px solid #000101;
            }
            input[type=range]::-webkit-slider-thumb {
            box-shadow: 0px 0px 0px #000000, 0px 0px 0px #0d0d0d;
            border: 0px solid #000000;
            height: 20px;
            width: 10px;
            border-radius: 7px;
            background: #65001c;
            cursor: pointer;
            -webkit-appearance: none;
            margin-top: -3.6px;
            }
            input[type=range]:focus::-webkit-slider-runnable-track {
            background: #ac51b5;
            }
            input[type=range]::-moz-range-track {
            width: 100%;
            height: 12.8px;
            cursor: pointer;
            animate: 0.2s;
            box-shadow: 0px 0px 0px #000000, 0px 0px 0px #0d0d0d;
            background: #ac51b5;
            border-radius: 25px;
            border: 0px solid #000101;
            }
            input[type=range]::-moz-range-thumb {
            box-shadow: 0px 0px 0px #000000, 0px 0px 0px #0d0d0d;
            border: 0px solid #000000;
            height: 20px;
            width: 39px;
            border-radius: 7px;
            background: #65001c;
            cursor: pointer;
            }
            input[type=range]::-ms-track {
            width: 100%;
            height: 12.8px;
            cursor: pointer;
            animate: 0.2s;
            background: transparent;
            border-color: transparent;
            border-width: 39px 0;
            color: transparent;
            }
            input[type=range]::-ms-fill-lower {
            background: #ac51b5;
            border: 0px solid #000101;
            border-radius: 50px;
            box-shadow: 0px 0px 0px #000000, 0px 0px 0px #0d0d0d;
            }
            input[type=range]::-ms-fill-upper {
            background: #ac51b5;
            border: 0px solid #000101;
            border-radius: 50px;
            box-shadow: 0px 0px 0px #000000, 0px 0px 0px #0d0d0d;
            }
            input[type=range]::-ms-thumb {
            box-shadow: 0px 0px 0px #000000, 0px 0px 0px #0d0d0d;
            border: 0px solid #000000;
            height: 20px;
            width: 39px;
            border-radius: 7px;
            background: #65001c;
            cursor: pointer;
            }
            input[type=range]:focus::-ms-fill-lower {
            background: #ac51b5;
            }
            input[type=range]:focus::-ms-fill-upper {
            background: #ac51b5;
            }
        </style>
    </head>
    <body>
        <h1>Filtro de un Producto </h1><br>
        <?php
            require_once '../../pojos/Producto.php';
            require_once '../../persistencia/Productos.php';
            require_once '../../pojos/FamiliaProducto.php';
            require_once '../../persistencia/FamiliasProductos.php';
            
            $tFamilia = FamiliasProductos::singletonFamiliasProductos();
            $todasFamilias = $tFamilia->getFamiliasProductosTodos();
            
            $tProducto = Productos::singletonProductos();
            $todosProductos = $tProducto->getProductosTodos();
        ?>
        <form name="formularioFiltro" method="POST" action="../vista_admin/IndexAdmin.php?principal=producto/filtroProducto.php">
        <div class="form-group"> 
                    <h3>Codigo de barras:</h3>   
                    <select name="codigo" class="custom-select">
                        <?php 
                            foreach ($todosProductos as $f) {
                                $codigoBarras=$f->getCodigoBarras();
                                echo '<option value="'.$codigoBarras.'">'.$codigoBarras.'</option>';

                            }
                                echo '<option id="seleccionado" value="'.$codigoBarras.'" selected>...</option>';
                        ?>
                    </select>
                    <br><br>
                    <div class="form-group">
                    <button type="submit" id="buscar" name="buscar" class="btn btn-primary">Buscar</button>

                </div>
            </div> 
            <br>
            <div class="list-group">
                    <h3>Categoria</h3>
                    <div class="categoriaSection">
                        <?php
                        foreach ($todasFamilias as $f) {
                            $idFamilia=$f->getIdFamilia();
                            $nombreFamilia=$f->getNombre();
                        ?>
                        <div class="list-group-item checkbox">
                        
                        <input type="checkbox" name = '<?php echo $nombreFamilia ?>' value='<?php echo $idFamilia ?>'>

                        <label><?php echo $nombreFamilia?></label>
                        
                        </div>
                      
                        <?php }	
                        ?>
                    </div>           
            </div>
            <br>
            <button type='submit' id='categoria' name='categoria' class='btn btn-primary'>Filtrar</button>  
            <br> <br> 
            <h4 id="span">Precio menor a: 0</h4>
            <div id = sliderbox>
                <input id="inputRange" type="range" name="inputRange" min=0 max=9999 value=0 step=1;>
                <button type='submit' id='precio' name='precio' class='btn btn-primary'>Filtrar</button>  
            </div>
            <br><br>
           
            <script type="text/javascript">
                var inputRange = document.querySelector("#inputRange");
                var texto = document.querySelector("#span");
                inputRange.addEventListener("change", function() {
                   console.log("Ha cambiado el slider", "valor: "+inputRange.value); 
                   texto.textContent = "Precio menor a: "+inputRange.value;
                });
            </script>
        </form>

        <?php


        
        if(isset($_POST["buscar"])){

        if($_POST['codigo']!=null){
            $tabla=$tProducto->getProductoByCodigo($_POST['codigo']);
            
        } else {
            $tabla = array();
        }

        ?>

        <?php
            if(empty($tabla)) {
                echo "<div class="."'alert alert-danger'"." role="."'alert'".">
                        ADVERTENCIA ---- ¡Ese codigo introducido no pertenece a ningun producto!
                    </div>";
            } else {	
        ?>
                
            
            <table style= "font-size:12px;" class="table table-hover table-sm">
            <thead class="thead-dark">
            <tr>
                <th scope="col">id_producto</th>
                <th scope="col">id_familia</th>
                <th scope="col">precio_coste</th>
                <th scope="col">pvp</th>
                <th scope="col">descripcion</th>
                <th scope="col">codigo_barras</th>
                <th scope="col">id_proveedor</th>
                <th scope="col">stock_actual</th>
                <th scope="col">stock_minimo</th>
                <th scope="col">stock_maximo</th>
                <th scope="col">foto</th>
        
        
            </tr>
            </thead>
            <tbody>
            <?php 
                    $c = $tabla[0];
        
                    echo "<tr>";
                        echo "<td>". $c->getIdProducto(). "</td>";
                        echo "<td>". $c->getIdFamilia(). "</td>";
                        echo "<td>". $c->getPrecioCoste(). "</td>";
                        echo "<td>". $c->getPvp(). "</td>";
                        echo "<td>". $c->getDescripcion(). "</td>";
                        echo "<td>". $c->getCodigoBarras(). "</td>";
                        echo "<td>". $c->getIdProveedor (). "</td>";
                        echo "<td>". $c->getStockActual(). "</td>";
                        echo "<td>". $c->getStockMinimo(). "</td>";
                        echo "<td>". $c->getStockMaximo(). "</td>";
                        echo "<td><img src='../../interfaz/".$c->getRutaFoto()."' width=50 height=50></td>";
                    echo "<tr>";		
                
            echo "</tbody>";    
            echo "</table>";
        
        ?>
        
        <?php  
            }
        } 
        ?>


        <?php
        if(isset($_POST["categoria"])){
        ?>
        <table style= "font-size:12px;" class="table table-hover table-sm">
            <thead class="thead-dark">
            <tr>
                <th scope="col">id_producto</th>
                <th scope="col">id_familia</th>
                <th scope="col">precio_coste</th>
                <th scope="col">pvp</th>
                <th scope="col">descripcion</th>
                <th scope="col">codigo_barras</th>
                <th scope="col">id_proveedor</th>
                <th scope="col">stock_actual</th>
                <th scope="col">stock_minimo</th>
                <th scope="col">stock_maximo</th>
                <th scope="col">foto</th>
        
        
            </tr>
            </thead>
            <tbody>
        <?php    
            echo "<br><br>";
            $productos=array();
            foreach ($todasFamilias as $f) {
                $idFamilia=$f->getIdFamilia();
                $nombreFamilia=$f->getNombre();
                if(isset($_POST[$nombreFamilia])){
                    $p = $tProducto->getProductosByCategoria($idFamilia);
                    array_push($productos, $p);
                }
            }
            
            foreach ($productos as $cA) {
                foreach($cA as $c){

                    echo "<tr>";
                        echo "<td>". $c->getIdProducto(). "</td>";
                        echo "<td>". $c->getIdFamilia(). "</td>";
                        echo "<td>". $c->getPrecioCoste(). "</td>";
                        echo "<td>". $c->getPvp(). "</td>";
                        echo "<td>". $c->getDescripcion(). "</td>";
                        echo "<td>". $c->getCodigoBarras(). "</td>";
                        echo "<td>". $c->getIdProveedor (). "</td>";
                        echo "<td>". $c->getStockActual(). "</td>";
                        echo "<td>". $c->getStockMinimo(). "</td>";
                        echo "<td>". $c->getStockMaximo(). "</td>";
                        echo "<td><img src='../../interfaz/".$c->getRutaFoto()."' width=50 height=50></td>";
                    echo "<tr>";		
            }
        }
    
        echo "</tbody>";    
        echo "</table>";
            
        }
        ?>

<?php
        if(isset($_POST["precio"])){
        ?>
        <table style= "font-size:12px;" class="table table-hover table-sm">
            <thead class="thead-dark">
            <tr>
                <th scope="col">id_producto</th>
                <th scope="col">id_familia</th>
                <th scope="col">precio_coste</th>
                <th scope="col">pvp</th>
                <th scope="col">descripcion</th>
                <th scope="col">codigo_barras</th>
                <th scope="col">id_proveedor</th>
                <th scope="col">stock_actual</th>
                <th scope="col">stock_minimo</th>
                <th scope="col">stock_maximo</th>
                <th scope="col">foto</th>
        
        
            </tr>
            </thead>
            <tbody>
        <?php    
            echo "<br><br>";
                if(isset($_POST['inputRange'])){
                    $productos = $tProducto->getProductosByPrecioMenorA($_POST['inputRange']);
                  
                }
            
            foreach ($productos as $c) {
                    echo "<tr>";
                        echo "<td>". $c->getIdProducto(). "</td>";
                        echo "<td>". $c->getIdFamilia(). "</td>";
                        echo "<td>". $c->getPrecioCoste(). "</td>";
                        echo "<td>". $c->getPvp(). "</td>";
                        echo "<td>". $c->getDescripcion(). "</td>";
                        echo "<td>". $c->getCodigoBarras(). "</td>";
                        echo "<td>". $c->getIdProveedor (). "</td>";
                        echo "<td>". $c->getStockActual(). "</td>";
                        echo "<td>". $c->getStockMinimo(). "</td>";
                        echo "<td>". $c->getStockMaximo(). "</td>";
                        echo "<td><img src='../../interfaz/".$c->getRutaFoto()."' width=50 height=50></td>";
                    echo "<tr>";		
        }
    
        echo "</tbody>";    
        echo "</table>";
            
        }
        ?>
     
     
    </body>
</html>    

