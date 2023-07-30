<?php 
// INSERT INTO `cursos` (`id`, `nombre_curso`) VALUES (NULL, 'My SQL');
// UPDATE `cursos` SET `nombre_curso` = 'My SQL - PHP' WHERE `cursos`.`id` = 1;
include_once '../configuraciones/bd.php';
$conexionBD=BD::crearInstancia();

$id=isset($_POST['id'])?$_POST['id']:'';
$nombre_curso=isset($_POST['nombre_curso'])?$_POST['nombre_curso']:'';
$action=isset($_POST['action'])?$_POST['action']:'';

if($action){

    switch($action){
        case 'add':
            $sql="INSERT INTO cursos (id, nombre_curso) VALUES (NULL, :nombre_curso)";
            $consulta=$conexionBD->prepare($sql);
            $consulta->bindParam(':nombre_curso',$nombre_curso);
            $consulta->execute();
            header('location:vista_cursos.php');
        break;

        case 'edit':
            $sql="UPDATE cursos SET nombre_curso = :nombre_curso WHERE cursos.id = :id";
            $consulta=$conexionBD->prepare($sql);
            $consulta->bindParam(':id',$id);
            $consulta->bindParam(':nombre_curso',$nombre_curso);
            $consulta->execute();
        break;

        case 'delete':
            $sql="DELETE FROM cursos WHERE id=:id;";
            $consulta=$conexionBD->prepare($sql);
            $consulta->bindParam(':id',$id);
            $consulta->execute();
        break;

        case 'select':
            $sql="SELECT * FROM cursos WHERE id=:id";
            $consulta=$conexionBD->prepare($sql);
            $consulta->bindParam(':id',$id);
            $consulta->execute();
            $curso=$consulta->fetch(PDO::FETCH_ASSOC);
            $nombre_curso=$curso['nombre_curso'];

        break;

    }
}

$consulta=$conexionBD->prepare("SELECT * FROM cursos");
$consulta->execute();
$listaCursos=$consulta->fetchAll();

?>