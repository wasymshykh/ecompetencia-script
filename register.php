<?php 
    include 'config/db.php';
    include 'public/includes/functions.php'; 
    
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