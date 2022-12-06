<?php
require '../Conexion/Datos.php';
$db = new Database();
$Con = $db->Conectar();

$Integrante = $_REQUEST['Integrante'];
$NomGru = $_REQUEST['NomGru'];
$Curso = $_REQUEST['Curso'];
$id = $_REQUEST['id'];  
$CreaGrupo = $_REQUEST['CreaGrupo'];

$sql = $Con->prepare("SELECT * FROM alumno WHERE NomAlu = '$Integrante';");
$sql->execute();
$res = $sql->fetchAll(PDO::FETCH_ASSOC);
foreach ($res as $row) {
    $Dni = $row['DniAlu'];
}
$sql3 = $Con->prepare("SELECT * FROM inte_grupo WHERE DniAlu = '$Dni';");
$sql3->execute();
$res3 = $sql3->fetchAll(PDO::FETCH_ASSOC);
foreach ($res3 as $row) {
    $Busca = $row['DniAlu'];
}
if(isset($_REQUEST['Añadir'])){
    if(isset($Busca)){
        echo '<script>alert("Error: Integrante esta en otro Grupo");
        window.location.href="NuevoIntegrante.php?Curso='.$Curso.'&id='.$id.'&CreaGrupo='.$CreaGrupo.'";
        </script>';
    } else {
        $sql2 = $Con->prepare("INSERT INTO inte_grupo (idGru, DniAlu) VALUES ('$id', '$Dni');");
        $sql2->execute();
        $res2 = $sql2->fetchAll(PDO::FETCH_ASSOC);
        echo "<script>alert('Success: Integrante añadido Correctamente');
        window.location.href='CreaGrupo.php?Curso=$Curso&CreaGrupo=$CreaGrupo';
        </script>";
        
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduPlus</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
</body>
</html>