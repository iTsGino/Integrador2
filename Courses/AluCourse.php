<?php
require_once './Conexion/Datos.php';
$db = new Database();
$Con = $db->Conectar();

$sql = $Con->prepare("SELECT a.DniAlu, USUARIO, title 
FROM alumno a, alumno_curso ac, cursos c WHERE a.DniAlu = ac.DniAlu AND ac.CodCur = c.CodCur
AND a.DniAlu = '74596836';");
$sql->execute();
$res = $sql->fetchAll(PDO::FETCH_ASSOC);

foreach($res as $row){
    ?>
    <a class="collapse-item" href="Courses/<?php echo $row['title']?>.php"><?php echo $row['title'] ?></a>

<?php } ?>