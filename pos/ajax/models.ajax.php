<?php

require_once "../controladores/models.controlador.php";
require_once "../modelos/models.modelo.php";

class AjaxModels{

	/*=============================================
	EDITAR CATEGORÍA
	=============================================*/	

	public $idModel;

	public function ajaxEditarModel(){

		$item = "id";
		$valor = $this->idModel;

		$respuesta = ControladorModels::ctrMostrarModels($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR CATEGORÍA
=============================================*/	
if(isset($_POST["idModel"])){

	$model = new AjaxModels();
	$model -> idModel = $_POST["idModel"];
	$model -> ajaxEditarModel();
}
