<?php
	$con = mysqli_connect('localhost','root','','testproject');
	if(isset($_GET["wid"]))
	{
			$sql = "DELETE FROM `worker` WHERE WorkerId = ".$_GET["wid"];
			
			$query=mysqli_query($con, $sql);
			
			if($query)
			{
				
				?>
				<META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/Project%20implementation/Admin/Workerupdate.php">
				<?php
				//echo "<script>alert('Record has been deleted!')</script>"; 
			}
				
			else
			{
				echo "There is some problem.";
			}
	}
?>