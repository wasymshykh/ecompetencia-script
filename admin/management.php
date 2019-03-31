<?php 
  include '../config/db.php';
  include 'includes/functions.php';
  include '../config/auth_admin.php';

    $showNewModal = false;
    $showEdit = false;
    $error = false;
    
    $page_success = false;
    $page_error = false;


    if(isset($_POST['go_action'])){
        if(isset($_POST['action']) && !empty(normal($_POST['action']))){
            
            $selects = $_POST['selected'];
            
            $status = 'E';
            if(normal($_POST['action']) == 'ban'){
                $status = 'D';
            }
            
            $countSuccess = 0;
            foreach($selects as $select){
                $updateQuery = "UPDATE `management` SET 
                `management_status`='$status' WHERE `management_ID`=".$select;
                $stmt = $db->prepare($updateQuery);
                if($stmt->execute()){
                    $countSuccess++;
                }
            }
            
            if($countSuccess == count($selects)){
                $page_success = "Hurrah! updated records. Successfully updated: $countSuccess records.";
            } else {
                $page_error = "Error! couldn't update some records. Successfully updated: $countSuccess records. Failed to update: ". (count($selects) - $countSuccess) ." records. " . count($select);
            }
            
        }
    }


    if(isset($_GET['toggle']) && !empty($_GET['toggle']) && is_numeric($_GET['toggle'])){
        $management_details = getManagementDetailsById(normal($_GET['toggle']));
        if(is_array($management_details) && count($management_details) > 0) {
            $status = 'E';
            if($management_details['management_status'] == 'E'){
                $status = 'D';
            }
            $updateQuery = "UPDATE `management` SET 
            `management_status`='$status' WHERE `management_ID`=".$management_details['management_ID'];
            $stmt = $db->prepare($updateQuery);

            if($stmt->execute()){
                header('location: management.php?updated=true');
            } else {
                header('location: management.php?updated=false');
            }
        }
    }

    
    if(isset($_GET['edit']) && !empty($_GET['edit']) && is_numeric($_GET['edit'])){
        $m_details = getManagementDetailsById(normal($_GET['edit']));
        if(is_array($m_details) && count($m_details) > 0) {
            $showEdit = true;
        }


        if(isset($_POST['edit_user'])){
            $e_fname = normal($_POST['e_fname']);
            $e_lname = normal($_POST['e_lname']);
            $e_email = normal($_POST['e_email']);
            $e_phone = normal($_POST['e_phone']);

            if(empty($e_fname)) {
                $user_error = "First name can't be empty!";
            }
            if(empty($user_error) && empty($e_lname)) {
                $user_error = "Last name can't be empty!";
            }
            if(empty($user_error) && empty($e_email)) {
                $user_error = "Email can't be empty!";
            }
            if(empty($user_error) && empty($e_phone)) {
                $user_error = "Phone can't be empty!";
            }

            if(empty($user_error)){
                $updateQuery = "UPDATE `management` SET 
                `management_fname`='$e_fname', `management_lname`='$e_lname', `management_email`='$e_email', 
                `management_mobile`='$e_phone' WHERE `management_ID`=".$m_details['management_ID'];
                $stmt = $db->prepare($updateQuery);

                if($stmt->execute()){
                    $user_success = "Data updated successfully!";
                    $m_details = getManagementDetailsById(normal($_GET['edit']));
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

                $updateQuery = "UPDATE `management` SET 
                `management_password`='$e_password' WHERE `management_ID`=".$m_details['management_ID'];
                $stmt = $db->prepare($updateQuery);

                if($stmt->execute()){
                    $edit_success = "Password updated successfully!";
                    $m_details = getManagementDetailsById(normal($_GET['edit']));
                } else {
                    $edit_error = "Sorry, can't update password!";
                }
            }

        }

    }




    if(isset($_POST['add_user'])){

        if(!isset($_POST['password']) || empty(normal($_POST['password']))){
            $error = "Password can't be empty!";
            $showNewModal = true;
        } else if(normal($_POST['password']) != normal($_POST['password_c'])){
            $error = "Password doesn't match";
            $showNewModal = true;
        } else if(strlen(normal($_POST['password'])) < 5) {
            $error = "Password must be 5 char long";
            $showNewModal = true;
        }else {
            $password = normal($_POST['password']);
        }

        if(!isset($_POST['phone']) || empty(normal($_POST['phone']))){
            $error = "Phone can't be empty!";
            $showNewModal = true;
        } else {
            $phone = normal($_POST['phone']);
        }

        if(!isset($_POST['email']) || empty(normal($_POST['email']))){
            $error = "Email address can't be empty!";
            $showNewModal = true;
        } else {
            $email = normal($_POST['email']);
        }

        if(!isset($_POST['l_name']) || empty(normal($_POST['l_name']))){
            $error = "Last name can't be empty!";
            $showNewModal = true;
        } else {
            $l_name = normal($_POST['l_name']);
        }

        if(!isset($_POST['f_name']) || empty(normal($_POST['f_name']))){
            $error = "First name can't be empty!";
            $showNewModal = true;
        } else {
            $f_name = normal($_POST['f_name']);
        }

        if(empty($error)){
            $type = normal($_POST['type']);
            
            $query = "INSERT INTO `management` (`management_fname`,`management_lname`,`management_password`, `management_email`,`management_mobile`, `management_type`) 
            VALUE ('$f_name', '$l_name', '$password', '$email', '$phone', '$type')";
            $stmt = $db->prepare($query);

            if(!$stmt->execute()){
                $error = "Couldn't process the request!";
                $showNewModal = true;
            } else {
                header('management.php');
            }

        }

    }

?>
<?php 
  $page_title = "Management Users";
  include 'views/admin/layout/header.php'; 
?>
<?php 
    $managements = getAllManagement();
    include 'views/admin/management.php'; 
?>
<?php include 'views/admin/layout/footer.php'; ?>