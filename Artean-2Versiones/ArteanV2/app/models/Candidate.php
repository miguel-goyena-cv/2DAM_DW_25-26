<?php

require_once(dirname(__FILE__) . '/User.php');
class Candidate extends User {

    public function __construct() {
        parent::__construct("Candidate");
    }
}
