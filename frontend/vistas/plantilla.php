<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta name="title" content="Tienda Virtual">
	<meta name="description" content="Lorem ipsum dolor sit amet, consectetur adipisicing elit.">
	<meta name="keyword" content="lorem, ipsum, dolor, sit amet, consectetur, adipisicing elit">

	<title>Tienda Virtual</title>

	<?php

		$icono = ControladorPlantilla::ctrEstiloPlantilla();

		echo '<link rel="icon" href="http://localhost/backend/'.$icono["icono"].'">';

		/* RUTA FIJA O ESTATICA*/

		$url = Ruta::ctrRuta();

	?>

	<link rel="stylesheet" href="<?php echo $url ?>vistas/css/plugins/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo $url ?>vistas/css/plugins/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Ubuntu|Ubuntu+Condensed" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo $url ?>vistas/css/plantilla.css">
	<link rel="stylesheet" href="<?php echo $url ?>vistas/css/cabezote.css">


	<script src="<?php echo $url ?>vistas/js/plugins/jquery.min.js"></script>
	<script src="<?php echo $url ?>vistas/js/plugins/bootstrap.min.js"></script>


</head>
<body>
<?php
	/*================================
	=            Cabezote            =
	================================*/
	
	include "modulos/cabezote.php";

	/*========================
		CONTENIDO DINÁMICO
	==========================*/

	$rutas = array();
	$ruta = "";

	if(isset($_GET["ruta"])){	

		$rutas = explode("/", $_GET["ruta"]);

		$item = "ruta";
		$valor =  $rutas[0];

		/*==================================
			URL'S AMIGABLES DE CATEGORÍAS
		====================================*/

		$rutaCategorias = ControladorProductos::ctrMostrarCategorias($item, $valor);

		if($rutas[0] == $rutaCategorias["ruta"]){

			$ruta = $rutas[0];

		}

		/*========================================
			URL'S AMIGABLES DE SUBCATEGORÍAS
		==========================================*/

		$rutaSubCategorias = ControladorProductos::ctrMostrarSubCategorias($item, $valor);

		foreach ($rutaSubCategorias as $key => $value) {
			
			if($rutas[0] == $value["ruta"]){

				$ruta = $rutas[0];

			}

		}

		/*========================================
			LISTA BLANCA DE URL'S AMIGABLES
		==========================================*/

		if($ruta != null){

			include "modulos/productos.php";

		}else{

			include "modulos/error404.php";
			
		}
}


	
?>	

<script src="vistas/js/cabezote.js"></script>
<script src="vistas/js/plantilla.js"></script>
</body>
</html>