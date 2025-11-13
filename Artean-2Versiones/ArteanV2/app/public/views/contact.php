<?php
require_once(dirname(__FILE__) . '/../../../utils/SessionUtils.php');

SessionUtils::startSessionIfNotStarted();
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
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item ">
                        <a  class="nav-link " href="index.php">Principal</a>
                    </li>
                    <li class="nav-item active">
                        <a  class="nav-link " href="contact.php">Contactar</a>
                    </li>
                </ul>
            </div>  
        </nav>


        <!-- Page Content -->
        <div class="container">
            <div id="map"><iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.es/maps?f=q&amp;source=s_q&amp;hl=es&amp;geocode=&amp;q=Instituto+Cuatrovientos,+Pamplona&amp;aq=0&amp;oq=cuatrovientos+pa&amp;sll=42.612343,-1.612016&amp;sspn=2.360858,5.410767&amp;ie=UTF8&amp;hq=Instituto+Cuatrovientos,&amp;hnear=Pamplona,+Navarra&amp;t=m&amp;ll=42.824394,-1.659982&amp;spn=0.028008,0.025777&amp;output=embed"></iframe><br /><small><a href="https://maps.google.es/maps?f=q&amp;source=embed&amp;hl=es&amp;geocode=&amp;q=Instituto+Cuatrovientos,+Pamplona&amp;aq=0&amp;oq=cuatrovientos+pa&amp;sll=42.612343,-1.612016&amp;sspn=2.360858,5.410767&amp;ie=UTF8&amp;hq=Instituto+Cuatrovientos,&amp;hnear=Pamplona,+Navarra&amp;t=m&amp;ll=42.824394,-1.659982&amp;spn=0.028008,0.025777" style="color:#0000FF;text-align:left">
                        Ver mapa más grande</a></small>
            </div>                
            <form class="form-horizontal" id="contactForm"  action="../../controllers/contactsController.php?actionsendemail" method="POST">
                <?php
                if (isset($_GET["success"]) && !empty($_GET["success"])) {
                    $messageClass = "alert-danger";
                    $message = "Error. Your email could not be sent";
                    if ($_GET["success"] == "1") {
                        $messageClass = "alert-success";
                        $message = "Thank you. Your email has been sent successfully";
                    }
                    echo '<div class="alert ' . $messageClass . '">' . $message . '</div>';
                }
                ?>
                <div class="form-group">
                    <label for="fname" class="col-sm-3">Firstname</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="fname" name="fname" placeholder="Firstname" required="required" autofocus/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="lname" class="col-sm-3">Lastname</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="lname" name="lname" placeholder="Lastname"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-3">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email"  name="email" placeholder="Email" required="required"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="subject" class="col-sm-3">Subject</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="subject" name="subject" required="required" placeholder="Subject"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="message" class="col-sm-3">Message</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" rows="3" id="message" name="message" placeholder="Message" required="required"></textarea>
                    </div>
                </div>
                <input type="submit" class="btn btn-lg btn-primary col-sm-10" name="btnsubmit" value="Send" id="send"/>                
            </form>
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