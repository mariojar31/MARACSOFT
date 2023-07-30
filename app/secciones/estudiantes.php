<?php 

include_once '../configuraciones/bd.php';
$conexionBD=BD::crearInstancia();

$criterio_busqueda=isset($_POST['busqueda'])?$_POST['busqueda']:'';
$id_estudiante=isset($_POST['id_estudiante'])?$_POST['id_estudiante']:'';
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
$action=isset($_POST['action'])?$_POST['action']:'';
$tipo_busqueda=isset($_POST['tipo_busqueda'])?$_POST['tipo_busqueda']:'';


if($action){

    switch($action){
        case 'adds':
            $sql="INSERT INTO estudiantes (id, nombre_estudiante, apellido_estudiante, documento_estudiante, regimen_salud, eps, observaciones_medicas, nombre_acudiente, documento_acudiente, telefono, email) VALUES (NULL, :nombre_estudiante, :apellido_estudiante, :documento_estudiante, :regimen_salud, :eps, :observaciones_medicas, :nombre_acudiente, :documento_acudiente, :telefono, :email)";
            $consulta=$conexionBD->prepare($sql);
            $consulta->bindParam(':nombre_estudiante',$nombre_estudiante);
            $consulta->bindParam(':apellido_estudiante',$apellido_estudiante);
            $consulta->bindParam(':documento_estudiante',$documento_estudiante);
            $consulta->bindParam(':regimen_salud',$regimen_salud);
            $consulta->bindParam(':eps',$eps);
            $consulta->bindParam(':observaciones_medicas',$observaciones_medicas);
            $consulta->bindParam(':nombre_acudiente',$nombre_acudiente);
            $consulta->bindParam(':documento_acudiente',$documento_acudiente);
            $consulta->bindParam(':telefono',$telefono);
            $consulta->bindParam(':email',$email);
            $consulta->execute();
           
            $busqueda=$conexionBD->prepare('SELECT * FROM estudiantes');
            $busqueda->execute();
            $estudiantesBuscados=$busqueda->fetchAll();

            header('location:vista_estudiantes.php');
            
        break;

        case 'edits':
            $sql="UPDATE estudiantes SET nombre_estudiante = :nombre_estudiante, apellido_estudiante = :apellido_estudiante WHERE estudiantes.id = :id_estudiante";
            $consulta=$conexionBD->prepare($sql);
            $consulta->bindParam(':id_estudiante',$id_estudiante);
            $consulta->bindParam(':nombre_estudiante',$nombre_estudiante);
            $consulta->bindParam(':apellido_estudiante',$apellido_estudiante);
            $consulta->execute();
        break;

        case 'deletes':
            $sql="DELETE FROM estudiantes WHERE id=:id_estudiante;";
            $consulta=$conexionBD->prepare($sql);
            $consulta->bindParam(':id_estudiante',$id_estudiante);
            $consulta->execute();

            $busqueda=$conexionBD->prepare('SELECT * FROM estudiantes');
            $busqueda->execute();
            $estudiantesBuscados=$busqueda->fetchAll();
        break;

        // case 'select':
        //      $sql="SELECT * FROM estudiantes WHERE id=:id_estudiante";
        //      $consulta=$conexionBD->prepare($sql);
        //      $consulta->bindParam(':id_estudiante',$id_estudiante);
        //      $consulta->execute();
        //      $estudiante=$consulta->fetch(PDO::FETCH_ASSOC);
        //      $nombre_estudiante=$estudiante['nombre_estudiante'];
        //      $apellido_estudiante=$estudiante['apellido_estudiante'];
        //      $documento_estudiante=$estudiante['documento_estudiante'];
        //      $regimen_salud=$estudiante['regimen_salud'];
        //      $eps=$estudiante['eps'];
        //      $observaciones_medicas=$estudiante['observaciones_medicas'];
        //      $nombre_acudiente=$estudiante['nombre_acudiente'];
        //      $documento_acudiente=$estudiante['documento_acudiente'];
        //      $telefono=$estudiante['telefono'];
        //      $email=$estudiante['email'];

        // break;

        case 'buscars':

            if($tipo_busqueda=='id_estudiante'){
                if(is_numeric($criterio_busqueda)){
                    $sql="SELECT * FROM estudiantes WHERE id = $criterio_busqueda ";
                }else{
                    $sql="SELECT * FROM estudiantes WHERE id = '' ";
                }
                
            } elseif($tipo_busqueda=='nombre_estudiante'){
                $sql="SELECT * FROM estudiantes WHERE nombre_estudiante LIKE '%$criterio_busqueda%'";
            }elseif($tipo_busqueda=='apellido_estudiante'){
                $sql="SELECT * FROM estudiantes WHERE apellido_estudiante LIKE '%$criterio_busqueda%'";
            }elseif($tipo_busqueda=='doc_estudiante'){
                $sql="SELECT * FROM estudiantes WHERE documento_estudiante LIKE '%$criterio_busqueda%'";
            }else{
                $sql="SELECT * FROM estudiantes";
            }
            // $sql="SELECT * FROM estudiantes WHERE id = $criterio_busqueda OR nombre_estudiante LIKE '%$criterio_busqueda%' OR apellido_estudiante LIKE '%$criterio_busqueda%' OR documento_estudiante LIKE '%$criterio_busqueda%'";

            if($criterio_busqueda=='' | $criterio_busqueda==NULL){
                $criterio_busqueda='0';
            }

            $busqueda=$conexionBD->prepare($sql);
            // $busqueda->bindParam(':criterio_busqueda',$criterio_busqueda);
            $busqueda->execute();
            $estudiantesBuscados=$busqueda->fetchAll();
            // echo $sql;
            
        break;
    }
}
else{
    $busqueda=$conexionBD->prepare('SELECT * FROM estudiantes');
    $busqueda->execute();
    $estudiantesBuscados=$busqueda->fetchAll();
}
    





?>