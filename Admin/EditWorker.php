<html>
<head>
	<title> E-Home's Services </title>
	<link rel = "stylesheet" href = "Login.css">
</head>
<body>
<?php
			$con = mysqli_connect("localhost","root","");
			$db=mysqli_select_db($con,"testproject");
		
			$password = "";			
			$firstname = "";
			$middlename = "";
			$lastname = "";
			$gender = "";
			$dateofjoin = "";
			$contactNumber1 = "";
			$contactNumber2 = "";
			$email = "";	
			$city = "";
			$profession = "";
			echo "id is:".$_GET["wid"];
			if(isset($_GET["wid"]))
			{
				$selectQuery = "select * from worker where WorkerId= " . $_GET["wid"];
				
				$result = mysqli_query($con,$selectQuery);
				$row = mysqli_fetch_array($result);
				$password = $row[1];
				$firstname = $row[2];
				$middlename = $row[3];
				$lastname = $row[4];
				$gender = $row[5];
				
				if($gender == "Male")
				{	
					$optionGender[0] = "Checked";
					$optionGender[1] = "";
				}
				else
				{
					$optionGender[0] = "";
					$optionGender[1] = "Checked";
				}
				$dateofjoin = $row[6];
				$contactNumber1 = $row[7];
				$contactNumber2 = $row[8];
				$email = $row[9];
				$city = $row[10];
				$profession = $row[11];
				
			}
			if (isset($_POST["Signupbtn"]))
			{
				$firstname = $_POST["Firstname"];
				$middlename = $_POST["Middlename"];
				$lastname = $_POST["Lastname"];
				$gender = $_POST["WorkerGender"];
				$password = $_POST["Workerpassword"];
				$email = $_POST["EmailId"];
				$dateofjoin = $_POST["Dateofjoin"];
				$contactNumber1 = $_POST["ContactNo1"];
				$contactNumber2 = $_POST["ContactNo2"];
				$city = $_POST["city"];
				$profession = $_POST["profession"];
				
				$updateQuery = "UPDATE worker SET WorkerPassword='".$password."',FirstName='".$firstname."',MiddleName='".$middlename."',LastName='".$lastname."',
				Gender='".$gender."',DateofJoin='".$dateofjoin."',ContactNo1='".$contactNumber1."',ContactNo2='".$contactNumber2."',EMailId='".$email."',City='".$city."',profession='".$profession."' WHERE  WorkerId =".$_GET["wid"];
				$result = mysqli_query($con, $updateQuery);
				if($result==1)
				{
					header("location:Workerupdate.php");
					echo "Everythings is perfect";
				}
				else
				{
					echo "Something wrong".mysqli_error($con);
				}
			}
		?>
