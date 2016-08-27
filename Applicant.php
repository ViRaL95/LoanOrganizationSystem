<?php
include ('db.php');
session_start();
if(isset($_POST['loginname'])){
$loginname=$_POST['loginname'];
if(strcmp($loginname,'APPLICANT')==0||strcmp($loginname,'VARUN')==0||strcmp($loginname,'NAKUL')==0){
$_SESSION['varname']=$loginname;
/*
check if the login name exists in the table, instead of doing this 
*/
}
else{
header('Location: ' . $_SERVER['loginscreen.php']);

}
}
?>

<html><head><title>Applicant Information></title></head>
<p> You can either: <ul>
	<li> Apply For a new Loan</li>
	<li> View Loan History </li>
</ul> </p>
</html>

<form action="newLoan.php" method="POST"> 
<input type="submit" value="Apply For New Loan";>
</form>

<form action="ApplicantLoanHistory.php" >
<input type="submit" value="View Loan History";>
</form>
<form>
<input type= "button" value="Back" onClick="history.go(-1); return true;">
</form>

