<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Register</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
              <h5 style="color: red;"><?php include('errors.php'); ?></h5><br>
              <form class="user" method="POST" action="register.php">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Full Name" name="name" value="<?php echo $name; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address" name="username" value="<?php echo $username; ?>" >
                </div>

                <div class="form-group">
                  <input type="number" class="form-control form-control-user" id="exampleInputEmail" placeholder="Mobile No" name="mobile" value="<?php echo $mobile; ?>" >
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="password" placeholder="Password" name="password_1">
                    <meter max="4" id="password-strength-meter"></meter>
                    <p id="password-strength-text" style="font-color: black"></p>
                  </div>

                  <style>
                    meter {
                        /* Reset the default appearance */
                        -webkit-appearance: none;
                           -moz-appearance: none;
                                appearance: none;

                        
                        width: 100%;
                        height: 0.5em;

                        /* Applicable only to Firefox */
                        background: none;
                        background-color: rgba(0, 0, 0, 0.1);
                      }

                      meter::-webkit-meter-bar {
                        background: none;
                        background-color: rgba(0, 0, 0, 0.1);
                      }
                      meter[value="1"]::-webkit-meter-optimum-value { background: red; }
                      meter[value="2"]::-webkit-meter-optimum-value { background: yellow; }
                      meter[value="3"]::-webkit-meter-optimum-value { background: orange; }
                      meter[value="4"]::-webkit-meter-optimum-value { background: green; }

                      /* Gecko based browsers */
                      meter[value="1"]::-moz-meter-bar { background: red; }
                      meter[value="2"]::-moz-meter-bar { background: yellow; }
                      meter[value="3"]::-moz-meter-bar { background: orange; }
                      meter[value="4"]::-moz-meter-bar { background: green; }
                  </style>
                  <script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.2.0/zxcvbn.js"></script>
                  <script>
                    var strength = {
                    0: "Worst",
                    1: "Bad",
                    2: "Weak",
                    3: "Good",
                    4: "Strong"
                  }
                  var password = document.getElementById('password');
                  var meter = document.getElementById('password-strength-meter');
                  var text = document.getElementById('password-strength-text');

                  password.addEventListener('input', function() {
                    var val = password.value;
                    var result = zxcvbn(val);

                    // Update the password strength meter
                    meter.value = result.score;

                    // Update the text indicator
                    if (val !== "") {
                      text.innerHTML = "Strength: " + strength[result.score]; 
                    } else {
                      text.innerHTML = "";
                    }
                  });
                  </script>


                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password" name="password_2">
                  </div>
                </div>
                <button class="btn btn-primary btn-user btn-block" type="submit" name="reg_users">Register</button>
              
                <hr>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.html">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="login.php">Already have an account? Login!</a>
              </div>
            </div>
          </div>
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
