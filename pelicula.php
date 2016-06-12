<?php 

class Pelicula{
	private $IdPelicula =0;
	private $Titulo ='';
	private $Director='';
	private $Resumen ='';
	private $Idioma = '';
	private $Genero = '';
	private $FechaLanzamiento ='';
	private $Pais ='';
	private $Duracion = '';
	private $Protagonistas = '';
	private $Productora = '';
	

	
	function __get($parametro)
	{
		if(isset($this->$parametro))
		{
			return $this->$parametro;
		}
		else
		{
			return "Parametro Indefinido";
		}
		
	}
	
	function __set($parametro, $valor)
	{
		if(isset($this->$parametro))
		{
			$this->$parametro = $valor;
		}
		else
		{
			return "Parametro Indefinido";
		}
		
	}
	
	public function insert($Pelicula)
	{
		
		if($this->IdPelicula>0)
		{
			$query = "update Pelicula 
			set Titulo = '{$this->Titulo}', Director = '{$this->Director}',
			Resumen = '{$this->Resumen}', Idioma = '{$this->Idioma}',
			Genero = '{$this->Genero}', FechaLanzamiento = '{$this->FechaLanzamiento}',
			Pais = '{$this->Pais}', Duracion = '{$this->Duracion}', 
			Protagonistas = '{$this->Protagonistas}', Productora = '{$this->Productora}' where IdPelicula = {$this->IdPelicula}";
			
		
			
			DBL::editData($query);
			
		}
		else{
				$Campos = array();
				$Valores = array();
				foreach($Pelicula as $indice=>$valor)
				{	
				$Campos [] = $indice;
				$Valores [] = $valor;
			
				}
			
			DBL::insert('pelicula', $Campos, $Valores);
		}
	}
	
	
	public static function delete($indice)
	{
	
		DBL::deleteData($indice, 'IdPelicula', 'pelicula');
		
	}
	
	
	
	
	
}


