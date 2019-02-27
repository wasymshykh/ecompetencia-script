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
            if($user['institute_ID'] == $ambassador_details['institute_ID']){
                if(setUserAmbassador($user['user_ID'], $ambassador_details['ambassador_ID'])){
                    logger("User ID: ".$user['user_ID']." [".$user['user_fname']." ".$user['user_lname']."] just set up a ambassador ID: ".$ambassador_details['ambassador_ID']." [".$ambassador_details['ambassador_fname']." ".$ambassador_details['ambassador_lname']."].");
                    header('location: '.URL.'/public/account.php');
                } else {
                    header('location: '.URL.'/public/account.php?error=update_ambassador');
                }
            } else {
                header('location: '.URL.'/public/account.php?error=invalid_ambassador');
            }
        } else {
            header('location: '.URL.'/public/account.php');
        }

    }

    if($user['ambassador_ID'] == NULL){
        $ambassadors = getInstituteAmbassadors($user['institute_ID']);
    }

    $participations = getUserParticipation($_SESSION['user_id']);

?>
<?php include 'views/layout/account_header.php'; ?>
<?php include 'views/view.account.php'; ?>
<?php include 'views/layout/account_footer.php'; ?>