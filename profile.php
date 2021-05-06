<?php include('roundthree.php') ?>
<?php

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: index");
  }
?>
<?php
$db = mysqli_connect('127.0.0.1', 'jdmf9z4zrge5', '5i<jnmoJ%Uhv7', 'test_sample');
$SESSION = $_SESSION['username'];
$result = mysqli_query($db, "select * from `registration_data` where `username` = '$SESSION'");
$show=mysqli_fetch_assoc($result);
$id =  $show['id'];
$name =  $show['name'];
$pcode =  $show['pcode'];
$email =  $show['email'];
$ppt =  $show['ppt'];
$code =  $show['code'];
$tname =  $show['tname'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="theme-color" content="#ffffff"/>
    <meta property="og:title" content="Profile DECOV 2020 by CODETIGERS" />
    <meta property="og:description" content="WE CAN FIGHT AGAINST COVID-19" />
    <meta property="og:description" content="One of the Biggest Hackathon in India on Covid-19 pandemic" />
    <meta property="og:url" content="https://www.codetigers.org" />
    <meta property="og:image" content="img.jpeg"/>
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="favicon.jpeg">
    <link rel="icon" href="favicon.jpeg">
    <link rel="manifest" href="/manifest.json">
    <title>
        <?php echo $name; ?> | profile
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/css/material-kit.css?v=2.0.2">
    <!-- Documentation extras -->
    <link href="assets/assets-custom/demo.css" rel="stylesheet" />
    <link href="assets/assets-custom/css/image-grid.css" rel="stylesheet" />
    <link href="assets/assets-custom/css/footer.css" rel="stylesheet" />
    <link href="assets/assets-custom/css/termynal.css" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/flickity@2.0/dist/flickity.min.css">
    <script src="https://unpkg.com/flickity@2.0/dist/flickity.pkgd.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<style>
.dropbtn {
  background-color: #3498DB;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
  background-color: #2980B9;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}
</style>
<style>
@media (min-device-width:600px) {
    img[data-src-600px] {
        content: attr(data-src-600px, url);
    }
}

@media (min-device-width:800px) {
    img[data-src-800px] {
        content: attr(data-src-800px, url);
    }
}
        body{
            overflow-x: hidden;
        }

        .card-profile {
          max-width: 320px;
          margin: 20px auto;
          background-color: #fdfbf2;
          border-radius: 5px;
          border: 0;
          box-shadow: 0.3em 0.3em 0.6em rgba(0, 0, 0, 0.2);
          transition:0.4s ease;
        }

        .card-profile:hover
        {
            box-shadow: 0.6em 0.6em 1em rgba(0, 0, 0, 0.2);
        }
        .card-profile .card-img-top {
          border-radius: 5px 5px 0 0;
        }
        .card-profile .card-img-profile {
          max-width: 100%;
          border-radius: 50%;
          margin-top: -95px;
          margin-bottom: 35px;
          
        }
        .card-profile .card-title {
          margin-bottom: 50px;
        }
        .card-profile .card-title small {
          display: block;
          font-size: .6em;
          margin-top: .2em;
        }
        .card-profile .card-links {
          margin-bottom: 25px;
        }
        .card-profile .card-links .fa {
          margin: 0 1em;
          font-size: 1.6em;
        }
        .card-profile .card-links .fa:focus, .card-profile .card-links .fa:hover {
          text-decoration: none;
        }
        .card-profile .card-links .fa.fa-twitter {
          color: #68aade;
        }
        .card-profile .card-links .fa.fa-twitter:hover {
          color: #3e92d5;
        }
        .card-profile .card-links .fa.fa-facebook {
          color: #3b5999;
        }
        .card-profile .card-links .fa.fa-facebook:hover {
          color: #2d4474;
        }

        #top-button
        {
            font-size:20px;
            transition: 0.3s ease;
        }
        #top-button:hover{
            color:white;
            background:rgb(0,101,202);
        }
        .tab { margin-left: 40px; }
/*
        .grid-item { width: 25%; }
        .grid-item--width2 { width: 50%; }*/
        
        
        
        
.nav ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: black;
}

.nav li {
    float: left;
}

.nav li a {
    display: block;
    color: black;
    text-align: center;
    padding: 20px 14px;
    text-decoration: none;
}

.active {
    background-color: blue;
}

li hover:not(.active) {
    background-color: red;
}

        </style>
    <!-- image responsiveness -->
    
<style>
body {
  margin: 0;
}

.topnav {
  overflow: hidden;
  background-color: transparent;
}

.topnav a {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: purple;
  color: white;
}

.topnav .icon {
  display: none;
  
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
}
</style>

