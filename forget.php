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
  $sql = "UPDATE registration_data SET password='$password'  WHERE id = '$temp_id' ";
    if ($db->query($sql) === TRUE) {
      echo "Password updated successfully";
    } else {
      echo "Error updating record: " . $db->error;
    }
?>


