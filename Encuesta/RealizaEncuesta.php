<?php
$sql2 = $Con->prepare("SELECT * FROM docente");
$sql2->execute();
$res2 = $sql2->fetchAll(PDO::FETCH_ASSOC);
?>
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
            <div align="center">
                <form action="" method="post">
                    <button id ="EnviaEnc" type="button" name="EnviaEnc" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <span>Realizar Encuesta</span>
                    </button>
                </form>
            </div>
            <br>
            <br>
            <br>
            <div class="col-md-2">
                <ul class="navbar-nav sidebar" id="accordionSidebar">
                </ul>
            </div>
            <?php
            if(isset($_REQUEST['EnviaEnc'])){
            ?>
                <div class="col-6 col-md-10">
                    
                </div>
                
            <?php
            }
            ?>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form id = "contacto" action="Encuesta/GuardaEncuesta.php" method="post">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container align-self-center p-6">
                        <h2 align="center"class="font-weight-bold mb-3">Encuesta al Docente</h2>
                        <p align="right">
                            <small class="text-muted mb-5">Ingresa la siguiente información para la encuesta.</small>
                        </p>
                        <p align="left">
                            <div class="mb-4 font-weight-bold">
                                <label><i class="fas fa-fw fa-graduation-cap"></i>Docente<span class="text-danger"> *</span></label>
                                <select class="form-control" id="Docente" name="Docente" required>
                                    <option value="Elegir">Elegir</option>
                                    <?php
                                    foreach ($res2 as $row) {
                                        ?>
                                        <option value="<?php echo $row['NomDoc']; ?>"><?php echo $row['NomDoc']; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </p>
                        <hr>
                        <br>                        
                        <div class="mb-4 font-weight-bold">
                            <label><i class="fas fa-fw fa-graduation-cap"></i> PREGUNTA 1: <br>¿Consideras que los materiales (lecturas, diapositivas, infografías, videos, etc.) del curso contribuyen a mi aprendizaje?<span class="text-danger"> *</span></label>
                            <select class="form-control" id="Pregunta1" name="Pregunta1" required>
                                <option value="Elegir">Elegir</option>
                                <option value="Totalmente de Acuerdo">Totalmente de Acuerdo</option>
                                <option value="De Acuerdo">De Acuerdo</option>
                                <option value="Ni de Acuerdo ni en Desacuerdo">Ni de Acuerdo ni en Desacuerdo</option>
                                <option value="En Desacuerdo">En Desacuerdo</option>
                                <option value="Totalmente en Desacuerdo">Totalmente en Desacuerdo</option>
                            </select>
                        </div>
                        <div class="mb-4 font-weight-bold">
                            <label><i class="fas fa-fw fa-graduation-cap"></i> PREGUNTA 2: <br>¿Consideras que las herramientas utilizadas en el curso facilitan mi aprendizaje (Software o Equipamiento)?<span class="text-danger"> *</span></label>
                            <select class="form-control" id="Pregunta2" name="Pregunta2" required>
                                <option value="Elegir">Elegir</option>
                                <option value="Totalmente de Acuerdo">Totalmente de Acuerdo</option>
                                <option value="De Acuerdo">De Acuerdo</option>
                                <option value="Ni de Acuerdo ni en Desacuerdo">Ni de Acuerdo ni en Desacuerdo</option>
                                <option value="En Desacuerdo">En Desacuerdo</option>
                                <option value="Totalmente en Desacuerdo">Totalmente en Desacuerdo</option>
                            </select>
                        </div>
                        <div class="form-group mb-3 font-weight-bold">
                            <label><i class="fas fa-fw fa-graduation-cap"></i> PREGUNTA 3: <br>¿Consideras que los temas abordados en el curso contribuyen a mi aprendizaje?<span class="text-danger"> *</span></label>
                            <select class="form-control" id="Pregunta3" name="Pregunta3" required>
                                <option value="Elegir">Elegir</option>
                                <option value="Totalmente de Acuerdo">Totalmente de Acuerdo</option>
                                <option value="De Acuerdo">De Acuerdo</option>
                                <option value="Ni de Acuerdo ni en Desacuerdo">Ni de Acuerdo ni en Desacuerdo</option>
                                <option value="En Desacuerdo">En Desacuerdo</option>
                                <option value="Totalmente en Desacuerdo">Totalmente en Desacuerdo</option>
                            </select>
                        </div>
                        <div class="form-group mb-3 font-weight-bold">
                            <label><i class="fas fa-fw fa-graduation-cap"></i> PREGUNTA 4: <br>¿Consideras que el/la docente responde a mis consultas en un plazo menor a 24 horas?<span class="text-danger"> *</span></label>
                            <select class="form-control" id="Pregunta4" name="Pregunta4" required>
                                <option value="Elegir">Elegir</option>
                                <option value="Totalmente de Acuerdo">Totalmente de Acuerdo</option>
                                <option value="De Acuerdo">De Acuerdo</option>
                                <option value="Ni de Acuerdo ni en Desacuerdo">Ni de Acuerdo ni en Desacuerdo</option>
                                <option value="En Desacuerdo">En Desacuerdo</option>
                                <option value="Totalmente en Desacuerdo">Totalmente en Desacuerdo</option>
                            </select>
                        </div>
                        <div class="form-group mb-3 font-weight-bold">
                            <label><i class="fas fa-fw fa-graduation-cap"></i> PREGUNTA 5: <br>¿Consideras que el/la docente establece una relación respetuosa conmigo?<span class="text-danger"> *</span></label>
                            <select class="form-control" id="Pregunta5" name="Pregunta5" required>
                                <option value="Elegir">Elegir</option>
                                <option value="Totalmente de Acuerdo">Totalmente de Acuerdo</option>
                                <option value="De Acuerdo">De Acuerdo</option>
                                <option value="Ni de Acuerdo ni en Desacuerdo">Ni de Acuerdo ni en Desacuerdo</option>
                                <option value="En Desacuerdo">En Desacuerdo</option>
                                <option value="Totalmente en Desacuerdo">Totalmente en Desacuerdo</option>
                            </select>
                        </div>
                        <br>
                        <input type="hidden" name="Alumno" value="<?php echo $Usuario; ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button id ="botton" type="submit" type="button" class="btn btn-outline-info">Enviar Encuesta</button>
                    <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </form>
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

