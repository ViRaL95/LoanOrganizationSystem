<?php
include('db.php');
session_start();
if(isset($_POST['loanamount'])&& isset($_POST['term']) && isset($_POST['salary'])){
$loginname=$_SESSION['varname'];
$loanamount=$_POST['loanamount'];
$term=$_POST['term'];
$salary=$_POST['salary'];
if($loanamount<5000 ){
if($salary>1000){
$refer='APPROVED';	//dont need to refer
$sql2="INSERT INTO underwriter VALUES('','$loanamount','$salary','$refer','$term','$loginname')";
if(mysql_query($sql2))
	echo"Your loan has been auto approved (loan amount is less than 5000 and salary is greater than 1000)";
}
else if($salary<=1000){
$refer='REFER';//needs referring
$sql2="INSERT INTO underwriter VALUES('','$loanamount','$salary','$refer','$term','$loginname')";
if(mysql_query($sql2)){
	echo "Your loan has been sent to the underwriter to be reffered";
}
}
}

if($loanamount>=5000){
if($salary<=1000){
	$refer="DECLINED";
	$sql2="INSERT INTO underwriter VALUES('','$loanamount','$salary','$refer','$term','$loginname')";
	if(mysql_query($sql2)){
echo "I am sorry your loan has been declined (your salary is less than or equal to 1000)";
}
}
else if($salary>1000){
$refer='REFER';
$sql2="INSERT INTO underwriter VALUES('','$loanamount','$salary','$refer','$term','$loginname')";
if(mysql_query($sql2)){
	echo "Your loan has been sent to the underwriter to be reffered";
}
}
}
}

if(empty($_POST['loanamount'])|| empty($_POST['term']) || empty($_POST['salary'])){
	echo"One of your field values are empty";
}
?>
<html>
<form action="newLoan.php" method="POST">
Loan Amount: <input type="text" name="loanamount">
Term: <input type="text" name="term">
Salary:<input type="text" name="salary">
<input type="submit" value="Enter">
</form>
<form>
<input type="button" VALUE="back" onClick="history.go(-1); return true;">
</form>
</html>