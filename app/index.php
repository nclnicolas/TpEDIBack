<?php include("./auxiliar/agregar.php")?>
<?php


error_reporting(-1);

ini_set('display_errors', 1);


use Psr\Http\Message\ResponseInterface as Response;

use Psr\Http\Message\ServerRequestInterface as Request;

use Psr\Http\Server\MiddlewareInterface;

use Psr\Http\Server\RequestHandlerInterface;

use Slim\Factory\AppFactory;

use Slim\Routing\RouteCollectorProxy;

use Slim\Routing\RouteContext;



require __DIR__ .'/../vendor/autoload.php';

require __DIR__ .'/accesoAdatos/accesoAdatos.php';

require __DIR__ . '/controllers/SociosControllers.php';

require __DIR__ . '/entidades/Socios.php';


// Instantiate App

$app = AppFactory::create();

// Add error middleware

$app->addErrorMiddleware(true, true, true);


$app->add(function (Request $request, RequestHandlerInterface $handler): Response {

    

    $response = $handler->handle($request);

    $requestHeaders = $request->getHeaderLine('Access-Control-Request-Headers');



    $response = $response->withHeader('Access-Control-Allow-Origin', '*');

    $response = $response->withHeader('Access-Control-Allow-Methods', 'get,post');

    $response = $response->withHeader('Access-Control-Allow-Headers', $requestHeaders);



    return $response;

});

$app->group('/register', function (RouteCollectorProxy $group) {


    $group->get('/user',function(Request $request, Response $response, array $args) { 
        
        $response->getBody()->write("register");?>
        <form method="POST">
            <label>nombre</label>
            <input type="text" name="Nombre">
            <label>apellido</label>
            <input type="text" name="Apellido">
            <label>email</label>
            <input type="email" name="E-mail">
            <label>dni</label>
            <input type="text" name="DNI">
            <label>nacionalidad</label>
            <input type="text" name="Nacionalidad">
            <label>fecha de nacimiento</label>
            <input type="date" name="FechadeNacimiento">
            <label>contraseña</label>
            <input type="password" name="Contrasena">
            <input type="submit" name="Cargar" value="Cargar Dato">
        </form>
        <?php
        
        return $response;

    });

});

$app->group('/Usuarios', function (RouteCollectorProxy $group) {


    $group->get('/loguin',function(Request $request, Response $response, array $args) { 
        
        $response->getBody()->write("Hello");
        
        return $response;

    });

   //La ñ no funciona

    $group->get('/loguin/{mail}/{contrasea}',\SociosControllers::class.':retornar_ingreso_socio');



    /*$group->post('/registrar'.\UsuariosController::class.':retornarEstadoRegistro');*/

});




$app->get('[/]',function(Request $request, Response $response, array $args) { 

    $response->getBody()->write("Nico putito");?>
    <a href="/register/user">register<a>
    <?php
    return $response;

});

// $app->setBasePath("http://localhost:3001");

if(isset($_POST["Cargar"])){
    echo "entro";
    $nombre=$_REQUEST['Nombre'];
    $apellido=$_REQUEST['Apellido'];
    $mail=$_REQUEST['E-mail'];
    $dni=$_REQUEST['DNI'];
    $nacionalidad=$_REQUEST['Nacionalidad'];
    $fechadenacimiento=$_REQUEST['FechadeNacimiento'];
    $contrasena=$_REQUEST['Contrasena'];

    
    agregarUser($nombre, $apellido, $mail, $dni, $nacionalidad, $fechadenacimiento, $contrasena);
}


$app->run();