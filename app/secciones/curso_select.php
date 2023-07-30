<?php 

include_once '../configuraciones/bd.php';
$conexionBD=BD::crearInstancia();

$id_curso=isset($_GET['id_curso'])?$_GET['id_curso']:'';
$nombre_curso=isset($_GET['nombre_curso'])?$_GET['nombre_curso']:'';
$count=0;


$sql="SELECT * FROM alumnos_cursos WHERE id_curso = :id_curso";
$consulta=$conexionBD->prepare($sql);
$consulta->bindParam(':id_curso',$id_curso);
$consulta->execute();


while ($estudiantes=$consulta->fetch()){

    $id_estudiante1=$estudiantes['id_estudiante'];

    $sql="SELECT * FROM estudiantes WHERE id=:id_estudiante";
    $enlazar=$conexionBD->prepare($sql);
    $enlazar->bindParam(':id_estudiante',$id_estudiante1);
    $enlazar->execute();
    $estudiantes=$enlazar->fetchAll();

    $listado_estudiantes[]=$estudiantes;
}

class FUN{
    public static function print_lista_curso($id_curso){

        include_once '../configuraciones/bd.php';
        $conexionBD=BD::crearInstancia();
        $count=0;


        $sql="SELECT * FROM alumnos_cursos WHERE id_curso = :id_curso";
        $consulta=$conexionBD->prepare($sql);
        $consulta->bindParam(':id_curso',$id_curso);
        $consulta->execute();


        while ($estudiantes=$consulta->fetch()){

            $id_estudiante1=$estudiantes['id_estudiante'];

            $sql="SELECT * FROM estudiantes WHERE id=:id_estudiante";
            $enlazar=$conexionBD->prepare($sql);
            $enlazar->bindParam(':id_estudiante',$id_estudiante1);
            $enlazar->execute();
            $estudiantes=$enlazar->fetchAll();

            $listado_estudiantes[]=$estudiantes;
        }


        return $listado_estudiantes;
    }
}






?>