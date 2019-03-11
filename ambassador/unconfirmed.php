<?php 
  include '../config/db.php';
  include 'includes/functions.php';
  include '../config/auth_ambassador.php';

  $showConfirm = false;
  $user_success = false;
  $user_error = false;

  if(isset($_GET['confirm']) && !empty($_GET['confirm']) && is_numeric($_GET['confirm'])){

    $part = getUnconfirmedById(normal($_GET['confirm']), $ambassador['ambassador_ID']);

    if(is_array($part) && count($part) > 0) {
        $showConfirm = true;
        $competitions = getCompetitions();

        if(isset($_POST['confirm_participant'])){
            
            try {
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $db->beginTransaction();
                
                // Update transaction table
                $q1 = "UPDATE `transactions` SET `transaction_status`='P' WHERE participant_ID=".$part['participant_ID'];
                $db->exec($q1);

                // Add record to transaction details
                $q2 = "INSERT INTO `transaction_details` (`transaction_ID`, `paid_to`, `details_receiver_ID`) VALUE ('".$part['transaction_ID']."', 'A', '".$ambassador['ambassador_ID']."')";
                $db->exec($q2);

                $db->commit();

                $user_success = "Successfully confirmed the participation!";

            } catch(Exception $e){
                $user_error = "Sorry, we couldn't complete your request. Try again.";
            }

        }
    }

  }

?>
<?php 
  $page_title = "Manage Participants";
  include 'views/layout/header.php'; 
?>
<?php 
    $participants = getUnconfirmedParticipants($ambassador['ambassador_ID']);
    include 'views/unconfirmed.php'; 
?>
<?php include 'views/layout/footer.php'; ?>