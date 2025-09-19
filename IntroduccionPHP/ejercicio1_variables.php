<?php
    $nombre = "Miguel Goyena";
    $edad = 45;

    $mensajeEdad = "";
    define("MAYORIA_EDAD", 18);
    if ($edad >= MAYORIA_EDAD){
        $mensajeEdad = "Soy mayor de edad";
    }
    else{
        $mensajeEdad = "Soy menor de edad";
    }
    // Otra posibilidad con un ternario
    // $mensajeEdad = ($edad >= MAYORIA_EDAD) ? "Soy mayor de edad" : "Soy menor de edad";

?>
<h1>Bienvenido a mi sitio web en PHP</h1>
<h2>Soy <?= $nombre ?> y tengo <?= $edad ?> años</h2>
<h2><?php echo $mensajeEdad ?></h2>