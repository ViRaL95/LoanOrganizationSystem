<?php
include ('db.php');
session_start();
$loginname=$_SESSION['loginname'];
$res= mysqli_query($conn,"SELECT * FROM underwriter");
?>

<!DOCTYPE HTML>
<html>
	<table border="3">
		<?php
		echo"Logged in as $loginname";
		echo"<tr><th><b>Loan Amount</b><th><b>Salary</b></th><th><b>Status</b></th><th><b>Term</th>";
		while($row=mysqli_fetch_array($res)){
			if(strcmp($row[5],$loginname)==0)
				echo"<tr><td>$$row[1]</td> <td>$$row[2]</td><td>$row[3]</td><td>$row[4] months</td>";
		}
	?>
	</table>
<form>
	<input type= "button" value="Back" onClick="history.go(-1); return true;">
</form>
</html>