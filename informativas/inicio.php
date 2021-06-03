<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Inicio</title>
</head>
<body>
	<h1>Esta es la página de inicio de nuestro sitio web</h1>

	<p>Información 
		
<?php
if(isset($_SESSION['user'])){
	if($_SESSION['user']!="06"){
	    include("rutas.php");
		include("carrusel02.php");
	}
	
	
}
;
?>
<p>El Instituto Castelar es un Centro Público dependiente de la Consejería de Educación de la Junta de Extremadura que tiene como misión:

<p>Satisfacer las necesidades y demandas en el ámbito de la ESO, Bachillerato, Ciclos Formativos y Formación Profesional Básica.
<p>Educar al alumnado teniendo en cuenta la diversidad de sus características personales.
<p>Proporcionar a nuestro alumnado, mediante su esfuerzo y nuestra ayuda, una buena formación, tanto académica como humana, que les prepare bien para las etapas posteriores de su vida.
<p>Impartir una educación de calidad, atenta a los cambios que genera la evolución social.
<p>Proyectar nuestra labor educativa y cultural en la vida de la comarca.Información
	Publicado: 22 Octubre 2008
<p>El Instituto Castelar es un Centro Público dependiente de la Consejería de Educación de la Junta de Extremadura que tiene como misión:

<p>Satisfacer las necesidades y demandas en el ámbito de la ESO, Bachillerato, Ciclos Formativos y Formación Profesional Básica.
Educar al alumnado teniendo en cuenta la diversidad de sus características personales.
<p>Proporcionar a nuestro alumnado, mediante su esfuerzo y nuestra ayuda, una buena formación, tanto académica como humana, que les prepare bien para las etapas posteriores de su vida.
Impartir una educación de calidad, atenta a los cambios que genera la evolución social.
<p>Proyectar nuestra labor educativa y cultural en la vida de la comarca.
</body>
</html>