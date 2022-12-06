<?php
require_once './Conexion/Datos.php';
$db = new Database();
$Con = $db->Conectar();

$sql = $Con->prepare("SELECT a.DniAlu, USUARIO, title 
FROM alumno a, alumno_curso ac, cursos c WHERE a.DniAlu = ac.DniAlu AND ac.CodCur = c.CodCur
AND a.DniAlu = '74596836';");
$sql->execute();
$res = $sql->fetchAll(PDO::FETCH_ASSOC);
?>


<?php
foreach($res as $row){
    ?>
    <div class='card' style='width: 18rem;'>
        <form action="Courses/AluDetailCourse.php" method="post" class="">
            <img src='img/no-image.jpg' class='card-img-top' alt='...'>
            <div class='card-body'>
                <h5 class='card-title' align="center"><?php echo $row['title'] ?></h5>
                <button type="submit" href='Courses/AluDetailCourse.php' class='btn btn-warning' style="width:250px" name="Course" value="<?php echo $row['title']?>">See Course</button>
            </div>
        </form>
    </div>
<?php } ?>

