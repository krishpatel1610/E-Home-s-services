<?php
	if(isset($_POST['Signupbtn']))
	{
	@$cid = $_POST["Clientid"];
	@$cpassword = $_POST["Clientpassword"];
	@$cfname = $_POST["Firstname"];
	@$cmname = $_POST["Middlename"];
	@$clname = $_POST["Lastname"];
	@$cgender = $_POST["gender"];
	@$ccnumber = $_POST["ContactNo"];
	@$cemail = $_POST["EmailId"];
	@$caddress1 = $_POST["Address1"];
	@$caddress2 = $_POST["Address2"];
	$city = $_POST["city"];
	@$cstate = $_POST["State"];
	$cpincode = $_POST["Pincode"];
	$con = mysqli_connect('localhost','root','','testproject');
	/*if($con)
	echo "Connected successfully.";*/
	$smt="INSERT INTO `client`(`ClientId`, `ClientPassword`, `FirstName`, `MiddleName`, `LastName`, `Gender`, `ContactNo`, `EMailid`, `Address1`, `Address2`, `City`, `State`, Pincode)
VALUES ('$cid','$cpassword','$cfname','$cmname','$clname','$cgender','$ccnumber','$cemail','$caddress1','$caddress2','$city','$cstate','$cpincode')";
	
	$query=mysqli_query($con,$smt);
	if($query)
		header('location: ClientLogin.php');
	}
	/*if($query)
		*/
	?>


<html>
<head>
	<title> E-Home's Services </title>
	<link rel = "stylesheet" href = "registration.css">
</head>
<body>
	
	<div class="container">
    <div class="content">
		<div class="logo"> <img src="IMAGES\logo4-removebg-preview(1).png" alt="logo"> </div><br>
		<div  class="title"> E-Home's Services </div>
		<form method="post">
		<div class="user-details">
			<div class="input-box">
            <span class="details">E-mail</span>
            <input type="email" name="EmailId" placeholder="E-mail Id" >
			</div>
			<div class="input-box">
            <span class="details">Client password</span>
            <input type="Client password" name="Clientpassword" placeholder="Client password" >
			</div>
			<div class="input-box">
            <span class="details">First name</span>
            <input type="text" name="Firstname" placeholder="First name" >
			</div>
			<div class="input-box">
            <span class="details">Middle name</span>
            <input type="text" name="Middlename" placeholder="Middel name" >
			</div>
			<div class="input-box">
            <span class="details">Last name</span>
            <input type="text" name="Lastname" placeholder="Last name" >
			</div>
			
			<div class="input-box">
            <span class="details">Contact number</span>
            <input type="text" name="ContactNo" placeholder="Contact No" >
			</div>
			
			<div class="gender-details">
			  <input type="radio" name="gender" id="dot-1" value="Male" >
			  <input type="radio" name="gender" id="dot-2" value="Female" >
			  <span class="gender-title">Gender</span>
			  <div class="category">
				<label for="dot-1" >
					<span class="dot one" align="left" ></span>
					<span class="gender" align="left" >Male </span>
				</label>
				<label for="dot-2">
					<span class="dot two" align="left" ></span>
					<span class="gender" align="left">Female</span>
				</label>
			  </div>
			</div>
			
			<div class="input-box">
            <span class="details">Address1</span>
            <input type="text" name="Address1" placeholder="Address - 1"  >
			</div>
			
			<div class="input-box">
            <span class="details">Address2</span>
            <input type="text" name="Address2" placeholder="Address - 2" >
			</div>
			
			<div class="input-box">
            <span class="details">State</span>
            <input type="text" name="State" placeholder="State" >
			</div>
			
			<div class="input-box">
            <span class="details">Pincode</span>
            <input type="text" name="Pincode" placeholder="Pincode" >
			</div>
			
			<div class="input-box">
			<span class="details">City</span>
			<select class="input-box" style =" Width:100%;height: 45px;border: 1px solid #ccc;"  name="city" id="city">
			<option value="none">Select City --</option>
			<option value="Ambawadi">Ambawadi City</option>
            <option value="Anandnagar">Anandnagar</option>
            <option value="AshramRoad">Ashram Road</option>
			<option value="Ambli">Ambli</option>
			<option value="Bodakdev">Bodakdev</option>
			<option value="Bapunagar">Bapunagar</option>
			<option value="Bopal">Bopal</option>
			<option value="CGRoad">C G Road</option>
			<option value="Chandlodia">Chandlodia</option>
			<option value="DaniLimbada">Dani Limbada</option>
			<option value="Ghatlodia">Ghatlodia</option>
			<option value="GulbaiTekra">Gulbai Tekra</option>
			<option value="Gurukul">Gurukul</option>
			<option value="Hathijan">Hathijan</option>
			<option value="Isanpur">Isanpur</option>
			<option value="Jivrajpark">Jivrajpark</option>
			<option value="Jodhpur">Jodhpur</option>
			<option value="JunaWadaj">Juna Wadaj</option>
			<option value="Mirzapur">Mirzapur</option>
			<option value="Nehrunagar">Nehrunagar</option>
			<option value="Kotarpur">Kotarpur</option>
			<option value="Shilaj">Shilaj</option>
			<option value="Sola">Sola</option>
			<option value="Thaltej">Thaltej</option>
			<option value="Usmanpura">Usmanpura</option>
			<option value="Vastral">Vastral</option>
			<option value="Vejalpur">Vejalpur</option>
			<option value="Carpainter">Carpainter</option>
   		</select>
		</div>
			
			<div class="button">
          <input type="submit" name="Signupbtn" value="Sign up">
        </div>
		</form>	
		</div>
	</div>
  </div>
</div>
</body>
</html>

