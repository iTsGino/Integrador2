<?php
//require_once '../Conexion/Datos.php';
$db = new Database();
$Con = $db->Conectar();

$CursoSelect = $_GET['Course'];

$sql = $Con->prepare("SELECT CodCur FROM cursos WHERE title = '$CursoSelect'");
$sql->execute();
$res = $sql->fetchAll(PDO::FETCH_ASSOC);

foreach ($res as $row) {
    $Codigo = $row['CodCur'];
}

$sql2 = $Con->prepare("SELECT * FROM files where Week='$i' AND CodCur = '$Codigo'");
$sql2->execute();
$res2 = $sql2->fetchAll(PDO::FETCH_ASSOC);

foreach ($res2 as $row) {
    ?>
    <tr>
        <td> <?php echo $row['title'] ?> </td>
        <td align="right">
            <button onclick="openModelPDF('<?php echo $row['url'] ?>')" class="btn btn-outline-success" type="button">Vista Previa</button>
            <a class="btn btn-outline-warning" target="_black" href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/Proyecto-Integrador/' . $row['url'];?>">Abrir Doc</a>
        </td>
    </tr>
    <?php
}
?>
<script>
    function openModelPDF(url) {
        $('#modalPdf').modal('show');
        $('#iframePDF').attr('src','<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/Proyecto-Integrador/'; ?>'+url);
    }
</script>