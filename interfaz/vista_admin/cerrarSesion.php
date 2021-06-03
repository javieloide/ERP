<?php
@session_destroy();
print "<script>window.setTimeout(function() { window.location = 'http://localhost/ERP/IndexInicial.php?principal=interfaz/vista_usuario/catalogoProductosCarrito.php' }, 100);</script>";
?>