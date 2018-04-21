/*=============================================
EDITAR CATEGORIA
=============================================*/
$(".tablas").on("click", ".btnEditarModel", function(){

	var idModel = $(this).attr("idModel");

	var datos = new FormData();
	datos.append("idModel", idModel);

	$.ajax({
		url: "ajax/models.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){

     		$("#editarModel").val(respuesta["model"]);
     		$("#idModel").val(respuesta["id"]);

     	}

	})


})

/*=============================================
ELIMINAR CATEGORIA
=============================================*/
$(".tablas").on("click", ".btnEliminarModel", function(){

	 var idModel = $(this).attr("idModel");

	 swal({
	 	title: '¿Está seguro de borrar el modelo?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar modelo!'
	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?ruta=models&idModel="+idModel;

	 	}

	 })

})