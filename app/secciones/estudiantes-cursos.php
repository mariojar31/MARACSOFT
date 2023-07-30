<?php 
include_once '../configuraciones/bd.php';
$conexionBD=BD::crearInstancia();
$curso_est=isset($_POST['curso_est'])?$_POST['curso_est']:'';
$action=isset($_POST['action'])?$_POST['action']:'';
$estudiante=isset($_POST['estudiante'])?$_POST['estudiante']:'';
$curso=isset($_POST['curso'])?$_POST['curso']:'';



if($action){

    switch($action){
        case 'assign_course':
            $sql="INSERT INTO alumnos_cursos (id_estudiante, id_curso) VALUES (:estudiante,:curso)";
 
            $consulta=$conexionBD->prepare($sql);
            $consulta->bindParam(':estudiante',$estudiante);
            $consulta->bindParam(':curso',$curso);
            $consulta->execute();
              
        break;

        case 'delete_course':
            $sql="DELETE FROM alumnos_cursos WHERE id = :id_cursest";
            $consulta=$conexionBD->prepare($sql);
            $consulta->bindParam(':id_cursest',$curso_est);
            $consulta->execute();
        break;
        }
    }


// else{
//     $consulta_escur=$conexionBD->prepare("SELECT * FROM alumnos_cursos WHERE id_estudiante = :estudiante");
//     $consulta->bindParam(':estudiante',$estudiante);
//     $consulta_escur->execute();
//     $es_cur=$consulta_escur->fetchAll();
// }


$consulta=$conexionBD->prepare("SELECT * FROM cursos");
$consulta->execute();
$listaCursos=$consulta->fetchAll();

?>