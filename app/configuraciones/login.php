<?php
session_start();
include_once 'bd.php';
$conexionBD=BD::crearInstancia();

$user= isset($_POST["user"])?$_POST["user"]:'';
$password=isset($_POST["password"])?$_POST["password"]:'';
$loginbtn=isset($_POST['loginbtn'])?$_POST['loginbtn']:'';



if ($loginbtn){

    switch($loginbtn){
        case 'singin':
            $sql="SELECT * FROM login WHERE user=:user AND psw=:password";
            $consulta=$conexionBD->prepare($sql);
            $consulta->bindParam(':user',$user);
            $consulta->bindParam(':password',$password);
            $consulta->execute();
            $usuario=$consulta->fetchAll(); 
            
            if(empty($usuario)){
                echo '<div class="alert alert-danger">Usuario o contraseñas invalidos</div>';
               
            }else{
                $_SESSION["user"]=$user;
                header("location:secciones/home.php");
            }
            
        break;
    }
    
}else{
    echo '<small class="alert alert-light">Ingrese sus datos de inicio de sesión:</small>';
}












// if (!empty($_POST["login-btn"])){
//     if (empty($_POST["user"]) and empty($_POST["password"])){
//         echo "LOS CAMPOS ESTAN VACIOS";
//     }else{
        
//         $sql=$login_conexion->query("SELECT * FROM login WHERE user="$usuario" and pwd="$password"");
//         if ($datos=$sql->fetch_object()){
//             header("location:secciones/home.php");
//         }else{
//             echo 'Acceso denegado';
//         }

//     }
// }



?>