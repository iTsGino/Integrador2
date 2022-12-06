<?php
if($_REQUEST){
  $cant = count($_REQUEST);
  $j = 1;
  $suma = 0;
  while($j<=$cant){
    $suma+=$_REQUEST["Nota".$j];
    $j++;
  }
  $prom = $suma / $cant;
} else {
  print "No permitido!";
}
if($prom >= 16){
  //echo '<h3 style="background:green; color: white;">Eres un estudiante destacado</h3>';
  $Estado = 'Eres un Estudiante Destacado';
} else {
  //echo "<h3>Te falta mejorar</h3>";
  $Estado = 'Te Falta Mejorar';
}
$Cadena = 'Tu promedio es: '. $prom . '\n'. $Estado;
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EduPlus</title>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>
<body>

<script>
    swal({
        type:"success",
        title: "Cálculo realizado con Éxito",
        text: "<?php echo $Cadena; ?>",
        showConfirmButton: true,
        confirmButtonText: "Cerrar",
        icon: 'success'
    }).then(function (){
        window.location = "http://localhost/Proyecto-Integrador/PageSimularProm.php";
    })
</script>
  
</body>
</html>