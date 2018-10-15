function cargarProductos (parametro) {
	$.ajax({
		type: 'GET',
		url: 'mantenimiento.php',
		data: {datobusqueda: parametro}
	}).done(function ( datos ) {
		$("#grid").html(datos);
	}).fail(function (jqXHR, textStatus, errorThrown){
		$("#msjbox").html(textStatus +": Recurso "+ errorThrown);
	});
}

function insertarProductosAjax () {
	$.ajax({
		type: 'POST',
		url: 'mantenimiento.php',
		
		data: {key: 'guardar', cod: $('#txt_cod').val(), nom: $('#txt_nom').val(),
		prec: $('#txt_prec').val(), cant: $('#txt_cant').val()}

	}).done(function ( datos ) {
		$("#msjbox").html("Insertado con Exito");
		cargarProductos('');
	}).fail(function (jqXHR, textStatus, errorThrown){
		$("#msjbox").html(" Error al insertar");
	});
}

function eliminarProductosAjax () {
	$.ajax({
		type: 'POST',
		url: 'mantenimiento.php',

		data: {key: 'eliminar', cod: $('#txt_cod').val()}
	}).done(function ( datos ) {
		$("#msjbox").html("Eliminado con Exito");
		cargarProductos('');
	}).fail(function (jqXHR, textStatus, errorThrown){
		$("#msjbox").html(" Error al insertar");
	});
}

