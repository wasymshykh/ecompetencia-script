<?php 
    include 'config/db.php';
    include 'public/includes/functions.php'; 
    session_start();

    $error = "";

    if(isset($_GET['email']) && isset($_GET['code'])){

        $email = normal($_GET['email']);
        $code = normal($_GET['code']);
        $reset_display = true;

        if(!userEmailExists($email) || !resetCodeExists($code) || !validResetCode($email, $code)){
            $error = "Invalid email or reset code. Please try reset option again.";
            $reset_display = false;
        }

        $reset_request = true;

        if(empty($error) && isset($_POST['reset_request'])){

            $password = normal($_POST['password']);
            $password_c = normal($_POST['password_c']);

            if(empty($password) || empty($password_c) || strlen($password) < 4){
                $error = "Password fields can't be empty. At least 4 characters password is acceptable.";
            }

            if(empty($error) && ($password != $password_c)) {
                $error = "Passwords didn't matched. Write them again!";
            }

            if(empty($error)) {
                if(updateUserPassword($email, $password, $code)){
                    $success = "Password successfully updated!";
                    $reset_display = false;
                } else {
                    $error = "Internal error: couldn't update the password. Contact team.";
                }
            }

        }
        

    }
    
    if(isset($_POST['reset'])){

        $email = normal($_POST['email']);

        if(empty($email) || strlen($email) < 4) {
            $error = "Kindly write your email properly.";
        }

        if(empty($error) && !userEmailExists($email)) {
            // check email validity
            $error = "Email entered does not exist in our side.";
        }

        if(empty($error)){
            
            if(isUserDisabled($email)){
                $error = "Your account was banned. Contact team for resolving the issue.";
            } 

            if(empty($error)){

                // reset code 
                $reset_code = getResetCode($email);
                $user = getUserByEmail($email);

                if($reset_code){
                    $name = $user['user_fname']." ".$user['user_lname'];
                    $to = $email;
                
                    $subject = "Password reset request - ecompetencia'19";
                
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
                                            <p>Dear <strong>'.$name.'</strong>,</p>
                                            <p>You have submitted your password reset request few moments ago.</p>
                                            <br>
                                            <p>You can request your password reset at link given below.</p>
                                            <br>
                                            <p style="text-align: center">
                                                <a href="'.URL.'/reset_password.php?email='.$email.'&code='.$reset_code.'" style="padding:6px 20px; background-color: #0080c4;color: #ffffff; text-transform:uppercase;font-size: 10px; border-radius: 2em; text-decoration: none; display: inline-block;">
                                                    Reset Now
                                                </a> 
                                                
                                                <br>
                                                
                                                <i color: #000; font-size: 10px;letter-spacing: 1px;text-decoration: none;>
                                                '.URL.'/reset_password.php?email='.$email.'&code='.$reset_code.'
                                                </i>
                                            </p>
                                            <br>
                                            <p>Thank you!</p>
                                            <p>Regards,<br>
                                            Team Ecompetencia</p>
                                        </td>
                                    </tr>
                                
                                </table>
                            </td>
                            </tr>
                        </table>
                    ';
                    
                    if(!mail($to, $subject, $message, implode("\r\n", $headers))){
                        $error = "Mail error: 1124. Contact team immediately, let us know error code [1124].";
                    } else {
                        $success = "Successfully emailed you the reset link. 
                        Wait for few moment for it to arrive. Also, don't forget to check spam folder";
                    }
                } else {
                    $error = "Insert error: 1101. Contact team immediately, let us know error code [1101].";
                }

            }
            
        }


    }

?>
<?php 
    $innerPage = true;
    $specialId = "i-p";
include 'public/views/layout/header.php'; ?>
<?php 
    include 'public/views/view.reset_password.php'; 
?>
<?php include 'public/views/layout/footer.php'; ?>