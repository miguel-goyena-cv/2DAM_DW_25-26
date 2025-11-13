<?php
//Es necesario que importemos los ficheros creados con anterioridad porque los vamos a utilizar desde este fichero.
require_once(dirname(__FILE__) . '\..\..\..\..\persistence\DAO\OfferDAO.php');
require_once(dirname(__FILE__) . '\..\..\..\models\Offer.php');
// Analize session
require_once(dirname(__FILE__) . '\..\..\..\..\utils\SessionUtils.php');
//Compruebo que me llega por GET el parámetro
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    //Creamos un objeto OfferDAO para hacer las llamadas a la BD
    $offerDAO = new OfferDAO();
    $offer = $offerDAO->selectById($id);
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Artean</title>
        <!-- Bootstrap Core CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    </head>
    <body>
         <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="../../../../index.php"><img src="../../../../assets/img/small-logo.png" alt="" ></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <?php
                if (SessionUtils::loggedIn())
                {
                ?>
                 <ul class="navbar-nav ">
                    <li class="nav-item ">
                        <a  class="nav-link " href="contact.php">Contactar</a>
                    </li>
                    <li class="nav-item">
                        <a  class="nav-link " href="../../public/views/user/logout.php">Salir</a>
                    </li>
                </ul>
                <?php
                    $loggedin = true;
                    echo "<span class='badge badge-success  '> Has iniciado sesión: " . $_SESSION['user'] . "</span>";
                }
                else
                {
                ?>   
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a  class="nav-link " href="user/signup.php">Registrarse</a>
                    </li>
                    <li class="nav-item">
                        <a  class="nav-link " href="contact.php">Contactar</a>
                    </li>
                    <li class="nav-item ">

                    </li>
                </ul>
                <?php
                     $loggedin = false;
                    // En caso de no estar registrado redirigimos a la visualización pública
                    echo " <span class='badge badge-danger mr-2'> regístrate o inicia sesión.</span>";
                }
                ?>
            </div>  
        </nav>
        <!-- Page Content -->
        <div class="container">
            <div class="card" >
                <div class="card-block">
                    <h2 class="card-title"> <?php  
                            echo (isset($_GET["id"])? $offer->getCompany() : "") ;                    
                     ?></h2>
                    <i class=" card-text description"> <?php 
                            echo (isset($_GET["id"])? $offer->getPosition() : "") ;    
                    ?></i>  
                    <p class=" card-text description"> <?php 
                            echo (isset($_GET["id"])? $offer->getFunction() : "") ;    
                    ?></p>  
                </div>
                <?php  
                if($loggedin)
                {
                ?>
                
                <div  class=" btn-group card-footer" role="group">
                    <a type="button" class="btn btn-success" href="edit.php?id=<?php 
                            echo (isset($_GET["id"])? $offer->getIdOffer() : "") ;    
                    ?><">Modificar</a> 
                    <a type="button" class="btn btn-danger" href="../../../controllers/offer/deleteController.php?id=<?php 
                            echo (isset($_GET["id"])? $offer->getIdOffer() : "") ;    
                    ?><?>">Borrar</a> 
                </div>
                
                <?php
                }?>
            </div>
            <!-- Footer -->
            <footer>
                <div class="row">
                    <div class="col-lg-12">
                        <p>Copyright &copy; Cuatrovientos 2024</p>
                    </div>
                </div>
            </footer>
        </div>
        <!-- /.container -->
        <!-- Java Script Boostrap-->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

    </body>
</html>


