<?php 
    include '../config/db.php';
    include 'includes/functions.php'; 
    
    if(isPageDisabled('ambassador_applicants')){
        header('location: '.URL.'/index.php');
    }

    $error="";
    if(isset($_POST['apply'])){
        function fileNameCheck($filename) {
            return ((preg_match("`^[-0-9A-Z_\.]+$`i",$filename)) ? true : false);
        }

        $accepted = ["image/png","image/jpg", "image/jpeg"];
        
        $fname = normal($_POST['firstname']);
        $lname = normal($_POST['lastname']);
        $email = normal($_POST['email']);
        $phonenumber = normal($_POST['phone']);
        $institute = normal($_POST['institute']);
        $experience = normal($_POST['experience']);
        $experiencetext = normal($_POST['experiencetext']);
        
        $avatar_name= time() .'_'. $_FILES['avatar']['name'];
        $avatar_size=$_FILES['avatar']['size'];
        $avatar_type=$_FILES['avatar']['type'];
        $avatar_tmp_name=$_FILES['avatar']['tmp_name'];

        if(empty($fname) || strlen($fname) < 1) {
            $error = "First name is empty!";
        } else
        if(empty($lname) || strlen($lname) < 1) {
            $error = "Last name is empty!";
        } else
        if(empty($email) || strlen($email) < 1) {
            $error = "Email is empty!";
        } else 
        if(ambassadorEmailExists($email)){
            $error = "Email address already used!";
        } else
        if(empty($phonenumber) || strlen($phonenumber) < 11) {
            $error = "Phone number is invalid!";
        } else
        if(empty($institute) || strlen($institute) < 1) {
            $error = "Please select your institute!";
        } else 
        if(!isValidInstitute($institute)){
            $error = "Data tampering is not allowed!";
        } else
        if(empty($experience) || strlen($experience) < 1){
            $error = "Please select your experience!";
        } else
        if($experience == "Yes" && (empty($experiencetext) || strlen($experiencetext) < 1)){
            $error = "Please write about your experience!";
        }
        else if(empty($_FILES['avatar']['name'])) {
            $error = "Please select your picture!";
        } else if(!fileNameCheck($_FILES['avatar']['name'])){
            $error = "File name should not contain any special characters";
        }
        else if ($avatar_size > 10000000) {
            $error = "Picture size should not exceed 10mb!";
        } else if (!in_array($_FILES['avatar']['type'], $accepted)) {
            $error = "Image type is not supported!";
        }
        else if(!move_uploaded_file($avatar_tmp_name,"applicants/ambassador/$avatar_name")){
            $error = "Couldn't upload your selected image.";
        }

        if(empty($error)) {

            if($experience != "Yes"){
                $experiencetext = NULL;
            }

            $sqlQuery="INSERT INTO `ambassador_applicant` (`ambassador_fname`, `ambassador_lname`, `ambassador_email`, `ambassador_phoneno`, `ambassador_experience`, `institute_ID`, `ambassador_avatar`) 
            VALUES('$fname','$lname','$email','$phonenumber','$experiencetext',$institute,'$avatar_name')";
            $stmt = $db->prepare($sqlQuery);
            if($stmt->execute() === true){
                $success = "You have successfully submitted the application.";
            }
            else{
                $error = "Couldn't process the application. Try again.";
            }
        }
        
        if(empty($error)){
            $name = "$fname $lname";
            $to = $email;
        
            $subject = "Thank you for applying for Ecompetencia'19";
        
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
                                    <p>Thank you for applying as a Ambassador for Iqra University Ecompetencia 2019. Your application has been recorded.</p>
                                    <br>
                                    <p>We\'ll contact you soon. Meanwhile, Stay updated with the event by following our facebook page.</p>
                                    <br>
                                    <p style="text-align: center">
                                        <a href="https://www.facebook.com/IUEcompetencia" style="padding:6px 20px; background-color: #2e2e89;color: #ffffff; text-transform:uppercase;font-size: 10px; border-radius: 2em; text-decoration: none; display: inline-block;">
                                            Official Facebook
                                        </a> 
                                        
                                        <br>
                                        
                                        <i color: #000; font-size: 10px;letter-spacing: 1px;text-decoration: none;>
                                        https://www.facebook.com/IUEcompetencia
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
                $error = "Insert error: 1124. Contact team immediately, let us know error code [1124].";
            }
        }
        
    }
?>
<?php 
  $page_title = "Ecompetencia Ambassador";
  include 'views/layout/header.php'; 
?>
<?php 

    $institutes = getInstitutes();
  include 'views/ambassador.php'; 
?>
<?php include 'views/layout/footer.php'; ?>