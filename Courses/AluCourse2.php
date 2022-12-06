<?php
require_once '../Conexion/Datos.php';
$db = new Database();
$Con = $db->Conectar();

$sql = $Con->prepare("SELECT a.DniAlu, USUARIO, title 
FROM alumno a, alumno_curso ac, cursos c WHERE a.DniAlu = ac.DniAlu AND ac.CodCur = c.CodCur
AND a.DniAlu = '74596836';");
$sql->execute();
$res = $sql->fetchAll(PDO::FETCH_ASSOC);

?>
<form action="../Courses/AluDetailCourse.php" method="post">
    <?php
    foreach($res as $row){
    ?>
    <button class="collapse-item btn btn-light" type="submit" href="AluDetailCourse.php" name="Course" value="<?php echo $row['title']?>"><?php echo $row['title']?></button>
<?php } ?>

</form>