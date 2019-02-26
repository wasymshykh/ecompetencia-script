<?php 
    include '../config/db.php';
    include 'includes/functions.php';
    include '../config/auth_admin.php';

    if(isset($_GET['delete'])){
        $comp = getCompetitionById(normal($_GET['delete']));
        if(!empty($comp) && count($comp) > 0) {
            $status = 'T';
            if(updateCompetitionDeleted($comp['competition_ID'], $status)){
                header('location: '.ADMIN_URL.'/competitions.php');
            }
        }
    }
    
    if(isset($_GET['toggle'])){
        $comp = getCompetitionById(normal($_GET['toggle']));
        if(!empty($comp) && count($comp) > 0) {
            if($comp['competition_status'] == 'E'){
                $status = 'D';
            } else {
                $status = 'E';
            }
            if(updateCompetitionStatus($comp['competition_ID'], $status)){
                header('location: '.ADMIN_URL.'/competitions.php');
            }
        }
    }

    $error = "";
    $comp_error = "";
    $showNewModal = false;
    $showEdit = false;

    if(isset($_POST['add_comp'])){

        $c_name = normal($_POST['c_name']);
        $c_limit = normal($_POST['c_limit']);
        $c_cat = normal($_POST['c_cat']);
        $c_min = normal($_POST['c_min']);
        $c_max = normal($_POST['c_max']);
        $c_fee_e = normal($_POST['c_fee_e']);
        $c_fee_i = normal($_POST['c_fee_i']);

        if(empty($c_name) && strlen($c_name) < 2){
            $error = "Name can't be left empty. Must be atleast 2 char long.";
        } else
        if(empty($c_limit) && ((int)$c_limit) < 1){
            $error = "Limit can be 1 or greater.";
        } else
        if(empty($c_cat) && strlen($c_cat) < 1){
            $error = "Category can't be left empty.";
        } else
        if(empty($c_min) && ((int)$c_min) < 1){
            $error = "Minimum members can be 1 or greater.";
        } else
        if(empty($c_max) && ((int)$c_max) < 1){
            $error = "Maximum members can be 1 or greater.";
        } else
        if(((int)$c_max) < ((int)$c_min)){
            $error = "Maximum members can be equal or greater than minimum members.";
        } else
        if(empty($c_fee_e) && ((int)$c_fee_e) < 1){
            $error = "External fee can be 1 or greater.";
        } else
        if(empty($c_fee_i) && ((int)$c_fee_i) < 1){
            $error = "Internal fee can be 1 or greater.";
        }

        if(empty($error)){

            $competitionQuery = "INSERT INTO `competitions` (`competition_name`, `competition_min`, `competition_max`, `category_ID`, `competition_limit`, `competition_e_fee`, `competition_i_fee`)
            VALUE ('$c_name', '$c_min', '$c_max', '$c_cat', '$c_limit', '$c_fee_e', '$c_fee_i')";

            $stmt = $db->prepare($competitionQuery);

            if(!$stmt->execute()){
                $error = "Unable to insert the category!";
                $showNewModal = true;
            } else {
                $c_name = '';$c_limit = '';$c_cat = '';$c_min = '';
                $c_max = '';$c_fee_e = '';$c_fee_i = '';
            }

        } else {
            $showNewModal = true;
        }
    }

    if(isset($_GET['edit'])){

        $comp = getCompetitionById(normal($_GET['edit']));

        if(!empty($comp) && count($comp) > 0) {
            $showEdit = true;
        }

        if(isset($_POST['edit_comp'])){
            
            $e_cname = normal($_POST['e_cname']);
            $e_c_limit = normal($_POST['e_c_limit']);
            $e_c_cat = normal($_POST['e_c_cat']);
            $e_c_min = normal($_POST['e_c_min']);
            $e_c_max = normal($_POST['e_c_max']);
            $e_c_fee_e = normal($_POST['e_c_fee_e']);
            $e_c_fee_i = normal($_POST['e_c_fee_i']);

            if(empty($e_cname) && strlen($e_cname) < 2){
                $comp_error = "Name can't be left empty. Must be atleast 2 char long.";
            } else
            if(empty($e_c_limit) && ((int)$e_c_limit) < 1){
                $comp_error = "Limit can be 1 or greater.";
            } else
            if(empty($e_c_cat) && strlen($e_c_cat) < 1){
                $comp_error = "Category can't be left empty.";
            } else
            if(empty($e_c_min) && ((int)$e_c_min) < 1){
                $comp_error = "Minimum members can be 1 or greater.";
            } else
            if(empty($e_c_max) && ((int)$e_c_max) < 1){
                $comp_error = "Maximum members can be 1 or greater.";
            } else
            if(((int)$e_c_max) < ((int)$e_c_min)){
                $comp_error = "Maximum members can be equal or greater than minimum members.";
            } else
            if(empty($e_c_fee_e) && ((int)$e_c_fee_e) < 1){
                $comp_error = "External fee can be 1 or greater.";
            } else
            if(empty($e_c_fee_i) && ((int)$e_c_fee_i) < 1){
                $comp_error = "Internal fee can be 1 or greater.";
            }

            if(empty($comp_error)){

                $competitionQuery = "UPDATE `competitions` SET `competition_name`='$e_cname',
                `competition_min`='$e_c_min', `competition_max` = '$e_c_max', `category_ID` = '$e_c_cat', 
                `competition_limit`='$e_c_limit', `competition_e_fee`='$e_c_fee_e', `competition_i_fee`='$e_c_fee_i'
                WHERE `competition_ID`='".$comp['competition_ID']."'";

                $stmt = $db->prepare($competitionQuery);

                if(!$stmt->execute()){
                    $comp_error = "Unable to update the competition!";
                }

            }

            if(empty($comp_error)){
                $comp_success = "Successfully Updated!";
                $comp = getCompetitionById(normal($_GET['edit']));
            }

        }

    }

?>
<?php 
    $page_title = "Competition Categories";
    include 'views/admin/layout/header.php'; 
?>
<?php 
    $categories = getCategories();
    $competitions = getCompetitions();
    include 'views/admin/competitions.php'; 

?>
<?php include 'views/admin/layout/footer.php'; ?>