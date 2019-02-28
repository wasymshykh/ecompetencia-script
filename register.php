<?php 
    include 'config/db.php';
    include 'public/includes/functions.php'; 
    session_start();
    
    $error = "";
    $showConfirmed = false;

    if(isset($_POST['register'])) {

        $first_name = normal($_POST['firstname']);
        $last_name = normal($_POST['lastname']);
        $phone = normal($_POST['phone']);
        $institute = normal($_POST['institute']);

        $email = normal($_POST['email']);
        $password = normal($_POST['password']);
        $password_c = normal($_POST['password_c']);

        // checking for empty fields
        if(empty($first_name) || strlen($first_name) < 2){
            $error = "Kindly write your first name properly.";
        } else
        if(empty($last_name) || strlen($last_name) < 2){
            $error = "Kindly write your last name properly.";
        } else
        if(empty($institute) || strlen($institute) < 1) {
            $error = "Kindly your institute properly.";
        } else
        if(empty($phone) || strlen($phone) < 11){
            $error = "Kindly write your phone number properly.";
        } else
        if(empty($email) || strlen($email) < 4) {
            $error = "Kindly write your email properly.";
        } else
        if(empty($password) || strlen($password) < 4) {
            $error = "Kindly write your password properly. Password must be atleast 4 characters long.";
        }

        if(empty($error) && $password != $password_c){
            // check password match
            $error = "Your password didn't match the confirm password. Kindly write again.";
        }
        if(empty($error) && userEmailExists($email)) {
            // check email unique
            $error = "Email you have used is already registered.";
        }
        if(empty($error) && !isValidInstitute($institute)) {
            // check id of institute is valid
            $error = "Data tampering is not allowed.";
        }

        if(empty($error)) {

            $hashed_password = password_hash($password, PASSWORD_BCRYPT);

            // inserting user
            $userQuery = "INSERT INTO 
                `users`(`user_fname`,`user_lname`,`user_email`,`user_password`,`user_phone`,`institute_ID`)
            VALUE
                ('$first_name', '$last_name', '$email', '$hashed_password', '$phone', '$institute')
            ";

            $stmt = $db->prepare($userQuery);
            if($stmt->execute()){
                $showConfirmed = true;

                $name = $first_name." ".$last_name;
                $to = $email;
            
                $subject = "Registration Successful - Ecompetencia'19";
            
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
                                        <p>Thank you for registering for Ecompetencia 2019.</p>
                                        <br>
                                        <p>Your account is now created. You can find your login details below:</p>
                                        <br>
                                        <ul>
                                            <li><span>Email</span> <b>'.$email.'</b></li>
                                            <li><span>Password</span> <b>'.$password.'</b></li>
                                        </ul>
                                        <br>
                                        <p style="text-align: center">
                                            <a href="'.URL.'/login.php" style="padding:6px 20px; background-color: #0080c4;color: #ffffff; text-transform:uppercase;font-size: 10px; border-radius: 2em; text-decoration: none; display: inline-block;">
                                                Login Now
                                            </a> 
                                            
                                            <br>
                                            
                                            <i color: #000; font-size: 10px;letter-spacing: 1px;text-decoration: none;>
                                            '.URL.'/login.php
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
                    logger("MAIL ERROR: User ID: ".$db->lastInsertId()." [$name] account created but mail couldn't be sent.");
                } else {
                    logger("User ID: ".$db->lastInsertId()." [$name] account created.");
                }

            } else {
                $error = "Sorry, we couldn't register. Insert error 1100. Share this error code with the team.";
            }

        }

    }


?>
<?php 
    $innerPage = true;
    $specialId = "i-p";
include 'public/views/layout/header.php'; ?>
<?php 
    $institutes = getInstitutes();
    include 'public/views/view.register.php'; 
?>
<?php include 'public/views/layout/footer.php'; ?>