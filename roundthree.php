<?php
session_start();

// initializing variables
$temp_id = "";
$code = "";
$video2  = "";
$errors = array();
$db = mysqli_connect('127.0.0.1', 'jdmf9z4zrge5', '5i<jnmoJ%Uhv7', 'test_sample');


// REGISTER USER
if (isset($_POST['roundthree_users'])) {
  // receive all input values from the form
  $temp_id = mysqli_real_escape_string($db, $_POST['temp_id']);
  $code = mysqli_real_escape_string($db, $_POST['code']);
  $video2 = mysqli_real_escape_string($db, $_POST['video2']);
  
  if (empty($temp_id)) { array_push($errors, "Id is required"); }
  if (empty($code)) { array_push($errors, "Code is required"); }
  if (empty($video2)) { array_push($errors, "Video is required"); }
}
  $user_check_query = "SELECT * FROM registration_data WHERE code='$code' OR video2='$video2' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
   if ($user) { // if user exists
    if ($user['code'] === $code) {
      array_push($errors, "Code already submitted");
    }

    if ($user['video2'] === $video2) {
      array_push($errors, "Video already submitted");
    }
    
}

$sql = "UPDATE registration_data SET code='$code', video2='$video2' WHERE id = '$temp_id' ";
    if ($db->query($sql) === TRUE) {
      $errors = "Round 3 Registration Successfull";
    } else {
      echo "Error updating record: " . $db->error;
    }
      	
  	//mail($email,"Successfully Registered","Thanks");
  	//$_SESSION['username'] = $username;
  	//
	
  

?>
