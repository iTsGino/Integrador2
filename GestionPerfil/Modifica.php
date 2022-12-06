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
$seccion = $_POST['seccion'];
$sexo = $_POST['Genero'];

session_start();
$Usuario = $_SESSION['usuario'];
$sql2= $Con->prepare("SELECT DniAlu FROM alumno WHERE USUARIO='$Usuario'");
$sql2->execute();
$res2 = $sql2->fetchAll(PDO::FETCH_ASSOC);
foreach($res2 as $row){
    $Dni=$row['DniAlu'];
}
$sql3 = $Con->prepare("UPDATE alumno set USUARIO= '$usu', NomAlu='$Nombre', ApeAlu='$apellido', SecAlu='$seccion',
CorAlu='$correo',GraCur='$grado',SexAlu='$sexo' where DniAlu ='$Dni'");
$sql3->execute();

$sql4 = $Con->prepare("UPDATE usuario set CLAVE= '$clave' where USUARIO = '$Usuario'");
$sql4->execute();

header("location:../PageGestionPerfil.php");

?>