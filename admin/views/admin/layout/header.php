<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ecompetencia Admin</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?=ADMIN_URL?>/assets/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="<?=ADMIN_URL?>/assets/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=URL?>/assets/fontawesome/css/all.min.css">

    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="<?=ADMIN_URL?>/assets/css/fontastic.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="<?=ADMIN_URL?>/assets/css/grasp_mobile_progress_circle-1.0.0.min.css">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="<?=ADMIN_URL?>/assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?=ADMIN_URL?>/assets/css/style.sea.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?=ADMIN_URL?>/assets/css/custom.css">
    
    <script src="<?=ADMIN_URL?>/assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?=ADMIN_URL?>/assets/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="<?=ADMIN_URL?>/assets/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Favicon-->
    <link rel="shortcut icon" href="<?=URL?>/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <!-- Side Navbar -->
    <nav class="side-navbar">
      <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
          <!-- User Info-->
          <div class="sidenav-header-inner text-center"><img src="<?=ADMIN_URL?>/assets/img/avatar.png" alt="person" class="img-fluid rounded-circle">
            <h2 class="h5"><?=$admin['management_fname']?> <?=$admin['management_lname']?></h2><span>administrator</span>
          </div>
          <!-- Small Brand information, appears on minimized sidebar-->
          <div class="sidenav-header-logo"><a href="index.html" class="brand-small text-center"> <strong>E</strong><strong class="text-primary">C</strong></a></div>
        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
          <h5 class="sidenav-heading">Main</h5>
          <ul id="side-main-menu" class="side-menu list-unstyled">                  
            <li><a href="index.php"><i class="icon-home"></i>Home</a></li>
            <li><a href="#compdropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i> Competitions</a>
              <ul id="compdropdownDropdown" class="collapse list-unstyled ">
                <li><a href="competition_categories.php"><i class="icon-form"></i> Categories</a></li>
                <li><a href="competitions.php"><i class="icon-form"></i> Competitions</a></li>
                <li><a href="competition_details.php"><i class="icon-form"></i> Details</a></li>
              </ul>
            </li>
            <li><a href="coupons.php"><i class="icon-form"></i> Coupons</a></li>
            <li><a href="#usersdropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i> Users</a>
              <ul id="usersdropdownDropdown" class="collapse list-unstyled ">
                <li><a href="users.php"><i class="icon-user"></i> Manage Users</a></li>
                <li><a href="participants.php"><i class="icon-form"></i> Manage Participants</a></li>
                <li><a href="unconfirmed.php"><i class="icon-form"></i> Unconfirmed Participants</a></li>
              </ul>
            </li>
          </ul>
        </div>
        <div class="admin-menu">
          <h5 class="sidenav-heading">Applicants</h5>
          <ul class="side-menu list-unstyled">
            <li><a href="#applicantsdropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i> Applicants List</a>
              <ul id="applicantsdropdownDropdown" class="collapse list-unstyled ">
                <li><a href="member_applicants.php"><i class="icon-form"></i> Team Member</a></li>
                <li><a href="ambassador_applicants.php"><i class="icon-form"></i> Ambassadors</a></li>
              </ul>
            </li>
          </ul>
        </div>
        <div class="admin-menu">
          <h5 class="sidenav-heading">Website</h5>
          <ul class="side-menu list-unstyled">
            <li><a href="#WebsitedropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i> Controls</a>
              <ul id="WebsitedropdownDropdown" class="collapse list-unstyled ">
                <li><a href="settings.php"><i class="icon-flask"></i>Settings</a></li>
                <li><a href="logs.php"><i class="icon-form"></i> Web Logs</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>


    <div class="page">
      <!-- navbar-->
      <header class="header">
        <nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class="icon-bars"> </i></a><a href="<?=$_SERVER['PHP_SELF']?>" class="navbar-brand">
                  <div class="brand-text d-none d-md-inline-block"><strong><?=$page_title?></strong></div></a></div>
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Languages dropdown    -->
                <li class="nav-item dropdown"><a id="languages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link language dropdown-toggle"><img src="<?=ADMIN_URL?>/assets/img/flags/16/GB.png" alt="English"><span class="d-none d-sm-inline-block">English</span></a>
                  <ul aria-labelledby="languages" class="dropdown-menu">
                    <li>
                      <a rel="nofollow" href="#" class="dropdown-item">
                        <img src="<?=ADMIN_URL?>/assets/img/flags/16/GB.png" alt="English" class="mr-2"><span>English</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!-- Log out-->
                <li class="nav-item">
                  <a href="logout.php" class="nav-link logout">
                    <span class="d-none d-sm-inline-block">Logout</span><i class="fa fa-sign-out"  aria-hidden="true"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
    