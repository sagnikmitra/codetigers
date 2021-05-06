<?php

$password ="";
$temp_id = "";

$db = mysqli_connect('127.0.0.1', 'jdmf9z4zrge5', '5i<jnmoJ%Uhv7', 'test_sample');

if (isset($_POST['forget'])) {
  // receive all input values from the form
  $temp_id = mysqli_real_escape_string($db, $_POST['temp_id']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  
  if (empty($temp_id)) { array_push($errors, "Id is required"); }
  if (empty($passord)) { array_push($errors, "Password is required"); }
}
  $password = md5($password);
  $sql = "UPDATE registration_data SET password='$password'  WHERE id = '$temp_id' ";
  $results = mysqli_query($db, $sql);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['success'] = "Your password changed successfully";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="theme-color" content="#ffffff"/>
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="favicon.png">
    <link rel="icon" href="favicon.png">
    <title>
       Pass reset | Decov 20
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/css/material-kit.css?v=2.0.2">
    <!-- Documentation extras -->
    <link href="assets/assets-custom/demo.css" rel="stylesheet" />
    <link href="assets/assets-custom/css/speakers/style.css" rel="stylesheet">
    <link href="assets/assets-custom/css/base.css" rel="stylesheet">
    <link href="assets/assets-custom/css/footer.css" rel="stylesheet">
    <link href="assets/assets-custom/css/termynal.css" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/flickity@2.0/dist/flickity.min.css">
    <script src="https://unpkg.com/flickity@2.0/dist/flickity.pkgd.min.js"></script>

    <!-- iframe removal -->
</head>
<style>
input[type=text], select {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 50%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

</style>
<style>
.tooltip {
  position: relative;
  display: inline-block;

}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 70px;
  background-color: black;
  color: #fff;
  text-align: center;

  padding: 5px 0;

  /* Position the tooltip */
  position: absolute;
  z-index: 1;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
}
</style>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 40%;
  padding: 7px 14px;
  margin: 8px 0;
  display: inline-block;
  box-sizing: border-box;
}

button {
  background-color: purple;
  color: white;
  padding: 5px 10px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.10;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}


.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 600px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
.btn-log{
    width: 20vw;
    background-color: #e53539;
}
</style>
<body>
    <!--  https://i.imgur.com/R3cpQ9R.gif -->
    <div style="background-image: url('https://i.imgur.com/R3cpQ9R.gif'); height: 100%; background-position: center; background-repeat: no-repeat;">
    <form action="passreset.php" method="post">
    <br><br><br><br><br>
    <h1>Reset your Password</h1>
    <center>
    <label><h2 style="color: white;"><b>UNIQUE ID</b></h2></label><br>
    <input type="text" placeholder="Enter your Unique Id" style="width: 20vw; color: red; background-color: #212230;" name="temp_id" value="<?php echo $temp_id; ?>" required><br>

    <label><h2 style="color: white;"><b>NEW PASSWORD</b></h2></label><br>
    <input type="password" placeholder="Enter Password" style="width: 20vw; color: red; background-color: #212230;" name="password" value="<?php echo $password; ?>" required><br><br>
    <button type="submit" class="btn btn-log" name="forget">SUBMIT</button><br><br>
    </form>
    <br><br><br><br><br><br><br><br><br><br><br><br>
    </center>
    </div>
</body>
</html>
