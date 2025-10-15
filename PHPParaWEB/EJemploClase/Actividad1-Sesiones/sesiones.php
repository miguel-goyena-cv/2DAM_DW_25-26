<!DOCTYPE html>
<html>
<head>
    <title>Gestión de Sesiones en PHP</title>
</head>
<body>

    <h1>Gestión de Sesiones y Archivos en PHP</h1>

<?php
    // Iniciar una sesión
    session_start();
    $usuarioConSesion = false;

    // Comprobar si se ha enviado un nombre
    if (isset($_POST['accion']) && $_POST['accion'] == "guardar") {
        $nombre = $_POST['nombre'];

        // Guardar el nombre en una variable de sesión
        $_SESSION['nombre'] = $nombre;
    }
    else if (isset($_POST['accion']) && $_POST['accion'] == "borrar"){
        // Borramos la session
        unset($_SESSION['nombre']);
    }

    $usuarioConSesion = isset($_SESSION['nombre']);
    if ($usuarioConSesion ){
        echo "<p>¡Hola, $nombre! Tu nombre esta en sesion.</p>";
    }
?>
    <form method="post" action="">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre">
        <input type="hidden" name="accion" value="guardar">
        <input type="submit" value="Guardar Nombre">
    </form>
    <form method="post" action="" <?= !$usuarioConSesion ? 'style="display:none;"' : '' ?>>
        <input type="hidden" name="accion" value="borrar">
        <input type="submit" value="Borrar Sesion">
    </form>
</body>
</html>
