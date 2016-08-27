<?php
include ('db.php');
if(isset($_POST['loginname'])&& isset($_POST['password'])){
$loginname=$_POST['loginname'];
$password=$_POST['password'];
$sql="SELECT * FROM UsernamePassword WHERE (Username='$loginname' AND WHERE Password='$password')";
$res=mysql_query($sql);
$row=mysql_fetch_array($res);
if($row[0]>0)
	echo "Login Succesfull";
else
	echo "Please enter a valid username and password";
}
?>
<!DOCTYPE HTML>
<html><head><title> Login Screen </title> <center><b>Loan Organization System</b></center></head>
<br>
Applicant Usernames Available: 	
<ul>
<li>APPLICANT</li>
<li>VARUN</li>
<li>NAKUL</li>

<p>Underwriter Username: UNDERWRITER</p>

<form action="loginscreen.php" method="POST">
USER LOGIN :<input type="text"  name="loginname">
PASSWORD:<input type="text" name="password">
<input type="submit" name="applicant_login_button">
</form>

<form action="Underwriter.php" method="POST">
UNDERWRITER LOGIN:<input type="text" value="UNDERWRITER" name="under_writer_name">
<input type="submit" name="Underwriter_login_button"><br>
</form>
</html>
