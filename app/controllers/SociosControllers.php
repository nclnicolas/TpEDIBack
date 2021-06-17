<?php



class UsuariosController{

    
    

    

    public function retornar_ingreso_socio($request,$response,$args){

        $array=Socios::ingreso_socio($args['Socios'],$args['contrasea']);

        $response->getBody()->write(json_encode($array));

        return $response;

    }



    public static function retornar_obtenerSocios($request,$response,$args){

        $Socios=Socios::obtenerSocios();

        $response->getBody()->write(json_encode($Socios));

        return $response->withHeader('Content-type','application/json');

    }



    




}