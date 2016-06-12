<?php 
include ('Controlador.php');

 $pelicula = new Pelicula();
 
if($_POST)
{
	$pelicula->IdPelicula = $_POST['indic'];
	$pelicula->Titulo =$_POST['txtTitulo'];
	$pelicula->Director =$_POST['txtDirector'];
	$pelicula->Resumen = $_POST['txtResumen'];
	$pelicula->Idioma = $_POST['txtIdioma'];
	$pelicula->Genero = $_POST['txtGenero'];
	$pelicula->FechaLanzamiento = $_POST['txtFecha'];
	$pelicula->Pais = $_POST['txtPais'];
	$pelicula->Duracion = $_POST['txtDuracion'];
	$pelicula->Protagonistas = $_POST['txtprotagonista'];
	$pelicula->Productora = $_POST['txtProductora'];
	
	$pelicula->insert($pelicula);
	
		
}
else if(isset($_GET['eliminar']))
{	
	$indice =$_GET['eliminar'] +0;
	
	
	
	Pelicula::delete($indice);
	
	
}else if(isset($_GET['editar']))
{	
	$indice = $_GET['editar'] + 0;
	
	$data = DBL::getRow($indice, 'pelicula', 'IdPelicula');
	
	$property = $data['0'];
	
	
	 $pelicula->IdPelicula = $property->IdPelicula;
	 $pelicula->Titulo = $property->Titulo;
	 $pelicula->Director = $property->Director;
	 $pelicula->Resumen = $property->Resumen;
	 $pelicula->Idioma = $property->Idioma;
	 $pelicula->Genero = $property->Genero;
	 $pelicula->FechaLanzamiento = $property->FechaLanzamiento;
	 $pelicula->Pais = $property->Pais;
	 $pelicula->Duracion = $property->Duracion;
	 $pelicula->Protagonistas = $property->Protagonistas;
	 $pelicula->Productora = $property->Productora;
	
	
	
}


$datos = DBL::getData('pelicula');


$tabla = new Tabla($datos, 'index.php');
$tabla->clase="table table-bordered table-responsive";
?>



<DOCTYPE html>
<html>

	<head>
		<title>Registro de peliculas</title>
		
		<link rel ="stylesheet" href="css/bootstrap.min.css">
		<script src="js/bootstrap.min.js">  </script>
	</head>
	
	<body>
		
		<fieldset> 
			<legend>Registrar Pelicula </legend>
		
		<form Method="POST" action="index.php" class="form-group">
		
		
		
		
		<div class= "col-md-6">
			
			<div class="form-group row">
				<div class ="col-sm-8">
				
					<div class="input-group">
					
					<div class="input-group-addon">Id Pelicula</div>
					
					<input type="text" value="<?php echo $pelicula->IdPelicula; ?>" class="form-control" name="indic" readonly/>
					</div>
				
				</div>
			
			
			</div> 
			
			
			
			<div class="form-group row">
				<div class ="col-sm-8">
				
					<div class="input-group">
					
					<div class="input-group-addon">Titulo</div>
					
					<input type="text" value="<?php echo $pelicula->Titulo; ?>" class="form-control" name="txtTitulo"/>
					</div>
				
				</div>
			
			
			</div> 
			
			<div class="form-group row">
			
				<div class="col-sm-8">
				
					<div class="input-group"> 
						<div class="input-group-addon">Director </div>
						<input type="text"  value="<?php echo $pelicula->Director; ?>" class="form-control" name="txtDirector"/>
					</div>
				
				</div>
				
			</div>
			
			<div class="form-group row">
			
				<div class="col-sm-8">
				
					<div class="input-group"> 
						<div class="input-group-addon">Resumen </div>
						<textarea class="form-control" name="txtResumen" rows="3" cols="5" ><?php echo $pelicula->Resumen; ?>  </textarea>
					</div>
				
				</div>
				
			</div>

			
				<div class="form-group row">
			
				<div class="col-sm-8">
				
					<div class="input-group"> 
						<div class="input-group-addon">Idioma </div>
						<input type="text" value="<?php echo $pelicula->Idioma; ?>" class="form-control" name="txtIdioma"/>
					</div>
				
				</div>
				
			</div>
			
			
			
				<div class="form-group row">
			
				<div class="col-sm-8">
				
					<div class="input-group"> 
						<div class="input-group-addon">Genero </div>
						<input type="text" value="<?php echo $pelicula->Genero; ?>" class="form-control" name="txtGenero"/>
					</div>
				
				</div>
				
				</div>
		
				</div>
				
				<div class= "col-md-6"> 
				
				<div class="form-group row">
			
				<div class="col-sm-8">
				
					<div class="input-group"> 
						<div class="input-group-addon">Fecha de Lanzamiento </div>
						<input type="date" value="<?php echo $pelicula->FechaLanzamiento; ?>" class="form-control" name="txtFecha"/>
					</div>
				
				</div>
				
				</div>
				
				<div class="form-group row">
			
				<div class="col-sm-8">
				
					<div class="input-group"> 
						<div class="input-group-addon">Pais </div>
						<input type="text" value="<?php echo $pelicula->Pais; ?>" class="form-control" name="txtPais"/>
					</div>
				
				</div>
				
				</div>
				
				
				<div class="form-group row">
			
				<div class="col-sm-8">
				
					<div class="input-group"> 
						<div class="input-group-addon">Duracion </div>
						<input type="text" value="<?php echo $pelicula->Duracion; ?>" class="form-control" name="txtDuracion"/>
					</div>
				
				</div>
				
				</div>
				
				
				<div class="form-group row">
			
				<div class="col-sm-8">
				
					<div class="input-group"> 
						<div class="input-group-addon">Protagonistas </div>
						<textarea rows="3" cols="5"  class="form-control" name="txtprotagonista"> <?php echo $pelicula->Protagonistas; ?> </textarea>
					</div>
				
				</div>
				
				</div>
				
				<div class="form-group row">
			
				<div class="col-sm-8">
				
					<div class="input-group"> 
						<div class="input-group-addon">Productora </div>
						<input type="text" class="form-control" value="<?php echo $pelicula->Productora; ?>" name="txtProductora"/>
					</div>
				
				</div>
				
				</div>
				
				</div>
				
				<div class="col-md-6"><input type="submit" class="btn btn-primary"/></div>
				
		</form>
		
		</fieldset>
			
			<div>
			
			<?php  echo $tabla;?>
			
			</div>
	
	
	
	</body>


</html>