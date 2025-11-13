<?php

/**
 * Class Email
 * 
 * Encapsulates an email message.
 *
 * @version    0.1
 * 
 * @author     cuatrovientos
 */
class Email {
    
    private $_fname;
    private $_lname;
    private $_email;
    private $_subject;    
    private $_message;
    
    /**
     * Getters and setters.
     */
    public function getFname() {
        return $this->_fname;
    }

    public function setFname($_fname) {
        $this->_fname = $_fname;
    }

    public function getLname() {
        return $this->_lname;
    }

    public function setLname($_lname) {
        $this->_lname = $_lname;
    }

    public function getEmail() {
        return $this->_email;
    }

    public function setEmail($_email) {
        $this->_email = $_email;
    }

    public function getSubject() {
        return $this->_subject;
    }

    public function setSubject($_subject) {
        $this->_subject = $_subject;
    }

    public function getMessage() {
        return $this->_message;
    }

    public function setMessage($_message) {
        $this->_message = $_message;
    }
}

?>
