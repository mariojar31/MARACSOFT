

<!doctype html>
<html lang="en">

<head>
  <title>Home</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>

<nav class="navbar navbar-expand-sm navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="secciones/home.php">MAR AS</a>
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="#" aria-current="page">Acerca de <span class="visually-hidden">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Servicio Técnico</a>
                </li>
            </ul>
        </div>
  </div>
</nav>

    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
            <br>
            <form action="" method="post">
                <div class="card">
                    <div class="card-header text-center">
                    Inicia Sesión
                    </div>
                   
                    <div class="card-body">
                        <div class="mb-3 text-center">
                            <?php include("configuraciones/login.php"); ?>
                        </div>
                        <div class="mb-3">
                        <label for="" class="form-label">Usuario</label>
                        <input type="text"
                            class="form-control" name="user" id="user" aria-describedby="helpId" placeholder="usuario" required>
                        </div> 
                        <div class="mb-3">
                        <label for="" class="form-label">Contraseña</label>
                        <input type="password"
                            class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="contraseña" required>
                        </div>   
                        <button type="submit" name="loginbtn" class="btn btn-primary" value="singin">Iniciar Sesión</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>