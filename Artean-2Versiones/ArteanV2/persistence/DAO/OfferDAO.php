<?php

//dirname(__FILE__) Es el directorio del archivo actual
require_once(dirname(__FILE__) . '\..\conf\PersistentManager.php');


class OfferDAO {

    //Se define una constante con el nombre de la tabla
    const OFFER_TABLE = 'offers';

    //Conexión a BD
    private $conn = null;

    //Constructor de la clase
    public function __construct() {
        $this->conn = PersistentManager::getInstance()->get_connection();
    }

    public function selectAll() {
        $query = "SELECT * FROM " . OfferDAO::OFFER_TABLE;
        $result = mysqli_query($this->conn, $query);
        $offers= array();
        while ($offerBD = mysqli_fetch_array($result)) {

            $offer = new Offer();
            $offer->setIdOffer($offerBD["id"]);
            $offer->setCompany($offerBD["company"]);
            $offer->setPosition($offerBD["position"]);
            $offer->setFunction($offerBD["function"]);
            
            array_push($offers, $offer);
        }
        return $offers;
    }

    public function insert($offer) {
        $query = "INSERT INTO " . OfferDAO::OFFER_TABLE .
                " (company, position, `function`) VALUES(?,?,?)";
        $stmt = mysqli_prepare($this->conn, $query);
        $company = $offer->getCompany();
        $position = $offer->getPosition();
        $function = $offer->getFunction();
        
        mysqli_stmt_bind_param($stmt, 'sss', $company, $position, $function);
        return $stmt->execute();
    }

    public function selectById($id) {
        $query = "SELECT company, position, function FROM " . OfferDAO::OFFER_TABLE . " WHERE id=?";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $company, $position, $function);

        $offer = new Offer();
        while (mysqli_stmt_fetch($stmt)) {
            $offer->setIdOffer($id);
            $offer->setCompany($company);
            $offer->setPosition($position);
            $offer->setFunction($function);
       }

        return $offer;
    }

    public function update($offer) {
        $query = "UPDATE " . OfferDAO::OFFER_TABLE .
                " SET company=?, position=?, function=?"
                . " WHERE id=?";
        $stmt = mysqli_prepare($this->conn, $query);
        $company = $offer->getCompany();
        $position= $offer->getPosition();
        $function = $offer->getFunction();
        $id = $offer->getIdOffer();
        mysqli_stmt_bind_param($stmt, 'sssi', $company, $position, $function, $id);
        return $stmt->execute();
    }
    
    public function delete($id) {
        $query = "DELETE FROM " . OfferDAO::OFFER_TABLE . " WHERE id =?";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        return $stmt->execute();
    }

        
}

?>
