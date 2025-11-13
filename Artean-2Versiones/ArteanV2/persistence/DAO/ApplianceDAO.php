<?php

//dirname(__FILE__) Es el directorio del archivo actual
require_once(dirname(__FILE__) . '\..\conf\PersistentManager.php');
require_once(dirname(__FILE__) . '\UserDAO.php');
require_once(dirname(__FILE__) . '\..\..\app\models\Candidate.php');


class ApplianceDAO {

    //Se define una constante con el nombre de la tabla
    const TABLE = 'appliance';

    //Conexión a BD
    private $conn = null;

    //Constructor de la clase
    public function __construct() {
        $this->conn = PersistentManager::getInstance()->get_connection();
    }

    public function insert($appliance) {
        $query = "INSERT INTO " . ApplianceDAO::TABLE .
                " (idUser, idOffer, letter) VALUES(?,?,?)";
        $stmt = mysqli_prepare($this->conn, $query);
        
        mysqli_stmt_bind_param($stmt, 'iis', $appliance->getUser()->getUserId(), $appliance->getOffer()->getIdOffer(), $appliance->getLetter());
        return $stmt->execute();
    }
    
    public function selectAppliancesByOffer($idOffer) {
        $query = "SELECT usuario.id, usuario.email, appliance.letter FROM " . ApplianceDAO::TABLE . " as appliance," . UserDAO::USER_TABLE . " as usuario ";
        $query .= "WHERE appliance.iduser=usuario.id and appliance.idOffer = ?";
        $stmt = mysqli_prepare($this->conn, $query);
        $stmt->bind_param('i', $idOffer);
        $stmt->execute();
        $result = $stmt->get_result();
        
        $appliances= array();
        while ($applianceBD = $result->fetch_assoc()) {
            $candidate = new Candidate();
            $candidate->setUserId($applianceBD['id']);
            $candidate->setEmail($applianceBD['email']);
            $appliance = new Appliance();
            $appliance->setUser($candidate);
            $appliance->setLetter($applianceBD['letter']);
            array_push($appliances, $appliance);
        }
        
        return $appliances;
    }
        
}

?>
