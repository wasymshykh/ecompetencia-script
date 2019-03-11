<?php 
  include '../config/db.php';
  include 'includes/functions.php';
  include '../config/auth_admin.php';

  $showConfirm = false;
  $user_error = false;
  $user_success = false;

  if(isset($_GET['confirm']) && !empty($_GET['confirm']) && is_numeric($_GET['confirm'])){
    if(isAmbassadorApplicantConfirm(normal($_GET['confirm']))){
      $showConfirm = true;
      $applicant = getAmbassadorApplicant(normal($_GET['confirm']));

      if(isset($_POST['confirm_ambassador'])){

        $pass = normal($_POST['password']);
        $show = normal($_POST['show']);

        if(empty($pass)) {
          $user_error = "Password can't be empty!";
        }
        if(!$user_error && strlen($pass) < 4) {
          $user_error = "Password must be atleast 4 characters long!";
        }

        if(!$user_error) {

          if($show == 'P' || $show == 'E'){

            $id = $applicant['id'];
            $fname = $applicant['fname'];
            $lname = $applicant['lname'];
            $email = $applicant['email'];
            $phone = $applicant['phoneno'];
            $show = normal($_POST['show']);
            $ins_id = $applicant['institute_ID'];
            $avatar = $applicant['avatar'];
  
            
            try {
              $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $db->beginTransaction();
              
              
              // Update applicants table
              $queryOne = "UPDATE `ambassador_applicant` SET `status`='A' WHERE id=$id";
              $db->exec($queryOne);

              // Add record to transaction details
              $queryTwo = "INSERT INTO `ambassadors`
              (`ambassador_password`, `ambassador_fname`, `ambassador_lname`, `ambassador_email`, `ambassador_phoneno`, `ambassador_show`, `institute_ID`, `ambassador_avatar`)
              VALUE
              ('$pass', '$fname', '$lname', '$email', '$phone', '$show', '$ins_id', '$avatar')";
              $db->exec($queryTwo);
              $amb_id = $db->lastInsertId();
              $db->commit();

              $user_success = "Ambassador ID: <b>$amb_id</b><br>Ambassador Password: <b>$pass</b><br><br>Send this information to the ambassador ($fname $lname) for login.";

            } catch(Exception $e){
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

    if(isset($_GET['view']) && isAmbassadorApplicant(normal($_GET['view']))){
        $applicant = getAmbassadorApplicant(normal($_GET['view']));
        include 'views/admin/ambassador_view.php';
    }
    else {
        $applicants = getAmbassadorApplicants();
        include 'views/admin/ambassador_applicants.php'; 
    }
?>
<?php include 'views/admin/layout/footer.php'; ?>