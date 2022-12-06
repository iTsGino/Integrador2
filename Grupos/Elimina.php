<?php
require '../Conexion/Datos.php';
$db = new Database();
$Con = $db->Conectar();

$Curso = $_REQUEST['Curso'];
$CreaGrupo = $_REQUEST['CreaGrupo'];
$id = $_REQUEST['id'];
$idGru = $_REQUEST['idGru'];

$sql = $Con->prepare("DELETE FROM inte_grupo WHERE id = '$id';");
$sql->execute();
$res = $sql->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <script>
        alert("Success: Integrante Eliminado del Grupo");
        window.location.href="ListaIntegrantes.php?id=<?php echo $idGru; ?>&Curso=<?php echo $Curso; ?>&CreaGrupo=<?php echo $CreaGrupo; ?>";
    </script>    
</body>
</html>