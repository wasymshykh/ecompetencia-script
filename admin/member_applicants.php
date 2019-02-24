<?php 
  include '../config/db.php';
  include 'includes/functions.php';
  include '../config/auth_admin.php';

?>
<?php 
  $page_title = "Team Member Applications";
  include 'views/admin/layout/header.php'; 
?>
<?php 
    if(isset($_GET['view']) && isTeamApplicant(normal($_GET['view']))){
        $applicant = getTeamApplicant(normal($_GET['view']));
        include 'views/admin/member_view.php';
    }
    else {
        $applicants = getTeamApplicants();
        include 'views/admin/member_applicants.php'; 
    }
?>
<?php include 'views/admin/layout/footer.php'; ?>