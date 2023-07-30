<?php 
session_start();
include("../templates/cabecera.php");
include("../configuraciones/bd.php");
$usuario=$_SESSION['user'];
if(!isset($usuario)){
    header("location:../login.php");
}

?>

<div class="container px-4 py-5">
    <h2 class="pb-2 border-bottom">
        Gestion Académica
    </h2>
    <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
        
        <div class="col d-flex align-items-start">
        <div class="icon-square"><img src="../src/students.png" alt="Icono estudiantes" height="50px"></div>
            <div>
                <h3 class="fs-2 text-body-emphasis">Estudiantes</h3>
                <p>En esta sección podras realizar consultas de estudiantes y administrar sus datos.</p>
                <a href="vista_estudiantes.php" class="btn btn-secondary">Ir</a>
            </div>
        </div>

        <div class="col d-flex align-items-start">
            <div class="icon-square"><img src="../src/groups.png" alt="Icono cursos" height="50px"></div>
            <div>
                <h3 class="fs-2 text-body-emphasis">Cursos</h3>
                <p>En esta sección podrás encontrar la información de los diferentes cursos registrados y gestionar cada uno de ellos.</p>
                <a href="vista_cursos.php" class="btn btn-secondary">Ir</a>
            </div>
        </div>

        <div class="col d-flex align-items-start">
        <div class="icon-square"><img src="../src/docs.png" alt="Icono formatos" height="50px"></div>
            <div>
                <h3 class="fs-2 text-body-emphasis">Formatos</h3>
                <p>Aqui podrás gestionar e imprimir diferentes formatos.</p>
                <a href="#" class="btn btn-secondary">Ir</a>
            </div>
        </div>
    </div>

   
</div>



<?php include("../templates/pie.php");?>
