<?php
	include_once('db.php');
	if(isset($_GET['approve'])){
		$id=$_GET['approve'];
		$res=mysqli_query($conn,"SELECT * FROM underwriter WHERE num='$id'");
		$row=mysqli_fetch_array($res);
		
	}
	if(isset($_POST['newStatus'])){
			$newStatus=$_POST['newStatus'];
			$id=$_POST['id'];
			$sql="UPDATE underwriter SET refer='$newStatus' WHERE num='$id'";
			$res=mysqli_query($conn,$sql) or die();
			echo "<meta http-equiv='refresh'content='0;url=UnderwriterLoanHistory.php'>";
	}
?>
<form action="edit.php" method="POST">
STATUS:<input type="text" name="newStatus" value="<?php echo $row[3];?> "> <br>
<input type="hidden" name="id" value="<?php echo $row[0]; ?>"><br>
<input type= "submit" value="Update">
</form>                          
