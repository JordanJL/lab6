<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("conexion.php");

$servidor = "localhost";
$usuario = "usercore";
$pass = "una2015";
$base_datos = "bd_productos";
$conexion = new Conexion($servidor, $usuario,$pass,$base_datos);

function obtenerProductos($conexion){
	$conexion->consulta ("SELECT * FROM tbl_productos");
	$datos="";
	while ($fila = $conexion->extraer_registro() ) {
		$datos .= "<tr><td>$fila[1]</td><td>$fila[2]</td><td>$fila[3]</td><td>$fila[4]</td></tr>";
	}
	return $datos;
}


function insertarProductos($conexion,$codigo,$nombre,$precio,$cantidad){

	$conexion->consulta ("SELECT codigo FROM tbl_productos WHERE codigo = '" . $codigo . "'");
	
	if ($conexion->extraer_registro()) {

		$actualizar = "UPDATE tbl_productos
						SET nombre='$nombre', precio='$precio', cantidad='$cantidad'
						WHERE codigo = '" . $codigo . "'";
	} else{ 
	$insertar = "INSERT INTO tbl_productos(codigo,nombre,precio,cantidad)
				VALUES('$codigo','$nombre','$precio','$cantidad')";
	$conexion->consulta($insertar);
	}
}

function eliminarProductos($conexion, $codigo){
	$conexion->consulta ("DELETE FROM tbl_productos WHERE codigo = '" . $codigo ."'");
}


function actualizarProducto($conexion,$codigo,$nombre,$precio,$cantidad){
	$actualizar =  "UPDATE tbl_productos
						SET nombre='$nombre', precio='$precio', cantidad='$cantidad'
						WHERE codigo = '" . $codigo . "'";
	$conexion->consulta($actualizar);
}
function actualizarNombres($conexion,$nombre){
	$actualizar =  "UPDATE tbl_productos SET nombre='$nombre'";
	$conexion->consulta($actualizar);
}

if (isset($_POST['btn_eliminar'])) {
	$codigo = $_POST['txt_cod'];
	eliminarProductos($conexion,$codigo);
	header("Location: formulario.php");
}

if (isset($_POST['key'])) {
	if ($_POST['key']=='guardar') {
		$codigo = $_POST['cod'];
		$nombre = $_POST['nom'];
		$precio = $_POST['prec'];
		$cantidad = $_POST['cant'];
		insertarProductos($conexion,$codigo,$nombre,$precio,$cantidad);
	}
	if ($_POST['key']=='eliminar') {	
		$codigo = $_POST['cod'];
		eliminarProductos($conexion,$codigo);
	}
	if ($_POST['key']=='actualizar') {	
		$codigo = $_POST['cod'];
		$nombre = $_POST['nom'];
		$precio = $_POST['prec'];
		$cantidad = $_POST['cant'];
		actualizarProducto($conexion,$codigo,$nombre,$precio,$cantidad);
	}
	if($_POST['key']=='actualizarNombres'){
		$nombre = $_POST['cod'];
		actualizarProducto($conexion,$nombre);
	}
}



function buscarProductos($conexion,$dato){

	$conexion->consulta ("SELECT * FROM tbl_productos WHERE codigo LIKE '" . $dato . "%'
		OR nombre LIKE '" . $dato . "%'");
	$datos="";
	while ($fila = $conexion->extraer_registro() ) {
		$datos .= "<tr><td>$fila[1]</td><td>$fila[2]</td><td>$fila[3]</td><td>$fila[4]</td></tr>";
	}
	echo $datos;
}
	if (isset($_GET['datobusqueda'])) {
		buscarProductos($conexion, $_GET['datobusqueda']);
	}
?>