<body class="landing-page" name="top" id="top" class="w3-container" oncontextmenu="return false" >
        <div id="loader" class="center lazy"></div> 
        <nav class="navbar navbar-color-on-scroll navbar-transparent fixed-top  navbar-expand-lg " color-on-scroll="100" id="sectionsNav" >
        <div class="container">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="navbar-translate" style="padding-top: -10px;">
                <a href="index"><img src="titlelogo.png" height="30" width="180" style="padding-top: -10px;"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" style="padding-bottom: 10px;">
                <ul class="navbar-nav ml-auto pos" style="padding-bottom: 10px; padding-right: 10px;">
                    <li class="dropdown nav-item">
                        <a href="index" data-page="index" class="nav-link">
                            <span><b>&nbsp;&nbsp;&nbsp;Home</b></span>
                        </a>
                    </li>
                    <!--<li class="nav-item">
                        <a href="#ps" data-page="speakers" class="nav-link">
                            <span><b id="header_text">Problem Statements</b></span>
                        </a>
                    </li>-->
                     <li class="nav-item">
                        <a href="profile" data-page="team" class="nav-link">
                            <span><b id="header_text">Profile</b></span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="https://codetigers.netlify.app/blog" data-page="team" class="nav-link">
                            <span><b id="header_text">Blog</b></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="forum.codetigers.org/index.php" data-page="team" class="nav-link">
                            <span><b id="header_text">Forum</b></span>
                        </a>
                    </li>

                   
                    <li class="nav-item">
                        
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>
    <style>
        .clr{
            background-color: grey;
        }

    </style>
    <div id="home" class="page-header header-filter" data-parallax="true">
        <div class="container" style="width: 100vw; padding: 0; margin: 0; max-width: 100vw;">
            <div class="row" style="height: 100vh;"><br>
                <div class="col-md-4" id="hometop-container"><br>
                </div>
                <div class="col-md-4">&nbsp;&nbsp;&nbsp;</div><br><br>
                <div class="col-md-4" id="hometop-container">
                    
                    <div class="content">
                        <!-- notification message -->
                        <?php if (isset($_SESSION['success'])) : ?>
                          <div class="error success" >
                            <h3>
                              <?php
                                echo $_SESSION['success'];
                                unset($_SESSION['success']);
                                
                              ?>
                            </h3>
                          </div>
                        <?php endif ?>

                        <!-- logged in user information -->
                          <p><strong><?php  if (isset($_SESSION['username'])) : ?></strong></p>
                          <h2>Welcome <strong><?php echo $name; ?></strong>&nbsp;</h2>
                                  <a href="logout"><button class="btn btn-primary">Logout</button></a>


                        <?php endif ?>
                    </div>
                    <div class="col-md-4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br><br><br><br><br></div>
                    <br />
                </div>
                <div class="col-md-8 psup" style=" background-image: url(https://pngriver.com/wp-content/uploads/2018/04/Download-Technology-PNG-Transparent.png); background-position: center; background-size: 70% auto; background-repeat: no-repeat; position:relative;">&nbsp;</div>
            
            </div>
        </div>
    </div>
    <style>
        .clr{
            background-color: grey;
        }
    </style>
                        <style>
                    table {
                      font-family: arial, sans-serif;
                      border-collapse: collapse;
                      width: 100%;
                    }

                    td, th {
                      border: 1px solid #dddddd;
                      text-align: left;
                      padding: 8px;
                    }

                    tr:nth-child(even) {
                      background-color: #dddddd;
                    }
                    </style>
                        
        <div class="main main-raised" style="margin-top: 0;">
        <div class="container">
            <div class="section text-center">
                    
                        <center>
                            
                        <style>
.alert {
  padding: 20px;
  background-color: #f44336;
  color: white;
  opacity: 1;
  transition: opacity 0.6s;
  margin-bottom: 15px;
}

