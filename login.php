<?php 
    include 'config/db.php';
    include 'public/includes/functions.php'; 
    session_start();

    $error = "";
    
    if(isset($_POST['login'])){

        $email = normal($_POST['email']);
        $password = normal($_POST['password']);

        if(empty($email) || strlen($email) < 4) {
            $error = "Kindly write your email properly.";
        } else
        if(empty($password) || strlen($password) < 4) {
            $error = "Kindly write your password properly.";
        }

        if(empty($error) && !userEmailExists($email)) {
            // check email unique
            $error = "Email entered is incorrect.";
        }

        if(empty($error)){
            
            if(userLoginDetailsCheck($email, $password)) {
                
                $_SESSION['logged'] = true;
                $_SESSION['user_id'] = getUserByEmail($email)['user_ID'];
                
                header('location: '.URL.'/public/account.php');

            } else if(isUserDisabled($email)){
                $error = "Your account is banned. Contact team for resolving the issue.";
            } 
            else {
                $error = "Login details are invalid";
            }
        }


    }

?>
<?php 
    $innerPage = true;
    $specialId = "i-p";
include 'public/views/layout/header.php'; ?>
<?php 
    include 'public/views/view.login.php'; 
?>
<?php include 'public/views/layout/footer.php'; ?>