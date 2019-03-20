<?php 
  include '../config/db.php';
  include 'includes/functions.php';
  include '../config/auth_admin.php';


  if(isset($_GET['toggle']) && !empty($_GET['toggle']) && is_numeric($_GET['toggle'])){
    if(isAmbassadorApproved(normal($_GET['toggle']))){
        $applicant = getAmbassadorApproved(normal($_GET['toggle']));
        $change = 'E';
        $a_id = $applicant['ambassador_ID'];
        if($applicant['ambassador_status']=='E'){
            $change = 'D';
        }
        $query = "UPDATE `ambassadors` SET `ambassador_status`='$change' WHERE `ambassador_ID`='$a_id'";
        $stmt = $db->prepare($query);
        if($stmt->execute()){
            header('location: ambassadors.php?success=true');
        } else {
            header('location: ambassadors.php?error=true');
        }
        
    }
  }

  $showConfirm = false;
  $user_error = false;
  $user_success = false;

  if(isset($_GET['update']) && !empty($_GET['update']) && is_numeric($_GET['update'])){
    if(isAmbassadorApproved(normal($_GET['update']))){
      $showConfirm = true;
      $applicant = getAmbassadorApproved(normal($_GET['update']));

      if(isset($_POST['update_am'])){

        $pass_u = false;
        $pass = normal($_POST['password']);
        $show = normal($_POST['show']);
        $status = normal($_POST['status']);
        $a_id = $applicant['ambassador_ID'];

        if(!empty($pass)) {
          $pass_u = true;
        }
        if($pass_u && strlen($pass) < 4) {
          $user_error = "Password must be atleast 4 characters long!";
        }

        if(!$user_error) {

          if(($show == 'P' || $show == 'E') && ($status == 'E' || $status == 'D')){

            if($pass_u){
                $query = "UPDATE `ambassadors` SET `ambassador_password`='$pass', `ambassador_show`='$show',`ambassador_status`='$status' WHERE `ambassador_ID`='$a_id'";    
            } else {
                $query = "UPDATE `ambassadors` SET `ambassador_show`='$show',`ambassador_status`='$status' WHERE `ambassador_ID`='$a_id'";
            }
              
            $stmt = $db->prepare($query);
              
            if($stmt->execute()){
                  $user_success = "Information successfully updated!";
                  $applicant = getAmbassadorApproved(normal($_GET['update']));
            } else {
                  $user_error = "Sorry, we couldn't complete your request. Try again.";
            }
          
          } else {
            $user_error = "Incorrect Data";
          }


        }
      }
    }
  }


  if(!($_SESSION['management']['management_type'] === 'A')){
    header('location: '.ADMIN_URL.'/index.php');
  }

?>
<?php 
  $page_title = "Ambassador Applications";
  include 'views/admin/layout/header.php'; 
?>
<?php 

    if(isset($_GET['view']) && isAmbassadorApproved(normal($_GET['view']))){
        $applicant = getAmbassadorApproved(normal($_GET['view']));
        include 'views/admin/ambassador_view_2.php';
    }
    else {
        $applicants = getAmbassadorsApproved();
        include 'views/admin/ambassadors.php'; 
    }
?>
<?php include 'views/admin/layout/footer.php'; ?>