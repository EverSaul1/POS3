<?php

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

class TablaProductos{

  /*=============================================
  MOSTRAR LA TABLA DE PRODUCTO
  =============================================*/ 

  public function mostrarTabla(){

  	$item = null;
    $valor = null;
    $orden = "id";

    $productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);

    echo '{
			"data": [';

			for($i = 0; $i < count($productos)-1; $i++){

				$item = "id";
    			$valor = $productos[$i]["id_categoria"];

				$categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

				 echo '[
			      "'.($i+1).'",
			      "'.$productos[$i]["imagen"].'",
			      "'.$productos[$i]["codigo"].'",
			      "'.$productos[$i]["descripcion"].'",
			      "'.$categorias["categoria"].'",
			      "'.$productos[$i]["model"].'",
			      
			     
			      "'.$productos[$i]["stock"].'",
			      "'.$productos[$i]["id"].'"
			    ],';

			}
			$item = "id";
			$valor = $productos[count($productos)-1]["id_categoria"];

			$categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);


		   echo'[
			      "'.count($productos).'",
			      "'.$productos[count($productos)-1]["imagen"].'",
			      "'.$productos[count($productos)-1]["codigo"].'",
			      "'.$productos[count($productos)-1]["descripcion"].'",
			      "'.$categorias["categoria"].'",
			      "'.$productos[count($productos)-1]["model"].'",
			      
			      
			      "'.$productos[count($productos)-1]["stock"].'",
			      "'.$productos[count($productos)-1]["id"].'"
			    ]
			]
		}';

  }

}

/*=============================================
ACTIVAR TABLA DE PRODUCTOS
=============================================*/ 

$activar = new TablaProductos();
$activar -> mostrarTabla();