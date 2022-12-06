<!DOCTYPE html>
<html lang="es">
<head>
<title>Datos</title>

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.css">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/locales-all.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  
</head>
<body>
    
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <ul class="navbar-nav sidebar" id="accordionSidebar">
                </ul>
            </div>
            <div class="col-6 col-md-10">
                <div class="card shadow col-lg-9 p-4">
                    <div class="container align-self-center p-6">
                        <h2 align="center"class="font-weight-bold mb-3">Modificación de Datos</h2>
                        <p align="right">
                            <small align="right" class="text-muted mb-5">Ingresa la siguiente información para registrarte.</small>
                        </p>
                        <form id = "contacto" action="GestionPerfil/ModificaDoc.php" method="post">
                            <div class="mb-4 font-weight-bold">
                                <label for="correo"><i class="fas fa-fw fa-user"></i> Usuario</label><span class="text-danger"> *</span>
                                <input type="text" class="form-control" name="usu" id="usu" value="<?php echo $Usuario ?>" readonly>
                                <div class="correo text-danger"></div>
                            </div>
                            <div class="mb-4 font-weight-bold">
                                <label for="password"><i class="bi bi-envelope-fill"></i> Password</label><span class="text-danger"> *</span>
                                <input type="password" class="form-control" name="clave" id="clave" placeholder="Ingresa una contraseña" required>
                                <div class="correo text-danger"></div>
                            </div>
                            <?php
                            foreach ($res as $row) {
                            ?>
                            <div class="form-row mb-2 font-weight-bold">
                                <div class="form-group col-md-6">
                                    <label for="nombre" class="font-weight-bold"> <i class="fas fa-fw fa-user"></i> Nombre </label><span class="text-danger"> *
                                    <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $row['NomDoc']; ?>" required>
                                    <div class="nombre text-danger "></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="nombre" class="font-weight-bold"> <i class="fas fa-fw fa-user"></i> Apellido </label><span class="text-danger"> *
                                    <input type="text" class="form-control" name="apellido" id="apellido" value="<?php echo $row['ApeDoc']; ?>" required>
                                    <div class="apellido text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group mb-3 font-weight-bold">
                                <label for="correo"><i class="fas fa-fw fa-envelope-open"></i> Correo Personal </label><span class="text-danger"> *</span>
                                <input type="email" class="form-control" name="correo" id="Genero" value="<?php echo $row['CorDoc']; ?>" required>
                                <div class="correo text-danger"></div>
                            </div>
                            <div class="form-group mb-3 font-weight-bold">
                                <label for="grado"> <i class="fas fa-fw fa-graduation-cap"></i> Grado en Curso</label><span class="text-danger"> *</span>
                                <input type="text" class="form-control" name="grado" id="grado" value="Docente" readonly>
                                <div class="nombre text-danger "></div>
                            </div>
                            <div class="mb-4 font-weight-bold">
                                <label for="sexo"><i class="fas fa-fw fa-transgender-alt"></i> Sexo</label><span class="text-danger"> *</span>
                                <select class="form-control" id="Genero" name="Genero" required>
                                    <option value="Elegir">Elegir</option>
                                    <option value="Masculino">Masculino</option>
                                    <option value="Femenino">Femenino</option>
                                    <option value="No Especificar">No Especificar</option>
                                </select>
                            </div>
                            <?php
                                }
                                ?>
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button id ="botton" type="submit" class="btn btn-outline-success">
                                    <span>Modificar </span><i id="icono" class="bi bi-cursor-fill "></i>
                                </button>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>


<!-- Bootstrap JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
    integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
    integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
  </script>

</body>
</html>

