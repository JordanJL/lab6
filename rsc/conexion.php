<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

class Conexion {
	private $servidor;
	private $usuario;
	private $clave;
	private $base_datos;
	private $conexion;

	function __construct($servidor,$usuario,$passw,$base_datos){

		$this->servidor = $servidor;
		$this->usuario = $usuario;
		$this->clave = $passw;
		$this->base_datos = $base_datos;
		$this->conectar_base_datos();
	}

	private function conectar_base_datos(){
		$this->conexion = mysqli_connect($this->servidor,$this->usuario,$this->clave);
		mysqli_select_db($this->conexion, $this->base_datos) or die (mysqli_error($this->conexion));
		mysqli_query ($this->conexion, "SET NAMES 'utf8'");

		return $this->conexion;
	}

	public function consulta($consulta){
		$this->resultado = mysqli_query($this->conexion, $consulta);
	}

	public function extraer_registro(){
		if ($fila = mysqli_fetch_row($this->resultado)) {
			return $fila;
		}else {
			return false;
		}
	}
}

?>