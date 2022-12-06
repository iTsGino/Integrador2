<?php
require '../Conexion/Datos.php';
$db = new Database();
$Con = $db->Conectar();
//$usu = new SendUsuario();
//$Usuario = $_POST['usuario'];
$clave = $_POST['clave'];
$usu= $_POST['usu'];
$Nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$grado = $_POST['grado'];
//$seccion = $_POST['seccion'];
$sexo = $_POST['Genero'];

session_start();
$Usuario = $_SESSION['usuario'];
$sql2= $Con->prepare("SELECT DniDoc FROM docente WHERE USUARIO='$Usuario'");
$sql2->execute();
$res2 = $sql2->fetchAll(PDO::FETCH_ASSOC);
foreach($res2 as $row){
    $Dni=$row['DniDoc'];
}

$sql3 = $Con->prepare("UPDATE docente set USUARIO= '$usu', NomDoc='$Nombre', ApeDoc='$apellido', SecDoc='',
CorDoc='$correo',GraCur='$grado',SexDoc='$sexo' where DniDoc ='$Dni'");
$sql3->execute();

$sql4 = $Con->prepare("UPDATE usuario set CLAVE= '$clave' where USUARIO = '$Usuario'");
$sql4->execute();

header("location:../DocGestionPerfil.php");
?>