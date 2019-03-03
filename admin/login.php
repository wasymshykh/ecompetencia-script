<?php 
  include '../config/db.php';
  include 'includes/functions.php';
  session_start();

  $errors = [];

  if(isset($_POST['login'])){
    
    $user_id = normal($_POST['user']);
    $password = normal($_POST['password']);

      if(!isUser($user_id)){
        $errors[] = "Entered user id is incorrect";
      }
    
      if(!isValidLogin($user_id, $password) && empty($errors)){
        $errors[] = "Entered password is incorrect";
      }

      if(!isAdmin($user_id)){
          $errors[] = "Only admin is allowed to login.";
      }

      if(empty($errors)){
        $_SESSION['admin'] = true;
        $_SESSION['admin_id'] = $user_id;
        $_SESSION['management'] = getManagementDetailsById($user_id);
        header('location: index.php');
      }

  }

?>
<?php 
  include 'views/admin/login.php'; 
?>