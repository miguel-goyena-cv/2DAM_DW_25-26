<?php

    //define("TITULO", "Calculadora de Suma en PHP");

    $resultado = null;
    $errores = false;

    // Si viene del POST entonces validamos y hacemos operacion
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        //Aqui recoge los parametros del post y validamos
        //var_dump($_POST);
        if (isset($_POST["operando1"]) && isset($_POST["operando2"]) && !empty($_POST['operando1']) && !empty($_POST['operando2'])){
            $operando1 = $_POST["operando1"];
            $operando2 = $_POST["operando2"];
            $resultado = $operando1 + $operando2;
        }
        else{
            $errores = true;
        }

    }

?>
<html>

<head>
    <title>Calculadora de Suma en PHP</title>
</head>

<body>
    <form method="POST" action="calculadora.php">
        Operando 1<br>
        <input type="text" name="operando1"><br>
        Operando 2<br>
        <input type="text" name="operando2"><br><br>
        <input type="submit" value="suma">
    </form>
    <?php 
        if (isset($resultado)){
            echo "<p>El resultado es: $resultado</p>";
        }
        if ($errores){
            echo '<p>Los campos del formulario son incorrectos</p>';
        }
    ?>
</body>

</html>