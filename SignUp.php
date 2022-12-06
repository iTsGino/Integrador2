<?php
require 'Conexion/Datos.php';
$db = new Database();
$Con = $db->Conectar();

if(!empty($_POST['Dni']) && !empty($_POST['Nombre']) && !empty($_POST['Apellido']) && !empty($_POST['Correo']) && !empty($_POST['Grado'])
 && !empty($_POST['Genero'])){
    if($_POST['Grado']=='Docente'){
        $Dni = $_POST['Dni'];
        $Usuario = 'D';
        $Dominio = '@colegio.edu.pe';
        $CorreoUsuario = $Usuario . $Dni . $Dominio;
        ?>
        
        <?php
        $sql = "INSERT INTO Docente (DniDoc, USUARIO, NomDoc, ApeDoc, SecDoc, CorDoc, GraCur, SexDoc) VALUES (:Dni, '$CorreoUsuario', :Nombre, :Apellido, :Seccion, :Correo, 
        :Grado, :Genero)";
        $ps = $Con->prepare($sql);
        $ps->bindParam(':Dni', $_POST['Dni']);
        $ps->bindParam(':Nombre', $_POST['Nombre']);
        $ps->bindParam(':Apellido', $_POST['Apellido']);
        $ps->bindParam(':Seccion', $_POST['Seccion']);
        $ps->bindParam(':Correo', $_POST['Correo']);
        $ps->bindParam(':Grado', $_POST['Grado']);
        $ps->bindParam(':Genero', $_POST['Genero']);
        $ps->execute();
        //header("location:Login.php");
        $sql2 = $Con->prepare("INSERT INTO usuario (USUARIO, CLAVE) VALUES ('$CorreoUsuario', '$Dni')");
        $sql2->execute();
        ?>
        <br>
        <h4 class="alert alert-secondary"  align="center" role="alert">Usuario: <?php echo $CorreoUsuario ?></h4>
        <h4 class="alert alert-secondary"  align="center" role="alert">Clave: <?php echo $Dni ?></h4>
        
        <?php

    } else {
        $Dni = $_POST['Dni'];
        $Usuario = 'A';
        $Dominio = '@colegio.edu.pe';
        $CorreoUsuario = $Usuario . $Dni . $Dominio;
        ?>
        <br>
        <h4 class="alert alert-secondary"  align="center" role="alert">Usuario: <?php echo $CorreoUsuario ?></h4>
        <h4 class="alert alert-secondary"  align="center" role="alert">Clave: <?php echo $Dni ?></h4>

        <?php
        $sql = "INSERT INTO Alumno (DniAlu, USUARIO, NomAlu, ApeAlu, SecAlu, CorAlu, GraCur, SexAlu) VALUES (:Dni, '$CorreoUsuario', :Nombre, :Apellido, :Seccion, :Correo, 
        :Grado, :Genero)";
        
        $ps = $Con->prepare($sql);
        $ps->bindParam(':Dni', $_POST['Dni']);
        $ps->bindParam(':Nombre', $_POST['Nombre']);
        $ps->bindParam(':Apellido', $_POST['Apellido']);
        $ps->bindParam(':Seccion', $_POST['Seccion']);
        $ps->bindParam(':Correo', $_POST['Correo']);
        $ps->bindParam(':Grado', $_POST['Grado']);
        $ps->bindParam(':Genero', $_POST['Genero']);
        $ps->execute();

        $sql2 = $Con->prepare("INSERT INTO usuario (USUARIO, CLAVE) VALUES ('$CorreoUsuario', '$Dni')");
        $sql2->execute();
        //header("location:S.php");
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.css">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/locales-all.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

</head>
<body>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">DATOS DE INGRESO</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>USUARIO EDUPLUS: <?php echo $CorreoUsuario ?></p>
          <p>CLAVE EDUPLUS: <?php echo $Dni ?></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <a class="nav-link" class="btn btn-secondary" href="Login.php"><span>Login</span></a>
        </div>
      </div>
    </div>
  </div>
  
  <br>
  <h1 align="center">REGISTRO DE DATOS</h1>
    <br>
    <section class="d-flex justify-content-center align-items-center">
        <div class="card shadow col-xs-12 col-sm-6 col-md-6 col-lg-4   p-4"> 
            <div class="mb-1">
                <form id = "contacto" action="SignUp.php" method="post">
                    <div class="mb-4">
                        <label for="dni"><i class="fas fa-fw fa-user"></i> DNI CLIENTE</label>
                        <input type="text" class="form-control" name="Dni" id="Dni" placeholder= "ej: gpmcheco@colegio.edu.com" required>
                        <div class="correo text-danger"></div>
                    </div>
                    <div class="mb-4 d-flex justify-content-between">
                        <div>
                            <label for="nombre"> <i class="fas fa-fw fa-user"></i> NOMBRE CLIENTE</label>
                            <input type="text" class="form-control" name="Nombre" id="Nombre" placeholder= "ej: Gabriel" required>
                            <div class="nombre text-danger "></div>
                        </div>
                        <div >
                            <label for="apellido"> <i class="fas fa-fw fa-user"></i> APELLIDO APELLIDO</label>
                            <input type="text" class="form-control" name="Apellido" id="Apellido" placeholder= "ej: Pacheco" required>
                            <div class="apellido text-danger"></div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="correo"><i class="fas fa-fw fa-envelope-open"></i> CORREO PERSONAL</label>
                        <input type="email" class="form-control" name="Correo" id="Correo" placeholder= "ej: gpmcheco@gmail.com" required>
                        <div class="correo text-danger"></div>
                        
                    </div>
                    <div class="mb-4 d-flex justify-content-between">
                        <div>
                            <label for="grado"> <i class="fas fa-fw fa-graduation-cap"></i> GRADO EN CURSO</label>
                            <input type="text" class="form-control" name="Grado" id="Grado" placeholder= "ej: Primero" required>
                            <div class="nombre text-danger "></div>
                        </div>
                        <div >
                            <label for="seccion"> <i class="fas fa-fw fa-graduation-cap"></i> SECCIÓN DEL AULA</label>
                            <input type="text" class="form-control" name="Seccion" id="Seccion" placeholder= "ej: A" required>
                            <div class="apellido text-danger"></div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="sexo"><i class="fas fa-fw fa-transgender-alt"></i> SEXO CLIENTE</label> <br>
                        <select class="form-control" id="Genero" name="Genero" required>
                            <option value="Elegir">Elegir</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                            <option value="No Especificar">No Especificar</option>
                        </select>
                    </div>
                    
                    <div class="mb-2">
                        <button id ="botton" name="submit" type="submit" class="col-12 btn btn-primary">
                            <span align="center">Enviar </span><i id="icono" class="bi bi-cursor-fill "></i>
                        </button>
                    </div>
                    
                    <button type="button" class="col-12 btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Ver Datos</button> 
                              
                </form>
            </div>
        </div>
    </section>

    <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
    integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
    integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
  </script>
  
</body>
</html>