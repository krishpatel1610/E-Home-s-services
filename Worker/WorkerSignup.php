<?php
	
	

	if(isset($_POST['Signupbtn']))
	{
	
	$wpassword = $_POST["Workerpassword"];
	$wfname = $_POST["Firstname"];
	$wmname = $_POST["Middlename"];
	$wlname = $_POST["Lastname"];
	$wgender = $_POST["WorkerGender"];
    $wdateofjoin = $_POST["Dateofjoin"];
	$wcnumber1 = $_POST["ContactNo1"];
	$wcnumber2 = $_POST["ContactNo2"];
	$wemail = $_POST["EmailId"];
	$city = $_POST["city"];
	$profession = $_POST["profession"];
	$charges = $_POST["Charges"];
	$con = mysqli_connect('localhost','root','','testproject');
	/*if($con)
	echo "Connected successfully.";*/
	$smt="INSERT INTO `worker`( `WorkerPassword`, `FirstName`, `MiddleName`, `LastName`, `Gender`, `DateofJoin`, `ContactNo1`, `ContactNo2`, `EMailId`, `City`, `profession`, `Charges`)
	VALUES ('$wpassword','$wfname','$wmname','$wlname','$wgender','$wdateofjoin','$wcnumber1','$wcnumber2','$wemail','$city','$profession','$charges')";
	
	$query=mysqli_query($con,$smt);
	if($query)
		header('location: index.php');
	}
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
		<form method="post" action="WorkerSignup.php">
		<div class="user-details">
			<div class="input-box">
            <span class="details">E-mail</span>
            <input type="email" name="EmailId" placeholder="E-mail Id" required>
			</div>
			<div class="input-box">
            <span class="details">Worker password</span>
            <input type="Worker password" name="Workerpassword" placeholder="Worker password" required>
			</div>
			<div class="input-box">
            <span class="details">First name</span>
            <input type="text" name="Firstname" placeholder="First name" required>
			</div>
			<div class="input-box">
            <span class="details">Middle name</span>
            <input type="text" name="Middlename" placeholder="Middel name" required>
			</div>
			<div class="input-box">
            <span class="details">Last name</span>
            <input type="text" name="Lastname" placeholder="Last name" required>
			</div>
			
		
			<div class="input-box">
            <span class="details">Date of join</span>
            <input type="date" name="Dateofjoin" placeholder="Date of join" required>
			</div>
			
			<div class="gender-details">
			  <input type="radio" name="WorkerGender" id="dot-1" value="Male">
			  <input type="radio" name="WorkerGender" id="dot-2" value="Female">
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
            <span class="details">Contact number 1</span>
            <input type="text" name="ContactNo1" placeholder="Contact No.1" required>
			</div>
			<div class="input-box">
            <span class="details">Contact number 2</span>
            <input type="text" name="ContactNo2" placeholder="Contact No.2" required>
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
		<div class="input-box">
		<span class="details">Profession</span>
        <select class="input-box" style =" height: 45px;width: 100%;outline: none;font-size: 16px;border-radius: 5px; padding-left: 10px;border: 1px solid #ccc;border-bottom-width: 2px;transition: all 0.3s ease;.user-details .input-box input:focus,.user-details .input-box input:valid{border-color: #8cc751;}" name="profession" id="profession">
            <option value="none">Select Profession</option>
            <option value="Electrician">Electrician</option>
            <option value="Plumber">Plumber</option>
            <option value="Carpainter">Carpainter</option>
		</select>
		</div>
		
		<div class="input-box">
            <span class="details">Charges</span>
            <input type="text" name="Charges" placeholder="Charges" required>
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

