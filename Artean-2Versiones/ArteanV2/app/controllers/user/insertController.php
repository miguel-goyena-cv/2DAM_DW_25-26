<?php
//Es necesario que importemos los ficheros creados con anterioridad porque los vamos a utilizar desde este fichero.
require_once(dirname(__FILE__) . '/../../../persistence/DAO/UserDAO.php');
require_once(dirname(__FILE__) . '/../../../app/models/User.php');
require_once(dirname(__FILE__) . '/../../../app/models/Candidate.php');
require_once(dirname(__FILE__) . '/../../../app/models/Enterprise.php');
require_once(dirname(__FILE__) . '/../../../app/models/validations/ValidationsRules.php');
require_once(dirname(__FILE__) . '/../../../utils/SessionUtils.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Llamo a la función en cuanto se redirige el action a esta página mediante metodo POST
   createAction();
}
// Función encargada de crear nuevos usuarios
function createAction() {
    // Obtención de los valores del formulario y validación
    $email = ValidationsRules::test_input($_POST["user"]);
    $pass = ValidationsRules::test_input($_POST["password"]);
    $type = ValidationsRules::testUserType($_POST["type"]);
    
   
    // Creación de objeto auxiliar 
    $user = new User();
    if ($type  == "Candidate") {
        $user = new Candidate();
    }
    if ($type == "Enterprise") {
        $user = new Enterprise();
    }
    $user->setEmail($email);
    $user->setPassword($pass);
    //Creamos un objeto UserDAO para hacer las llamadas a la BD
    $userDAO = new UserDAO();
    $userDAO->insert($user);
    $user = $userDAO->getUserInformation($user);
    // Establecemos la sesión
    SessionUtils::startSessionIfNotStarted();
    SessionUtils::setSession($user->getEmail(), $user->getType(), $user->getUserid());
       
    header('Location: ../../../app/private/views/index.php');   
}

    