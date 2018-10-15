<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once('mantenimiento.php'); ?>
<html>
<head>
	<title>LAB #6</title>
	<link rel="stylesheet" href="css/styles.css">
	<script src="js/jquery-2.0.3.js"></script>
	<script src="js/funciones.js"></script>
</head>
<body>
	<form method="post" id="frm_productos" name="frm_productos" action="mantenimiento.php">
		<label>Codigo:</label>
		<input type="text" class="campo_texto" maxlength="8" value="" tabindex="1" id="txt_cod" name="txt_cod">
		<br><br>
		<label>Nombre:</label>
		<input type="text" class="campo_texto" maxlength="64" value="" tabindex="2" id="txt_nom" name="txt_nom">
		<br><br>
		<label>Precio:</label>
		<input type="text" class="campo_texto" maxlength="11" value="" tabindex="3" id="txt_prec" name="txt_prec">
		<br><br>
		<label>Cantidad:</label>
		<input type="text" class="campo_texto" maxlength="11" value="" tabindex="4" id="txt_cant" name="txt_cant">
		<br><br>	
		<input type="button" value="Guardar" name="btn_guardar" tabindex="5" onclick="insertarProductosAjax()">
		<br><br>
		<input type="button" value="Eliminar" name="btn_eliminar" tabindex="6" onclick="eliminarProductosAjax()">
		<br><br>	
		<input type="button" value="Actualizar" name="btn_actualizar" tabindex="6" onclick="actualizarProductosAjax()">
		<br><br>
		<br><br>	

	</form>
	<div id="panel">
		<form method="post" id="frm_busqueda" name="frm_busqueda" action="mantenimiento.php">
			<input type="text" value="" placeholder="Nombre o Código del Producto" size="50" name="txt_busq" tabindex="7" onkeyup="cargarProductos(this.value)">
		</form>
		<br><br>
		<div id="resultados">
			<table id="grid">
				<?php echo obtenerProductos($conexion); ?>
			</table>
		</div>
	</div>
	<span id='msjbox' style='color: #F00;'></span>
</body>
</html>