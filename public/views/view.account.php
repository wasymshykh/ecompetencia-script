<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ecompetentia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="<?=URL?>/assets/css/inner.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?=URL?>/assets/css/account.css" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<body>


<div id="wrapper">
    <header>
        <div id="header">
            <div class="header-inner">
                
                <div class="header-logo">
                    <a href="./">
                        <img src="<?=URL;?>/assets/img/logo.png" alt="Logo">
                    </a>
                </div>

                <div class="header-r">
                    <a href="addparticipation.php" class="addp-btn"><i class="fas fa-plus"></i> Add Participation</a>
                    <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </div>

            </div>
        </div>
    </header>

    <div class="d-container">

    <div class="d-row">

        <div class="d-title">
            <h1>Your <b>Details</b></h1>
            <p>Details about your (team leader) profile.</p>
        </div>

        <div class="d-details">
            <div class="d-detail-box">
                <span class="d-d-type">
                    <i class="fas fa-user"></i>
                    Team leader
                </span>
                <span class="d-d-value">
                    Muhammad Waseem
                </span>
            </div>
            <div class="d-detail-box">
                <span class="d-d-type">
                    <i class="fas fa-mobile"></i>
                    Your mobile
                </span>
                <span class="d-d-value">
                    03022736286
                </span>
            </div>
            <div class="d-detail-box">
                <span class="d-d-type">
                    <i class="fas fa-envelope "></i>
                    Your email
                </span>
                <span class="d-d-value">
                    wasymshykh@gmail.com
                </span>
            </div>
            <div class="d-detail-box">
                <span class="d-d-type">
                    <i class="fas fa-university"></i>
                    Your university
                </span>
                <span class="d-d-value">
                    Iqra University IU
                </span>
            </div>
            <div class="d-detail-box">
                <span class="d-d-type">
                    <i class="fas fa-user-tie"></i>
                    Your ambassador
                </span>
                <span class="d-d-value">
                    <i>none</i>
                    <a href="#">set</a>
                </span>
            </div>
        </div>

    </div>


    <div class="d-row">

        <div class="d-title">
            <h1>Your <b>Participation</b></h1>
            <p>Your participation details in the competitions</p>
        </div>

        <div class="d-competition">
            <div class="comp-box-name">
                <div class="d-c-icon">
                    <i class="fas fa-project-diagram"></i>
                </div>
                <div class="d-c-data">
                    <p>Competition</p>
                    <h1>Speed Programming</h1>
                </div>
            </div>
            <div class="d-comp-box">
                <div class="d-comp-b-content">
                    <div class="d-c-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="d-c-data">
                        <p>Members</p>
                        <h1>2</h1>
                        
                        <ul>
                            <li><span>1</span> Muhammad Waseem</li>
                            <li><span>2</span> Ahmed Ali</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="d-comp-box comp-status-unpaid">
                <div class="d-comp-b-content">
                    <div class="d-c-icon">
                        <i class="fas fa-vote-yea"></i>
                    </div>
                    <div class="d-c-data">
                        <p>status</p>
                        <h1>Unpaid</h1>
                    </div>
                </div>
            </div>

            <div class="d-comp-box">
                <div class="d-comp-b-content">
                    <div class="d-c-icon">
                        <i class="fas fa-coins"></i>
                    </div>
                    <div class="d-c-data">
                        <p>Cash Due</p>
                        <h1>1500 <span>PKR</span></h1>
                    </div>
                </div>
            </div>
        </div>
    
    </div>

</div>

    <footer>
        <div id="footer">
            <div class="footer-inner">

                <p>Copyright ecompetencia &copy; 2019. Developed by IU-ACM.</p>

            </div>
        </div>
    </footer>

</body>
</html>