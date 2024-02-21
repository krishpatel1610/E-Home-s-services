<?php
    /*if(!isset($_SESSION["wid"]))
    {
        header('location:ClientLogin.php');
    }*/
    include_once './include/header.php';
    
    
    
    
?>

<html>

<head>

</head>
<body>
	<form method="post" action="Workerupdate.php">
	
			<?php
			session_start();
			$cid = $_SESSION["wid"];
			$workerid = $_GET["id"];
			$con = mysqli_connect('localhost','root','','testproject');
			$sql="INSERT INTO `booking`( `ClientId`, `WorkerId`) values ('$cid','$workerid')";
			$query=mysqli_query($con, $sql);
			
			if($query)
			{
				header('Location: MyBooking.php');
			}
			else
			{
				echo "Something went wrong.";
			}
		?>	
	
	</form>
</body>
</html>

<?php
    include_once './include/footer.php';
?>