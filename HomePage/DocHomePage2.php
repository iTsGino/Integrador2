<?php
require_once '../Conexion/Datos.php';
$db = new Database();
$Con = $db->Conectar();

$sql = $Con->prepare("SELECT d.DniDoc, USUARIO, c.CodCur, title 
FROM docente d, docente_curso dc, cursos c WHERE d.DniDoc = dc.DniDoc AND dc.CodCur = c.CodCur
AND d.DniDoc = '72236658';");
$sql->execute();    
$res = $sql->fetchAll(PDO::FETCH_ASSOC);
?>


<?php
foreach($res as $row){
    ?>
    <div class='card' style='width: 18rem;'>
            <img src='../img/no-image.jpg' class='card-img-top' alt='...'>
            <div class='card-body'>
                <h5 class='card-title' align="center"><?php echo $row['title'] ?></h5>
                <a type="submit" href='<?php echo $row['title']?>.php?CodCur=<?php echo $row['CodCur'];?>&Course=<?php echo $row['title'];?>' class='btn btn-warning' style="width:250px" name="Course" value="<?php echo $row['title']?>">See Course</a>
            </div>
    </div>
<?php } ?>

