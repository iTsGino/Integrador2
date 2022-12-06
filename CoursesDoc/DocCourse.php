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
    /*
    if ($Direccion == "/Proyecto-Integrador/DocenteNotas/Evaluaciones.php" || $Direccion == "/Proyecto-Integrador/DocenteNotas/ModificaNota.php") {
        foreach($res as $row){
        ?>
            <a class="collapse-item btn btn-light" type="submit" href="../CoursesDoc/<?php echo $row['title']?>.php?CodCur=<?php echo $row['CodCur'];?>&Course=<?php echo $row['title'];?>"><?php echo $row['title']?></a>
        <?php
    }
    } else {
        foreach($res as $row){
        ?>
            <a class="collapse-item btn btn-light" type="submit" href="<?php echo $row['title']?>.php?CodCur=<?php echo $row['CodCur'];?>&Course=<?php echo $row['title'];?>"><?php echo $row['title']?></a>
        <?php
    }
    }*/
    
    foreach($res as $row){
    ?>
    <a class="collapse-item btn btn-light" type="submit" href="../CoursesDoc/<?php echo $row['title']?>.php?CodCur=<?php echo $row['CodCur'];?>&Course=<?php echo $row['title'];?>"><?php echo $row['title']?></a>
<?php } ?>