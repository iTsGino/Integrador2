<?php
require '../Conexion/Datos.php';
$db = new Database();
$Con = $db->Conectar();

$CodAluCur = $_REQUEST['CodAluCur'];
$Nota1 = $_REQUEST['Nota1'];
$Nota2 = $_REQUEST['Nota2'];
$Nota3 = $_REQUEST['Nota3'];
$Promedio = $_REQUEST['Prom1'];
if(isset($_REQUEST['Modificar'])){
    $CodDetNot = $_REQUEST['CodDetNot'];
    $sql = $Con->prepare("UPDATE DETALLE_NOTA SET Cod_AluCur= '$CodAluCur', Nota1=$Nota1, Nota2=$Nota2,
    Nota3=$Nota3,Prom=$Promedio, Fecha=CURDATE(), Hora=DATE_FORMAT(NOW(), '%H:%i:%S')
    WHERE CodDetNot ='$CodDetNot';");
    $sql->execute();
}
if(isset($_REQUEST['Registrar'])){
    $sql = $Con->prepare("INSERT INTO DETALLE_NOTA (Cod_AluCur, Nota1, Nota2, Nota3, Prom, Fecha, Hora)
    VALUES ('$CodAluCur', $Nota1, $Nota2, $Nota3, $Promedio, CURDATE(), DATE_FORMAT(NOW(), '%H:%i:%S'));");
    $sql->execute();
}

$DniAlumno = $_REQUEST['DniAlu'];
$Course = $_REQUEST['Course'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduPlus</title>
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<form action="ModificaNota.php" method="post" align="center">
    <!-- Button trigger modal -->
    <br>
    <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Regresar
    </button>
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿Regresar a la página anterior?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="CodAluCur" value="<?php echo $CodAluCur; ?>">
                    <button type="submit" name="Course" value="<?php echo $Course ?>" class="btn btn-success">Ok</button>
                    <a type="button" class="btn btn-secondary" data-bs-dismiss="modal" href="../login.php">Cerrar Sesión</a>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Bootstrap core JavaScript-->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    
</body>
</html>