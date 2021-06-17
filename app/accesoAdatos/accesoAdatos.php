<?php



class accesoAdatos{

    private static $obj_BD;

    private $objetoPDO;

    

    private function __construct(){

    $host = 'localhost';  //Donde esta el host
    $usuario = 'root';    //nombre de usuario que por defecto es root
    $clave = '';      //contraseña que por defecto es root
    $BD = 'usuarios';     //nombre de nuestra base de datos

    $puerto = 5532;


    $dsn = "pgsql:host=" . $host . ";port=" . $puerto . ";dbname=" . $BD . ";user=" . $usuario . ";password=" . $clave . ";";

        try {

            $this->objetoPDO = new PDO($dsn, $usuario, $clave, 

                   array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

         

        } catch (PDOException $e) {

            print "Error: " . $e->getMessage();

            die();

        }

    }

    



    public static function obtenerConexionBD(){

        if(!isset(self::$obj_BD)){

            self::$obj_BD=new accesoAdatos();

        }

        return self::$obj_BD;

    }





    public function prepararConsulta($sql){

        return $this->objetoPDO->prepare($sql);

    }




}