.alert.success {background-color: #4CAF50;}
.alert.info {background-color: #2196F3;}
.alert.warning {background-color: #ff9800;}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
</style>

                        <h2>Alert Messages</h2>

                        <div class="alert success">
                          <span class="closebtn">&times;</span>  
                          <strong>Congratulations! <?php echo $tname ?></strong> You have successfully passed the second round. We are excited to see you for the final round. Pat your back!.
                        </div>
                        
                        <div class="alert success">
                          <span class="closebtn">&times;</span>  
                          <strong>Submission for final round is now open until 19th June. So speed up my Tigers!</strong>
                        </div>
                        
                        <div class="alert">
                          <span class="closebtn">&times;</span>  
                          <strong>Round 3 Submission will close soon!</strong>
                        </div>
                        
                        <script>
                        var close = document.getElementsByClassName("closebtn");
                        var i;
                        
                        for (i = 0; i < close.length; i++) {
                          close[i].onclick = function(){
                            var div = this.parentElement;
                            div.style.opacity = "0";
                            setTimeout(function(){ div.style.display = "none"; }, 600);
                          }
                        }
                        </script>

                          <h2>Your Profile Details</h2>
                          <h4>Your Name : <?php echo $name?></h4>
                          <h4>Your Unique Id : <?php echo $id?></h4>
                          <h4>Your Email Id : <?php echo $email?></h4>
                          <h4>Your Selected Problem : <?php echo $pcode?></h4>
                          <h4>Your Round 2 Submission : <?php echo $ppt?></h4>
                          <h3 style="color:green">Your Round 3 Submission : <?php echo $code?></h3>
                          </center>
                            <h2>Glimpse of Problem Statement</h2>
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/TQEGFVFIYcQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></center><br><br>           

                </div>
                
                <div class="col-md-8 ml-auto mr-auto">

                </div>
                <!--/.First row-->


                <center><h2 class="title"><b>Next Rounds</b></h2></center>
                    <div class="row">

                           <br>
                            
                              <center> <h3>Final Round ( Evaluation round):</h3><center>
                                <ul>
                                    <br><br>
                                    <li><b>Evaluation Round :</b>&nbsp;
After completion of the Projects , before submitting, the Teams have to create videos demonstrating their respective Mobile / Web Applications and then upload them to YouTube to make them Public and then share the Links in the Web Portal in the Login Profile Page. The code(s) must be uploaded to Github or Google Drive after converting into a zip file. Thereafter, the participants shall submit from their respective repository link or drive link in the Login Profile Page.

                              </li><br>
                                    <li><b>Judgement Criteria:</b>&nbsp;The evaluation will be based on innovation and novelty of the idea, solving the level of complexities, feasibility, practicability, sustainability, cost-effectiveness, the scale of impact, user experience, and potential for future work progression. We like great ideas and if it has some business potential, we will take it to the industry level with the support of our mentors from Techno India Group. </li>
                                </ul>

                                <h3><b>Round 3</b></h3>
                            <div class="col-md-6" style="margin:0 auto; float:none;">
                                <h2>Round 3 Submission Closed</h2>
                                
                                <br><br>
                                </div>
                       

                
                <p>&nbsp;</p>
                <div class="row mt-5 wow fadeIn" data-wow-delay="0.2s" id="rules">
                    <!--First column-->
                    <div class="col-lg-6" style="text-align:left;">
                        <h2 class="title" id="ps"><b>Rules & Regulations</b></h2>
                        <!--Card-->
                       <ul>
                            <li><h5 class="description" id="campus_ambassador">There can be a maximum of 5 members in a Team. </h5></li>
                            <li><h5 class="description" id="campus_ambassador">A Team will be recognised by the name it selects for itself and with which it registers in the online portal of code tigers.</h5></li>
                            <li><h5 class="description" id="campus_ambassador">Problem Statements will be available on the Website as well as the Android Application - DECOV (Available at Google Play Store).</h5></li>
                            <li><h5 class="description" id="campus_ambassador">Teams should describe their work in a video that may be shared publicly in youtube and the link has to be shared in the Participant's Login profile page on Code Tigers portal.</h5></li>
                            <li><h5 class="description" id="campus_ambassador">The Mobile / Web Application should be explained in the above mentioned video.</h5></li>
                            <li><h5 class="description" id="campus_ambassador">Applicants are invited from students of High Schools, Colleges & Universities.
                                A team can select or propose a maximum of 3 Problem statements from three different domains.</h5></li>
                            </ul>
                            </h5></li>

                        </ul>
                    </div>
                    <!--/.First column-->
                    <!--Second column-->
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.2s">
                        <!--Card-->
                        <img class="img-fluid" src="rules.png" width="95%" height="95%" />
                        <!--/.Card-->
                    </div>
                </div>

    </div>
</body>
    <script> 
        document.onreadystatechange = function() { 
            if (document.readyState !== "complete") { 
                document.querySelector( 
                  "body").style.visibility = "hidden"; 
                document.querySelector( 
                  "#loader").style.visibility = "visible"; 
            } else { 
                document.querySelector( 
                  "#loader").style.display = "none"; 
                document.querySelector( 
                  "body").style.visibility = "visible"; 
            } 
        };
        
        
    $(function() {
        $('.lazy').lazy();
    });
    </script>
    
    <style> 
        #loader { 
            border: 12px solid #f3f3f3; 
            border-radius: 50%; 
            border-top: 12px solid #444444; 
            width: 70px; 
            height: 70px; 
            animation: spin 1s linear infinite; 
        } 
          
        @keyframes spin { 
            100% { 
                transform: rotate(360deg); 
            } 
        } 
          
        .center { 
            position: absolute; 
            top: 0; 
            bottom: 0; 
            left: 0; 
            right: 0; 
            margin: auto; 
        } 
    </style> 
    
</html>
