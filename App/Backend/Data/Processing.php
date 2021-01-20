<?php
$key = $_POST['key'];
require_once 'Autoload.php';
Autoload::loadClass();
$bdd = Database::connect();
// ou en ligne $bdd = database::connectOnline();
$manager = new Managers($bdd);

switch ($key) {
  case 'AddProduct':
  if ($_POST) {
    $name = $_POST['name'];
    $info = $_POST['info'];
    $description = $_POST['description'];
    $category_id = $_POST['category_id'];
    $image=!empty($_FILES["image"]["name"])
    ? sha1_file($_FILES['image']['tmp_name']) . "-" . basename($_FILES["image"]["name"]) : "";
    //write query
    $query = "INSERT INTO products SET
    name=:name,
    info=:info,
    description=:description,
    category_id=:category_id,
    created=:created,
    image=:image";

    $stmt = $bdd->prepare($query);

    // posted values
    $name=htmlspecialchars(strip_tags($name));
    $info=htmlspecialchars(strip_tags($info));
    $description=htmlspecialchars(strip_tags($description));
    $category_id=htmlspecialchars(strip_tags($category_id));
    $image=htmlspecialchars(strip_tags($image));

    // to get time-stamp for 'created' field
    $timestamp = date('Y-m-d H:i:s');

    // bind values
    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":description", $description);
    $stmt->bindParam(":info", $info);
    $stmt->bindParam(":category_id", $category_id);
    $stmt->bindParam(":created", $timestamp);
    $stmt->bindParam(":image", $image);

    if($image){
      // Location
      $target_file = 'App/Backend/Web/images/uploads/'.$image;

      // file extension
      $file_extension = pathinfo($target_file, PATHINFO_EXTENSION);
      $file_extension = strtolower($file_extension);

      // Valid image extension
      $valid_extension = array("png","jpeg","jpg");

      if(in_array($file_extension, $valid_extension)){

        // Upload file
        if(move_uploaded_file($_FILES['image']['tmp_name'],$target_file)){
          if($stmt->execute()){
            echo "Product was created";
            header('Location: /Backend/les-articles');
          }
        }

      }else{
        echo "Product was not created";
      }
    }
  }
  break;

  case 'AddCategory':
  $category_name = $_POST['category_name'];
  $champs=["category_name"=>$category_name];
  if ($manager -> AddUserInfos("categories", $champs)) {
    header('Location:/Backend/les-categories');
  } else {
    header('Location:/Backend/les-categories');
  }


  break;
  case 'EditProduct':
  
  break;

  default:
  # code...
  break;
}
