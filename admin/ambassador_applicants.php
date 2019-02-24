<?php 
  include '../config/db.php';
  include 'includes/functions.php';
  include '../config/auth_admin.php';

?>
<?php 
  $page_title = "Ambassador Applications";
  include 'views/admin/layout/header.php'; 
?>
<?php 

    if(isset($_GET['view']) && isAmbassadorApplicant(normal($_GET['view']))){
        $applicant = getAmbassadorApplicant(normal($_GET['view']));
        include 'views/admin/ambassador_view.php';
    }
    else {
        $applicants = getAmbassadorApplicants();
        include 'views/admin/ambassador_applicants.php'; 
    }
?>
<?php include 'views/admin/layout/footer.php'; ?>