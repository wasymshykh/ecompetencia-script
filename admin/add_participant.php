<?php

    include '../config/db.php';
    include 'includes/functions.php';
    include '../config/auth_admin.php';
  

    // Getting post request data

    if(isset($_POST['add_participant'])){

        // Getting all the data to variable
        $e_fname = normal($_POST['e_fname']);
        $e_lname = normal($_POST['e_lname']);
        $e_mobile = normal($_POST['e_mobile']);
        $e_email = normal($_POST['e_email']);
        $e_ambassador = normal($_POST['e_ambassador']);
        $e_comp = normal($_POST['e_comp']);
        $e_team = normal($_POST['e_team']);
        $e_members = normal($_POST['e_members']);
        $e_university = normal($_POST['e_university']);
        $e_amount = normal($_POST['e_amount']);
        $e_discount = normal($_POST['e_discount']);
        $e_coupon = normal($_POST['e_coupon']);
        $e_collected = normal($_POST['e_collected']);


        if(empty($e_fname)){
            $user_error = "Please fill first name properly!";
        } else if(empty($e_lname)){
            $user_error = "Please fill last name properly.";
        } else if(empty($e_mobile)){
            $user_error = "Please fill mobile number properly.";
        } else if(empty($e_team)){
            $user_error = "Please fill team name properly.";
        } else if(empty($e_comp) || !is_numeric($e_comp)){
            $user_error = "Please select the competition properly.";
        } else if(!is_numeric($e_members) || $e_members < 0){
            $user_error = "Please fill members properly. Members can be zero or greater than zero.";
        } else if(empty($e_university) || !is_numeric($e_university)){
            $user_error = "Please select the university properly.";
        } else if(empty($e_amount) || !is_numeric($e_amount) || $e_amount < 1){
            $user_error = "Please fill amount properly, it must be greater than zero & a number.";
        } else if(empty($e_collected)){
            $user_error = "Please select the collected by properly.";
        }


        if(empty($user_error) && !empty($e_discount)) {
            if(empty($e_coupon)) {
                $user_error = "You've offered discount, under which coupon?";
            }
        }

        if(empty($e_ambassador)) {
            $e_ambassador = NULL;
        }

        // check for exisiting participant with same data
        if(empty($user_error)) {
            $q = "SELECT * FROM `participants` p INNER JOIN `users` u ON p.user_ID = u.user_ID INNER JOIN `competitions` c ON p.competition_ID = c.competition_ID WHERE p.competition_ID = :c_id AND u.user_phone = :u_phone";
            $stmt = $db->prepare($q);
            $stmt->execute(['c_id'=>$e_comp, 'u_phone'=>$e_mobile]);
            $result = $stmt->fetch();
            if(!empty($result)){
                $user_error = "A user with same details already exists in ".$result['competition_name']." & have same mobile number as you've entered [".$result['user_phone']."]";
            }
        }
        // check for exisiting participant with same data
        if(empty($user_error)) {
            $q = "SELECT * FROM `participants` p INNER JOIN `users` u ON p.user_ID = u.user_ID INNER JOIN `competitions` c ON p.competition_ID = c.competition_ID WHERE u.user_email = :u_mail";
            $stmt = $db->prepare($q);
            $stmt->execute(['u_mail'=>$e_email]);
            $result = $stmt->fetch();
            if(!empty($result)){
                $user_error = "A user with same details already exists & have same email as you've entered [".$result['user_email']."]";
            }
        }

        // Check for min-max members of competition
        if(empty($user_error)){
            $q = "SELECT * FROM `competitions` WHERE `competition_ID` = :c_id";
            $stmt = $db->prepare($q);
            $stmt->execute(['c_id'=>$e_comp]);
            $result = $stmt->fetch();
            if(empty($result)){
                $user_error = "Invalid competition selected!";
            } else if(($result['competition_min']-1) > (int)$e_members) {
                $user_error = "Minimum team members allowed in selected competition is <b>".($result['competition_min']-1)."</b>";
            } else if(($result['competition_max']-1) < (int)$e_members) {
                $user_error = "Maximum team members allowed in selected competition is <b>".($result['competition_max']-1)."</b>";
            }
            
        }

        if(empty($user_error)){
            // Extracting management/ambassador id
            $e_collected_s = explode('_', $e_collected);
            $e_member_type = $e_collected_s[0];
            $e_member_id = $e_collected_s[1];
            $e_password = strtolower($e_fname).'123';
            if(!empty($e_discount)){
                $e_db_amount = $e_discount + $e_amount;
            } else {
                $e_discount = 0;
                $e_db_amount = $e_discount + $e_amount;
            }

            $e_password_hash = password_hash($e_password, PASSWORD_BCRYPT);


            try {
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $db->beginTransaction();

                // user insert
                $user_query = "INSERT INTO `users`(`user_fname`, `user_lname`, `user_email`, `user_password`, `user_phone`, `institute_ID`, `ambassador_ID`) VALUE ('$e_fname', '$e_lname', '$e_email', '$e_password_hash', '$e_mobile', '$e_university'".(!empty($e_ambassador)?",'$e_ambassador'":", NULL").")";
                $db->exec($user_query);
                $user_id = $db->lastInsertId();


                $participant_query = "INSERT INTO `participants`(`participant_team`, `user_ID`, `competition_ID`) VALUE ('$e_team', '$user_id', '$e_comp')";
                $db->exec($participant_query);
                $participant_id = $db->lastInsertId();



                for($i = 0; $i < $e_members; $i++){
                    $member_query = "INSERT INTO `members`(`member_name`, `participant_ID`) VALUE ('member_".($i+1)."', '$participant_id')";
                    $db->exec($member_query);
                }


                $transaction_query = "INSERT INTO `transactions`(`participant_ID`, `transaction_amount`, `transaction_discount`, `transaction_total`, `transaction_status`) VALUE ('$participant_id', '$e_db_amount', '$e_discount', '$e_amount', 'P')";
                $db->exec($transaction_query);
                $transaction_id = $db->lastInsertId();


                if(!empty($e_discount) && !empty($e_coupon)) {
                    $coupon_query = "INSERT INTO `coupon_used`(`coupon_ID`, `transaction_ID`) VALUE ('$e_coupon', '$transaction_id')";
                    $db->exec($coupon_query);
                }


                $details_query = "INSERT INTO `transaction_details`(`transaction_ID`, `paid_to`, `details_receiver_ID`) VALUE ('$transaction_id', '". strtoupper($e_member_type) ."', '$e_member_id')";
                $db->exec($details_query);
                
                
                $db->commit();
                
                $user_success = "Successfully inserted the participant data.";

                // unsetting the variables
                unset($e_fname);
                unset($e_lname);
                unset($e_mobile);
                unset($e_team);
                unset($e_email);
                unset($e_ambassador);
                unset($e_comp);
                unset($e_members);
                unset($e_university);
                unset($e_amount);
                unset($e_discount);
                unset($e_coupon);
                unset($e_collected);

            } catch(Exception $e) {
                $user_error = "Couldn't complete the request. Submit again.";
            }



        }

        

    }

?>
<?php 
  $page_title = "Add User";
  include 'views/admin/layout/header.php'; 
?>
<?php

    $competitions = getCompetitions();
    $universities = getInstitutes();
    $coupons = getCoupons();
    $managements = getAllManagement();
    $ambassadors = getAmbassadorsApprovedDetails();
    include 'views/admin/add_participant.php'; 
?>
<?php include 'views/admin/layout/footer.php'; ?>