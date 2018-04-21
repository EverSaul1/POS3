<?php

class ControladorMateriales{

	/*=============================================
	CREAR CATEGORIAS
	=============================================*/

	static public function ctrCrearMaterial(){

		if(isset($_POST["nuevaMaterial"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaMaterial"])){

				$tabla = "materiales";

				$datos = $_POST["nuevaMaterial"];

				$respuesta = ModeloMateriales::mdlIngresarMaterial($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La material ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "materiales";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La material no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "materiales";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR CATEGORIAS
	=============================================*/

	static public function ctrMostrarMateriales($item, $valor){

		$tabla = "materiales";

		$respuesta = ModeloMateriales::mdlMostrarMateriales($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	EDITAR CATEGORIA
	=============================================*/

	static public function ctrEditarMaterial(){

		if(isset($_POST["editarMaterial"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarMaterial"])){

				$tabla = "materiales";

				$datos = array("material"=>$_POST["editarMaterial"],
							   "id"=>$_POST["idMaterial"]);

				$respuesta = ModeloMateriales::mdlEditarMaterial($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La material ha sido cambiada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "materiales";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La material no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "materiales";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR CATEGORIA
	=============================================*/

	static public function ctrBorrarMaterial(){

		if(isset($_GET["idMaterial"])){

			$tabla ="materiales";
			$datos = $_GET["idMaterial"];

			$respuesta = ModeloMateriales::mdlBorrarMaterial($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "La material ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "materiales";

									}
								})

					</script>';
			}
		}
		
	}
}
