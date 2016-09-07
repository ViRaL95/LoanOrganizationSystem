<?php
include('db.php');
session_start();
if(isset($_POST['loginname']) && isset($_POST['password'])){
	$result=mysqli_query($conn,"SELECT * FROM UsernamesAndPasswords WHERE Username='$loginname' AND Password='$password'");
	$numrows=mysqli_num_rows($result);
		if($numrows==0){
			echo "This username and password combination does not exist";
		}
		else{
			$_SESSION['loginname']=$loginname;
			header("Location: Applicant.php");
		}
}

if(isset($_POST['loginregistration']) && isset($_POST['passwordregistration'])){
	$loginregistration=$_POST['loginregistration'];
	$passwordregistration=$_POST['passwordregistration'];
	$query="INSERT INTO UsernamesAndPasswords (Username, Password) VALUES ('$loginregistration','$passwordregistration')";
	$result=mysqli_query($conn, $query);
		if($result){
			echo "Your account has been succesfully created";
		}
		else{
			echo"Your account information could not be created at this time";
		}

}
?>

<!DOCTYPE HTML>
<html><head><title> Login Screen </title> <center><b>Loan Organization System</b></center></head>
<br>

<p><b> In order to Login as a User Please enter your username and password </p></b>

<form action="loginscreen.php" method="POST">
	User Login :<input type="text"  name="loginname">
	Password:<input type="password" name="password">
<input type="submit" name="applicant_login_button">
</form>

<br>

<p><b> In order to Login as an UnderWriter please enter the Username for the Underwriter:</p></b>

<form action="Underwriter.php" method="POST">
	Underwriter Username:<input type="text" value="UNDERWRITER" name="under_writer_name">
	<input type="submit" name="Underwriter_login_button"><br>
</form>
<hr>

<p><b> If you would like to create a new username under User, please enter a username and a password </b></p>
<form action="loginscreen.php" method="POST">
	New Username: <input type="text" name="loginregistration">
	New Password: <input type="password" name="passwordregistration">
<input type="submit" name="applicant_registration_button">
</form>

</html>
