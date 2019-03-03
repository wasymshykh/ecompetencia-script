<?php 
    include 'config/db.php'; 
    include 'public/includes/functions.php'; 
    session_start();

    if(isset($_GET['comp']) && !empty(normal($_GET['comp'])) && is_numeric(normal($_GET['comp']))){

        $comp_id = normal($_GET['comp']);
        $competition = getCompetitionDetailsByCategoryId($comp_id);

        if(is_array($competition) && count($competition) > 0){

            // continue

        } else {
            header('location: '.URL.'/competitions.php');
        }

    } else {
        header('location: '.URL.'/competitions.php');
    }

?>
<?php 
    $showMaterialize = true;
    $innerPage = true;
    $specialId = "i-p";
    include 'public/views/layout/header.php'; 
?>
<?php include 'public/views/comp.php'; ?>
<?php include 'public/views/layout/footer.php'; ?>