<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Ajax PHP CRUD System">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Planilla</title>
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
					<input type="number" id="dia" name="dia"   class='form-control' required>
				</div>
				<div class="form-group">
					<label>Hora</label>
					<input type="number" id="hora" name="hora"   class='form-control' required>
				</div>
				<div class="form-group">
					<label>Hora extra doble</label>
					<input type="number" id="hora_doble" name="hora_doble"  class='form-control' required>
				</div>
			</div>
				
			<div class="col-md-6">		
				<div class="form-group">
					<label>Tutoreo</label>
					<input type="text" id="tutoreo" name="tutoreo"  class='form-control' required>
				</div>
				<div class="form-group">
					<label>Raleo</label>
					<input type="number" id="raleo" name="raleo"  class='form-control' required>
				</div>
				<div class="form-group">
					<label>Bajar Planta</label>
					<input type="number" id="bajar_planta" name="bajar_planta"  class='form-control' required>
				</div>
				<div class="form-group">
					<label>Deshoje</label>
					<input type="number" id="deshoje" name="deshoje"  class='form-control' required>
				</div>
				<div class="form-group">
					<label>Cosecha</label>
					<input type="number" id="cosecha" name="cosecha"  class='form-control' required>
				</div>
				<div class="form-group">
					<label>Inversion</label>
					<input type="number" id="inv" name="inv"  class='form-control' required>
				</div>
			</div>
				</div>
	
				<center>        
				<input type="submit"  name="add" value="Actualizar" class='btn update btn-success '>
				<a href="index.php#first" class='btn btn-danger'>Cancelar</a>
				</center>
			</form>
            <?php
if(isset($_POST['add']))
{
  include 'config.php';
  $id_pago=$_POST['id_pago'];
  $id_empleado=$_POST['id_empleado'];
  $fecha=$_POST['fecha'];
  $dia=$_POST['dia'];
  $hora=$_POST['hora'];
  $hora_doble=$_POST['hora_doble'];
  $tutoreo=$_POST['tutoreo'];
  $raleo=$_POST['raleo'];
  $bajar_planta=$_POST['bajar_planta'];
  $deshoje=$_POST['deshoje'];
  $cosecha=$_POST['cosecha'];
  $inv=$_POST['inv']; 
 

  $sql="INSERT INTO pagos (id_empleado, fecha, dia, hora, hora_doble, tutoreo, raleo, bajar_planta, deshoje, cosecha, inv) VALUES ('$id_empleado','$fecha','$dia','$hora','$hora_doble','$tutoreo','$raleo','$bajar_planta','$deshoje','$cosecha','$inv')";
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