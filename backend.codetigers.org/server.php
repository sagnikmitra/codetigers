<?php
session_start();

// initializing variables
$username = "";
$name = "";
$mobile = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'jdmf9z4zrge5', '5i<jnmoJ%Uhv7', 'eduflex');


// REGISTER USER
if (isset($_POST['reg_users'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $mobile = mysqli_real_escape_string($db, $_POST['mobile']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);    
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR  mobile='$mobile'  LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already registered");
    }      
        if ($user['mobile'] === $mobile) {
      array_push($errors, "Mobile already registered");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database
  	$uniqueid =  uniqid(id);
  	$query = "INSERT INTO users (id, username, name, mobile, password, image)
  			  VALUES('$uniqueid','$username','$name','$mobile','$password', 'profilepic.png')";
  	if (mysqli_query($db, $query)) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	 header('Location: mobile.php');
    } 
    else {
      echo "Error: " . $sql . "<br>" . mysqli_error($db);
      echo "Failed";
    }
  	
  	//
  }
}

// ...image
$msg = "";
$username_ = "";


  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
    // Get image name
    $image = $_FILES['image']['name'];
    // Get text
    $username_ = mysqli_real_escape_string($db, $_POST['username_']);

    // image file directory
    $target = "images/".basename($image);
    
    $sql = "UPDATE users SET image='$image'  WHERE username='$username_' ";
    // execute query
    mysqli_query($db, $sql);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
      $msg = "Image uploaded successfully";
      $_SESSION['msg'] = "Image uploaded successfully";
    }else{
      $msg = "Failed to upload image";
    }
  }
  $img = mysqli_query($db, "SELECT * FROM users");

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
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are Logged In Successfully ";
  	  header('Location: profile.php');
  	}
    else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

?>