<table>
	<div class="wrapper">
		<div class="logo"> <img src="IMAGES\logo4-removebg-preview(1).png" alt="logo"> </div><br>
		<div class="text-center mt-4 name" aling="center"> E-Home's Services </div><br>
		<form class="p-3 mt-3" method="post" >
			E-mail
			<div class="form-field d-flex align-items-center">
			<span class="far fa-user"></span>
			<input type="email" name="EmailId" id="WorkerEid" placeholder="E-mail Id"
			value="<?php echo $email ?>">
			</div>
			Worker password
			<div class="form-field d-flex align-items-center">
			<span class="fas fa-key"></span>
			<input type="password" name="Workerpassword" id="Workerpwd" placeholder="Worker password"
			value="<?php echo $password ?>">
			</div>
			First name
			<div class="form-field d-flex align-items-center">
			<span class="far fa-user"></span>
			<input type="text" name="Firstname" id="WorkerFName" placeholder="First name"
			value="<?php echo $firstname ?>">
			</div>
			Middle name
			<div class="form-field d-flex align-items-center">
			<span class="far fa-user"></span>
			<input type="text" name="Middlename" id="WorkerMName" placeholder="Middle name"
			value="<?php echo $middlename ?>">
			</div>
			Last name
			<div class="form-field d-flex align-items-center">
			<span class="far fa-user"></span>
			<input type="text" name="Lastname" id="WorkerLName" placeholder="Last name"
			value="<?php echo $lastname ?>">
			</div>
			Gender<br>
			<input type="radio" name="WorkerGender" id="Male" 
			<?php echo $optionGender[0]?>
			value="Male"><lable>Male</lable>
			
			<input type="radio" name="WorkerGender" id="Female"
			<?php echo $optionGender[1]?>			
			value="Female"><lable>Female</lable><br><br>
			Date of join
			<div class="form-field d-flex align-items-center">
			<span class="far fa-user"></span>
			<input type="date" name="Dateofjoin" id="DateOfJoin" placeholder="Date of join"
			value = <?php echo $dateofjoin?>>
			</div>
			Contact number 1
			<div class="form-field d-flex align-items-center">
			<span class="far fa-user"></span>
			<input type="text" name="ContactNo1" id="WorkerCno1" placeholder="Contact No."
			value = <?php echo $contactNumber1?>>
			</div>
			Contact number 2
			<div class="form-field d-flex align-items-center">
			<span class="far fa-user"></span>
			<input type="text" name="ContactNo2" id="WorkerCno2" placeholder="Contact No."
			value = <?php echo $contactNumber2?>>
			</div>

			City
            <select class="form-field" style=" width:100%;height: 50px;" name="city" id="city">
                <option value="none">Select City --</option>
                <option value="Ambawadi"
                	<?php 
                		if($city == 'Ambawadi')
                		{
                			echo "selected";
                		}

                	?>
                >Ambawadi City</option>
                <option value="Anandnagar"
                	<?php 
                		if($city == 'Anandnagar')
                		{
                			echo "selected";
                		}

                	?>
                >Anandnagar</option>
                <option value="AshramRoad"
                	<?php 
                		if($city == 'AshramRoad')
                		{
                			echo "selected";
                		}

                	?>
                >Ashram Road</option>
				<option value="Ambli"
                	<?php 
                		if($city == 'Ambli')
                		{
                			echo "selected";
                		}

                	?>
                >Ambli Road</option>
				<option value="Bodakdev"
                	<?php 
                		if($city == 'Bodakdev')
                		{
                			echo "selected";
                		}

                	?>
                >Bodakdev</option>
				<option value="Bapunagar"
                	<?php 
                		if($city == 'Bapunagar')
                		{
                			echo "selected";
                		}

                	?>
                >Bapunagar</option>
				<option value="Bopal"
                	<?php 
                		if($city == 'Bopal')
                		{
                			echo "selected";
                		}

                	?>
                >Bopal</option>
				<option value="CGRoad"
                	<?php 
                		if($city == 'CGRoad')
                		{
                			echo "selected";
                		}

                	?>
                >CGRoad</option>
				<option value="Chandlodia"
                	<?php 
                		if($city == 'Chandlodia')
                		{
                			echo "selected";
                		}

                	?>
                >Chandlodia</option>
				<option value="DaniLimbada"
                	<?php 
                		if($city == 'DaniLimbada')
                		{
                			echo "selected";
                		}

                	?>
                >DaniLimbada</option>
				<option value="Ghatlodia"
                	<?php 
                		if($city == 'Ghatlodia')
                		{
                			echo "selected";
                		}

                	?>
                >Ghatlodia</option>
				<option value="GulbaiTekra"
                	<?php 
                		if($city == 'GulbaiTekra')
                		{
                			echo "selected";
                		}

                	?>
                >GulbaiTekra</option>
				<option value="Gurukul"
                	<?php 
                		if($city == 'Gurukul')
                		{
                			echo "selected";
                		}

                	?>
                >Gurukul</option>
				<option value="Hathijan"
                	<?php 
                		if($city == 'Hathijan')
                		{
                			echo "selected";
                		}

                	?>
                >Hathijan</option>
				<option value="Isanpur"
                	<?php 
                		if($city == 'Isanpur')
                		{
                			echo "selected";
                		}

                	?>
                >Isanpur</option>
				<option value="Jivrajpark"
                	<?php 
                		if($city == 'Jivrajpark')
                		{
                			echo "selected";
                		}

                	?>
                >Jivrajpark</option>
				<option value="Jodhpur"
                	<?php 
                		if($city == 'Jodhpur')
                		{
                			echo "selected";
                		}

                	?>
                >Jodhpur</option>
				<option value="JunaWadaj"
                	<?php 
                		if($city == 'JunaWadaj')
                		{
                			echo "selected";
                		}

                	?>
                >JunaWadaj</option>
				<option value="Mirzapur"
                	<?php 
                		if($city == 'Mirzapur')
                		{
                			echo "selected";
                		}

                	?>
                >Mirzapur</option>
				<option value="Nehrunagar"
                	<?php 
                		if($city == 'Nehrunagar')
                		{
                			echo "selected";
                		}

                	?>
                >Nehrunagar</option>
				<option value="Kotarpur"
                	<?php 
                		if($city == 'Kotarpur')
                		{
                			echo "selected";
                		}

                	?>
                >Kotarpur</option>
				<option value="Shilaj"
                	<?php 
                		if($city == 'Shilaj')
                		{
                			echo "selected";
                		}

                	?>
                >Shilaj</option>
				<option value="Sola"
                	<?php 
                		if($city == 'Sola')
                		{
                			echo "selected";
                		}

                	?>
                >Sola </option>
				<option value="Thaltej"
                	<?php 
                		if($city == 'Thaltej')
                		{
                			echo "selected";
                		}

                	?>
                >Thaltej</option>
				<option value="Usmanpura"
                	<?php 
                		if($city == 'Usmanpura')
                		{
                			echo "selected";
                		}

                	?>
                >Usmanpura</option>
				<option value="Vastral"
                	<?php 
                		if($city == 'Vastral')
                		{
                			echo "selected";
                		}

                	?>
                >Vastral</option>
				<option value="Vejalpur"
                	<?php 
                		if($city == 'Vejalpur')
                		{
                			echo "selected";
                		}

                	?>
                >Vejalpur</option>
					</select>

			<select class="form-field " style=" width:100%;height: 50px;" name="profession" id="profession">
                 <option value="none">Select Profession</option>
                <option value="Electrician"
                	<?php 
                		if($profession == 'Electrician')
                		{
                			echo "selected";
                		}

                	?> 
                >Electrician</option>
                <option value="Plumber"
                	<?php 
                		if($profession == 'Plumber')
                		{
                			echo "selected";
                		}

                	?>
                >Plumber</option>
                <option value="Carpainter"
                	<?php 
                		if($profession == 'Carpainter')
                		{
                			echo "selected";
                		}

                	?>
                >Carpainter</option>
            </select>

			<button class="btn mt-3" name="Signupbtn">Update</button>
		</form>
</table>
	</div>
</body>
</html>

<?php
	include_once 'footer.php';
?>