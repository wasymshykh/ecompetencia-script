<?php 
  include '../config/db.php';
  include 'includes/functions.php';
  include '../config/auth_admin.php';

  $showEdit = false;
  $user_success = false;
  $user_error = false;
  $edit_success = false;
  $edit_error = false;

  if(isset($_GET['toggle']) && !empty($_GET['toggle']) && is_numeric($_GET['toggle'])){
    $user_details = getUserDetailsById(normal($_GET['toggle']));
    if(is_array($user_details) && count($user_details) > 0) {
        $status = 'E';
        if($user_details['user_status'] == 'E'){
            $status = 'D';
        }
        $updateQuery = "UPDATE `users` SET 
        `user_status`='$status' WHERE `user_ID`=".$user_details['user_ID'];
        $stmt = $db->prepare($updateQuery);

        if($stmt->execute()){
            header('location: users.php?updated=true');
        } else {
            header('location: users.php?updated=false');
        }
    }
  }


  if(isset($_GET['edit']) && !empty($_GET['edit']) && is_numeric($_GET['edit'])){

    $user_details = getUserDetailsById(normal($_GET['edit']));
    if(is_array($user_details) && count($user_details) > 0) {
        $showEdit = true;

        $institutes = getInstitutes();
        $ambassadors = getAmbassadorsDetails();


        if(isset($_POST['edit_user'])){
            $e_fname = normal($_POST['e_fname']);
            $e_lname = normal($_POST['e_lname']);
            $e_email = normal($_POST['e_email']);
            $e_phone = normal($_POST['e_phone']);
            $e_institute = normal($_POST['e_institute']);
            $e_ambassador = normal($_POST['e_ambassador']);

            if(empty($e_fname)) {
                $user_error = "First name can't be empty!";
            }
            if(empty($user_error) && empty($e_lname)) {
                $user_error = "Last name can't be empty!";
            }
            if(empty($user_error) && empty($e_email)) {
                $user_error = "Email can't be empty!";
            }
            if(empty($user_error) && $user_details['user_email']!=$e_email && userEmailExists($e_email)){
                $user_error = "Email already used by another user!";
            }
            if(empty($user_error) && empty($e_phone)) {
                $user_error = "Phone can't be empty!";
            }
            if(empty($user_error) && empty($e_institute)) {
                $user_error = "Institute can't be empty!";
            }

            if(empty($user_error)){
                $updateQuery = "UPDATE `users` SET 
                `user_fname`='$e_fname', `user_lname`='$e_lname', `user_email`='$e_email', 
                `user_phone`='$e_phone', `institute_ID`='$e_institute',`ambassador_ID`='$e_ambassador' WHERE `user_ID`=".$user_details['user_ID'];
                $stmt = $db->prepare($updateQuery);

                if($stmt->execute()){
                    $user_success = "Data updated successfully!";
                    $user_details = getUserDetailsById(normal($_GET['edit']));
                } else {
                    $user_error = "Sorry, can't update user data!";
                }
            }
        }

        if(isset($_POST['edit_password'])){

            $e_password = normal($_POST['e_password']);
            $e_password_c = normal($_POST['e_password_c']);

            if(empty($e_password) || strlen($e_password) < 5){
                $edit_error = "Must be min. 4 character long";
            }
            if(empty($edit_error) && $e_password != $e_password_c) {
                $edit_error = "Passwords did not match.";
            }
            if(empty($edit_error)){
                $hashed_password = password_hash($e_password,PASSWORD_BCRYPT);

                $updateQuery = "UPDATE `users` SET 
                `user_password`='$hashed_password' WHERE `user_ID`=".$user_details['user_ID'];
                $stmt = $db->prepare($updateQuery);

                if($stmt->execute()){
                    $edit_success = "Password updated successfully!";
                    $user_details = getUserDetailsById(normal($_GET['edit']));
                } else {
                    $edit_error = "Sorry, can't update password!";
                }
            }

        }


    }

  }


?>
<?php 
  $page_title = "Manage Users";
  include 'views/admin/layout/header.php'; 
?>
<?php 
    $users = getUsersDetails();
    include 'views/admin/users.php'; 
?>
<?php include 'views/admin/layout/footer.php'; ?>