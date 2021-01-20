<?php
session_start();
$key = $_POST['key'];
require_once 'Autoload.php';
Autoload::loadClass();
$bdd = Database::connect();
// ou en ligne $bdd = database::connectOnline();
$ObjectUser = new User($bdd);
switch ($key) {
  case 'Login':
    if (empty($_POST['mailUser']) || empty($_POST['pwdUser'])) {
      header("Location: /Login?empty");
    } else {
      $mailUser = htmlspecialchars(strip_tags($_POST['mailUser']));
      $pwdUser = htmlspecialchars(strip_tags($_POST['pwdUser']));
      $sql = "SELECT * FROM users WHERE mailUser = :mailUser AND pwdUser = :pwdUser";
      $stmt = $bdd -> prepare($sql);
      $stmt -> bindParam(':mailUser', $mailUser);
      $stmt -> bindParam(':pwdUser', $pwdUser);
      $stmt -> execute();
      $result = $stmt -> fetch(PDO::FETCH_ASSOC);
      $result = $stmt -> rowCount();
      if($result > 0){
        $_SESSION['mailUser'] = $mailUser;
        $_SESSION['pwdUser'] = $pwdUser;
        $_SESSION['connect'] = true;
        // $Objectmail = new Mail($bdd);
        // $Objectmail -> sendLoginAlert();
        header("Location: /Backend");
      } else {
          header("Location: /Login?wrongdetails");
        }

      }
  break;
  default:
  // code...
  break;
}
