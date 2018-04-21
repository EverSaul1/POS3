/*=============================================
EDITAR CATEGORIA
=============================================*/
$(".tablas").on("click", ".btnEditarMaterial", function(){

	var idMaterial = $(this).attr("idMaterial");

	var datos = new FormData();
	datos.append("idMaterial", idMaterial);

	$.ajax({
		url: "ajax/materiales.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){

     		$("#editarMaterial").val(respuesta["material"]);
     		$("#idMaterial").val(respuesta["id"]);

     	}

	})


})

/*=============================================
ELIMINAR CATEGORIA
=============================================*/
$(".tablas").on("click", ".btnEliminarMaterial", function(){

	 var idMaterial = $(this).attr("idMaterial");

	 swal({
	 	title: '¿Está seguro de borrar el material?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar material!'
	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?ruta=materiales&idMaterial="+idMaterial;

	 	}

	 })

})