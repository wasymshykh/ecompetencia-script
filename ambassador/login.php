<?php 
  include '../config/db.php';
  include 'includes/functions.php';
  session_start();

  $errors = [];

  if(isset($_POST['login'])){
    $user_id = normal($_POST['user']);
    $password = normal($_POST['password']);

    var_dump($_POST);

    if(!isAmbassador($user_id)){
      $errors[] = "Ambassador either not found or disabled!";
    }

    if(empty($errors) && !isValidLogin($user_id, $password)){
      $errors[] = "Incorrect password!";
    }

    if(empty($errors)){
      $_SESSION['ambassador_logged'] = true;
      $_SESSION['ambassador'] = ambassadorDetails($user_id);
      header('location: index.php');
    }

  }

?>
<?php 
  include 'views/login.php'; 
?>