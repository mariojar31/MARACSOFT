<?php include("../templates/cabecera.php");?>
<?php include("../secciones/estudiantes.php");?>
<?php include("../secciones/cursos.php");?>
<?php 
session_start();

$usuario=$_SESSION['user'];
if(!isset($usuario)){
    header("location:../login.php");
}

if(isset($_POST['action'])){
    unset($_POST['action']);
} ?>


<section>
    <p>
        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#enrolar_estudiante" aria-expanded="false"
                aria-controls="enrolar_estudiante">
                Enrolar Nuevo Estudiante
        </button>
    </p>
    <div class="collapse" id="enrolar_estudiante">
        
        <form action="" method="post">

            <div class="card">
                <div class="card-header">
                    Datos del Estudiante
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="" class="form-label">Nombre</label>
                        <input type="text"
                            class="form-control" 
                            name="nombre_estudiante" 
                            id="nombre_estudiante" 
                            aria-describedby="helpId" 
                            placeholder="Nombre">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Apellido</label>
                        <input type="text"
                            class="form-control" 
                            name="apellido_estudiante" 
                            id="apellido_estudiante" 
                            aria-describedby="helpId" 
                            placeholder="Apellido">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Documento de Identidad</label>
                        <input type="text"
                            class="form-control" 
                            name="documento_estudiante" 
                            id="documento_estudiante" 
                            aria-describedby="helpId" 
                            placeholder="">
                            <small id="helpId" class="form-text text-muted">*Ingrese el documento sin puntos ni espacios.</small>
                    </div>
                    <div class="mb-3">
                      <label for="" class="form-label">Afiliacion a Salud</label>
                      <select class="form-select" name="regimen_salud" id="regimen_salud">
                            <option selected>Seleccione una opción</option>
                            <option value="contributivo">Contributivo</option>
                            <option value="subsidiado">Subsidiado</option>
                            <option value="na">Sin afiliación a salud</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">EPS</label>
                        <input type="text"
                            class="form-control" 
                            name="eps" 
                            id="eps" 
                            aria-describedby="helpId" 
                            placeholder="Nombre de la EPS">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Observaciones Médicas</label>
                        <input type="text"
                            class="form-control" 
                            name="observaciones_medicas" 
                            id="observaciones_medicas" 
                            aria-describedby="helpId" 
                            placeholder="Alergias, tratamientos o cualquier observación médica"> 
                    </div>
            
                </div>
            </div>
            </br>
            <div class="card">
                <div class="card-header">
                    Datos del Acudiente
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="" class="form-label">Nombre</label>
                        <input type="text"
                            class="form-control" 
                            name="nombre_acudiente" 
                            id="nombre_acudiente" 
                            aria-describedby="helpId" 
                            placeholder="Nombre">
                    </div>
                    <!-- <div class="mb-3">
                        <label for="" class="form-label">Apellido</label>
                        <input type="text"
                            class="form-control" 
                            name="apellido_acudiente" 
                            id="apellido_acudiente" 
                            aria-describedby="helpId" 
                            placeholder="Apellido">
                    </div> -->
                    <div class="mb-3">
                        <label for="" class="form-label">Documento de Identidad</label>
                        <input type="text"
                            class="form-control" 
                            name="documento_acudiente" 
                            id="documento_acudiente" 
                            aria-describedby="helpId" 
                            placeholder="">
                            <small id="helpId" class="form-text text-muted">*Ingrese el documento sin puntos ni espacios.</small>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Telefono</label>
                        <input type="number"
                            class="form-control" 
                            name="telefono" 
                            id="telefono" 
                            aria-describedby="helpId" 
                            placeholder="Numero de telefono">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="email"
                            class="form-control" 
                            name="email" 
                            id="email" 
                            aria-describedby="helpId" 
                            placeholder="Email / Correo Electronico">
                    </div>
            
                </div>
            </div>
            </br> 
        
                <button type="submit" name="action" value="adds" class="btn btn-info">Enrolar</button>

            <br> 
            <br> 

        </form>
        <div>
        <button class="btn btn-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#enrolar_estudiante" aria-expanded="false"
                aria-controls="enrolar_estudiante">
                ^
        </button>
        </div>
        </br> 
    </div>
</section>


<div class="col-md-5">
    <form action="" method="post">
        <div class="card">
            <div class="card-header">
            Buscar
            </div>
            <div class="card-body">
            
                <div class="mb-3">
                    <label for="" class="form-label">Buscar por:</label>
                    <select class="form-select form-select-lg" name="tipo_busqueda" id="tipo_busqueda">
                        <option value="id_estudiante" selected>ID</option>
                        <option value="nombre_estudiante">Nombre</option>
                        <option value="apellido_estudiante">Apellido</option>
                        <option value="doc_estudiante">Documento</option>
                    </select>
                </div>

                <div class="mb-3">
                <input type="text"
                    class="form-control" name="busqueda" id="busqueda" aria-describedby="helpId" placeholder="Escriba aquí su busqueda">
                </div>

            
                <div class="btn-group" role="group" aria-label="">
                    <button type="submit" name="action" value="buscars" class="btn btn-secondary">Buscar</button>
                </div>
            </div>
        </div>
    </form>

        
</div>

<div class="col-md-7">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Doc Identidad</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Curso</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($estudiantesBuscados as $estudiante){?>                
                    <tr class="">
                        <td scope="row"><?php echo $estudiante['id'] ?></td>
                        <td> <?php echo $estudiante['documento_estudiante'] ?></td>
                        <td><?php echo $estudiante['nombre_estudiante'];echo ' ';echo $estudiante['apellido_estudiante'] ?></td>
                        <td>--</td>
                        <td>
                            <div class="d-flex p-2">
                            <form action="" method="post">
                                <input type="hidden" name="id_estudiante" value="<?php echo $estudiante['id'];?>">
                                <button type="submit" id="delete" name="action" value="deletes" class="btn">&#128465</button>
                                <!-- <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                &#128465
                                </button>

                               Modal
                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Eliminar elemento</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        ¿Confirma que desea eliminar el registro? <br> No podrá recuperar la información.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button> 
                                        <label for="delete" class="btn btn-danger">Confirmar</label>
                                    </div>
                                    </div>
                                </div>
                                </div> -->


                                <!-- <input name="action" id="" class="btn" type="submit" value="&#128465" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Borrar"> -->
                            </form>
                            <form action="vista_estudiante_select.php" method="get">
                                <input type="hidden" name="id_estudiante" value="<?php echo $estudiante['id'];?>">
                                <button type="submit" name="action" value="select" class="btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Ver">&#128269</button>
                            </form>
                            </div>
                            
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    
</div>






<?php include("../templates/pie.php");?>