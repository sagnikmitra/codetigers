<?
session_start();
$_SESSION['message'] = '';

$mysqli = new mysqli('localhost', 'root', 'password', 'accounts' )
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	if ($_POST['password'] == $_POST['confirm']) {
		$username = $mysqli ->real_escape_string($_POST['username']);
		$password = md5($_POST['password']);
		$confirm = md5($_POST['confirm']);

		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;
		$_SESSION['confirm'] = $confirm;

		$sql = "INSERT INTO users(username,password,confirm)"
		        ."VALUES('username','password','confirm')";

		if (mysqli -> query($sql) === true){
			$_SESSION['message'] = 'Registration Complete';
			header("location: welcome.php");
		}
		else{
			$_SESSION['message'] = "User could not be addded"
		}


	}
	else{
		$_SESSION["message"] ="Failed"
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Form</title>
</head>
<body>
 <form action="form.php" method="post" enctype="multipart/form-data" autocomplete="off">
 <input type="name" name="username" placeholder="Username" required />
 <input type="password" name="password" placeholder="Type your password" autocomplete="new-password" required />
 <input type="confirm" name="confirm" placeholder="Confirm your password"  autocomplete="new-password" required />
 <input type="submit" name="submit" />	
 </form>
 
</body>
</html>