<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device">
    <title>EduPlus</title>
</head>
<body>
    <div class="col-md-2">
        <ul class="navbar-nav sidebar" id="accordionSidebar">
        </ul>
    </div>
    <div class="col-6 col-md-10">
        <div class="card shadow col-lg-9 p-4">
            <div class="container align-self-center p-6">
                <h2 align="center"class="font-weight-bold mb-3">Simulación de Promedio</h2>
                <p align="right">
                    <small align="right" class="text-muted mb-5">Ingresa la siguiente información.</small>
                </p>
                <form id="contacto" action="PageSimularProm.php" method="post">
                    <div class="mb-4 font-weight-bold">
                        <label for="notas"><i class="fas fa-fw fa-book"></i> Cantidad de Notas</label><span class="text-danger"> *</span>
                        <input type="text" class="form-control" name="txtcant" id="txtcant" placeholder="Ingrese Cantidad de Notas" required>
                        <div class="notas text-danger"></div>
                    </div>
                    <div align="center">
                        <button id ="botton" type="submit" class="btn btn-outline-success">
                            <span>Enviar</span>
                        </button>
                    </div>

                </form>
                <?php
                if($_REQUEST){
                    $cant = $_REQUEST["txtcant"];
                    $i=1;
                ?>
                <form action="Promedio/Calculo.php" method="post">
                    <?php
                        while($i<=$cant){
                    ?>
                    <div class="mb-4 font-weight-bold">
                        <label for="notas"><i class="fas fa-fw fa-book"></i>Nota Número <?php print $i;?></label><span class="text-danger"> *</span>
                        <input type="text" class="form-control" name="Nota<?php echo $i?>" id="Nota<?php echo $i;?>" placeholder="Ingrese Nota Nota <?php echo $i;?>" required>
                        <div class="notas text-danger"></div>
                    </div>
                    <?php
                        $i++;
                        }
                    ?>
                    <div align="center">
                        <button id ="botton" type="submit" class="btn btn-outline-danger">
                            <span>Calcular</span>
                        </button>
                    </div>
                </form>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>