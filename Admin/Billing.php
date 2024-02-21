<?php
	$con = mysqli_connect('localhost','root','','testproject');
	if(isset($_GET["wid"]))
	{
			$sql = "select * from `booking` WHERE bookingId = '".$_GET["wid"]."' and ClientId ";
			
			$query=mysqli_query($con, $sql);
			while($raw=mysqli_fetch_array($query))
			{

				$cid = $raw[0];
			}
			
			$billing = "";
		
			if (isset($_POST["Signupbtn"]))
			{
				
				$billing = $_POST["Charges"];
				
				$updateQuery = "UPDATE booking SET Billing='".$billing."' WHERE  bookingId =".$_GET["wid"];
				$result = mysqli_query($con, $updateQuery);
				if($result==1)
				{
					header("location:ManageBooking.php");
					echo "Everythings is perfect";
				}
				else
				{
					echo "Something wrong".mysqli_error($con);
				}
			}
	}
?>

<html>
<head>
	<title>E-Home's Services</title>
	<link rel="stylesheet" href="logine.css">
</head>
<body>
<style>
.button{
   height: 45px;
   margin: 35px;
 }
.button input{
   height: 100%;
   width: 100%;
   border-radius: 5px;
   border: none;
   color: #fff;
   font-size: 18px;
   font-weight: 500;
   letter-spacing: 1px;
   cursor: pointer;
   transition: all 0.3s ease;
   background: linear-gradient(-135deg, #8cc751, #138808);
 }
.button input:hover{
  /* transform: scale(0.99); */
    background: linear-gradient(-135deg, #138808, #8cc751);
  }
</style>
<table>
	<div class="container">
	<div class="content">
		<div class="logo"> <img src="IMAGES\logo4-removebg-preview(1).png" alt="logo"> </div><br>
		<div  class="title"> E-Home's Services </div>
		<form  method="post" >
			<div class="user-details">
        		<div class="input-box"><br>
	  			<label>Bill Amount</label><br>
				<br>
				<input type="text" name="Charges" id="Charges" placeholder="Charges">
				</div>
			</div>
			<div class="input-box">
				<div class="button input">
					<input type="submit" name="Signupbtn" value="Update bill">
				</div>
			</div>
		</form>
		</div>
    </div>
</table>
</body>
</html>