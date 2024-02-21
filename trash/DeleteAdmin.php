<?php
	$con = mysqli_connect('localhost','root','','testproject');
	if(isset($_GET["wid"]))
	{
			$sql = "DELETE FROM `worker` WHERE WorkerId = ".$_GET["wid"];
			
			$query=mysqli_query($con, $sql);
			
			if($query)
			
				header('location: Validation.php');
			else
				echo "There is some problem.";
	}
?>