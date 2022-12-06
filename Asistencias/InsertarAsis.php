<?php
require '../Conexion/Datos.php';
$db = new Database();
$Con = $db->Conectar();

$base = $_POST['dnialu'];
$fecha = $_POST['fecha'];
$Asistencia = $_POST['Asistencia'];

//INSERT INTO Tabla (campos) VALUES (Valores 1), (Valores 2), (Valores 3);

$Cadena = "INSERT INTO asistencias (DniAlu, Fecha, attendance) VALUES ";
for($i = 0; $i < count($base); $i++){
    $Cadena = $Cadena . "('". $base[$i]. "', '". $fecha . "', '". $Asistencia[$i] ."'),";
}

$Cadena_Fin = substr($Cadena, 0, -1);
$Cadena_Fin = $Cadena_Fin . ";";

$sql = $Con->prepare($Cadena_Fin);
$sql->execute();
$res = $sql->fetchAll(PDO::FETCH_ASSOC);
echo json_encode(array('cadena' => $Cadena_Fin));
?>