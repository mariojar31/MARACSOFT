<?php include("../templates/cabecera.php");?>
<?php include("../secciones/estudiantes.php");?>
<div></div>
<div class="col-md-5">
<form action="" method="post">
    <div class="card">
        <div class="card-header">
        Estudiantes
        </div>
        <div class="card-body">
        <div class="mb-3">
                <label for="" class="form-label">ID</label>
                <input type="text"
                    class="form-control" 
                    name="id_estudiante" 
                    id="id_estudiante" 
                    value="<?php echo $id_estudiante?>"
                    aria-describedby="helpId" 
                    placeholder="ID">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Nombre</label>
                <input type="text"
                    class="form-control" 
                    name="nombre_estudiante" 
                    value="<?php echo $nombre_estudiante?>"
                    id="nombre_estudiante" 
                    aria-describedby="helpId" 
                    placeholder="Nombre">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Apellido</label>
                <input type="text"
                    class="form-control" 
                    name="apellido_estudiante" 
                    value="<?php echo $apellido_estudiante?>"
                    id="apellido_estudiante" 
                    aria-describedby="helpId" 
                    placeholder="Apellido">
            </div>
            <div class="btn-group" role="group" aria-label="">
                <button type="submit" name="action" value="add" class="btn btn-success">Agregar</button>
                <button type="submit" name="action" value="edit" class="btn btn-warning">Editar</button>
                <button type="submit" name="action" value="delete" class="btn btn-danger">Borrar</button>
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
                    <th scope="col">Nombre</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($listaEstudiantes as $estudiante){?>                
                    <tr class="">
                        <td scope="row"><?php echo $estudiante['id'] ?></td>
                        <td><?php echo $estudiante['nombre_estudiante'];echo ' ';echo $estudiante['apellido_estudiante'] ?></td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="id_estudiante" value="<?php echo $estudiante['id'];?>">
                                <input name="action" id="" class="btn btn-info" type="submit" value="select">
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    
</div>






<?php include("../templates/pie.php");?>