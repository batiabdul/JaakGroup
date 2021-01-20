<?php
$key = $_POST['key'];
require_once 'Autoload.php';
Autoload::loadClass();
$bdd = Database::connect();
// ou en ligne $bdd = database::connectOnline();
$manager = new Managers($bdd);

switch ($key) {
  case 'PeopleComment':
if (isset($_POST['submit'])) {
  $name = trim(htmlentities($_POST['name']));
  $message = trim(htmlentities($_POST['message']));
  $timestamp = date('Y-m-d H:i:s');
  $champ = [
    "name" => trim(htmlentities($_POST['name'])),
    "message" => trim(htmlentities($_POST['message'])),
    "created" => date('Y-m-d H:i:s')
  ];
  $table = "infos";
  if ($manager -> AddUserInfos($table, $champ)) {
    header("location: /contact");
  }
}

    default:
      // code...
      break;
  }
