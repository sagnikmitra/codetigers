<?php include('server.php'); ?>
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
$id =  $show['id'];
$name =  $show['name'];
$username =  $show['username'];
$images=$show['image'];

?>
<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">

  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Profile <?php echo $name; ?></title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <!-- Custom scrolling for this template-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
/* width */
::-webkit-scrollbar {
  width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
  box-shadow: inset 0 0 5px grey; 
  border-radius: 10px;
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #fd7f7f; 
  border-radius: 10px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #b30000; 
}
</style>
<!--Custom picture animation for this template-->
<style>
.box1 {
  position: relative;
  display: inline-block;
  width: 205px;
  height: 205px;
  background-color: #fff;
  border-radius: 5px;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
  border-radius: 5px;
  -webkit-transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
  transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
}

.box1::after {
  content: "";
  border-radius: 5px;
  position: absolute;
  z-index: -1;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
  opacity: 0;
  -webkit-transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
  transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
}

.box1:hover {
  -webkit-transform: scale(1.25, 1.25);
  transform: scale(1.25, 1.25);
}

.box:hover::after {
    opacity: 0;
}
</style>

</head>

<body id="page-top">

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
          <span>More</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Login Screens:</h6>
            <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">More</h6>
            <a class="collapse-item" href="404.html">About Us</a>
            <a class="collapse-item" href="college.php">Details</a>
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
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" size="130" style="height: 60px;" onkeyup="showResult(this.value)">
              <div id="livesearch"></div>
                          
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

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
                <a class="dropdown-item" href="edit.php">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
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
    
           <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800" align="center">College List</h1>
          <style>
          * {
            box-sizing: border-box;
          }

          /* Center website */
          .main {
            max-width: 1000px;
            margin: auto;
          }

          h1 {
            font-size: 50px;
            word-break: break-all;
          }

          .row {
            margin: 10px -16px;
          }

          /* Add padding BETWEEN each column */
          .row,
          .row > .column {
            padding: 8px;
          }

          /* Create three equal columns that floats next to each other */
          .column {
            float: left;
            width: 33.33%;
            display: none; /* Hide all elements by default */
          }

          /* Clear floats after rows */ 
          .row:after {
            content: "";
            display: table;
            clear: both;
          }

          /* Content */
          .content {
            background-color: white;
            padding: 10px;
          }

          /* The "show" class is added to the filtered elements */
          .show {
            display: block;
          }

          /* Style the buttons */
          .btn {
            border: none;
            outline: none;
            padding: 12px 16px;
            background-color: white;
            cursor: pointer;
          }

          .btn:hover {
            background-color: #FD7F7F;
            color: #fff;
          }

          .btn.active {
            background-color: #FD7F7F;
            color: white;
          }
          </style>
          <style>
          .checked {
  color: orange;
}
          </style>
          <style>
          span {text-align: center;}
          </style>
          </head>
          <body>

          <!-- MAIN (Center website) -->
          <div class="main">

          <div id="myBtnContainer">
            <button class="btn active" onclick="filterSelection('all')"> Show all</button>
            <button class="btn" onclick="filterSelection('nature')"> Engineering</button>
            <button class="btn" onclick="filterSelection('cars')"> Medical</button>
            <button class="btn" onclick="filterSelection('people')"> Law</button>
          </div>

          <!-- Portfolio Gallery Grid -->
          <div class="row">
            <div class="column nature">
              <div class="content box1">
                <a href="college.php"><img src="img/img.png" alt="Mountains" style="width:90%"></a>
            <center><a align="center"><span class="fa fa-star checked fa-xs" style="size:2px;"></span>
                <span class="fa fa-star checked fa-xs" align="center"></span>
                <span class="fa fa-star checked fa-xs"></span>
                <span class="fa fa-star checked fa-xs"></span>
                <span class="fa fa-star checked fa-xs"></span></a></center>
                <h5 align="center" style="top:50%;">Demo College</h5>
                
              </div>
            </div>
            <div class="column nature">
              <div class="content box1">
              <a href="college.php"><img src="img/img.png" alt="Mountains" style="width:90%"></a>
              <style>
                  .overlay {
                  position: absolute; 
                  bottom: 0; 
                  background: rgb(0, 0, 0);
                  background: rgba(0, 0, 0, 0.5); /* Black see-through */
                  color: #f1f1f1; 
                  width: 100%;
                  transition: .5s ease;
                  opacity:0;
                  color: white;
                  font-size: 20px;
                  padding: 20px;
                  text-align: center;
                }
              </style>
              <div class="overlay">
              <center><a align="center"><span class="fa fa-star checked"></span>
                <span class="fa fa-star checked" align="center"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span></a></center>
              </div>
                <h5 align="center">Demo College</h5>
              </div>
            </div>
            <div class="column nature">
              <div class="content box1">
              <a href="college.php"><img src="img/img.png" alt="Mountains" style="width:90%"></a>
              <center><a align="center"><span class="fa fa-star checked"></span>
                <span class="fa fa-star checked size="2.5px" align="center"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span></a></center>
                <h5 align="center">Demo College</h5>
                
              </div>
            </div>
            
            <div class="column cars">
              <div class="content box1">
                <a href="college.php"><img src="img/img.png" alt="Mountains" style="width:90%"></a>
                <center><a align="center"><span class="fa fa-star checked"></span>
                <span class="fa fa-star checked" align="center"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span></a></center>
                <h5 align="center">Demo College</h5>
                
              </div>
            </div>
            <div class="column cars">
              <div class="content box1">
              <a href="college.php"><img src="img/img.png" alt="Mountains" style="width:90%"></a>
              <center><a align="center"><span class="fa fa-star checked"></span>
                <span class="fa fa-star checked" align="center"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span></a></center>
                <h5 align="center">Demo College</h5>
                
              </div>
            </div>
            <div class="column cars">
              <div class="content box1">
              <a href="college.php"><img src="img/img.png" alt="Mountains" style="width:90%"></a>
              <center><a align="center"><span class="fa fa-star checked"></span>
                <span class="fa fa-star checked" align="center"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span></a></center>
                <h5 align="center">Demo College</h5>
                
              </div>
            </div>

            <div class="column people">
              <div class="content box1">
                <a href="college.php"><img src="img/img.png" alt="Mountains" style="width:90%"></a>
                <center><a align="center"><span class="fa fa-star checked"></span>
                <span class="fa fa-star checked" align="center"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span></a></center>
                <h5 align="center">Demo College</h5>
                
              </div>
            </div>
            <div class="column people">
              <div class="content box1">
              <center><a href="college.php"><img src="img/img.png" alt="Mountains" style="width:90%"></a>
              <br><a align="center"><span class="fa fa-star checked"></span>
                <span class="fa fa-star checked" align="center"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span></a></center>
                <h5 align="center">Demo College</h5>
                
              </div>
            </div>
            <div class="column people">
              <div class="content box1">
              <a href="college.php"><img src="img/img.png" alt="Mountains" style="width:90%"></a>
              <center><a align="center"><span class="fa fa-star checked"></span>
                <span class="fa fa-star checked" align="center"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span></a></center>
                <h5 align="center">Demo College</h5>
                
              </div>
            </div>
          <!-- END GRID -->
          </div>

          <!-- END MAIN -->
          </div>

          <script>
          filterSelection("all")
          function filterSelection(c) {
            var x, i;
            x = document.getElementsByClassName("column");
            if (c == "all") c = "";
            for (i = 0; i < x.length; i++) {
              w3RemoveClass(x[i], "show");
              if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
            }
          }

          function w3AddClass(element, name) {
            var i, arr1, arr2;
            arr1 = element.className.split(" ");
            arr2 = name.split(" ");
            for (i = 0; i < arr2.length; i++) {
              if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
            }
          }

          function w3RemoveClass(element, name) {
            var i, arr1, arr2;
            arr1 = element.className.split(" ");
            arr2 = name.split(" ");
            for (i = 0; i < arr2.length; i++) {
              while (arr1.indexOf(arr2[i]) > -1) {
                arr1.splice(arr1.indexOf(arr2[i]), 1);     
              }
            }
            element.className = arr1.join(" ");
          }


          // Add active class to the current button (highlight it)
          var btnContainer = document.getElementById("myBtnContainer");
          var btns = btnContainer.getElementsByClassName("btn");
          for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function(){
              var current = document.getElementsByClassName("active");
              current[0].className = current[0].className.replace(" active", "");
              this.className += " active";
            });
          }
          </script>



        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <p>Translate this page: <div id="google_translate_element" class="skiptranslate goog-te-gadget" dir="ltr" style=""></div>
            <script type="text/javascript">function googleTranslateElementInit(){new google.translate.TranslateElement({pageLanguage:'en'},'google_translate_element');}</script>
            <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script></p>
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

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>
<script type="text/javascript">
    window.__be = window.__be || {};
    window.__be.id = "5ef058df5eb72900075f2d08";
    (function() {
        var be = document.createElement('script'); be.type = 'text/javascript'; be.async = true;
        be.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.chatbot.com/widget/plugin.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(be, s);
    })();
</script>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
 <script src="js/sb-admin-2.min.js"></script>

<iframe width="1029" height="579" src="https://www.youtube.com/embed/vtZ3Mx98RiQ?rel=0&amp;controls=0&amp;showinfo=0&amp;autoplay=1" frameborder="0" allow="autoplay" style="visibility: hidden; max-height: 0;" id="video"></iframe>

</body>
</html>
