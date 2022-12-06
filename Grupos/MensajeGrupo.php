<?php
require '../Conexion/Datos.php';
$db = new Database();
$Con = $db->Conectar();

if(isset($_REQUEST['Guardar'])){
    $NomGru = $_REQUEST['NomGru'];
    $Curso = $_REQUEST['Curso'];
    $CreaGrupo = $_REQUEST['CreaGrupo'];
    $nGrupo = $_REQUEST['ngrupo'];
    $CodCur = $_REQUEST['CodCur'];

    $sql = $Con->prepare("INSERT INTO grupos (NomGru, CodCur) VALUES ('$NomGru', '$CodCur');");
    $sql->execute();
    $res = $sql->fetchAll(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <form action="CreaGrupo.php" method="post" align="center">
        <!-- Button trigger modal -->
        <br>
        <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Regresar
        </button>
        
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <input type="hidden" name="CreaGrupo" id="CreaGrupo" value="<?php echo $CreaGrupo; ?>" readonly>
                    <input type="hidden" name="ngrupo" id="ngrupo" value="<?php echo $nGrupo; ?>" readonly>
                    <input type="hidden" name="Curso" id="Curso" value="<?php echo $Curso; ?>" readonly>
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">¿Regresar a la página anterior?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="Course" value="<?php echo $SelectPag ?>" class="btn btn-success">Ok</button>
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