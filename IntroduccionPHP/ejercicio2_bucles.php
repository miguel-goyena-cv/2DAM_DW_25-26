<?php
    $nombres = ["Miguel", "Silvia", "Maria", "Iban", "Susana"];

    // Le añado un nombre al final
    $nombres[] = "David";
    // Otra posibilidad es utilizar las funciones de array API de array https://www.php.net/manual/en/ref.array.php
    array_push($nombres, "Ander");

    function pintarNombres($nombresPintar) {
        echo "<ul>\n";
        foreach ($nombresPintar as $nombre){
            echo "<li>$nombre</li>\n";
        }
        echo "</ul>\n";
    }
?>
<h1>Lista de nombres PHP</h1>
<?= pintarNombres($nombres) ?>