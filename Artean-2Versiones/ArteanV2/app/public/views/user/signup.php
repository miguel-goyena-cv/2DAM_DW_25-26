<?php
// Analizo la sesión
require_once(dirname(__FILE__) . '/../../../../utils/SessionUtils.php');
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
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item ">
                        <a  class="nav-link " href="../index.php">Principal</a>
                    </li>
                    <li class="nav-item">
                        <a  class="nav-link " href="../contact.php">Contactar</a>
                    </li>
                </ul>
            </div>  
        </nav>  
        <!-- Page Content -->
        <div class="container">
            <div class="row m-y-2">
                <div class="col-lg-8 push-lg-4">
                    <form class="form-horizontal" role="form" method="POST" action="../../../controllers/user/insertController.php">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <h2>Por favor registrate</h2>
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="form-group has-danger">
                                    <label class="sr-only" for="email">Email:</label>
                                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                        <div class="input-group-addon"></div>
                                        <input type="text" name="user" class="form-control" id="email"
                                               placeholder="vivayo@correo.com" required autofocus>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-control-feedback">
                                    <span class="text-danger align-middle">
                                        <?php
                                        if (isset($error)) {
                                            echo $error;
                                        }
                                        ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="sr-only" for="password">Contraseña:</label>
                                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                        <div class="input-group-addon" ></div>
                                        <input type="password" name="password" class="form-control" id="password"
                                               placeholder="Password" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-control-feedback">
                                    <span class="text-danger align-middle"><?php
                                        if (isset($error)) {
                                            echo $error;
                                        }
                                        ?> 
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="sr-only" for="lname">Apellidos:</label>
                                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                        <div class="input-group-addon" ></div>
                                        <input type="text" name="lname" class="form-control" id="lname"
                                               placeholder="Nombre Apellidos" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-control-feedback">
                                    <span class="text-danger align-middle"><?php
                                        if (isset($error)) {
                                            echo $error;
                                        }
                                        ?> 
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="sr-only" for="type">Tipo:</label>
                                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                        <div class="input-group-addon" ></div>
                                        <select id="type" name="type" class="form-control" required>
                                            <option value="Candidate" selected >Candidato</option>
                                            <option value="Enterprise">Empresa</option>
                                          </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-control-feedback">
                                    <span class="text-danger align-middle"><?php
                                        if (isset($error)) {
                                            echo $error;
                                        }
                                        ?> 
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-success" value="Register" id="register" name="btnsubmit">Acceder</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <!-- /.container -->
    <!-- Java Script Boostrap-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

</body>

</html>
