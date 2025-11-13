<?php

/**
 * NOTE: Keep in mind that to make this code work you need to double check that
 * the following line is uncommented in your php.ini file:
 * extension=php_openssl.dll
 * You might need to restart your server to make it work.
 */

require_once(dirname(__FILE__) . "/../lib/class.phpmailer.php");
require_once(dirname(__FILE__) . "/../lib/class.smtp.php");

/**
 * class EmailUtils
 * 
 * Contains util methods to send email messages.
 *
 * @version    0.1
 * 
 * @author     Cuatrovientos
 */
class EmailUtils {

    /**
     * Sends an email using Gmail service as email server. Needs gmail credentials
     * to set it up
     * @param type $emailInfo
     * @return type
     */
    static function send($emailInfo) {
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "ssl";
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 465;

        //Set up username and password with valid ones from a Gmail account
        $mail->Username = "miguel_goyena@cuatrovientos.org";
        $mail->Password = "###########";
        $mail->From = $emailInfo->getEmail();
        $mail->FromName = $emailInfo->getFname() . " " . $emailInfo->getLname();
        $mail->Subject = $emailInfo->getSubject();
        $mail->AltBody = $emailInfo->getMessage();
        $mail->MsgHTML($emailInfo->getMessage());
        $mail->AddAddress("miguel_goyena@cuatrovientos.org");
        $mail->IsHTML(true);
        return $mail->Send();
    }

}
?>