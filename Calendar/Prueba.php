<?php
require_once '../Conexion/Datos.php';
$db = new Database();
$Con = $db->Conectar();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduPlus</title>
</head>
<body>
    <?php
    if (isset($_REQUEST['enviar'])) {
     echo "se pincho en el boton: ";?>
     <h1>Prueba: 
        <?php 
            $CodigoAct = $_POST['tituloEve'];
            echo $CodigoAct;
        ?>
    </h1>
     <?php
     session_start();
      $Usuario = $_SESSION['usuario'];
      $sql2 = $Con->prepare("SELECT DniAlu FROM alumno WHERE USUARIO = '$Usuario'");
      $sql2->execute();
      $res2 = $sql2->fetchAll(PDO::FETCH_ASSOC);
      foreach ($res2 as $row) {
        $Dni = $row['DniAlu'];
      }
      $sql3 = $Con->prepare("INSERT INTO Alumno_Actividades (DniAlu, CodAct) VALUES ('$Dni', '$CodigoAct')");
      $sql3->execute();
      header("location:../PageCalendar.php");
      //$sql2 = $Con->prepare("INSERT INTO Alumno_Actividades (DniAlu, CodAct) VALUES ('74596836', 'A0003')");
    }
    ?>
    
</body>
</html>