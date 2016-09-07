<?php
include ('db.php');
$res= mysqli_query($conn,"SELECT * FROM underwriter");
?>

<!DOCTYPE HTML>
<html>
	<table border="3">
		<?php
			$value="REFER";
			echo"<tr><th><b>Username</b><th><b>LoanAmount</b></th><th><b>Salary</b></th><th><b>STATUS</b></th><th><b>Term</b><th><b>Edit</b></th>";
			while($row=mysqli_fetch_array($res)){
				if(strcmp($row[3],$value)==0)
					echo"<tr><td>$row[5]</td> <td>$$row[1]</td><td>$$row[2]</td><td>$row[3]</td><td>$row[4] months</td><td><a href='edit.php?approve=$row[0]'>edit</td>";
				else
					echo"<tr><td>$row[5]</td> <td>$$row[1]</td><td>$$row[2]</td><td>$row[3]</td><td>$row[4] months</td>";
			}
		?>
<form>
<input type= "button" value="Back" onClick="history.go(-1); return true;">
</form>
</table>
</html>