<?php 
  include '../config/db.php';
  include 'includes/functions.php';
  include '../config/auth_admin.php';

  if(!($_SESSION['management']['management_type'] === 'A')){
    header('location: '.ADMIN_URL.'/index.php');
  }

    $errors = [];
  if(isset($_POST['save_pages'])){

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