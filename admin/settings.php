<?php 
  include '../config/db.php';
  include 'includes/functions.php';
  include '../config/auth_admin.php';

  

  $errors = [];
  $error_password = false;
  $success_password = false;
  
  if(isset($_POST['save_pages'])){
    if(!($_SESSION['management']['management_type'] === 'A')){
      header('location: '.ADMIN_URL.'/index.php');
    } else {
      
      if(isset($_POST['page_teamapp']) && !empty(normal($_POST['page_teamapp']))){
          if(!setSettings('team_applicants', normal($_POST['page_teamapp']))){
              $errors[] = "Team applicants settings couldn't be saved!";
          }
      }
  
      if(isset($_POST['page_ambassadorapp']) && !empty(normal($_POST['page_ambassadorapp']))){
          if(!setSettings('ambassador_applicants', normal($_POST['page_ambassadorapp']))){
              $errors[] = "Ambassador applicants settings couldn't be saved!";
          }
      }

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
        $query = "UPDATE `management` SET `management_password`=:pass WHERE `management_ID`=:id";
        $stmt = $db->prepare($query);
        if($stmt->execute(['pass'=>$pass, 'id'=>$_SESSION['management']['management_ID']])){
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
  $page_title = "Admin Settings";

  include 'views/admin/layout/header.php'; 
?>
<?php 

    $setting_team_app = getSettings('team_applicants');
    $setting_ambassador_app = getSettings('ambassador_applicants');

    include 'views/admin/settings.php'; 
?>
<?php include 'views/admin/layout/footer.php'; ?>