<?php

require_once(dirname(__FILE__) . '/User.php');
class Enterprise extends User {

    public function __construct() {
        parent::__construct("Enterprise");
    }
}

