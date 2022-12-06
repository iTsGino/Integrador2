<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.css">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/locales-all.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>
<body>
    <br>
    <br>

    <section class="d-flex justify-content-center align-items-center">
        <div class="card shadow col-xs-12 col-sm-6 col-md-6 col-lg-4   p-4"> 
            <div class="mb-1">
                <form id = "contacto" action="Validar.php" method="post">
                    <div class="mb-4">
                        <label for="correo"><i class="fas fa-fw fa-user"></i> Usuario</label>
                        <input type="text" class="form-control" name="usuario" id="usuario" placeholder= "ej: gpmcheco@colegio.edu.com" required>
                        <div class="correo text-danger"></div>
                    </div>
                    <div class="mb-4">
                        <label for="password"><i class="bi bi-envelope-fill"></i> Password</label>
                        <input type="password" class="form-control" name="contraseña" id="contraseña" placeholder="Ingrese Password" required>
                        <div class="correo text-danger"></div>
                    </div> 
                    
                    <div class="mb-2">
                        <button id ="botton" type="submit" class="col-12 btn btn-primary d-flex justify-content-between ">
                            <span>Enviar </span><i id="icono" class="bi bi-cursor-fill "></i>
                        </button>
                    </div> 
                              
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