<?php
	include_once('db.php');
	if(isset($_GET['approve'])){
		$id=$_GET['approve'];
		$res=mysql_query("SELECT * FROM underwriter WHERE ID='$id'");
		$row=mysql_fetch_array($res);
	}
	if(isset($_POST['newStatus'])){
			$newStatus=$_POST['newStatus'];
			$id=$_POST['id'];
			$sql="UPDATE underwriter SET status='$newStatus' WHERE ID='$id'";
			$sql="UPDATE applicant SET status='$newStatus' WHERE ID='$id'";
			$res=mysql_query($sql) or die();
			echo "<meta http-equiv='refresh'content='0;url=UnderwriterLoanHistory.php'>";
	}
?>
<form action="approveLoan.php" method="POST">
STATUS:<input type="text" name="newStatus" value="<?php echo $row[4];?> "> <br>
<input type="hidden" name="id" value="<?php echo $row[5]; ?>"><br>
<input type= "submit" value="Update">
</form>                          
