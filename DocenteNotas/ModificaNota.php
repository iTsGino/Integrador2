<?php
require '../Conexion/Datos.php';
$db = new Database();
$Con = $db->Conectar();
//header("location:Evaluaciones.php");
session_start();
$Usuario = $_SESSION['usuario'];
$sql2 = $Con->prepare("SELECT NomDoc, ApeDoc FROM usuario u, docente d WHERE u.USUARIO = d.USUARIO AND d.USUARIO = '$Usuario'");
$sql2->execute();
$res2 = $sql2->fetchAll(PDO::FETCH_ASSOC);

$SelectPag = $_REQUEST['Course'];
$CodAluCur = $_REQUEST['CodAluCur'];
$sql3 = $Con->prepare("SELECT * FROM DETALLE_NOTA where Cod_AluCur = '$CodAluCur';");
$sql3->execute();
$res3 = $sql3->fetchAll(PDO::FETCH_ASSOC);
foreach ($res3 as $row) {
    $CodDetNot = $row['CodDetNot'];
}

$sql5 = $Con->prepare("SELECT Cod_AluCur, a.DniAlu, NomAlu, ApeAlu FROM alumno_curso ac, alumno a 
where ac.DniAlu = a.DniAlu AND Cod_AluCur = '$CodAluCur';");
$sql5->execute();
$res5 = $sql5->fetchAll(PDO::FETCH_ASSOC);
foreach ($res5 as $row) {
    $DniAlu = $row['DniAlu'];
    $NomAlu = $row['NomAlu'];
    $ApeAlu = $row['ApeAlu'];
}
?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>EduPlus</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <title>Bootstrap Example</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../EduPlusDoc.php">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-user-circle"></i>
                </div>
                <div class="sidebar-brand-text mx-3">DOCENTE <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="../EduPlusDoc.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>PAGINA PRINCIPAL</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-book"></i>
                    <span>CURSOS</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item fas fa-calendar" href=""> See Schedule</a>
                        
                        <h6 class="collapse-header">Available:</h6>
                        <?php
                            include '../CoursesDoc/DocCourse.php';
                        ?>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>GRUPOS</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Disponible:</h6>
                        <a class="collapse-item" href="">Colores</a>
                        <a class="collapse-item" href="">Borders</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="">
                    <i class="fas fa-fw fa-calendar"></i>
                    <span>CALENDARIO</span>
                </a>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="../PageMailAlu.php">
                    <i class="fas fa-fw fa-inbox"></i>
                    <span>BANDEJA DE ENTRADA</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="../PageSimularProm.php">
                    <i class="fas fa-fw fa-question-circle"></i>
                    <span>SIMULAR PROMEDIO</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="../PageAyuda.php">
                    <i class="fas fa-fw fa-question-circle"></i>
                    <span>AYUDA</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Centro de Alertas
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">Diciembre 12, 2022</div>
                                        <span class="font-weight-bold">¡Un nuevo informe mensual está listo para ser descargado!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">Diciembre 7, 2022</div>
                                        ¡Se han depositado $290.29 en su cuenta!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">Diciembre 2, 2022</div>
                                        Alerta de Gasto: Hemos notado un gasto inusualmente alto en su cuenta.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Mostrar todas las Alertas</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Centro de Mensajes
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="../img/undraw_profile_1.svg"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hola a todos. Me pregunto si pueden ayudarme con un problema que he tenido.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="../img/undraw_profile_2.svg"
                                            alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Tengo las fotos que pidió el mes pasado, ¿Cómo quiere que se las envíen?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="../img/undraw_profile_3.svg"
                                            alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">El informe del mes pasado está muy bien, estoy muy contento con los progresos 
                                            realizados hasta ahora, ¡Sigue con el buen trabajo!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">¿Soy un buen chico? La razón por la que pregunto es porque alguien me dijo 
                                            que la gente le dice esto a todos los perros, aunque no sean buenos...</div>
                                        <div class="small text-gray-500">Manuel Rojas · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?php
                                        foreach ($res2 as $row) {
                                            echo $row['NomDoc'];
                                            echo ' ';
                                            echo $row['ApeDoc'];
                                        }
                                    ?>
                                </span>
                                <img class="img-profile rounded-circle"
                                    src="../img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="../DocGestionPerfil.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Perfil
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../Login.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cerrar Sesión
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- BEGIN PAGE CONTENT -->
                <div class="container-fluid">
                    <!-- PAGE HEADING -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Modificacion de Notas: <?php echo $SelectPag; ?></h1>
                        <h4 class="h4 mb-0 text-gray-800">Alumno: <?php echo $NomAlu. ' ' .$ApeAlu; ?></h4>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-6 col-md-12">
                                <form action="GuardaNota.php" method="post">
                                    <table class="table table-striped table-hover" align="center">
                                        <?php
                                            if(isset($CodDetNot)){
                                                $sql4 = $Con->prepare("SELECT * FROM DETALLE_NOTA where CodDetNot = '$CodDetNot';");
                                                $sql4->execute();
                                                $res4 = $sql4->fetchAll(PDO::FETCH_ASSOC);
                                                foreach ($res4 as $row) {
                                                    ?>
                                                    <thead>
                                                        <tr>
                                                        <th scope="col">Nota 1</th>
                                                        <th scope="col">Nota 2</th>
                                                        <th scope="col">Nota 3</th>
                                                        <th scope="col">Prom. Trimestral</th>
                                                        <th scope="col">Fecha</th>
                                                        <th scope="col">Hora</th>
                                                        <th scope="col">Accion</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                        <td><input type="text" id="Nota1" name="Nota1" value="<?php echo $row['Nota1']; ?>"></td>
                                                        <td><input type="text" id="Nota2" name="Nota2" value="<?php echo $row['Nota2']; ?>"></td>
                                                        <td><input type="text" id="Nota3" name="Nota3" value="<?php echo $row['Nota3']; ?>"></td>
                                                        <td><input type="text" value="<?php echo $row['Prom']; ?>" id="Prom1" name="Prom1" readonly></td>
                                                        <td><?php echo $row['Fecha']; ?></td>
                                                        <td><?php echo $row['Hora']; ?></td>
                                                        <td><input type="button" class="btn btn-outline-success" value="Calcular" onclick="SendPromedio()"></td>
                                                        </tr>
                                                    </tbody>
                                                    <input type="hidden" value="<?php echo $CodDetNot; ?>" id="CodDetNot" name="CodDetNot">
                                                    <?php
                                                }
                                            } else {
                                                ?>
                                                <thead>
                                                    <tr>
                                                    <th scope="col">Nota 1</th>
                                                    <th scope="col">Nota 2</th>
                                                    <th scope="col">Nota 3</th>
                                                    <th scope="col">Prom. Trimestral</th>
                                                    <th scope="col">Accion</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                    <td><input type="text" id="Nota1" name="Nota1"></td>
                                                    <td><input type="text" id="Nota2" name="Nota2"></td>
                                                    <td><input type="text" id="Nota3" name="Nota3"></td>
                                                    <td><input type="text" value="" id="Prom1" name="Prom1" readonly></td>
                                                    <td><input type="button" class="btn btn-outline-success" value="Calcular" onclick="SendPromedio()"></td>
                                                    </tr>
                                                </tbody>
                                                <?php
                                            }
                                        ?>
                                    </table>
                                    <input type="hidden" value="<?php echo $CodAluCur; ?>" id="CodAluCur" name="CodAluCur">
                                    <input type="hidden" value="<?php echo $DniAlu; ?>" id="DniAlu" name="DniAlu">
                                    <input type="hidden" name="Course" value="<?php echo $SelectPag;?>">
                                    <?php
                                    
                                    if(isset($CodDetNot)){
                                        ?>
                                        <div class="d-grid gap-2 col-4 mx-auto">
                                            <a type="button" class="btn btn-outline-info" href="Evaluaciones.php?Course=<?php echo $SelectPag; ?>">
                                                <span>Regresar </span><i id="icono" class="bi bi-cursor-fill "></i>
                                            </a>
                                            <button id ="Modificar" name="Modificar" type="submit" class="btn btn-outline-success">
                                                <span>Modificar </span><i id="icono" class="bi bi-cursor-fill "></i>
                                            </button>
                                        </div>
                                        <?php
                                    } else {
                                        ?>
                                        <div class="d-grid gap-2 col-4 mx-auto">
                                            <a type="button" class="btn btn-outline-info" href="Evaluaciones.php?Course=<?php echo $SelectPag; ?>">
                                                <span>Regresar </span><i id="icono" class="bi bi-cursor-fill "></i>
                                            </a>
                                            <button id ="Registrar" name="Registrar" type="submit" class="btn btn-outline-success">
                                                <span>Registrar </span><i id="icono" class="bi bi-cursor-fill "></i>
                                            </button>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Web EduPlus 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>

    <!-- End of Page Wrapper -->
    
    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>

    <script>
        function SendPromedio() {
            n1 = document.getElementById("Nota1").value;
            n2 = document.getElementById("Nota2").value;
            n3 = document.getElementById("Nota3").value;

            if(n1.length==0 || /^\s+$/.test(n1) || isNaN(n1)){
                if(n1 == 'NS'){
                    n1 = 0;
                } else {
                    swal({
                        title: 'Error en Cálculo',
                        text: 'Ingrese un Número o Digite NS',
                        icon: 'error'
                    });
                    document.getElementById("Prom1").value = "";
                }
            }
            if(n2.length==0 || /^\s+$/.test(n2) || isNaN(n2)){
                if(n2 == 'NS'){
                    n2 = 0;
                } else {
                    swal({
                        title: 'Error en Cálculo',
                        text: 'Ingrese un Número o Digite NS',
                        icon: 'error'
                    });
                    document.getElementById("Prom1").value = "";
                }
            }
            if(n3.length==0 || /^\s+$/.test(n3) || isNaN(n3)){
                if(n3 == 'NS'){
                    n3 = 0;
                } else {
                    swal({
                        title: 'Error en Cálculo',
                        text: 'Ingrese un Número o Digite NS',
                        icon: 'error'
                    });
                    document.getElementById("Prom1").value = "";
                }
            }
            Prom = (parseFloat(n1)+parseFloat(n2)+parseFloat(n3))/3;
            Prom = Prom*100;
            Prom = Math.round(Prom);
            document.getElementById("Prom1").value = (Prom/100);
        }
    </script>

</body>
</html>

    <!-- Bootstrap core JavaScript-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>
</html>