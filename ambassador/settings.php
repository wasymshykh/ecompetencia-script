<?php 
  include '../config/db.php';
  include 'includes/functions.php';
  include '../config/auth_ambassador.php';

  $success_privacy = false;
  $error_privacy = false;
  $success_password = false;
  $error_password = false;

  if(isset($_POST['save_privacy'])){
    if(isset($_POST['privacy_contact']) && ($_POST['privacy_contact'] == 'P' || $_POST['privacy_contact'] == 'E')){
      $query = "UPDATE `ambassadors` SET `ambassador_show`=:show WHERE `ambassador_ID`=:id";
      $stmt = $db->prepare($query);
      if($stmt->execute(['show'=>normal($_POST['privacy_contact']), 'id'=>$ambassador['ambassador_ID']])){
        $success_privacy = "Successfully Saved.";
      } else {
        $error_privacy = "Unable to update!";
      }
    } else {
      $error_privacy = "Invalid Data";
    }
  }
  if(isset($_POST['save_password'])){
    if(isset($_POST['password']) && isset($_POST['password_c'])){

      $pass = normal($_POST['password']);
      $pass_c = normal($_POST['password_c']);

      if(strlen($pass) < 4) {
        $error_password = "Password must be atleast 4 characters long!";
      }
      if(!$error_password && $pass != $pass_c){
        $error_password = "Password doesn't match. Write again.";
      }
      if(!$error_password){
        $query = "UPDATE `ambassadors` SET `ambassador_password`=:pass WHERE `ambassador_ID`=:id";
        $stmt = $db->prepare($query);
        if($stmt->execute(['pass'=>$pass, 'id'=>$ambassador['ambassador_ID']])){
          $success_password = "Successfully Saved.";
        } else {
          $error_password = "Unable to update!";
        }
      }

    } else {
      $error_password = "Invalid Data";
    }
  }

?>
<?php 
  $page_title = "Ambassador Settings";

  include 'views/layout/header.php'; 
?>
<?php
    $current = ambassadorDetails($_SESSION['ambassador']['ambassador_ID']);
    include 'views/settings.php'; 
?>
<?php include 'views/layout/footer.php'; ?>