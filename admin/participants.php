<?php 
  include '../config/db.php';
  include 'includes/functions.php';
  include '../config/auth_admin.php';

  $showEdit = false;
  $user_success = false;
  $user_error = false;

  if(isset($_GET['edit']) && !empty($_GET['edit']) && is_numeric($_GET['edit'])){

    $part = getPartDetailsById(normal($_GET['edit']));

    if(is_array($part) && count($part) > 0) {
        $showEdit = true;
        $competitions = getCompetitions();

        if(isset($_POST['edit_participant'])){
            $e_teamname = normal($_POST['e_teamname']);
            $e_comp = normal($_POST['e_comp']);
            $comp_changed = false;
            $teamname_changed = false;

            if(empty($e_teamname)) {
                $user_error = "Team name can't be empty!";
            }
            if(empty($user_error) && empty($e_comp)) {
                $user_error = "User can't be empty!";
            }
            if(empty($user_error) && $e_comp != $part['competition_ID']) {
                $comp_changed = true;
            }
            if(empty($user_error) && $e_teamname != $part['participant_team']) {
                $teamname_changed = true;
            }

            if(empty($user_error) && $teamname_changed){
                $updateQuery = "UPDATE `participants` SET 
                `participant_team`='$e_teamname' WHERE `participant_ID`=".$part['participant_ID'];
                $stmt = $db->prepare($updateQuery);
                if($stmt->execute()){
                    $user_success = "Team name updated successfully!";
                    $part = getPartDetailsById(normal($_GET['edit']));
                } else {
                    $user_error = "Sorry, can't update team name!";
                }
            }

            if(empty($user_error) && $comp_changed){
                $competition = getCompetitionById($e_comp);
                $numSelectedMembers = 1;
                $memberNames = [];

                if(is_array($competition) && count($competition) < 1){
                    $user_error = "Invalid competition selected!";
                } 

                if(empty($user_error) && !isLimitExceeded($e_comp, $competition['competition_limit'])){
                    $user_error = "Seats limit is exceeded for selected competition.";
                }

                if(empty($user_error) && !isUserEligibleParticipation($part['user_ID'], $e_comp)){
                    $user_error = "User is already participating in selected competition";
                }

                if(empty($user_error) && $part['transaction_status'] == 'P'){
                    $user_error = "User has already paid for the competition!";
                }

                if(isset($_POST['e_members']) && is_array($_POST['e_members'])){
                    for($i = 0; $i < count($_POST['e_members']); $i++) {
                        if(!empty(normal($_POST['e_members'][$i]))){
                            $numSelectedMembers += 1;
                            $memberNames[] = normal($_POST['e_members'][$i]);
                        }
                    }
                }

                if(empty($user_error) && !($competition['competition_min'] <= $numSelectedMembers)){
                    $user_error = "Minimum ".$competition['competition_min']." members allowed";
                }
                if(empty($user_error) && !($competition['competition_max'] >= $numSelectedMembers)){
                    $user_error = "Maximum ".$competition['competition_max']." members allowed";
                }

                if(empty($user_error)){
                    $user_details = getUserDetailsById($part['user_ID']);
                    $amount = 0;
                    $discount = 0;
                    if($user_details['institute_type'] == 'E'){
                        $amount = $competition['competition_e_fee'] * $numSelectedMembers;
                    } else {
                        $amount = $competition['competition_i_fee'] * $numSelectedMembers;
                    }
                    $total = $amount;

                    $couponCheckQuery = "SELECT * FROM `coupon_used` u INNER JOIN `coupons` c ON u.coupon_ID = c.coupon_ID WHERE u.transaction_ID=".$part['transaction_ID'];
                    $stmt = $db->prepare($couponCheckQuery);
                    $stmt->execute();
                    $coupon_used = $stmt->fetch();

                    if(!empty($coupon_used)){
                        if($coupon_used['coupon_type'] == 'P'){
                            $discount = $amount * ($coupon_used['coupon_discount']/100);
                            $total = $amount - $discount;
                        } else {
                            $discount = $coupon_used['coupon_discount'];
                            $total = $amount - $discount;
                        }
                    }

                    try {
                        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $db->beginTransaction();

                        // Removing members
                        $q1 = "DELETE FROM `members` WHERE participant_ID=".$part['participant_ID'];
                        $db->exec($q1);
                        
                        // Adding new members if any
                        if(count($memberNames) > 0){
                            foreach ($memberNames as $memberName) {
                                $membersQuery = "INSERT INTO `members`(`member_name`, `participant_ID`) VALUE ('$memberName', '".$part['participant_ID']."')";
                                $db->exec($membersQuery);
                            }
                        }

                        // Transaction table updating
                        $q2 = "UPDATE `transactions` SET `transaction_amount`=$amount, `transaction_discount`=$discount, `transaction_total`=$total WHERE participant_ID=".$part['participant_ID'];
                        $db->exec($q2);

                        // Updating participants table
                        $q3 = "UPDATE `participants` SET `competition_ID`=$e_comp WHERE participant_ID=".$part['participant_ID'];
                        $db->exec($q3);

                        $db->commit();

                        $user_success = "Successfully updated the competition!";
                        $part = getPartDetailsById(normal($_GET['edit']));

                    } catch(Exception $e){
                        $user_error = "Sorry, we couldn't complete your request. Try again.";
                    }

                }

            }
        }


    }

  }


?>
<?php 
  $page_title = "Manage Participants";
  include 'views/admin/layout/header.php'; 
?>
<?php 
    $participants = getParticipantsDetails();
    include 'views/admin/participants.php'; 
?>
<?php include 'views/admin/layout/footer.php'; ?>