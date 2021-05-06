<?php
session_start();

// initializing variables
$temp_id = "";
$ppt = "";
$video1  = "";
$errors= array();
$db = mysqli_connect('127.0.0.1', 'jdmf9z4zrge5', '5i<jnmoJ%Uhv7', 'test_sample');


// REGISTER USER
if (isset($_POST['roundtwo_users'])) {
  // receive all input values from the form
  $temp_id = mysqli_real_escape_string($db, $_POST['temp_id']);
  $ppt = mysqli_real_escape_string($db, $_POST['ppt']);

  if (empty($temp_id)) { array_push($errors, "Id is required"); }
  if (empty($ppt)) { array_push($errors, "PPT is required"); }
}
  $user_check_query = "SELECT * FROM registration_data WHERE ppt='$ppt' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
   if ($user) { // if user exists
    if ($user['ppt'] === $ppt) {
      array_push($errors, "PPT already submitted");
    }

    
}

$sql = "UPDATE registration_data SET ppt='$ppt' WHERE id = '$temp_id' ";
    if ($db->query($sql) === TRUE) {
      array_push($errors, "Successfully Submited");
    } else {
      echo "Error updating record: " . $db->error;
    }
      	
  	//mail($email,"Successfully Registered","Thanks");
  	//$_SESSION['username'] = $username;
  	//$_SESSION['success'] = "You are now logged in";
  	//header('location: index.php');
	
  

?>
