<?php 

include_once '../configuraciones/bd.php';
$conexionBD=BD::crearInstancia();

$id_estudiante=isset($_POST['id_estudiante'])?$_POST['id_estudiante']:'';
$nombre_estudiante=isset($_POST['nombre_estudiante'])?$_POST['nombre_estudiante']:'';
$apellido_estudiante=isset($_POST['apellido_estudiante'])?$_POST['apellido_estudiante']:'';
$action=isset($_POST['action'])?$_POST['action']:'';

if($action){

    switch($action){
        case 'add':
            $sql="INSERT INTO estudiantes (id, nombre_estudiante, apellido_estudiante) VALUES (NULL, :nombre_estudiante,:apellido_estudiante)";
            $consulta=$conexionBD->prepare($sql);
            $consulta->bindParam(':nombre_estudiante',$nombre_estudiante);
            $consulta->bindParam(':apellido_estudiante',$apellido_estudiante);
            $consulta->execute();
        break;

        case 'edit':
            $sql="UPDATE estudiantes SET nombre_estudiante = :nombre_estudiante, apellido_estudiante = :apellido_estudiante WHERE estudiantes.id = :id_estudiante";
            $consulta=$conexionBD->prepare($sql);
            $consulta->bindParam(':id_estudiante',$id_estudiante);
            $consulta->bindParam(':nombre_estudiante',$nombre_estudiante);
            $consulta->bindParam(':apellido_estudiante',$apellido_estudiante);
            $consulta->execute();
        break;

        case 'delete':
            $sql="DELETE FROM estudiantes WHERE id=:id_estudiante;";
            $consulta=$conexionBD->prepare($sql);
            $consulta->bindParam(':id_estudiante',$id_estudiante);
            $consulta->execute();
        break;

        case 'select':
            $sql="SELECT * FROM estudiantes WHERE id=:id_estudiante";
            $consulta=$conexionBD->prepare($sql);
            $consulta->bindParam(':id_estudiante',$id_estudiante);
            $consulta->execute();
            $estudiante=$consulta->fetch(PDO::FETCH_ASSOC);
            $nombre_estudiante=$estudiante['nombre_estudiante'];
            $apellido_estudiante=$estudiante['apellido_estudiante'];
        break;
    }
}


$consulta=$conexionBD->prepare("SELECT * FROM estudiantes");
$consulta->execute();
$listaEstudiantes=$consulta->fetchAll();

?>