<?php

class Offer {

    private $idOffer;
    private $company;
    private $position;
    private $function;

    public function __construct() {
        
    }

    public function getIdOffer() {
        return $this->idOffer;
    }

    public function getCompany() {
        return $this->company;
    }

    public function getPosition() {
        return $this->position;
    }

    public function getFunction() {
        return $this->function;
    }

    public function setIdOffer($idOffer) {
        $this->idOffer = $idOffer;
    }

    public function setCompany($company) {
        $this->company = $company;
    }

    public function setFunction($function) {
        $this->function = $function;
    }

    function setPosition($position) {
        $this->position = $position;
    }

//Función para pintar cada ofertas
    function privateOffer2HTML($user_type) {
        $result = '<div class=" col-md-4 ">';
        $result .= '<div class="card ">';
        $result .= '<div class="card-block">';
        $result .= '<h2 class="card-title">' . $this->getCompany() . '</h2>';
        $result .= '<p class=" card-text description">' . $this->getPosition() . '</p>';
        $result .= '</div>';
        $result .= ' <div  class=" btn-group card-footer" role="group">';
        $result .= '<a type="button" class="btn btn-secondary" href="offer/detail.php?id=' . $this->getIdOffer() . '">Detalles</a>';
        if ($user_type == "Enterprise"){
            $result .= '<a type="button" class="btn btn-success" href="offer/edit.php?id=' . $this->getIdOffer() . '">Modificar</a> ';
            $result .= '<a type="button" class="btn btn-danger" href="../../controllers/offer/OfferController.php?id=' . $this->getIdOffer() . '">Borrar</a> ';
            $result .= '<a type="button" class="btn btn-secondary" href="offer/candidates.php?idOffer=' . $this->getIdOffer() . '">Candidatos</a>';   
        }
        if ($user_type == "Candidate"){
            $result .= '<a type="button" class="btn btn-success" href="offer/apply.php?id=' . $this->getIdOffer() . '">Apuntarse</a> ';
        }
        $result .= ' </div>';
        $result .= '</div>';
        $result .= '</div>';


        return $result;
    }
//Función para pintar cada ofertas
    function publicOffer2HTML() {
        $result = '<div class=" col-md-4 ">';
        $result .= '<div class="card ">';
        $result .= '<div class="card-block">';
        $result .= '<h2 class="card-title">' . $this->getCompany() . '</h2>';
        $result .= '<p class=" card-text description">' . $this->getPosition() . '</p>';
        $result .= '</div>';
        $result .= ' <div  class=" btn-group card-footer" role="group">';
        $result .= '<a type="button" class="btn btn-secondary" href="../../../app/private/views/offer/detail.php?id=' . $this->getIdOffer() . '">Detalles</a>';
        $result .= ' </div>';
        $result .= '</div>';
        $result .= '</div>';


        return $result;
    }
}
