<?php


class conexion{


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



class DB {
	
	public static $conectarme = null;
	
	
	public static function verificarConexion()
	{
		if(self::$conectarme==null)
		{
			self::$conectarme = new conexion();
		}
		
	}
	
	public static function insert($tablaName, $objeto)
	{
		
		self::verificarConexion();
		$conectar = self::$conectarme->conectar;
		
		
		$campos = array();
		$valores = array(); 
		$aux =1;
		$tipoDato='';
		$parametros = array();
		
		
		
		foreach($objeto as $campo=>$valor)
		{	//recorro el objeto y saco su indice y su valor
			$p = "param{$aux}";
			$$p= $valor;
			$campos[] = $campo;
			$valores [] = '?';
			$tipoDato .= 's';
			$parametros [] = "\$param{$aux}";
			$aux++;
			
		}
		
		var_dump($campos);
		exit();
		
		
		$campos = implode(',', $campos);
		$valores = implode(",", $valores);
		$parametros = implode(',', $parametros);
		
		
		$query = "insert into {$tablaName} ({$campos}) values ({$valores})";
		
		
		
		$stm = mysqli_prepare($conectar, $query);
		
		$sentencia = "mysqli_stmt_bind_param(\$stm, '{$tipoDato}', {$parametros});";
		
		
		
		eval($sentencia);
		mysqli_stmt_execute($stm);
		
		if(mysqli_error($conectar))
		{
			echo mysqli_error($conectar);
		}
	
		echo mysqli_insert_id($conectar);
		
	}
	
	
	
	public static function getDatos($tablaName)
	{
		self::verificarConexion();
		$conectar = self::$conectarme->conectar;
		
		$query = "select * from {$tablaName}";
		
		$resulset = mysqli_query($conectar, $query);
		
		$datos = array();
		
		while($fila = mysqli_fetch_object($resulset))
		{
			$datos[] = $fila;
			
		}
		
		return $datos;
	}
	
	
	
}