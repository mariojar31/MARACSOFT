<?php 
class BD{
    public static $instancia=null;
    public static function crearInstancia(){
        include_once 'cnfg.php';

        if(!isset(self::$instancia)){
            $opciones[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
            self::$instancia = new PDO('mysql:host=sql10.freemysqlhosting.net;port=3306;dbname=sql10635487',$userbd,$psswbd,$opciones);
            // echo "Conectado...";
        }
        return self::$instancia;
    }

}
?>