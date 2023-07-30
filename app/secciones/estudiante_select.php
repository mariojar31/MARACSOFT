<?php 

include_once '../configuraciones/bd.php';
$conexionBD=BD::crearInstancia();

$id_estudiante=isset($_GET['id_estudiante'])?$_GET['id_estudiante']:'';
$nombre_estudiante=isset($_POST['nombre_estudiante'])?$_POST['nombre_estudiante']:'';
$apellido_estudiante=isset($_POST['apellido_estudiante'])?$_POST['apellido_estudiante']:'';
$documento_estudiante=isset($_POST['documento_estudiante'])?$_POST['documento_estudiante']:'';
$regimen_salud=isset($_POST['regimen_salud'])?$_POST['regimen_salud']:'';
$eps=isset($_POST['eps'])?$_POST['eps']:'';
$observaciones_medicas=isset($_POST['observaciones_medicas'])?$_POST['observaciones_medicas']:'';
$nombre_acudiente=isset($_POST['nombre_acudiente'])?$_POST['nombre_acudiente']:'';
$documento_acudiente=isset($_POST['documento_acudiente'])?$_POST['documento_acudiente']:'';
$telefono=isset($_POST['telefono'])?$_POST['telefono']:'';
$email=isset($_POST['email'])?$_POST['email']:'';
$action=isset($_GET['action'])?$_GET['action']:'';
$tipo_busqueda=isset($_POST['tipo_busqueda'])?$_POST['tipo_busqueda']:'';


if($action=='select'){
    $sql="SELECT * FROM estudiantes WHERE id=:id_estudiante";
    $consulta=$conexionBD->prepare($sql);
    $consulta->bindParam(':id_estudiante',$id_estudiante);
    $consulta->execute();
    $estudiante=$consulta->fetch(PDO::FETCH_ASSOC);
    $nombre_estudiante=$estudiante['nombre_estudiante'];
    $apellido_estudiante=$estudiante['apellido_estudiante'];
    $documento_estudiante=$estudiante['documento_estudiante'];
    $regimen_salud=$estudiante['regimen_salud'];
    $eps=$estudiante['eps'];
    $observaciones_medicas=$estudiante['observaciones_medicas'];
    $nombre_acudiente=$estudiante['nombre_acudiente'];
    $documento_acudiente=$estudiante['documento_acudiente'];
    $telefono=$estudiante['telefono'];
    $email=$estudiante['email'];

}


class FUN{
    public static function consultar($id_curso){
        $consulta_escur=BD::crearInstancia()->prepare("SELECT * FROM cursos WHERE id = $id_curso");
        $consulta_escur->execute();
        $escur=$consulta_escur->fetchAll();
        
        return $escur;
    }

    public static function consultar_cursos($id_estudiante){
        $consulta_escur=BD::crearInstancia()->prepare("SELECT * FROM alumnos_cursos WHERE id_estudiante = $id_estudiante");
        $consulta_escur->execute();
        $es_cur=$consulta_escur->fetchAll();
        return $es_cur;
    }

}



?>



