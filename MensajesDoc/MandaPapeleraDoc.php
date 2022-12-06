<?php
require '../Conexion/Datos.php';
$db = new Database();
$Con = $db->Conectar();

$id = $_REQUEST['id'];

$sql = $Con->prepare("UPDATE mensajes SET tipo='Papelera' WHERE id ='$id';");
$sql->execute();
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
        title: "Mensaje movido a la Papelera",
        showConfirmButton: true,
        confirmButtonText: "Cerrar",
        icon: 'success'
    }).then(function (){
        window.location = "http://localhost/Proyecto-Integrador/PageMailDoc.php";
    })
</script>
    
</body>
</html>