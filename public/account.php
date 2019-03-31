<?php 
    include '../config/db.php';
    include 'includes/functions.php';
    include '../config/auth_user.php';

    if(isset($_GET['rm']) && $_GET['rm'] == 'ambassador'){
        if(setUserAmbassador($user['user_ID'], NULL)){
            logger("User ID: ".$user['user_ID']." [".$user['user_fname']." ".$user['user_lname']."] has removed ambassador.");
            header('location: '.URL.'/public/account.php');
        } else {
            header('location: '.URL.'/public/account.php?error=ambassador');
        }
    }

    if(isset($_POST['selected_am']) && !empty(normal($_POST['selected_am']))){

        $selectedAmbassador = normal($_POST['selected_am']);
        // verify selected ambassador exists 
        if(verifyAmbassador($selectedAmbassador)){
            $ambassador_details = getAmbassadorDetailsByID($selectedAmbassador);
            if(setUserAmbassador($user['user_ID'], $ambassador_details['ambassador_ID'])){
                logger("User ID: ".$user['user_ID']." [".$user['user_fname']." ".$user['user_lname']."] just set up a ambassador ID: ".$ambassador_details['ambassador_ID']." [".$ambassador_details['ambassador_fname']." ".$ambassador_details['ambassador_lname']."].");
                header('location: '.URL.'/public/account.php');
            } else {
                header('location: '.URL.'/public/account.php?error=update_ambassador');
            }
        } else {
            header('location: '.URL.'/public/account.php');
        }

    }

    if($user['ambassador_ID'] == NULL){
        //$ambassadors = getInstituteAmbassadors($user['institute_ID']);
        $ambassadors = getAmbassadors();
    }

    $participations = getUserParticipation($_SESSION['user_id']);


    // checking members institute selected
    $showWarning = false;
    foreach($participations as $participation){
        // checking members institute
        $members = getMembersOfParticipant($participation['participant_ID']);
        foreach ($members as $member) {
            if($member["institute_ID"] == NULL){
                $showWarning = true;
            }
        }
    }

    $m_success = [false, false];
    // [member_id, error_msg]
    $m_error = [false, false];
    if(isset($_POST['update_member'])){
        //var_dump($_POST);
        
        if(!isset($_POST['m_id']) || empty($_POST['m_id']) || !is_numeric($_POST['m_id'])){
            $m_error = [true, "Invalid Data [m_id]"];
        } else {
            $member_id = normal($_POST['m_id']);
        }

        if(!$m_error[0] && (!isset($_POST['p_id']) || empty($_POST['p_id']) || !is_numeric($_POST['p_id']))){
            $m_error = [true, "Invalid Data [p_id]"];
        } else {
            $participant_id = normal($_POST['p_id']);
        }

        if(!$m_error[0] && (!isset($_POST['cnic']) || empty($_POST['cnic']))){
            $m_error = [true, "Please enter member's cnic number."];
        } 

        if(!$m_error[0]){
            $cnic = normal($_POST['cnic']);
            if(!preg_match("/[0-9+]{5}-[0-9+]{7}-[0-9]{1}/", $cnic)) {
                $m_error = [true, "Please enter cnic in correct format."];
            }
        }

        if(!$m_error[0] && (!isset($_POST['institute']) || empty($_POST['institute']))){
            $m_error = [true, "Please select member's institute."];
        }

        if(!$m_error[0]){
            $institute = normal($_POST['institute']);
            if(!isValidInstitute($institute)) {
                $m_error = [true, "Invalid intitute selected."];
            }
        }


        // checking valid participant id
            //must match with currently logged user
        if(!$m_error[0]){
            $participation = getParticipationDetails($participant_id);
            if(!empty($participation)){
                if($participation['user_ID'] != $user['user_ID']){
                    $m_error = [true, "Sorry, we don't accept invalid data [1001]"];
                }
            } else {
                $m_error = [true, "Sorry, we don't accept invalid data [1002]"];
            }
        }
            // member id must belongs to same participation
        if(!$m_error[0]){
            $member = getMemberDetails($member_id);
            if(!empty($member)){
                if($member['participant_ID'] != $participation['participant_ID']){
                    $m_error = [true, "Sorry, we don't accept invalid data [1004]"];
                }
            } else {
                $m_error = [true, "Sorry, we don't accept invalid data [1003]"];
            }
        }



        if(!$m_error[0]){            
            
            
            
            $member = getMemberDetails($member_id);
            $query = "UPDATE `members` SET `member_cnic`=:m_c, `institute_ID`=:m_i WHERE `member_ID`=:mid";
            $stmt = $db->prepare($query);
            if($stmt->execute(['m_c'=>$cnic, 'm_i'=>$institute, 'mid'=>$member_id])){
                $m_success = [true, "Successfully updated your member [<b>".$member['member_name']."</b>] data"];
            } else {
                $m_error = [true, "Sorry, we couldn't process request [1005]"];
            }

            $calculateFees = true;
            $members = getMembersOfParticipant($participant_id);
            foreach ($members as $member) {
                if($member["institute_ID"] == NULL){
                    $calculateFees = false;
                }
            }

            // calculating fees on filling last data upon true
            if($calculateFees) {
                
                $amount = 0;
                $discount = 0;
                $total = 0;

                $comp_e_fees = $participation['competition_e_fee'];
                $comp_i_fees = $participation['competition_i_fee'];

                // leader
                $leader = getUserById($participation['user_ID']);
                $leader_institute = getInstituteById($leader['institute_ID']);

                if($leader_institute['institute_type'] == 'I') {
                    $amount += $comp_i_fees;
                } else {
                    $amount += $comp_e_fees;
                }

                foreach ($members as $member) {
                    $member_institute = getInstituteById($member['institute_ID']);

                    if($member_institute['institute_type'] == 'I') {
                        $amount += $comp_i_fees;
                    } else {
                        $amount += $comp_e_fees;
                    }
                }

                $total = $amount;
                
                if($participation['transaction_amount'] != $amount){
                    // recalculating discount
                    $coupon_used = getCouponUsedByTransactionId($participation['transaction_ID']);
                    if(!empty($coupon_used)) {
                        $coupon = getPromoById($coupon_used['coupon_ID']);

                        if($coupon['coupon_type'] == 'P'){
                            $percent = (int)$coupon['coupon_discount'];
                            $discount = $amount * ($percent/100);
                        } else {
                            $c_amount = (int)$coupon['coupon_discount'];
                            $discount = $c_amount;
                        }

                        $total = $amount - $discount;
                    }

                    try {
                    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $db->beginTransaction();

                        if($participation['transaction_status'] == 'U'){
                            $t_q = "UPDATE `transactions` SET `transaction_amount`=$amount, `transaction_discount`=$discount, `transaction_total`=$total WHERE `transaction_ID`='".$participation['transaction_ID']."'";
                            $db->exec($t_q);
                        } else {
                            $credit = $total - ((int)$participation['transaction_total']);
                            if($credit > 0) {
                                $c_q = "INSERT INTO `credits_left`(`credit_amount`, `transaction_ID`) VALUE ('$credit', '".$participation['transaction_ID']."')";
                                $db->exec($c_q);
                                $t_q = "UPDATE `transactions` SET `transaction_amount`=$amount, `transaction_discount`=$discount, `transaction_total`=$total, `transaction_status`='C' WHERE `transaction_ID`='".$participation['transaction_ID']."'";
                                $db->exec($t_q);
                            }
                        }

                        $db->commit();
                        header('location: '.URL.'/public/account.php?success=updated');

                    } catch (Exception $e){
                        $m_error = [true, "Sorry, we couldn't process request [1006]"];
                    }

                }

                


            }





        }


        //var_dump($user);
       // $m_error = [normal($_POST['m_id']), "Enter Valid Data"];

    }



?>
<?php include 'views/layout/account_header.php'; ?>
<?php include 'views/view.account.php'; ?>
<?php include 'views/layout/account_footer.php'; ?>