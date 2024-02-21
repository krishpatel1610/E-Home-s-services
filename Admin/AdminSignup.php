<?php

	if(isset($_POST['Signupbtn']))
	{
	$aid = $_POST["Adminid"];
	$aname = $_POST["Adminname"];
	$apassword = $_POST["Adminpassword"];
	$afname = $_POST["Firstname"];
	$amname = $_POST["Middlename"];
	$alname = $_POST["Lastname"];
	$agender = $_POST["gender"];
    $adateofjoin = $_POST["Dateofjoin"];
	$acnumber = $_POST["ContactNo"];
	$aemail = $_POST["EmailId"];
	$con = mysqli_connect('localhost','root','','testproject');
	/*if($con)
	echo "Connected successfully.";*/
	$smt="INSERT INTO `admin`(`AdminId`, `Adminname`, `AdminPassword`, `FirstName`, `MiddleName`, `LastName`, `Gender`, `DateofJoin`, `ContactNo`, `EMailId`)
	VALUES ('$aid',	'$aname','$apassword','$afname','$amname','$alname','$agender','$adateofjoin','$acnumber','$aemail')";
	
	$query=mysqli_query($con,$smt);
	if($query)
		header('location: index.php');
	}
	?>
	
	<html>
<head>
	<title> Sign up form for admin </title>
	<link rel = "stylesheet" href = "Login.css">
</head>
<body>
<table>
	<div class="wrapper">
		<div class="logo"> <img src="IMAGES\logo4-removebg-preview(1).png" alt="logo"> </div><br>
		<div class="text-center mt-4 name" aling="center"> E-Home's Services </div><br>
		<form class="p-3 mt-3" method="POST" action="AdminSignup.php">
			E-mail
			<div class="form-field d-flex align-items-center">
			<span class="far fa-user"></span>
			<input type="text" name="EmailId" id="email" placeholder="E-mail Id">
			</div>
			Admin name
			<div class="form-field d-flex align-items-center">
			<span class="far fa-user"></span>
			<input type="text" name="Adminname" id="name" placeholder="Admin name">
			</div>
			Admin password
			<div class="form-field d-flex align-items-center">
			<span class="fas fa-key"></span>
			<input type="password" name="Adminpassword" id="password" placeholder="Admin password">
			</div>
			First name
			<div class="form-field d-flex align-items-center">
			<span class="far fa-user"></span>
			<input type="text" name="Firstname" id="FName" placeholder="First name">
			</div>
			Middle name
			<div class="form-field d-flex align-items-center">
			<span class="far fa-user"></span>
			<input type="text" name="Middlename" id="MName" placeholder="Middle name">
			</div>
			Last name
			<div class="form-field d-flex align-items-center">
			<span class="far fa-user"></span>
			<input type="text" name="Lastname" id="LName" placeholder="Last name">
			</div>
			Gender
			<input type="radio" name="gender" id="male"  value="Male"><lable>Male</lable>
			<input type="radio" name="gender" id="female"  value="Female"><lable>Female</lable><br><br>
			Date of join
			<div class="form-field d-flex align-items-center">
			<span class="far fa-user"></span>
			<input type="date" name="Dateofjoin" id="dateofjoin" placeholder="Date of join">
			</div>
			Contact number
			<div class="form-field d-flex align-items-center">
			<span class="far fa-user"></span>
			<input type="text" name="ContactNo" id="contact" placeholder="Contact No.">
			</div>
			
			
			<button class="btn mt-3" name="Signupbtn">Sign up</button>
			
		</form>
	</table>
	</div>
</body>
</html>

	
	
