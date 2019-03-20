<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ecompetencia Ambassador</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <link rel="stylesheet" href="<?=AM_URL?>/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">

    <link rel="stylesheet" href="<?=AM_URL?>/assets/css/style.sea.css" id="theme-stylesheet">

    <link rel="shortcut icon" href="<?=URL?>/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <div class="page login-page">
      <div class="container">
        <div class="form-outer text-center d-flex align-items-center">
          <div class="form-inner">
            <div class="logo text-uppercase"><strong class="text-primary">Ecompetencia</strong></div>
            <div class="logo text-uppercase"><span>Ambassador Panel</span></div>
                <?php if(!empty($errors)):
                        foreach($errors as $error):?>
                        <div class="alert alert-danger" role="alert">
                            <?=$error?>
                        </div>
                <?php 
                        endforeach; 
                      endif; 
                ?>
            <form method="POST" class="text-left form-validate" action="">
              <div class="form-group-material">
                <input id="login-username" type="text" name="user" required class="input-material" value="<?=isset($_POST['user'])?$_POST['user']:'';?>">
                <label for="login-username" class="label-material">Ambassador id</label>
              </div>
              <div class="form-group-material">
                <input id="login-password" type="password" name="password" required class="input-material">
                <label for="login-password" class="label-material">Password</label>
              </div>
              <div class="form-group text-center">
                  <button id="login" name="login" href="index.html" class="btn btn-primary btn-large">Login</button>
              </div>
            </form>
          </div>
          <div class="copyrights text-center">
            <p>Admin Board Ecompetencia &copy; 2019</p>
          </div>
        </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="<?=AM_URL?>/assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?=AM_URL?>/assets/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="<?=AM_URL?>/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?=AM_URL?>/assets/js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
    <script src="<?=AM_URL?>/assets/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="<?=AM_URL?>/assets/vendor/chart.js/Chart.min.js"></script>
    <script src="<?=AM_URL?>/assets/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="<?=AM_URL?>/assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- Main File-->
    <script src="<?=AM_URL?>/assets/js/front.js"></script>
  </body>
</html>