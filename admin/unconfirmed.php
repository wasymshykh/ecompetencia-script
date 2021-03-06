<?php 
  include '../config/db.php';
  include 'includes/functions.php';
  include '../config/auth_admin.php';

  $showConfirm = false;
  $user_success = false;
  $user_error = false;

  if(isset($_GET['confirm']) && !empty($_GET['confirm']) && is_numeric($_GET['confirm'])){

    $part = getUnconfirmedPartDetailsById(normal($_GET['confirm']));

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
                $q2 = "INSERT INTO `transaction_details` (`transaction_ID`, `paid_to`, `details_receiver_ID`) VALUE ('".$part['transaction_ID']."', 'M', '".$_SESSION['management']['management_ID']."')";
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
  include 'views/admin/layout/header.php'; 
?>
<?php 
    $participants = getUnconfirmedParticipantsDetails();
    include 'views/admin/unconfirmed.php'; 
?>
<?php include 'views/admin/layout/footer.php'; ?>