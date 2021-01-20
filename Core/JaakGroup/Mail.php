<?php
/**
* @license JAAKGROUP License
* @author Abdou BATOUMI <batiabdul5@gmail.com>
* @namespace akdiGicom
* @Copyright (c) JAAKGROUP, 2020
*/
require "/Email/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class Mail
{
  public function sendLoginAlert(){
    $robo = 'contact@jaakgroup.com	';

    $developmentMode = true;
    $mailer = new PHPMailer($developmentMode);

    try {
      $mailer->SMTPDebug = 2;
      $mailer->isSMTP();

      if ($developmentMode) {
        $mailer->SMTPOptions = [
          'ssl'=> [
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
          ]
        ];
      }


      $mailer->Host = 'mail12.lwspanel.com';
      $mailer->SMTPAuth = true;
      $mailer->Username = 'kal.@jaakgroup';
      $mailer->Password = 'Kalain@JAAK';
      $mailer->SMTPSecure = 'tls';
      $mailer->Port = 587;

      $mailer->setFrom('contact@jaakgroup.com', 'JAAKGROUP');
      $mailer->addAddress('batiabdul5@gmail.com', 'Abdou BATOUMI');

      $mailer->isHTML(true);
      $mailer->Subject = 'PHPMailer Test';
      $mailer->Body = 'This is a <b>SAMPLE<b> email sent through <b>PHPMailer<b>';

      $mailer->send();
      $mailer->ClearAllRecipients();
      echo "MAIL HAS BEEN SENT SUCCESSFULLY";

    } catch (Exception $e) {
      echo "EMAIL SENDING FAILED. INFO: " . $mailer->ErrorInfo;
    }
  }
}
