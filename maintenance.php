<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ecompetencia'19</title>
    
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">


    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

    <div id="centermain">
        <h1>Maintenance!</h1>
        <h3>Team <span>Ecompetencia</span> is updating script. Stay tuned!</h3>
        <div class="social">
            <div class="social-box">
                <a href="https://www.facebook.com/IUEcompetencia"><i class="fab fa-facebook-f"></i></a>
            </div>
            <div class="social-box">
                <a href="https://www.instagram.com/iuacm/"><i class="fab fa-instagram"></i></a>
            </div>

        </div>
    </div>
    
    <div id="tri-one"></div>
    <div id="tri-two"></div>
    <div id="tri-three"></div>
    <div id="tri-four"></div>
    
    <style>
        body {
            width: 100%;
            height: 100vh;
            background-color: #f9f9f9;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: "Montserrat", sans-serif;
            color: #000;
            margin:0;
            padding:0;
        }
        
        .social {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 15px;
        }
        
        .social-box {
            display: flex;
            margin: 0 10px;
        }
        
        .social-box a {
            display: block;
            width: 32px;
            height: 32px;
            border: 1px solid #e0e0e0;
            color: #333333;
            border-radius: 50%;
            text-align: center;
            line-height: 32px;
            font-size: 12px;
            transition: 0.2s all;
        }
        .social-box a:hover {
            border: 1px solid #2e2e89;
            color: #2e2e89;
        }
        
        
        #tri-one {
            position: absolute;
            top: 50%;
            left: 15%;
            background: linear-gradient(#ed2424, #f99d1c);
            width: 60px;
            height: 60px;
            -webkit-clip-path: polygon(0 0, 23% 89%, 100% 100%);
            clip-path: polygon(0 0, 23% 89%, 100% 100%);
        }
        #tri-two {
            position: absolute;
            top: 30%;
            right: 15%;
            background: linear-gradient(#f5ec08, #4b9033);
            width: 60px;
            height: 60px;
            -webkit-clip-path: polygon(0 0, 100% 38%, 81% 100%);
            clip-path: polygon(0 0, 100% 38%, 81% 100%);
        }
        #tri-three {
            position: absolute;
            top: 80%;
            right: 25%;
            background: linear-gradient(#f5ec08, #4b9033);
            width: 200px;
            height: 90px;
            -webkit-clip-path: polygon(0 0, 100% 38%, 81% 100%);
            clip-path: polygon(0 0, 100% 38%, 81% 100%);
        }
        #tri-four {
            position: absolute;
            top: 10%;
            right: 60%;
            background: linear-gradient(#2e2e89, #00aaeb);
            width: 150px;
            height: 80px;
            -webkit-clip-path: polygon(0 21%, 100% 41%, 91% 98%);
            clip-path: polygon(0 21%, 100% 41%, 91% 98%);
        }
        
        
        #centermain {
            width: 90%;
            max-width: 700px;
            background-color: #fff;
            box-shadow: 0px 0px 15px rgba(0,0,0,0.05);
            padding: 5vh 0;
            position: relative;
            z-index: 5;
        }
        
        #centermain h1 {
            font-weight: 900;
            font-size: 28px;
            color: #000;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin: 0;
            padding: 0;
            text-align: center;
        }
        
        #centermain h3 {
            font-weight: 400;
            font-size: 20px;
            color: #000;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin: 0;
            padding: 0;
            text-align: center;
        }
        #centermain h3 span {
            font-weight: 700;
            color: #00aaeb;
        }
    </style>
    
</body>
</html>