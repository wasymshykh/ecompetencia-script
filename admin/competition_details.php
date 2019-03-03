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

        $comp = getCompetitionDetailsById(normal($_GET['edit']));

        if(!empty($comp) && count($comp) > 0) {
            $showEdit = true;
        }

        if(isset($_POST['edit_comp'])){
            
            $e_desc = normal($_POST['e_desc']);
            $e_winning = normal($_POST['e_winning']);
            $e_rules = normal($_POST['e_rules']);

            if(empty($comp_error)){

                $competitionQuery = "UPDATE `competition_details` SET `details_description`='$e_desc',
                `details_winning`='$e_winning', `details_rules` = '$e_rules' WHERE `competition_ID`='".$comp['competition_ID']."'";

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
    $page_title = "Competitions";
    include 'views/admin/layout/header.php'; 
?>
<?php 
    $categories = getCategories();
    $competitions = getCompetitions();
    include 'views/admin/competition_details.php'; 

?>
<?php include 'views/admin/layout/footer.php'; ?>