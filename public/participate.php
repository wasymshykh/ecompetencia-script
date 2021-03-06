<?php 
    include '../config/db.php'; 
    include 'includes/functions.php'; 
    include '../config/auth_user.php';

    // checking members institute selected
    $participations = getUserParticipation($_SESSION['user_id']);
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

    if($showWarning):
        header('location: '.URL.'/public/account.php');

    else:

    $step_1 = true;
    $step_2 = false;
    $step_3 = false;

    if(isset($_POST['step_1'])){

        if(isset($_POST['competition'])){
            $competition_id = normal($_POST['competition']);
        
            $competition_details = getCompetitionById($competition_id);

            if(!$competition_details || count($competition_details) < 1){
                $error = "Invalid competition selected!";
            }

            if(empty($error) && !isUserEligibleParticipation($user['user_ID'], $competition_details['competition_ID'])){
               $error = "Sorry, you have already participated in the selected competition!";
            }

            if(empty($error) && !isLimitExceeded($competition_details['competition_ID'], $competition_details['competition_limit'])){
                $error = "Sorry, competition available limit is exceeded!";
            }
    
            if(empty($error)){
                $_SESSION['process_step'] = 2; // must go to second step
                $_SESSION['process_competition'] = $competition_id;
                $_SESSION['process_competition_name'] = $competition_details['competition_name'];
                $_SESSION['process_competition_min'] = $competition_details['competition_min'];
                $_SESSION['process_competition_max'] = $competition_details['competition_max'];
                $_SESSION['process_competition_fee'] = ($user['institute_type']=='E')?$competition_details['competition_e_fee']:$competition_details['competition_i_fee'];
                $step_1 = false;
                $step_2 = true;
            }
        
        }
        else{
            $error = "Please select competition before continuing.";
        }

    }

    if(isset($_POST['step_2']) && $_SESSION['process_step']==2){

        // Getting selected competition in step 1 
        $competition_id = normal($_SESSION['process_competition']);
        $competition_details = getCompetitionById($competition_id);
        if(!$competition_details || count($competition_details) < 1){
            // session expired 
            header('location: participate.php');
        }

        
        if(empty($error) && isset($_POST['team_name']) && !empty(normal($_POST['team_name']))){
            $team_name = normal($_POST['team_name']);
        } else {
            $error = "Please fill team name properly";
        }

        // Calculating submited members
        if(empty($error) && ($competition_details['competition_min'] > 1 || (isset($_POST['persons']) && !empty($_POST['persons'])))){
            if(isset($_POST['persons'])){
                if(!empty(normal($_POST['persons'])) && is_numeric(normal($_POST['persons']))){
                    $persons = normal($_POST['persons']);
                } else {
                    $error = "Please select at least ".($competition_details['competition_min'] - 1)." member(s)";
                }
            } else {
                $error = "Please select at least ".($competition_details['competition_min'] - 1)." member(s)";
            }

            if(empty($error) && isset($_POST['member']) && count($_POST['member']) == $persons){
                $members = array_map('normal',$_POST['member']);

                for($i = 0; $i < count($members) && empty($error); $i++){
                    if(empty($members[$i])){
                        $error = "Members fields are not properly filled!";
                    }
                }

            } else {
                $error = "Invalid member fields amount.";
            }
        }

        if(empty($error)){
            $_SESSION['process_step'] = 3;
            $_SESSION['process_team_name'] = $team_name;
            $_SESSION['process_total_amount'] = $_SESSION['process_competition_fee'];
            if(isset($persons)){
                $_SESSION['process_team_members'] = $persons;
                $_SESSION['process_team_member_names'] = $members;
                $_SESSION['process_total_amount'] += $_SESSION['process_competition_fee'] * $persons;
            } else {
                if(isset($_SESSION['process_team_members'])){
                    unset($_SESSION['process_team_members']);
                }
                if(isset($_SESSION['process_team_member_names'])){
                    unset($_SESSION['process_team_member_names']);
                }
            }
            $step_1 = false;
            $step_2 = false;
            $step_3 = true;
        } else {
            $step_1 = false;
            $step_2 = true;
            $step_3 = false;
        }

    }


    if(isset($_POST['step_3']) && $_SESSION['process_step']==3){

        // Getting selected competition from step 1 
        $competition_id = normal($_SESSION['process_competition']);
        $competition_details = getCompetitionById($competition_id);
        if(!$competition_details || count($competition_details) < 1){
            // session expired 
            header('location: participate.php');
        }

        $coupon_used = false;
        if(isset($_POST['promo_code']) && !empty(normal($_POST['promo_code']))){
            $promo = getPromoByName(normal($_POST['promo_code']));
            if($promo && count($promo) > 0 && $promo['coupon_status'] == 'E'){
                if($promo['times_used'] < $promo['coupon_limit']){
                    $coupon_used = true;
                } else {
                    $error = "Promo code is exceeded over it's limits.";
                }
            } else {
                $error = "Invalid promo code entered!";
            }
        }


        if(empty($error)){

            // values to insert
            $team_name = $_SESSION['process_team_name'];
            $comp_id = $competition_details['competition_ID'];
            $user_id = $user['user_ID'];
            $amount = $_SESSION['process_competition_fee'];
            $discount = 0;
            $total = $_SESSION['process_competition_fee'];

            $hasmembers = isset($_SESSION['process_team_members'])?true:false;
            if($hasmembers){
                $members = $_SESSION['process_team_member_names'];
                $amount += $amount * count($_SESSION['process_team_member_names']);
                $total += $total * count($_SESSION['process_team_member_names']);
            }

            try {
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $db->beginTransaction();

                // insert -step1 into participants table [participant_team, user_ID, competition_ID, participant_time]
                $participationQuery = "INSERT INTO `participants` (`participant_team`, `user_ID`, `competition_ID`) 
                VALUE ('$team_name', '$user_id', '$comp_id')";
                $db->exec($participationQuery);
                // [TODO] get participant inserted id;
                $part_ID = $db->lastInsertId();


                // insert -step2 into members [member_name, participant_ID]
                if($hasmembers){
                    foreach ($members as $member) {
                        $membersQuery = "INSERT INTO `members`(`member_name`, `participant_ID`) VALUE ('$member', '$part_ID')";
                        $db->exec($membersQuery);
                    }
                }

                // calculate discount
                if($coupon_used) {
                    if($promo['coupon_type'] == 'P'){
                        $discount = $amount * ($promo['coupon_discount']/100);
                        $total = $amount - $discount;
                    } else {
                        $discount = $promo['coupon_discount'];
                        $total = $amount - $discount;
                    }
                }

                // insert -step3 into transactions [participant_ID,transaction_amount,transaction_discount,transaction_total]
                $transactionQuery = "INSERT INTO `transactions`(`participant_ID`, `transaction_amount`, `transaction_discount`, `transaction_total`) VALUE
                ('$part_ID', '$amount', '$discount', '$total')";
                $db->exec($transactionQuery);
                // [TODO] get transaction inserted id;
                $trans_ID = $db->lastInsertId();
                
                // check for promo code [if]
                    // insert - coupon_used [coupon_ID, transaction_ID]
                    if($coupon_used){
                        $discountQuery = "INSERT INTO `coupon_used` (`coupon_ID`, `transaction_ID`) VALUE ('".$promo['coupon_ID']."', '$trans_ID')";
                        $db->exec($discountQuery);
                    }

                $db->commit();
                
                logger("User ID: ".$user['user_ID']." [".$user['user_fname']." ".$user['user_lname']."] registered for 
                    Competition ID: ".$comp_id." [".$competition_details['competition_name']."]");

                $_SESSION['process_step'] = 1;
                header('location: '.URL.'/public/account.php?success=participation');

            } catch(Exception $e){
                $error = "Sorry, we couldn't complete your request. Try again.";
                $step_1 = false;
                $step_2 = false;
                $step_3 = true;
            }

            
        } else {
            $step_1 = false;
            $step_2 = false;
            $step_3 = true;
        }

    
    }


?>
<?php include 'views/layout/account_header.php'; ?>
<?php 
    $competitions = getCompetitions();
    include 'views/view.participate.php'; 
?>
<?php 

    include 'views/layout/account_footer.php'; 

    endif; ?>