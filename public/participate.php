<?php 
    include '../config/db.php'; 
    include 'includes/functions.php'; 
    include '../config/auth_user.php';

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

    if(isset($_POST['step_2'])){

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


    if(isset($_POST['step_3'])){

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
            

            // insert -step1 into participants table [participant_team, user_ID, competition_ID, participant_time]
            // insert -step2 into members [member_name, participant_ID]
            
            // check for promo code [if]
                // insert - coupon_used [coupon_ID, transaction_ID]
                // calculate discount

            // insert -step3 into transactions [participant_ID,transaction_amount,transaction_discount,transaction_total,transaction_date]
            
            
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
<?php include 'views/layout/account_footer.php'; ?>