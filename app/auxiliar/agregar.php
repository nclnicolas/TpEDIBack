<?php

function agregarUser($nombre, $apellido, $mail, $dni, $nacionalidad, $fechadenacimiento, $contrasena){

    $link='mysql:host=localhost;dbname=usuarios';
    $usuario='root';
    $pass='';
    
    try {
        $pdo = new PDO($link, $usuario, $pass);
    
        $stmt=$pdo->prepare("INSERT INTO socios (nombre, apellido, mail, dni, nacionalidad, fechadenacimiento, contrasena) VALUES (:nombre, :apellido, :mail, :dni, :nacionalidad, :fechadenacimiento, :contrasena)");
    
        $stmt->bindParam(':nombre' , $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':mail' , $mail);
        $stmt->bindParam(':dni' , $dni);
        $stmt->bindParam(':nacionalidad' , $nacionalidad);
        $stmt->bindParam(':fechadenacimiento' , $fechadenacimiento);
        $stmt->bindParam(':contrasena' , $contrasena);
    
        //Execute
        $stmt->execute(); ?>
        <h5 style="color: aliceblue;"> <?php echo $nombre, $apellido, $mail,$dni,$nacionalidad,$fechadenacimiento,$contrasena?> </h5>
    
        <?php
    
        $pdo = null;
    
    }catch (PDOException $e) {
        print "¡Error!: " . $e->getMessage() . "<br/>";
        die();
    }
    
}
?>