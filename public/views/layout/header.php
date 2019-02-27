<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ecompetencia 2019</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    

    <link rel="stylesheet" href="<?=URL?>/assets/css/slick.css">
    <link rel="stylesheet" href="<?=URL?>/assets/css/slick-theme.css">

    <?php if(isset($showMaterialize)): ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <?php endif; ?>

    <link rel="stylesheet" type="text/css" media="screen" href="<?=URL?>/assets/css/style.css">
    <?php if(isset($innerPage)):?>
        <link rel="stylesheet" type="text/css" media="screen" href="<?=URL?>/assets/css/inner.css">
    <?php endif; ?>
    <link rel="stylesheet" type="text/css" media="screen" href="<?=URL?>/assets/css/responsive.css">

    
    <link rel="stylesheet" href="<?=URL?>/assets/fontawesome/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,700,900" rel="stylesheet">

    <script src="<?=URL?>/assets/js/main.js"></script>

    <script src="<?=URL?>/assets/js/jquery.js"></script>

</head>
<body <?=(isset($specialId))?'id="'.$specialId.'"':''?>>

    <div id="navigation">
        <div class="navigation-inner">
            
            <div class="navigation-logo">
                <a href="/">
                    <img src="<?=URL?>/assets/img/logo_white.png" alt="Ecompetencia 2019">
                </a>
            </div>

            <div class="navigation-r">
                <div class="nav-ul">
                    <ul class="nav-l">
                        <li><a href="<?=URL?>/#about-heading">About</a></li>
                        <li><a href="<?=URL?>/inductions/team.php">Apply As Member</a></li>
                        <li><a href="<?=URL?>/inductions/ambassador.php">Apply As Ambassador</a></li>
                        <li class="hasDrops">
                            <a>Competitions <i class="fas fa-caret-down"></i></a>
                            <ul>
                                <li><a href="#">Web Development</a></li>
                                <li><a href="#">Speed Programming</a></li>
                            </ul>
                        </li>
                        <li><a class="cont">Contact</a></li>
                    </ul>
                    <ul class="nav-r">
                        <li><a href="<?=URL?>/login.php" id="r1">Login</a></li>
                        <li><a href="<?=URL?>/register.php" id="r2" class="reg-btn">Registration</a></li>
                    </ul>
                </div>

                <div class="nav-btn">
                    <div class="nav-btn-row"></div>
                    <div class="nav-btn-row"></div>
                    <div class="nav-btn-row"></div>
                </div>
            </div>

            <div class="navigation-social">
                <div class="social-box">
                    <a href="https://www.facebook.com/IUEcompetencia/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                </div>
                <div class="social-box">
                    <a href="https://www.instagram.com/iuacm/" target="_blank"><i class="fab fa-instagram"></i></a>
                </div>
            </div>

        </div>
    </div>

    <script>
        document.querySelectorAll('.hasDrops a').forEach(drop =>{
            drop.addEventListener('click', (e)=>{
                console.log(e);

                if(!e.target.classList.contains('active')){
                    e.target.classList.add('active');
                    e.target.firstElementChild.classList.remove('fa-caret-down');
                    e.target.firstElementChild.classList.add('fa-caret-up');
                } else {
                    e.target.classList.remove('active');
                    e.target.firstElementChild.classList.remove('fa-caret-up');
                    e.target.firstElementChild.classList.add('fa-caret-down');
                }

                e.target.nextElementSibling.classList.add('active');
            })
        })
    </script>