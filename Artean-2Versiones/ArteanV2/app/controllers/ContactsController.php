<?php

require_once(dirname(__FILE__) . '/../models/Email.php');
require_once(dirname(__FILE__) . '/../../utils/EmailUtils.php');
require_once(dirname(__FILE__) . '/../../utils/SessionUtils.php');

SessionUtils::startSessionIfNotStarted();


class ContactController {

    /**
     * Parameterless constractor.
     */
    public function __construct() {
    }

    /**
     * Logout the current user by deleting the session.
     */
    public function sendEmail() {
        $_email = new Email();

        $_email->setFname($_POST["fname"]);
        $_email->setLname($_POST["lname"]);
        $_email->setEmail($_POST["email"]);
        $_email->setSubject($_POST["subject"]);
        $_email->setMessage($_POST["message"]);

        $success = EmailUtils::send($_email);

        header("Location: ../public/views/contact.php?success=" . $success);
    }

}

/**
 * Handle the request to the proper action of the controller.
 */
if (isset($_GET["actionsendemail"])) {
    $_contactController = new ContactController();
    $_contactController->sendEmail();
}
?>
