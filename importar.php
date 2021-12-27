<?php
include 'config.php';
?>

<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Agroproducos Mercury</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="css/estilos.css">
  <script src="js/java.js"></script>
  <script src="js/utilidades.js"></script>
</head>

<br><br>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>


<!-- Tabla -->
<table class="table">
  <thead>
    <tr>
      <th scope="col">Id registro</th>
      <th scope="col">Id empleado</th>
      <th scope="col">Fecha</th>
      <th scope="col">Hora</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

<link rel="stylesheet" href="js/jquery-3.6.0.min.js">

</html>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Excel del biometrico</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <br><br>
      <!-- Boton -->
      <div class="modal-body">
        <form action="importar.php" method="post" enctype="multipart/form-data">
        Adjuntar fechas y horas trabajadas
        <br><br>
        <div class="form-group">
					<label>Id Empleado</label>
					<input type="number" id="id_empleado" name="id_empleado"   class='form-control' required>
				</div>
        <br>
        <div class="form-group">
					<label>Fecha</label>
					<input type="date" id="fecha" name="fecha"   class='form-control' required>
				</div>
        <br>
        <div class="form-group">
					<label>Hora</label>
					<input type="time" id="hora" name="hora"   class='form-control' required>
				</div>
          <br>
          <div class="form-group">
					<select class="form-select" name="estado" id="estado">
						<option selected value="0">Estado</option>
						<option value="1">Activo</option>
						<option value="2">Desactivo</option>
					</select>
				</div>
         <div class="form-group">
					<label>Archivo</label>
          <input class="form-control"  type="file" name="fileToUpload" id="fileToUpload">
         </div>
          <br>
          <input type="submit" value="Subir archivo" name="submit">
        </form>
      </div>
      </br>
      </br>

    </div>
  </div>
</div>


<?php
if (isset($_POST["submit"])) {
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "El archivo " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " ha sido subido.";

    $id_empleado=($_POST['id_empleado']=='')?'NULL':$_POST['id_empleado'];
    $ubicacion=$target_dir . htmlspecialchars(basename($_FILES["fileToUpload"]["name"]));
    $fecha=($_POST['fecha']=='')?'NULL':$_POST['fecha'];
    $hora=($_POST['hora']=='')?'NULL':$_POST['hora'];
    $estado=($_POST['estado']=='')?'':$_POST['estado'];

    $sql="INSERT INTO bd_importar (id_empleado,ubicacion,fecha,hora,estado) VALUES ($id_empleado,'$ubicacion','$fecha','$hora','$estado')";
    if($conn->query($sql) === false)
    { 
      trigger_error('Error en el SQL Command: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
    }  
   
  }
  
}

?>

<?php

//Importar la ruta del excel
require 'PHPExcel/Classes/PHPExcel.php';

$archivos = 'entradasalida.xlsx';

// cargar excel
$excel = PHPExcel_IOFactory::load($archivos);

// cargar la hoja de calculo q queremos
$excel->setActiveSheetIndex(0);

//obtener numero de filas del arvhico excel
$numerofila = $excel->setActiveSheetIndex(0)->getHighestRow();

for ($i = 7; $i <= $numerofila; $i++) {
  $id_empleado = $excel->getActiveSheet()->getCell('B' . $i)->getCalculatedValue();


  if ($id_empleado == "") {
  } else {
    $fecha = $excel->getActiveSheet()->getCell('J' . $i)->getCalculatedValue();
    $hora = $excel->getActiveSheet()->getCell('K' . $i)->getCalculatedValue();
    $estatus = $excel->getActiveSheet()->getCell('E' . $i)->getCalculatedValue();
    $CONSULTA = "INSERT INTO bd_importar (id_empleado, fecha, hora, estado) value ('$id_empleado','$fecha','$hora','$estatus')";
  }

  if ($conn->query($CONSULTA) === false) {
    trigger_error('Error en el SQL Command: ' . $CONSULTA . ' Error: ' . $conn->error, E_USER_ERROR);
  } else {
    echo "<script>alert('Agregado exitosamente!')</script>";
    echo "<meta http-equiv=refresh content=\"0; url=importar.php\">";
  }
}



?>