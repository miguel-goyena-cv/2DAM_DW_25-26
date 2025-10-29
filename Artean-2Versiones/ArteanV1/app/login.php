
<?php
/**
 * @title: Proyecto integrador Ev01 - Acceso al sistema.
 * @description:  Script PHP para acceder al sistema
 *
 * @version    0.1
 *
 * @author ander_frago@cuatrovientos.org miguel_goyena@cuatrovientos.org
 */

require_once '../templates/header.php';
require_once '../persistence/DAO/UserDAO.php';

// Al pulsar el boton del formulario se recarga la misma página, volviendo a ejecutar este script.
// En caso de que se haya  completado los valores del formulario se verifica la existencia de usuarios en la base de datos
// para los valores introducidos.
$error = "";
if (isset($_POST['user']))
{
  $user = $_POST['user'];
  $pass = $_POST['pass'];
  
  if ($user == "" || $pass == "")
      $error = "Debes completar todos los campos<br>";
  else
  {
    
    $userDao = new UserDAO();
    $existeUsuario = $userDao->checkExists($user, $pass);
    if (!$existeUsuario)
    {
      $error = "<span class='error'>Email/Contraseña invalida</span><br><br>";
    }
    else
    {
      SessionHelper::setSession($user);
        
      header('Location: ../index.php');
    }
  }
}
else if (SessionHelper::loggedIn()){
    header('Location: ../index.php');  
}
?>
<div class="container">
  <form class="form-horizontal" role="form" method="POST" action="login.php">
          <div class="row">
              <div class="col-md-3"></div>
              <div class="col-md-6">
                  <h2>Introduzca detalles del acceso</h2>
                  <hr>
              </div>
          </div>
          <div class="row">
              <div class="col-md-3"></div>
              <div class="col-md-6">
                  <div class="form-group has-danger">
                      <label class="sr-only" for="email">Email:</label>
                      <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                          <div class="input-group-addon" style="width: 2.6rem"></div>
                          <input type="text" name="user" class="form-control" id="email"
                                 placeholder="yoxti@ejemplo.com" required autofocus>
                      </div>
                  </div>
              </div>
              <div class="col-md-3">
                  <div class="form-control-feedback">
                      <span class="text-danger align-middle">
                          <i class="fa fa-close"></i>  <?php  echo $error  ?>
                      </span>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-md-3"></div>
              <div class="col-md-6">
                  <div class="form-group">
                      <label class="sr-only" for="pass">Contraseña:</label>
                      <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                          <div class="input-group-addon" style="width: 2.6rem"></div>
                          <input type="password" name="pass" class="form-control" id="password"
                                 placeholder="Contraseña" required>
                      </div>
                  </div>
              </div>
              <div class="col-md-3">
                  <div class="form-control-feedback">
                      <span class="text-danger align-middle">
                      <?php echo $error ?>
                      </span>
                  </div>
              </div>
          </div>
          <div class="row" style="padding-top: 1rem">
              <div class="col-md-3"></div>
              <div class="col-md-6">
                  <button type="submit" class="btn btn-success"><i class="fa fa-sign-in"></i> Acceder</button>
              </div>
          </div>
      </form>
  </div>