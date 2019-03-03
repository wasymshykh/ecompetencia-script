<?php $competitions = getCompetitions(); ?>
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
                <a href="<?=URL?>">
                    <img src="<?=URL?>/assets/img/logo_white.png" alt="Ecompetencia 2019">
                </a>
            </div>

            <div class="navigation-r">
                <div class="nav-ul">
                    <ul class="nav-l">
                        <li><a id="aboutNav">About</a></li>
                        <li><a href="<?=URL?>/inductions/team.php">Apply As Member</a></li>
                        <li><a href="<?=URL?>/inductions/ambassador.php">Apply As Ambassador</a></li>
                        <li class="hasDrops">
                            <a>Competitions <i class="fas fa-caret-down"></i></a>
                            <ul>
                                <li><a href="competitions.php"><b>View All</b></a></li>
                                <?php foreach($competitions as $comp): ?>
                                <li><a href="competition.php?comp=<?=$comp['competition_ID']?>"><?=$comp['competition_name']?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                        <li><a class="cont">Contact</a></li>
                    </ul>
                    <ul class="nav-r">
                        <?php
                            if(!isset($_SESSION['logged']) || empty($_SESSION['logged']) || !$_SESSION['logged']):
                        ?>
                        <li><a href="<?=URL?>/login.php">Login</a></li>
                        <li><a href="<?=URL?>/register.php" class="reg-btn">Registration</a></li>
                        <?php else: ?>
                        <li><a href="<?=URL?>/public/logout.php">Logout</a></li>
                        <li><a href="<?=URL?>/public/account.php" class="reg-btn">Dashboard</a></li>
                        <?php endif; ?>
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
        document.querySelector('.nav-ul').addEventListener('click',e=>{
            if(e.target.classList.contains('n-active')){
                e.target.classList.remove('n-active');
            }
        })

        document.querySelectorAll('.hasDrops > a').forEach(drop =>{
            drop.addEventListener('click', (e)=>{
                if(!e.target.classList.contains('active')){
                    e.target.classList.add('active');
                    e.target.firstElementChild.classList.remove('fa-caret-down');
                    e.target.firstElementChild.classList.add('fa-caret-up');
                } else {
                    e.target.classList.remove('active');
                    e.target.firstElementChild.classList.remove('fa-caret-up');
                    e.target.firstElementChild.classList.add('fa-caret-down');
                }
            })
        })
    </script>