<!DOCTYPE html>
<html lang="en">
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
<body>
<div class="container">
<h4 style='margin-top:20px'>Listado de registros</h4><br>
<a href='add.php' class='edit btn btn-sm btn-primary' title='edit'>Agregar nuevo registro</a>
<br><br>
<form action="#" method="post">
      <input type="checkbox" name="check" id="check" value="1" onchange="javascript:showContent1()">  Dia $
      <input type="checkbox" name="check" id="check2" value="1" onchange="javascript:showContent2()">  Hora $
      <input type="checkbox" name="check" id="check3" value="1" onchange="javascript:showContent3()">  Hora doble $
      <input type="checkbox" name="check" id="check4" value="1" onchange="javascript:showContent4()">  Tutoreo $
      <input type="checkbox" name="check" id="check5" value="1" onchange="javascript:showContent5()">   Raleo $
      <input type="checkbox" name="check" id="check6" value="1" onchange="javascript:showContent6()">  Bajar planta $
      <input type="checkbox" name="check" id="check7" value="1" onchange="javascript:showContent7()">  Deshoje $
      <input type="checkbox" name="check" id="check8" value="1" onchange="javascript:showContent8()">  Cosecha $
    </form>
    <br>
<table class="table table-responsive table-hover" id="myTable">
 <tbody>
 <thead>
        <tr>
          <th scope="col">ID Pago</th>
          <th scope="col">ID Empleado</th>
          <th scope="col">Nombre</th>
          <th scope="col">FECHA</th>

          <th scope="col" >Día</th>
          <th scope="col" id="content1" style="display: none;" class="pesos">$</th>

          <th scope="col">Hora</th>
          <th scope="col" id="content3" style="display: none;" class="pesos">$</th>
            
          <th scope="col">Hora extra doble</th>
          <th scope="col" id="content5" style="display: none;" class="pesos">$</th>
               
          <th scope="col">Tutoreo</th>
          <th scope="col"> 1x / 2x </th>
          <th scope="col" id="content7" style="display: none;" class="pesos">$</th>

          <th scope="col">Raleo</th>
          <th scope="col" id="content9" style="display: none;"  class="pesos">$</th>

          <th scope="col">Bajar planta</th>
          <th scope="col" id="content11" style="display: none;"  class="pesos">$</th>

          <th scope="col">Deshoje</th>
          <th scope="col">Hojas</th>
          <th scope="col" id="content13" style="display: none;"  class="pesos">$</th>

          <th scope="col">Cosecha</th>
          <th scope="col" id="content15" style="display: none;"  class="pesos">$</th>

          <th scope="col">INV</th>
          <th scope="col">TOTAL</th>
          <th scope="col"></th>
        </tr>
      </thead>

    <?php
    include 'config.php';
    $a=mysqli_query($conn,"SELECT * FROM pagos");
    foreach ($a as $row)
    {
    ?>
    <tr>

            <td><?php echo $row["id_pago"]; ?></td>
            <td><?php echo $row["id_empleado"]; ?></td>
            <td> Marco Arellano </td>
            <td><?php echo $row["fecha"]; ?></td>
        
            <td><?php echo $row["dia"]; ?></td>
            <td id="content2" style="display: none" class="pesos">$3.33</td>

            <td><?php echo $row["hora"]; ?></td>
            <td id="content4" style="display: none;"  class="pesos">$4.44</td>
        
            <td><?php echo $row["hora_doble"]; ?></td>
            <td id="content6" style="display: none;"  class="pesos"> $5.55</td>

            <td><?php echo $row["tutoreo"]; ?></td>
            <td> 1x </td>
            <td id="content8" style="display: none;"  class="pesos"> $6.66</td>

            <td><?php echo $row["raleo"]; ?></td>
            <td id="content10" style="display: none;"  class="pesos">$7.77</td>

            <td><?php echo $row["bajar_planta"]; ?></td>
            <td id="content12" style="display: none;"  class="pesos">$8.88</td>

            <td><?php echo $row["deshoje"]; ?></td>
            <td>33</td>
            <td id="content14" style="display: none;"  class="pesos">$9.99</td>

            <td><?php echo $row["cosecha"]; ?></td>
            <td id="content16" style="display: none;"  class="pesos">$10.10</td>

            <td><?php echo $row["inv"]; ?></td>
            <td>$11.11</td>
            <td>
            <a href="update.php?id_pago=<?php echo $row["id_pago"]; ?>"><b><i>Editar</i></b></a> | 
            <a href="index.php?id_pago=<?php echo $row["id_pago"]; ?>" onclick="return confirm('Estas seguro?')"><b><i>Eliminar</i></b></a>
        </td>
    </tr>  
    <?php } ?>                          
 </tbody>
</table>


<?php
if(isset($_GET['id_pago']))
{
  echo $_GET['id_pago'];
    $id_pago=$_GET['id_pago'];
    $sql="DELETE FROM pagos WHERE id_pago='$id_pago'";
    if($conn->query($sql) === false)
    { 
      trigger_error('Error en el SQL Command: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
    } 
    else 
    { 
      echo "<script>alert('Eliminado exitosamente!')</script>";
      echo "<meta http-equiv=refresh content=\"0; url=index.php\">";
    }
}

?>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  
  <link rel="stylesheet" href="js/jquery-3.6.0.min.js">

</html>