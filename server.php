<?php
session_start();

// initializing variables
$username = "";
$name = "";
$email  = "";
$tname = "";
$mobile = "";
$college = "";
$tsize = "";
$pcode ="";
$roll="";
$inno = "";
$errors = array();

// connect to the database
$db = mysqli_connect('127.0.0.1', 'jdmf9z4zrge5', '5i<jnmoJ%Uhv7', 'test_sample');


// REGISTER USER
if (isset($_POST['reg_users'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $mobile = mysqli_real_escape_string($db, $_POST['mobile']);
  $college = mysqli_real_escape_string($db, $_POST['college']);
  $roll = mysqli_real_escape_string($db, $_POST['roll']);
  $tname = mysqli_real_escape_string($db, $_POST['tname']);
  $tsize = mysqli_real_escape_string($db, $_POST['tsize']);
  $pcode = mysqli_real_escape_string($db, $_POST['pcode']);
  $inno = mysqli_real_escape_string($db, $_POST['inno']);
  $tsize = mysqli_real_escape_string($db, $_POST['tsize']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM registration_data WHERE username='$username' OR email='$email' OR  tname='$tname' OR  mobile='$mobile' OR roll='$roll' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already registered");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already registered");
    }
        if ($user['tname'] === $tname) {
      array_push($errors, "Team name already exists");
    }
        if ($user['mobile'] === $mobile) {
      array_push($errors, "Mobile already registered");
    }
    if($user['tsize'] > 5){
        array_push($errors,"Team size maximum 5");
    }
    if ($user['roll'] === $roll) {
      array_push($errors, "Roll already registered");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database
  	$uniqueid =  uniqid(id);
  	$query = "INSERT INTO registration_data (id, username, name, email, mobile, college,roll, tname, tsize, inno, pcode, ppt, code, video2, password)
  			  VALUES('$uniqueid','$username','$name', '$email','$mobile','$college', '$roll', '$tname','$tsize','$inno','$pcode','','','','$password')";
  	if (mysqli_query($db, $query)) {
      mail($email,"DECOV 2020 Successfully Registered","Your Registration Id is".": ".$uniqueid." "." PLease dont share this Id in social media platform. Join Our Official Whatsapp Group here is the link: https://bit.ly/3coEoav . Join Our SLack Channel : https://bit.ly/2WKc6AN");
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: profile');
    } 
    else {
      echo "Error: " . $sql . "<br>" . mysqli_error($db);
      echo "Failed";
    }
  	
  	//
  }
}

// ...
// ...

// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM registration_data WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are Logged In Successfully ";
  	  header('location: profile');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

?>