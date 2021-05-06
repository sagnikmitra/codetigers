<?php include("server.php"); ?>
<?php
  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
  }
?>
<?php
$db = mysqli_connect('localhost', 'jdmf9z4zrge5', '5i<jnmoJ%Uhv7', 'eduflex');
$SESSION = $_SESSION['username'];
$result = mysqli_query($db, "select * from `users` where `username` = '$SESSION'");
$show=mysqli_fetch_assoc($result);
$images=$show['image'];
$name=$show['name'];
$username=$show['username']
?>
<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">

  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Settings</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
   <script type="text/javascript" src="particles.js"></script>
  <script type="text/javascript" src="app.js"></script>
</head>

<body id="page-top">
      <div id="particles-js">
  </div>
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="background: #4d0000;">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="profile.php">
        
          <i class="fa fa-university" aria-hidden="true"></i>
        
        <div class="sidebar-brand-text mx-3">Profile </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="profile.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Welcome</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading 
      <div class="sidebar-heading">
        Interface
      </div>
    -->
      <!-- Nav Item - Pages Collapse Menu 
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Components</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Components:</h6>
            <a class="collapse-item" href="buttons.html">Buttons</a>
            <a class="collapse-item" href="cards.html">Cards</a>
          </div>
        </div>
      </li>
    -->
      <!-- Nav Item - Utilities Collapse Menu 
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="utilities-color.html">Colors</a>
            <a class="collapse-item" href="utilities-border.html">Borders</a>
            <a class="collapse-item" href="utilities-animation.html">Animations</a>
            <a class="collapse-item" href="utilities-other.html">Other</a>
          </div>
        </div>
      </li>
            -->
      
      <hr class="sidebar-divider">

      <!-- Heading 
      <div class="sidebar-heading">
        Addons
      </div>
        -->
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Login Screens:</h6>
            <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">More</h6>
            <a class="collapse-item" href="404.html">About Us</a>
            <a class="collapse-item" href="blank.html">Details</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Registered College</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="tables.html">
          <i class="fas fa-fw fa-table"></i>
          <span>Find College</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <script>
          function showResult(str) {
            if (str.length==0) {
              document.getElementById("livesearch").innerHTML="";
              document.getElementById("livesearch").style.border="0px";
              return;
            }
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function() {
              if (this.readyState==4 && this.status==200) {
                document.getElementById("livesearch").innerHTML=this.responseText;
                document.getElementById("livesearch").style.border="1px solid #A5ACB2";
              }
            }
            xmlhttp.open("GET","livesearch.php?q="+str,true);
            xmlhttp.send();
          }
          </script>
          <!-- Topbar Search -->
          

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">3+</span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Alerts Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 12, 2019</div>
                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-donate text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 7, 2019</div>
                    $290.29 has been deposited into your account!
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 2, 2019</div>
                    Spending Alert: We've noticed unusually high spending for your account.
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
              </div>
            </li>

            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter">7</span>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Message Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
                    <div class="small text-gray-500">Emily Fowler · 58m</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60" alt="">
                    <div class="status-indicator"></div>
                  </div>
                  <div>
                    <div class="text-truncate">I have the photos that you ordered last month, how would you like them sent to you?</div>
                    <div class="small text-gray-500">Jae Chun · 1d</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60" alt="">
                    <div class="status-indicator bg-warning"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Last month's report looks great, I am very happy with the progress so far, keep up the good work!</div>
                    <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</div>
                    <div class="small text-gray-500">Chicken the Dog · 2w</div>
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $name; ?></span>
                <img class="img-profile rounded-circle" src="<?php echo 'images/'.$images ?>">
                <!-- <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60"> -->
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="edit.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <style>
            .card {
              box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
              max-width: 400px;
              margin: auto;
              text-align: center;
              font-family: arial;
            }
            
            .title {
              color: grey;
              font-size: 15px;
            }
            
            button {
              border: none;
              outline: 0;
              display: inline-block;
              padding: 5px;
              color: white;
              background-color: #000;
              text-align: center;
              cursor: pointer;
              width: 100%;
              font-size: 15px;
            }
            
            a {
              text-decoration: none;
              font-size: 22px;
              color: black;
            }
            
            button:hover, a:hover {
              opacity: 0.7;
            }
            </style>
            <div class="card">
                <div id="clickone" class="modal1">
                  <span class="close1">&times;</span>
                  <img class="modal1-content" id="img01">
                  
                </div>
              <img src="<?php echo 'images/'.$images ?>" style="width:100%" id="myImg">
              <h1><?php echo $name ?></h1>
              <p class="title">Student</p>
              <p><?php  echo $username ?></p>
              <p style="color:green; position:center;"><?php 
                 if (isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
                ?></p>
              <p>
                  <style>
                      .modal {
                      display: none;
                      position: fixed; 
                      z-index: 1; /* Sit on top */
                      padding-top: 200px; /* Location of the box */
                      left: 0;
                      top: 0;
                      width: 100%; /* Full width */
                      padding-left: 12%;
                      height: 100%; /* Full height */
                      overflow: auto; /* Enable scroll if needed */
                      background-color: rgb(0,0,0); /* Fallback color */
                      background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
                    }
                    
                    /* Modal Content */
                    .modal-content {
                      background-color: #fefefe;
                      margin: auto;
                      padding: 20px;
                      padding-bottom: 20px;
                      padding-left: 50px;
                      border: 1px solid #888;
                      width: 40%;
                      position: relative;
                    }
                    
                    /* The Close Button */
                    .close {
                      color: #aaaaaa;
                      float: right;
                      position: right;
                      font-size: 28px;
                      font-weight: bold;
                    }
                    
                    .close:hover,
                    .close:focus {
                      color: #000;
                      text-decoration: none;
                      cursor: pointer;
                    }
                    input[type="file"] {
                        display: none;
                    }
                    .custom-file-upload {
                        border: 1px solid #ccc;
                        display: inline-block;
                        padding: 6px 12px;
                        cursor: pointer;
                    }
                    </style>
                    
                    <!-- click to view image -->
                    <script>
                    // Get the modal
                    var modalone = document.getElementById("clickone");
                    
                    // Get the image and insert it inside the modal - use its "alt" text as a caption
                    var img = document.getElementById("myImg");
                    var modalImg = document.getElementById("img01");
                    var captionText = document.getElementById("caption");
                    img.onclick = function(){
                      modalone.style.display = "block";
                      modalImg.src = this.src;
                      captionText.innerHTML = this.alt;
                    }
                    
                    // Get the <span> element that closes the modal
                    var span = document.getElementsByClassName("close1")[0];
                    
                    // When the user clicks on <span> (x), close the modal
                    span.onclick = function() { 
                      modalone.style.display = "none";
                    }
                    </script>
                    
                    <style>
                    #myImg {
                      border-radius: 5px;
                      cursor: pointer;
                      transition: 0.3s;
                    }
                    
                    #myImg:hover {opacity: 0.7;}
                    
                    /* The Modal (background) */
                    .modal1 {
                      display: none; /* Hidden by default */
                      position: fixed; /* Stay in place */
                      z-index: 10; /* Sit on top */
                      padding-top: 100px; /* Location of the box */
                      
                      left: 0;
                      top: 0;
                      width: 100%; /* Full width */
                      height: 100%; /* Full height */
                      overflow: auto; /* Enable scroll if needed */
                      background-color: rgb(0,0,0); /* Fallback color */
                      background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
                    }
                    
                    /* Modal Content (image) */
                    .modal1-content {
                      margin: auto;
                      display: block;
                      width: 80%;
                      padding-left: 160px;
                      max-width: 700px;
                    }
                    
                    /* Caption of Modal Image */
                    #caption {
                      margin: auto;
                      display: block;
                      width: 80%;
                      max-width: 700px;
                      text-align: center;
                      color: #ccc;
                      padding: 10px 0;
                      
                      height: 150px;
                      
                    }
                    
                    /* Add Animation */
                    .modal1-content, #caption {  
                      -webkit-animation-name: zoom;
                      -webkit-animation-duration: 0.6s;
                      animation-name: zoom;
                      
                      animation-duration: 0.6s;
                    }
                    
                    @-webkit-keyframes zoom {
                      from {-webkit-transform:scale(0)} 
                      to {-webkit-transform:scale(1)}
                    }
                    
                    @keyframes zoom {
                      from {transform:scale(0)} 
                      to {transform:scale(1)}
                    }
                    
                    /* The Close Button */
                    .close1 {
                      position: absolute;
                      top: 15px;
                      right: 35px;
                      color: #f1f1f1;
                      font-size: 40px;
                      font-weight: bold;
                      transition: 0.3s;
                    }
                    
                    .close1:hover,
                    .close1:focus {
                      color: #bbb;
                      text-decoration: none;
                      cursor: pointer;
                    }
                    
                    /* 100% Image Width on Smaller Screens */
                    @media only screen and (max-width: 700px){
                      .modal-content {
                        width: 100%;
                      }
                    }
                    </style>

        
        <!-- Trigger/Open The Modal -->
        <button id="myBtn" class="btn"><i class="fa fa-edit" style="font-size:24px"></i>&nbsp;Edit Profile</button>
        
        <!-- The Modal -->
        <div id="myModal" class="modal">
        
          <!-- Modal content -->
          <div class="modal-content">
            <span class="close" align="right">&times;</span>
            <form method="POST" action="edit.php" enctype="multipart/form-data">
            <input type="hidden" name="size" value="1000000" required>
            <div>
              <label for="file-upload" class="custom-file-upload">
                    <i class="fa fa-cloud-upload"></i> Image Upload
                </label>
                <input id="file-upload" type="file" name="image"/>
              <br><br>
              <input type="text" name="username_" placeholder="Enter your email to Confirm" class="btn" style="width:270px;" required>
            </div><br><br>
            <div>
              <button type="submit" name="upload" class="btn btn-primary">Change Profile Picture</button>
            </div>
          </form>
          </div>
        
        </div>
        
        <script>
        // Get the modal
        var modal = document.getElementById("myModal");
        
        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");
        
        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];
        
        // When the user clicks the button, open the modal 
        btn.onclick = function() {
          modal.style.display = "block";
        }
        
        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
          modal.style.display = "none";
        }
        
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        }
        </script>
              </p>
                    </div>
                    <script>
                    function openForm() {
                      document.getElementById("myForm").style.display = "block";
                    }
                    
                    function closeForm() {
                      document.getElementById("myForm").style.display = "none";
                    }
                    </script>         
            
            
            
            <!--
              <p>Your Profile Picture</p>
              <img src="<?php// echo 'images/'.$images ?>">
              <br>
              <h4><b>Your&nbsp;name:</b><?php // echo $name ?></h4>
              <h4><b>Your&nbsp;Username:</b><?php // echo $username ?></h4>
            <br>
            <p>Change your Profile Picture</p>
            <form method="POST" action="edit.php" enctype="multipart/form-data">
            <input type="hidden" name="size" value="1000000" required>
            <div>
              <input type="file" name="image"><br><br>
              <input type="text" name="username_" placeholder="Enter your email to Confirm" class="btn" required>
            </div><br><br>
            <div>
              <button type="submit" name="upload" class="btn btn-primary">Change Profile Picture</button>
            </div>
          </form>
          </center>
          -->



          





        </div>
        <!-- /.container-fluid -->

      </div>
      <br><br>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">〜</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
