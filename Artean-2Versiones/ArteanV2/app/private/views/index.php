<?php
//Es necesario que importemos los ficheros creados con anterioridad porque los vamos a utilizar desde este fichero.
require_once(dirname(__FILE__) . '/../../controllers/offer/OfferController.php');
//Recupero de la BD todos los empleos a través del controlador
$offerController = new OfferController;
$offers = $offerController->readAction();
// Gestión de sesión
require_once(dirname(__FILE__) . '/../../../utils/SessionUtils.php');
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
            <a class="navbar-brand" href="#"><img src="../../../assets/img/small-logo.png" alt="" ></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ">
                    <li class="nav-item ">
                        <a  class="nav-link " href="../../public/views/contact.php">Contactar</a>
                    </li>
                    <li class="nav-item">
                        <a  class="nav-link " href="../../public/views/user/logout.php">Salir</a>
                    </li>
                </ul>
                <?php
                if (SessionUtils::loggedIn())
                    echo "<span class='badge badge-success  '> Has iniciado sesión: " . $_SESSION['user'] . "</span>";
                else {
                    // En caso de no estar registrado redirigimos a la visualización pública
                    header('Location: ../../public/views/index.php');
                }
                ?>
            </div>  
        </nav>
        <!-- Page Content -->
        <div class="container">
            <!-- Heading Row -->
            <div class="row">
                <div class="col-md-8">
                    <img class="img-fluid rounded" src="../../../assets/img/main-logo.jpg" alt="">
                </div>
                <!-- /.col-md-8 -->
                <div class="col-md-4">
                    <h1>Artean, bolsa de empleo de Cuatrovientos</h1>
                    <p class="lead">Desde Cuatrovientos queremos dar la bienvenida a todo el alumnado y empresas que por primera vez se acercan al instituto y a aquellos que continúan con sus programas formativos. </p>
                    <p class="lead">
                       <a  class="nav-link " href="offer/insert.php">Agregar un empleo</a>
                    </p>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <hr>
        <!-- Content Row -->
        <?php
        for ($i = 0; $i < sizeof($offers); $i+=3) {
            ?>
            <div class="card-group"> 
           <!--  <div class="row">  -->
            <?php
            for ($j = $i; $j < ($i + 3); $j++) {
                if (isset($offers[$j])) {

                    echo $offers[$j]->privateOffer2HTML($_SESSION['user_type']);
                }
            }
            ?>
            </div> 
            <!-- /.row -->
                <?php
            }
            ?>
    </div>
    <!-- /.container -->
    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; Cuatrovientos 2024</p>
            </div>
        </div>
    </footer>
    <!-- Java Script Boostrap-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

</body>
</html>
