
<?php
require 'Conexion/Datos.php';
$db = new Database();
$Con = $db->Conectar();

$Usuario = $_POST['usuario'];
$Contraseña = $_POST['contraseña'];
session_start();
$_SESSION['usuario'] = $Usuario;

$Conexion = mysqli_connect("localhost", "root", "", "BDColegio");
//include ('Conexion/Datos.php');

$Consulta = "SELECT * FROM Usuario where USUARIO='$Usuario' and CLAVE='$Contraseña'";
$Resultado = mysqli_query($Conexion, $Consulta);

$sql = $Con->prepare("SELECT USUARIO FROM docente WHERE USUARIO = '$Usuario'");
$sql->execute();
$res = $sql->fetchAll(PDO::FETCH_ASSOC);

foreach ($res as $row) {
    $usu = $row['USUARIO'];
}

$Filas = mysqli_num_rows($Resultado);
if($Filas){
    //SendUsuario();
    if($usu != $Usuario){
        header("location:EduPlusAlu.php");
    } else {
        header("location:EduPlusDoc.php");
    }
    
} else {
    ?>
    <?php
    include("Login.php");
    ?>
    <br>
    <h2 class="alert alert-danger"  align="center" role="alert">
        Error en la Autentificacion
    </h2>
    <?php
}
mysqli_free_result($Resultado);
mysqli_close($Conexion);
?>