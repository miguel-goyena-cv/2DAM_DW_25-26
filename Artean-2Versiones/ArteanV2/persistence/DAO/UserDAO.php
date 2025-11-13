<?php

//dirname(__FILE__) Es el directorio del archivo actual
require_once(dirname(__FILE__) . '..\..\conf\PersistentManager.php');

class UserDAO {

    //Se define una constante con el nombre de la tabla
    const USER_TABLE = 'users';

    //Conexión a BD
    private $conn = null;

    //Constructor de la clase
    public function __construct() {
        $this->conn = PersistentManager::getInstance()->get_connection();
    }

    public function selectAll() {
        $query = "SELECT * FROM " . UserDAO::USER_TABLE;
        $result = mysqli_query($this->conn, $query);
        $users= array();
        while ($userBD = mysqli_fetch_array($result)) {
            $user = new User();
            if ($userBD["type"] == "Candidate"){
                $user = new Candidate();
            }
            if ($userBD["type"] == "Enterprise"){
                $user = new Enterprise();
            }
            $user->setIdUser($userBD["idUser"]);
            $user->setEmail($userBD["email"]);
            $user->setPassword($userBD["password"]);
            
            array_push($users, $user);
        }
        return $users;
    }

    public function insert($user) {
        $query = "INSERT INTO " . UserDAO::USER_TABLE .
                " (email, password, type) VALUES(?,?,?)";
        $stmt = mysqli_prepare($this->conn, $query);
        $email = $user->getEmail();
        $password = $user->getPassword();
        $type = $user->getType();
        
        mysqli_stmt_bind_param($stmt, 'sss', $email, $password, $type);
        return $stmt->execute();
    }

     public function getUserInformation($user) {
        $query = "SELECT id, email, password, type FROM " . UserDAO::USER_TABLE . " WHERE email=? AND password=?";
        $stmt = mysqli_prepare($this->conn, $query);
        $auxEmail = $user->getEmail();
        $auxPass =  $user->getPassword();
            
        $stmt ->bind_param('ss', $auxEmail, $auxPass);
        $stmt->execute();
        $result = $stmt->get_result();
        mysqli_stmt_bind_param($stmt, 'ss', $auxEmail, $auxPass);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt); 
        $rows = mysqli_stmt_num_rows($stmt);
        if($result ->num_rows == 1){
            $datosBD = $result ->fetch_row();
            $user->setUserid($datosBD[0]);
            $user->setType($datosBD[3]);
            return $user;
        }         
        else
            return null;
    }
    
    
    public function selectById($id) {
        $query = "SELECT email, password FROM " . UserDAO::USER_TABLE . " WHERE idUser=?";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $email, $password);

        $user = new User();
        while (mysqli_stmt_fetch($stmt)) {
            $user->setIdUser($id);
            $user->setEmail($email);
            $user->setPassword($password);
       }

        return $user;
    }
    
    public function delete($id) {
        $query = "DELETE FROM " . UserDAO::USER_TABLE . " WHERE idUser =?";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        return $stmt->execute();
    }

        
}

?>
