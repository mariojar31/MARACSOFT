<?php include("../templates/cabecera.php");?>
<?php include("../secciones/estudiante_select.php");?>
<?php include("../secciones/estudiantes-cursos.php");?>


<section>
    
    <div class="clearfix">
        <span>Estudiante:</span>
        <span class="h3"><?php echo $nombre_estudiante?> <?php echo $apellido_estudiante?></span>
    </div>
    

    <section>
        <br>
        <br>
                <div class="card">
                    <div class="card-header">Datos del Curso</div>
                    <div class="card-body">
                        
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombre Curso</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $es_cur=FUN::consultar_cursos($id_estudiante) ?>
                                <?php foreach($es_cur as $cursos){?>                 
                                    <tr class="">
                                        <td scope="row"><?php echo $cursos['id_curso'] ?></td>
                                        <td scope="row"><?php echo FUN::consultar($cursos['id_curso'])[0][1] ?></td>
                                        <td scope="row">
                                        <form action="" method="post">
                                            <input type="hidden" name="curso_est" value="<?php echo $cursos['id'];?>">
                                            <button type="submit" name="action" value="delete_course" class="btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Ver">&#10060</button>
                                        </form>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                        <br>

                        <form action="" method="post">

                            <p>
                                <button class="btn btn-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#asignar-curso" aria-expanded="false"
                                        aria-controls="asignar-curso">
                                        + Asignar Curso
                                </button>
                            </p>
                            <div class="collapse" id="asignar-curso">

                                <div class="card">
                                    <div class="card-body">
                                        <div class="mb3">
                                            <div class="mb-3">

                                                <input type="hidden" id="estudiante" name="estudiante" value="<?php echo $id_estudiante?>">

                                                <label for="curso" class="form-label">Seleccione un curso:</label>
                                                <select class="form-select form-select-lg" name="curso" id="curso">
                                                    <option selected>Select one</option>
                                                    <?php foreach($listaCursos as $valores){?>    
                                                        <option value="<?php echo $valores['id'] ?>"><?php echo $valores['nombre_curso'] ?></option>;
                                                    <?php
                                                    }
                                                    ?>    
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <span>
                                            <button type="submit" name="action" value="assign_course" class="btn btn-info">Asignar</button>
                                        </span>    

                                    <br> 
                                    </div>
                                    
                                </div>
                                
                                <br> 
                            </div> 
                            
                        </form>
                    </div>
                    
                </div>


       
        
    </section>  

<br>
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
                            placeholder="Nombre" 
                            value="<?php echo $nombre_estudiante?>" disabled>
                            
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Apellido</label>
                        <input type="text"
                            class="form-control" 
                            name="apellido_estudiante" 
                            id="apellido_estudiante" 
                            aria-describedby="helpId" 
                            placeholder="Apellido" 
                            value="<?php echo $apellido_estudiante?>" disabled>
                            
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Documento de Identidad</label>
                        <input type="text"
                            class="form-control" 
                            name="documento_estudiante" 
                            id="documento_estudiante" 
                            aria-describedby="helpId" 
                            placeholder=""
                            value="<?php echo $documento_estudiante?>" disabled>
                            
                    </div>
                    <div class="mb-3">
                      <label for="" class="form-label">Afiliacion a Salud</label>
                      <select class="form-select" name="regimen_salud" id="regimen_salud" disabled>
                            <option selected><?php echo $regimen_salud?></option>                       
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">EPS</label>
                        <input type="text"
                            class="form-control" 
                            name="eps" 
                            id="eps" 
                            aria-describedby="helpId" 
                            placeholder="Nombre de la EPS"
                            value="<?php echo $eps?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Observaciones Médicas</label>
                        <input type="text"
                            class="form-control" 
                            name="observaciones_medicas" 
                            id="observaciones_medicas" 
                            aria-describedby="helpId" 
                            placeholder="Alergias, tratamientos o cualquier observación médica" 
                            value="<?php echo $observaciones_medicas?>" disabled> 
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
                            placeholder="Nombre"
                            value="<?php echo $nombre_acudiente?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Documento de Identidad</label>
                        <input type="text"
                            class="form-control" 
                            name="documento_acudiente" 
                            id="documento_acudiente" 
                            aria-describedby="helpId" 
                            placeholder=""
                            value="<?php echo $documento_acudiente?>" disabled>
                        
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Telefono</label>
                        <input type="number"
                            class="form-control" 
                            name="telefono" 
                            id="telefono" 
                            aria-describedby="helpId" 
                            placeholder="Numero de telefono"
                            value="<?php echo $telefono?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="email"
                            class="form-control" 
                            name="email" 
                            id="email" 
                            aria-describedby="helpId" 
                            placeholder="Email / Correo Electronico"
                            value="<?php echo $email?>" disabled>
                    </div>
            
                </div>
            </div>


</section>


<?php include("../templates/pie.php");?>