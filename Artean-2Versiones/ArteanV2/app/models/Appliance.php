<?php

class Appliance {
    private $offer;
    private $user;
    private $letter;
    
    public function __construct() {
        
    }

    public function getOffer() {
        return $this->offer;
    }

    public function getUser() {
        return $this->user;
    }
    
    public function getLetter() {
        return $this->letter;
    }
    
    public function setOffer($offer) {
        $this->offer = $offer;
    }
    
    public function setUser($user) {
        $this->user = $user;
    }
    
    public function setLetter($letter) {
        $this->letter = $letter;
    }
    
}
