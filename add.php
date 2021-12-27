<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Ajax PHP CRUD System">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Agregar</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body style="font-family:roboto,sans-serif;">
<?php
include 'config.php';
?>
	
<div class="container">

	<div class="container py-3" id='editBox' style="background:#e4e4e417;">
	<a href='index.php' style='float: right;font-size: larger;'>Volver al listado</a>
	<br><br>
			<h2 class='text-center'>Agregar Datos</h2><br>
		<div id='msgEdit'></div>
        <form method="post">
				<div class="row">
				<div class="col-md-6">

				<div class="form-group">
					<label>Id Empleado</label>
					<input type="number" id="id_empleado" name="id_empleado"   class='form-control' required>
				</div>
				<div class="form-group">
					<label>Fecha</label>
					<input type="date" id="fecha" name="fecha"   class='form-control' required>
				</div>
				<div class="form-group">
					<label>Dia</label>
					<input type="number" id="dia" name="dia"   class='form-control'>
				</div>
				<div class="form-group">
					<label>Hora</label>
					<input type="number" id="hora" name="hora"   class='form-control'>
				</div>
				<div class="form-group">
					<label>Hora extra doble</label>
					<input type="number" id="hora_doble" name="hora_doble"  class='form-control'>
				</div>
			</div>
				
			<div class="col-md-6">		
				<div class="form-group">
					<label >Tutoreo</label>
					<input type="text" id="tutoreo" name="tutoreo"  class='form-control'>
				</div>
				
				<div class="form-group">
					<select class="form-select" name="tutoreo1x2x" id="tutoreo1x2x" aria-label="Default select example">
						<option selected value="0">Opciones tutoreo</option>
						<option value="1">1x</option>
						<option value="2">2x</option>
					</select>
				</div>
				<div class="form-group">
					<label>Raleo</label>
					<input type="number" id="raleo" name="raleo"  class='form-control'>
				</div>
				<div class="form-group">
					<label>Bajar Planta</label>
					<input type="number" id="bajar_planta" name="bajar_planta"  class='form-control'>
				</div>
				<div class="form-group">
					<label>Deshoje</label>
					<input type="number" id="deshoje" name="deshoje"  class='form-control'>
				</div>
				<div class="form-group">
					<label>Cosecha</label>
					<input type="number" id="cosecha" name="cosecha"  class='form-control'>
				</div>
				<div class="form-group">
					<label>Invernadero</label>
					<input type="number" id="inv" name="inv"  class='form-control' required>
				</div>
			</div>
				</div>
	
				<center>        
				<input type="submit"  name="add" value="Actualizar" class='btn update btn-success '>
				<a href="index.php" class='btn btn-danger'>Cancelar</a>
				</center>
			</form>
            <?php
if(isset($_POST['add']))
{
  include 'config.php';

  $id_empleado=($_POST['id_empleado']=='')?'NULL':$_POST['id_empleado'];
  $fecha=($_POST['fecha']=='')?'NULL':$_POST['fecha'];
  $dia=($_POST['dia']=='')?'NULL':$_POST['dia'];
  $hora=($_POST['hora']=='')?'NULL':$_POST['hora'];
  $hora_doble=($_POST['hora_doble']=='')?'NULL':$_POST['hora_doble'];
  $tutoreo=($_POST['tutoreo']=='')?'NULL':$_POST['tutoreo'];
  $tutoreo1x2x=($_POST['tutoreo1x2x']=='')?'NULL':$_POST['tutoreo1x2x'];
  $raleo=($_POST['raleo']=='')?'NULL':$_POST['raleo'];
  $bajar_planta=($_POST['bajar_planta']=='')?'NULL':$_POST['bajar_planta'];
  $deshoje=($_POST['deshoje']=='')?'NULL':$_POST['deshoje'];
  $cosecha=($_POST['cosecha']=='')?'NULL':$_POST['cosecha'];
  $inv=($_POST['inv']=='')?'NULL':$_POST['inv']; 
 

  $sql="INSERT INTO pagos (id_empleado, fecha, dia, hora, hora_doble, tutoreo, tutoreo1x2x, raleo, bajar_planta, deshoje, cosecha, inv) VALUES ('$id_empleado','$fecha',$dia,$hora,$hora_doble,$tutoreo,$tutoreo1x2x,$raleo,$bajar_planta,$deshoje,$cosecha,$inv)";
  if($conn->query($sql) === false)
  { 
    trigger_error('Error en el SQL Command: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
  }  
  else 
  { 
    echo "<script>alert('Agregado exitosamente!')</script>";
  	echo "<meta http-equiv=refresh content=\"0; url=index.php\">";
  }
}

?>   
			<br>
	</div>
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</html>