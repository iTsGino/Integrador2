<?php
require '../Conexion/Datos.php';
$db = new Database();
$Con = $db->Conectar();

$Pregunta1 = $_REQUEST['Pregunta1'];
$Pregunta2 = $_REQUEST['Pregunta2'];
$Pregunta3 = $_REQUEST['Pregunta3'];
$Pregunta4 = $_REQUEST['Pregunta4'];
$Pregunta5 = $_REQUEST['Pregunta5'];
$Docente = $_REQUEST['Docente'];

if($Pregunta1=='Elegir' || $Pregunta2=='Elegir' || $Pregunta3=='Elegir' || $Pregunta4=='Elegir' || $Pregunta5=='Elegir' || $Docente=='Elegir'){
    echo '<script>alert("Error: ¡Seleccionaste la opcion Elegir!");
    alert("Alert: ¡Selecciona una Respuesta Correcta!");
    window.location.href="../PageEncuesta.php"
    </script>';
} else {
    $Alumno = $_REQUEST['Alumno'];
    $sql = $Con->prepare("SELECT * FROM alumno WHERE USUARIO = '$Alumno'");
    $sql->execute();
    $res = $sql->fetchAll(PDO::FETCH_ASSOC);
    foreach ($res as $row) {
        $DniAlu = $row['DniAlu'];
    }
    $sql2 = $Con->prepare("SELECT * FROM docente WHERE NomDoc = '$Docente'");
    $sql2->execute();
    $res2 = $sql2->fetchAll(PDO::FETCH_ASSOC);
    foreach ($res2 as $row) {
        $DniDoc = $row['DniDoc'];
    }
    $sql3 = $Con->prepare("SELECT nVeces FROM encuesta where DniAlu = '$DniAlu';");
    $sql3->execute();
    $res3 = $sql3->fetchAll(PDO::FETCH_ASSOC);
    $nVeces = 1;
    foreach ($res3 as $row) {
        $nVeces = $nVeces+1;
    }

    $sql3 = $Con->prepare("INSERT INTO encuesta (nVeces, DniDoc, DniAlu, pre1, pre2, pre3, pre4, pre5) 
    VALUES ($nVeces, '$DniDoc', '$DniAlu', '$Pregunta1', '$Pregunta2', '$Pregunta3', '$Pregunta4', '$Pregunta5');");
    $sql3->execute();
    $res3 = $sql3->fetchAll(PDO::FETCH_ASSOC);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
<script>
    swal({
        type:"success",
        title: "La Encuesta se Envió Correctamente",
        showConfirmButton: true,
        confirmButtonText: "Cerrar",
        icon: 'success'
    }).then(function (){
        window.location = "http://localhost/Proyecto-Integrador/PageEncuesta.php";
    })
</script>
    
</body>
</html>