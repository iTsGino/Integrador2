<?php

include('../Conexion/Datos.php');
$db = new Database();
$con = $db->Conectar();

$Codigo = $_REQUEST['CodCur'];
$Semana = $_REQUEST['SemCur'];
$sql = $con->prepare("SELECT title FROM cursos WHERE CodCur = '$Codigo'");
$sql->execute();
$res = $sql->fetchAll(PDO::FETCH_ASSOC);
foreach ($res as $row) {
    $SelectPag = $row['title'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $file_name = $_FILES['file']['name'];

    $new_name_file = null;
    if ($file_name != '' || $file_name != null) {
        $file_type = $_FILES['file']['type'];
        list($type, $extension) = explode('/', $file_type);
        if ($extension == 'pdf') {

            $dir = 'files/';
            $dir2 = '../';
            $url = $dir2.$dir;

            if (!file_exists($url)) {
                mkdir($url, 0777, true);
            }
            $file_tmp_name = $_FILES['file']['tmp_name'];
            //$new_name_file = 'files/' . date('Ymdhis') . '.' . $extension;
            $new_name_file = $url . file_name($file_name) . '.' . $extension;
            $UrlSql = $dir . file_name($file_name) . '.' . $extension;

            if (copy($file_tmp_name, $new_name_file)) {
            }
        }
    }
    $ins = $con->query("INSERT INTO files(title,description,url,type,CodCur,Week) VALUES ('$title','$description','$UrlSql', '', '$Codigo', '$Semana')");
    if ($ins) {
        echo 'Success';
    } else {
        echo 'Fail';
    }
} else {
    echo 'Fail';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>

<form action="<?php echo $SelectPag ?>.php" align="center">
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
                    <input type="hidden" value="<?php echo $Codigo?>" id="CodCur" name="CodCur">
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