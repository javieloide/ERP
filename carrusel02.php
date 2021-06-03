<!doctype html> 
 <html lang= "es" > 
 <head> <!-- Required meta tags --> 
  <meta charset= "utf-8" > 
  <meta name= "viewport" content= "width=device-width, initial-scale=1, shrink-to-fit=no" >

  

  <!-- Bootstrap CSS en la web--> 

  <link rel= "stylesheet" href= "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity= "sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin= "anonymous" > 
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
     <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <link rel="stylesheet" href="estilos.css">

  <title> Hola mundo!!  </title> 
 </head> 


 <body>
 <?php


 require_once POJOS. "Producto.php";
 require_once PERSISTENCIA. "Productos.php";

 $tProducto= Productos::singletonProductos();
 $productos=$tProducto->getProductosTodos();


 ?>
  <div class="container-fluid">
      <div class="row-first">
            <div id="carouselProductos" class="carousel slide"
                 data-ride="carousel" data-interval="500">

                <ol class="carousel-indicators">
                    <li data-target="#carouselProductos" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselProductos" data-slide-to="1"></li>
                    <li data-target="#carouselProductos" data-slide-to="2"></li>
                </ol>

              <div class="carousel-inner" style="background-color: cyan">
                    <div class="carousel-item active" >
                        <img style="max-width: 30%;
                            height: auto;"
                            
                             src= "../fotos/productos/pro_000400010.jpg"
                             class="d-block w-50" alt="...">
                    </div>
                        <?php
                        foreach ($productos as $pr){
                          
                        ?>

                    <div class="carousel-item">

                        <img style="max-width: 30%;
                            height: auto;"
                             class="d-block w-50"
                             src="<?php 
                                    if ($_SESSION['user']=='admin'){
                                        echo "../". $pr->getRutaFoto();}
                                    else{
                                         echo "interfaz/". $pr->getRutaFoto();}?>"

                             alt="<?php echo $pr->getDescripcion(); ?>">
                        <div class="carousel-caption d-none d-md-block">
                            <?php
                                echo "<h5 float: left; style='color:black; font-size:150%'>".$pr->getDescripcion()."</h5>
                                <p style='color:red; font-size:150%'>".
                                $pr->getPvp()." € </p>";
                            ?>

                        </div>
                    </div>
                        <?php } ?>

              </div>
              <a class="carousel-control-prev" href="#carouselProductos" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselProductos" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
              </a>
            </div>


    </div>


  </div>


<script src= "https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity= "sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin= "anonymous" ></script>
  <script src= "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity= "sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin= "anonymous" ></script> <script src= "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity= "sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin= "anonymous" ></script>




</body>
</html>