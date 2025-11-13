<?php
/*
 * Proyecto integrador Artean - Bolsa de empleo
 * Cuatrovientos - 2º DAM - Desarrollo Web & Interfaces Web 
 * Aplicación PHP MVC: Crud
 * 
 * @version    0.4
 * @author     Cuatrovientos
*/

// Analize session
require_once('utils/SessionUtils.php');
// Redirects to login page in public views or private views
if(SessionUtils::loggedIn())
{
    // User has already been logged
    header("Location: app/private/views/index.php");
}
else
{
    // Not logged yet, anonimous access
    header("Location: app/public/views/index.php");
}
?>
