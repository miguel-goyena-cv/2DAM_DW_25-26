<?php
// hello_world_table.php
// Pequeño script PHP que muestra "Hello World" dentro de una tabla HTML.

$greeting = "Hello World!!!";
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hello World - Tabla PHP</title>
</head>
<body>
  <?php
    // Imprime una tabla con una sola celda que contiene el saludo
    echo "<h1>" . $greeting . "</h1>";
  ?>
</body>
</html>