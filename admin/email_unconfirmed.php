<?php 
  include '../config/db.php';
  include 'includes/functions.php';
  include '../config/auth_admin.php';

  $success_mail = false;
  $error_mail = false;

  if(isset($_POST['send_mail'])){

    $subject = $_POST['mail_title'];
    $content = $_POST['mail_content'];
    if(strlen($subject) < 8) {
        $error_mail = "Email subject can't be less than 8 characters";
    }
    if(!$error_mail && strlen($content) < 30) {
        $error_mail = "Email content can't be less than 30 characters";
    }

    if(!$error_mail) {
        
        $unconfirmeds = getUnconfirmedParticipantsDetails();
        
        $success_count = 0;
        $error_count = 0;

        foreach ($unconfirmeds as $unconfirmed) {
            
            $name = $unconfirmed['user_fname']." ".$unconfirmed['user_lname'];
            $to = $unconfirmed['user_email'];
            
            $from_name = "Ecompetencia";
            $from = "info@ecompetencia19.com";
            $headers[] = 'MIME-Version: 1.0';
            $headers[] = 'Content-type: text/html; charset=utf-8';
            $headers[] = "To: $name <$to>";
            $headers[] = "From: $from_name <$from>";
            
            $message = '
                <table width="100%" cellspacing="0" cellpadding="10" border="0" bgcolor="#f3f3f3">
                    <tr>
                    <td align="center" bgcolor="#f3f3f3" padding-top: 10px;>
                        <p><img src="http://ecompetencia19.com/logo.png" width="192" height="120"></p>
                        
                        <table style="max-width:550px;width:90%;margin: 10px 0 25px 0;" cellspacing="0" cellpadding="15" border="0">
                        
                            <tr>
                                <td style="font-family:Trebuchet MS,Arial,Helvetica,sans-serif;box-shadow: 0 0 10px rgba(0,0,0,0.1); padding: 10px;" bgcolor="#FFFFFF" align="left">
                                    '.$content.'
                                    <p style="font-size:10px; padding: 1em 0 2em 0;">You are registered in <b>'.$unconfirmed['competition_name'].'</b> competition. <a href="http://ecompetencia19.com/login.php" target="blank" style="text-decoration:none">Login</a> for more information</p>
                                </td>
                            </tr>
                        
                        </table>
                    </td>
                    </tr>
                </table>
            ';
            
            // if(mail($to, $subject, $message, implode("\r\n", $headers))){
            //     $log_content = normal($content);
            //     $log_comment = "Subject: ".normal($subject)." - Email sent in bulk. Sending was initiated by: ".$_SESSION['management']['management_fname'] . ' '. $_SESSION['management']['management_lname'] . ' (ID: '.$_SESSION['management']['management_ID'].')';
            //     $query = "INSERT INTO `email_logs` (`log_email`, `log_content`, `log_comment`, `log_type`) VALUE ($to, $log_content, $log_comment, 'S')";
            //     $stmt = $db->prepare($query);
            //     $stmt->execute();
            //     $success_count++;
            // } else {
            //   $log_content = normal($content);
            //   $log_comment = "Subject: ".normal($subject)." - Email failed while sending in bulk. Sending was initiated by: ".$_SESSION['management']['management_fname'] . ' '. $_SESSION['management']['management_lname'] . ' (ID: '.$_SESSION['management']['management_ID'].')';
            //   $query = "INSERT INTO `email_logs` (`log_email`, `log_content`, `log_comment`, `log_type`) VALUE ($to, $log_content, $log_comment, 'F')";
            //   $stmt = $db->prepare($query);
            //   $stmt->execute();
            //   $error_count++;
            // }
            
        }

        // $success_mail = "Total Sent: <b>$success_count</b>";
        // $error_mail = "Not sent: <b>$error_count</b>";
        $error_mail = "OPTION IS CURRENTLY DISABLED. CONTACT DEVELOPER.";

    }

  }



$toPut=normal('<p>Dear Participant,<br>
Please pay your fees as soon as possible.</p>

<div style="text-align:center">
    <a href="http://ecompetencia19.com/ambassadors.php" style="background:#85ab30;color:#fff;padding:0.2em 1em;border-radius:2em;">
        check ambassadors
    </a>
</div>

<p>
Regards,<br>
Ecompetencia19
</p>

<p style="font-size:10px; font-style: italic">If you have already paid then ignore this email.</p>');

?>
<?php 
  $page_title = "Email Unconfirmed Participants";
  include 'views/admin/layout/header.php'; 
?>
<?php 
    include 'views/admin/email_unconfirmed.php'; 
?>
<?php include 'views/admin/layout/footer.php'; ?>