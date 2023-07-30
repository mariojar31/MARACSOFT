<?php include("../templates/cabecera.php");?>
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
<div></div>
<div class="col-md-5">
<form action="" method="post">
    <div class="card">
        <div class="card-header">
        Cursos
        </div>
        <div class="card-body">
        <div class="mb-3">
                <label for="" class="form-label">ID</label>
                <input type="text"
                    class="form-control" 
                    name="id" 
                    id="id" 
                    value="<?php echo $id?>"
                    aria-describedby="helpId" 
                    placeholder="ID">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Nombre Curso</label>
                <input type="text"
                    class="form-control" 
                    name="nombre_curso" 
                    value="<?php echo $nombre_curso?>"
                    id="nombre_curso" 
                    aria-describedby="helpId" 
                    placeholder="Curso">
            </div>
            <div class="btn-group" role="group" aria-label="">
                <button type="submit" name="action" value="add" class="btn btn-success">Agregar</button>
                <button type="submit" name="action" value="edit" class="btn btn-warning">Modificar</button>
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
                <?php foreach($listaCursos as $curso){?>                
                    <tr class="">
                        <td scope="row"><?php echo $curso['id'] ?></td>
                        <td><?php echo $curso['nombre_curso'] ?></td>
                        <td>
                            <div class="d-flex p-2">
                                <form action="" method="post">
                                    <input type="hidden" name="id" value="<?php echo $curso['id'];?>">
                                    <input name="action" id="" class="btn btn-info" type="submit" value="select">
                                </form>
                                <form action="vista_curso_select.php" method="get">
                                    <input type="hidden" id="id_curso" name="id_curso" value="<?php echo $curso['id']; ?>">
                                    <input type="hidden" id="nombre_curso" name="nombre_curso" value="<?php echo $curso['nombre_curso']; ?>">
                                    <button type="submit" name="" class="btn">&#128269</button>
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