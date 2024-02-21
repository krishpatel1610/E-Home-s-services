<?php
	$con = mysqli_connect('localhost','root','','testproject');
	if(isset($_GET["wid"]))
	{
			$sql = "DELETE FROM `client` WHERE ClientId = ".$_GET["wid"];
			
			$query=mysqli_query($con, $sql);
			
			if($query){

				?>
				<META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/Project%20implementation/Admin/ClientList.php">
				<?php
				
			}
			else
			{
				echo "There is some problem.";
			}
	}
?>