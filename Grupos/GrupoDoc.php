<?php
require '../Conexion/Datos.php';
$db = new Database();
$Con = $db->Conectar();
//$usu = new SendUsuario();
//$Usuario = $_POST['usuario'];
session_start();
$Usuario = $_SESSION['usuario'];
$sql2 = $Con->prepare("SELECT NomDoc, ApeDoc FROM usuario u, docente d WHERE u.USUARIO = d.USUARIO AND d.USUARIO = '$Usuario';");
$sql2->execute();
$res2 = $sql2->fetchAll(PDO::FETCH_ASSOC);

//$SelectPag = $_POST['Course'];
$sql3 = $Con->prepare("SELECT * FROM docente WHERE USUARIO = '$Usuario';");
$sql3->execute();
$res3 = $sql3->fetchAll(PDO::FETCH_ASSOC);
foreach ($res3 as $row) {
    $DniDoc = $row['DniDoc'];
}

$sql4 = $Con->prepare("SELECT * FROM docente_curso dc, cursos c where dc.CodCur = c.CodCur AND DniDoc = '$DniDoc';");
$sql4->execute();
$res4 = $sql4->fetchAll(PDO::FETCH_ASSOC);

$sql8 = $Con->prepare("SELECT * FROM grupos;");
$sql8->execute();
$res8 = $sql8->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

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
                        <a class="collapse-item" href="">Registro</a>
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
                        <h1 class="h3 mb-0 text-gray-800">Registro de Grupos: </h1>
                    </div>
                    <div class="container">
                        <div class="row">
                            <hr>
                            <div class="col-md-5">
                                <div class="card shadow col-lg-11 p-4">
                                    <form id="form" action="" method="post">
                                        <div class="form-row mb-2 font-weight-bold">
                                            <div class="form-group col-md-6">
                                                <label class="font-weight-bold"> <i class="fas fa-fw fa-user"></i>Materia </label><span class="text-danger"> *
                                                <select class="form-control" id="Curso" name="Curso" required>
                                                    <option value="Elegir">Elegir</option>
                                                    <?php
                                                    foreach ($res4 as $row) {
                                                    ?>
                                                        <option value="<?php echo $row['title']; ?>"><?php echo $row['title']; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="font-weight-bold"> <i class="fas fa-fw fa-user"></i>Boton </label><span class="text-danger"> *
                                                <div class="d-grid gap-2 col-6 mx-auto">
                                                    <button type="submit" name="enviar" class="btn btn-outline-info">
                                                        <span>Seleccionar</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <?php
                                        if(isset($_REQUEST['enviar'])){
                                            $Curso = $_REQUEST['Curso'];
                                            $sql5 = $Con->prepare("SELECT c.CodCur, title, a.DniAlu, NomAlu, ApeAlu FROM alumno_curso ac, cursos c, alumno a 
                                            where ac.CodCur = c.CodCur AND ac.DniAlu = a.DniAlu AND title = '$Curso';");
                                            $sql5->execute();
                                            $res5 = $sql5->fetchAll(PDO::FETCH_ASSOC);
                                            $con=0;
                                            foreach ($res5 as $row) {
                                                $con = $con+1;
                                            }
                                    ?>
                                    <form id="form2" action="CreaGrupo.php" method="post">
                                        <div class="form-row mb-2 font-weight-bold">
                                            <div class="form-group col-md-6">
                                                <label class="font-weight-bold"> <i class="fas fa-fw fa-user"></i>Total Alumnos </label><span class="text-danger"> *
                                                <input type="text" class="form-control" name="TotalAlu" id="TotalAlu" value="<?php echo $con; ?>" readonly>
                                                <div class="nombre text-danger "></div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="font-weight-bold"> <i class="fas fa-fw fa-user"></i>Integrantes </label><span class="text-danger"> *
                                                <input type="text" class="form-control" id="Integrantes" name="Integrantes" id="Integrantes" required>
                                                <div class="apellido text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="mb-4 font-weight-bold">
                                            <label><i class="fas fa-fw fa-user"></i>N° Grupos</label><span class="text-danger"> *</span>
                                            <input type="text" class="form-control" name="ngrupo" id="ngrupo" readonly>
                                            <div class="correo text-danger"></div>
                                        </div>
                                        <input type="hidden" name="CreaGrupo" id="CreaGrupo" readonly>
                                        <input type="hidden" name="Curso" id="Curso" value="<?php echo $Curso; ?>" readonly>
                                        <div class="form-row mb-2 font-weight-bold">
                                            <div class="d-grid gap-2 col-5 mx-auto">
                                                <button id ="botton" type="button" class="btn btn-outline-warning" onclick="Calcular();">
                                                    <span>Simular </span>
                                                </button>
                                            </div>
                                            <div class="d-grid gap-2 col-5 mx-auto">
                                                <button disabled id ="botton2" type="submit" name="agregar" class="btn btn-outline-danger">
                                                    <span>Crear Grupo</span>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    <?php
                                        }
                                    ?>
                                    <br>
                                </div>
                                <br>
                                
                            </div>
                            <div class="col-md-7">
                                <form action="CreaGrupo.php" method="post">
                                    <input type="hidden" name="CreaGrupo" id="CreaGrupo2" readonly>
                                    <input type="hidden" name="Curso" id="Curso" value="<?php echo $Curso; ?>" readonly>
                                    <div class="d-grid gap-2 col-5 mx-auto">
                                        <button id ="botton2" type="submit" name="agregar2" class="btn btn-outline-danger">
                                            <span>Crear Grupo</span>
                                        </button>
                                    </div>
                                </form>
                                <div class="mb-4 font-weight-bold">
                                    <label><i class="fas fa-fw fa-user"></i>N° Grupos</label><span class="text-danger"> *</span>
                                    <input type="text" class="form-control" name="ngrupo2" id="ngrupo2" readonly>
                                    <div class="correo text-danger"></div>
                                </div>
                                <?php
                                if(isset($_REQUEST['enviar'])){
                                    $Curso = $_REQUEST['Curso'];
                                    ?>
                                    <div class="font-weight-bold">
                                        <label>Curso: <?php echo $Curso; ?>
                                    </div>
                                    <div class="card shadow col-lg-11 p-4">
                                    <table class="table-light">
                                        <thead align="center">
                                            <tr>
                                            <th scope="col">DNI</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Apellido</th>
                                            </tr>
                                        </thead>
                                        <tbody align="center">
                                            <?php
                                            foreach ($res5 as $row) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $row['DniAlu']; ?></td>
                                                    <td><?php echo $row['NomAlu']; ?></td>
                                                    <td><?php echo $row['ApeAlu']; ?></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                    <?php
                                }
                                ?>
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
        let btn = document.getElementById("botton");
        let btnCal = document.getElementById("botton2");
        let Integ = document.getElementById("Integrantes");
        let InpGru = document.getElementById("ngrupo");
        btn.addEventListener("click", Calcular);
        btn.addEventListener("click", Activar);
        
        function Calcular(){
            var TotalAlu = document.getElementById('TotalAlu').value;
            var Integrantes = document.getElementById('Integrantes').value;
            var Producto = 0;
            var Diferencia = 0;
            var nGrupo = 0;
            var GrupoNuevo = 0;
            var Cadena = "";
            var Contador = 0;
            if(Integrantes == 1 || Integrantes ==0 || Integrantes<0){
                swal({
                    type:"error",
                    title: "Error ingrese otro Número",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                    icon: 'error'
                }).then(function (){
                })
                document.getElementById('Integrantes').value = "";
            } else {
                for (var i = 1; Producto < TotalAlu; i++) {
                Producto = Integrantes * i;
                Diferencia = TotalAlu - Producto;
                nGrupo = i;
                Contador = i;
                if (Diferencia == 2) {
                    break;
                } else if (Diferencia == 1 || Diferencia<0) {
                    GrupoNuevo = nGrupo-1;
                    nGrupo = TotalAlu - (Integrantes * GrupoNuevo);
                    break;
                }
            }
            if (Diferencia == 1 || Diferencia<0) {
                Cadena = 'Habrá ' + GrupoNuevo + ' grupos de ' + Integrantes + ' y un grupo de ' + nGrupo;
            } else if (Diferencia == 0) {
                Cadena = 'Habrá ' + nGrupo + ' grupos de ' + Integrantes;
            } else {
                Cadena = 'Habrá ' + nGrupo + ' grupos de ' + Integrantes + ' y un grupo de ' + Diferencia;
                Contador = Contador+1;
            }
            swal({
                type:"success",
                title: "Recomendación de Grupos",
                text: Cadena,
                showConfirmButton: true,
                confirmButtonText: "Cerrar",
                icon: 'success'
            }).then(function (){
            })
            document.getElementById('CreaGrupo').value = Contador;
            document.getElementById('CreaGrupo2').value = Contador;
            document.getElementById('ngrupo').value = Cadena;
            document.getElementById('ngrupo2').value = Cadena;
            }
        }
        function Activar(){
                btnCal.disabled = false;
        }
    </script>

</body>
</html>