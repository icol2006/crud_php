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
$a=mysqli_query($conn,"SELECT * FROM pagos WHERE id_pago ='$_GET[id_pago]'");
$row=mysqli_fetch_array($a,MYSQLI_ASSOC);
?>
	
<div class="container">

	<div class="container py-3" id='editBox' style="background:#e4e4e417;">
	<a href='index.php' style='float: right;font-size: larger;'>Volver al listado</a>
	<br><br>
			<h2 class='text-center'>Editar Datos</h2><br>
		<div id='msgEdit'></div>
        <form method="post">
				<div class="row">
				<div class="col-md-6">
			    <div class="form-group">
					<label>Id Pago</label>
					<input type="number" id="id_pago" name="id_pago" value="<?php echo $row['id_pago'] ?>"  class='form-control' required disabled>
				</div>
				<div class="form-group">
					<label>Id Empleado</label>
					<input type="number" id="id_empleado" name="id_empleado" value="<?php echo $row['id_pago'] ?>"   class='form-control' required>
				</div>
				<div class="form-group">
					<label>Fecha</label>
					<input type="date" id="fecha" name="fecha" value="<?php echo $row['fecha'] ?>"  class='form-control' required>
				</div>
				<div class="form-group">
					<label>Dia</label>
					<input type="number" id="dia" name="dia" value="<?php echo $row['dia'] ?>"  class='form-control' required>
				</div>
				<div class="form-group">
					<label>Hora</label>
					<input type="number" id="hora" name="hora" value="<?php echo $row['hora'] ?>"  class='form-control' required>
				</div>
				<div class="form-group">
					<label>Hora extra doble</label>
					<input type="number" id="hora_doble" name="hora_doble" value="<?php echo $row['hora_doble'] ?>" class='form-control' required>
				</div>
			</div>
				
			<div class="col-md-6">		
				<div class="form-group">
					<label>Tutoreo</label>
					<input type="number" id="tutoreo" name="tutoreo" value="<?php echo $row['tutoreo'] ?>" class='form-control' required>
				</div>
				<div class="form-group">
					<label>Raleo</label>
					<input type="number" id="raleo" name="raleo" value="<?php echo $row['raleo'] ?>" class='form-control' required>
				</div>
				<div class="form-group">
					<label>Bajar Planta</label>
					<input type="number" id="bajar_planta" name="bajar_planta" value="<?php echo $row['bajar_planta'] ?>" class='form-control' required>
				</div>
				<div class="form-group">
					<label>Deshoje</label>
					<input type="number" id="deshoje" name="deshoje" value="<?php echo $row['deshoje'] ?>" class='form-control' required>
				</div>
				<div class="form-group">
					<label>Cosecha</label>
					<input type="number" id="cosecha" name="cosecha" value="<?php echo $row['cosecha'] ?>" class='form-control' required>
				</div>
				<div class="form-group">
					<label>Inversion</label>
					<input type="number" id="inv" name="inv" value="<?php echo $row['inv'] ?>" class='form-control' required>
				</div>
			</div>
				</div>
	
				<center>        
				<input type="submit"  name="update" value="Actualizar" class='btn update btn-success '>
				<a href="index.php#first" class='btn btn-danger'>Cancelar</a>
				</center>
			</form>
            <?php
if(isset($_POST['update']))
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
 

  $sql="UPDATE pagos SET id_empleado='$id_empleado',
  fecha='$fecha',dia='$dia',hora='$hora',hora_doble='$hora_doble',tutoreo='$tutoreo',
  raleo='$raleo',bajar_planta='$bajar_planta',deshoje='$deshoje',cosecha='$cosecha',inv='$inv' WHERE id_pago='$_GET[id_pago]'";
  if($conn->query($sql) === false)
  { 
    trigger_error('Errro en el SQL Command: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
  }  
  else 
  { // Jika berhasil alihkan ke halaman tampil.php
    echo "<script>alert('Actulizacion exitosa!')</script>";
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