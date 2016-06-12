<?php 

class Tabla{

	private $objeto = null;
	private $campos= array();
	private $direccion;
		
	public $clase;
	function __construct($objeto, $direccion){
		$this->objeto = $objeto;
		$this->direccion = $direccion;
		if(count($objeto)>0)
		{
		$fila = $objeto[0];
		
		
		foreach($fila as $campo=>$valor)
		{
		$this->campos[] = $campo;
			
		}
		 
		}

	}
	
	
	
	//funcion para dibujar la tabla
	function __toString()
	{
	//aqui se crean los titulos que van a tener mi tabla
	$titulosTabla = implode("</th><th>", $this->campos);
	$sodiaco="";
	//variable para dibujar la tabla
	$dibujoHtml =" <table class ='{$this->clase}'>
	<thead>
	<tr  class='info'>
		<th>{$titulosTabla}</th>
	</tr>
	</thead><tbody> "; 
	
	if(count($this->objeto)==0)
	{
		$dibujoHtml.=" <tr><td>No existen datos a mostrar</td></tr>";
	}

	foreach($this->objeto as $filas)
	{	
	$dibujoHtml .= "<tr>";
	$n=0;
		foreach($filas as $indice=>$valor)
		{
		$dibujoHtml .= "<td>{$valor}</td>";
		if($indice==='IdPelicula')
		{
			$n=	$valor;
		}
		
		}
		
	$dibujoHtml .="<td><a href='{$this->direccion}?editar={$n}'/><input type='button' value='Editar' class='btn btn-primary'/></a></td><td><a href='{$this->direccion}?eliminar={$n}'/><input type='button' value='Eliminar' class='btn btn-danger'/></a></td></tr>";
	}


	$dibujoHtml .= "<fieldset></tbody";

	
	return $dibujoHtml;

	}
	
	

		
	function mostrarDatos()
	{
	echo $this->__toString();
	}
}

