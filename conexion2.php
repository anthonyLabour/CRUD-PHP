<?php


class conexion2{


public $conectar;

	function __construct()
	{
	$this->conectar = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die ("VERIFICAR DATOS DE CONEXION");
	}

	function __destruct()
	{
		mysqli_close($this->conectar);
		
	}
	
}



class DBL {
	
	public static $conectarme = null;
	
	
	public static function verificarConexion()
	{
		if(self::$conectarme==null)
		{
			self::$conectarme = new conexion2();
		}
		
	}
	
	public static function insert($tablaName, $Campos, $Valores)
	{
		
		self::verificarConexion();
		$conectar = self::$conectarme->conectar;
		
		
		
		
		$Campos = implode(',', $Campos);
		$Valores = implode("','", $Valores);
		
		
		
		$query = "insert into {$tablaName} ({$Campos}) values ('{$Valores}');";
		
		
		
		mysqli_query($conectar, $query);
		if(mysqli_error($conectar))
		{
			echo mysqli_error($conectar);
		}
	
		echo mysqli_insert_id($conectar);
		
	}
	
	
	
	public static function getData($tablaName)
	{
		self::verificarConexion();
		$conectar = self::$conectarme->conectar;
		
		$query = "select * from {$tablaName}";
		
		$resultset = mysqli_query($conectar, $query);
		
		$datos = array();
		
		while($fila = mysqli_fetch_object($resultset))
		{
			$datos[] = $fila;
			
		}
		
		return $datos;
	}
	
	
	public static function deleteData($id, $campoId,$tableName)
	{		
		self::verificarConexion();
		$conectar = self::$conectarme->conectar;
		
		
		
		$query = "delete from {$tableName} where {$campoId} = {$id}";
		
		
		mysqli_query($conectar, $query);
		
		if(mysqli_error($conectar))
		{
			echo mysqli_error($conectar);
		}
		
	}
	
	
	public static function editData($query)
	{
		self::verificarConexion();
		$conectar = self::$conectarme->conectar;
		
		mysqli_query($conectar, $query);
		
		if(mysqli_error($conectar))
		{
			echo mysqli_error($conectar);
		}
		
	}
	
	
	public static function getRow($index, $tableName, $field)
	{
		self::verificarConexion();
		$conectar = self::$conectarme->conectar;
		
		$query = "select * from {$tableName} where {$field} = {$index}";
		
		$resultset = mysqli_query($conectar, $query);
		
		$data = array();
		
		while($fila = mysqli_fetch_object($resultset))
		{
			$data [] = $fila;
			
		}
		
		return $data;
		
		
		
	}
	
	
	
}