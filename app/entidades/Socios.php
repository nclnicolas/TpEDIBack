<?php



    class Socios{

        public $mail;

        public $nombre;

        public $apellido;

        public $dni;

        public $nacionalidad;

        public $fechadenacimiento;

        public $contraseña;



        

        public static function ingreso_socio($email,$contraseña){

            $accesoAdatos=accesoAdatos::obtenerConexionBD(); 

            $mail="'".$mail."'";

            $contraseña="'".$contraseña."'"; 
            

            $consulta=$accesoAdatos->prepararConsulta("SELECT * FROM Socios WHERE email=$mail AND contraseña=$contraseña");

            $consulta->execute();

            return $consulta->fetchAll(PDO::FETCH_CLASS,'Socios');

        }




        

        public static function obtenerSocios(){

            $accesoAdatos=accesoAdatos::obtenerConexionBD(); 

            $consulta=$accesoAdatos->prepararConsulta('SELECT * FROM Socios');

            $consulta->execute();

            return $consulta->fetchAll(PDO::FETCH_CLASS,'Socios');

        }



        

 



    }

?>