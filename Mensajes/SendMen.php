
<?php 
require '../Conexion/Datos.php';
$db = new Database();
$Con = $db->Conectar();

$Destinatario = $_REQUEST['Destinatario'];
$Emisor = $_REQUEST['Emisor'];
$Asunto = $_REQUEST['Asunto'];
$Mensaje = $_REQUEST['Mensaje'];

$sql = $Con->prepare("INSERT INTO mensajes (UsuDes, UsuEmi, asunto, mensaje, tipo, fecha) 
VALUES ('$Destinatario', '$Emisor', '$Asunto', '$Mensaje', 'Enviado', CURRENT_TIMESTAMP);");
$sql->execute();
$res = $sql->fetchAll(PDO::FETCH_ASSOC);

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
        title: "El Mensaje se Envió Correctamente",
        showConfirmButton: true,
        confirmButtonText: "Cerrar",
        icon: 'success'
    }).then(function (){
        window.location = "http://localhost/Proyecto-Integrador/PageMailAlu.php";
    })
</script>
    
</body>
</html>
