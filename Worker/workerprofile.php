

<html>
<head>
	<title> E-Home's Services </title>
	<link rel = "stylesheet" href = "registration.css">
</head>
<body>
<?php
			session_start();
			/*if(!isset($_SESSION["wid"]))
    		{
        		header('location:workerprofile.php');
    		}*/
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
			$charges = "";
	//		echo "id is:".$_SESSION["wid"];
			if(isset($_SESSION["wid"]))
			{
				$selectQuery = "select * from worker where WorkerId= " . $_SESSION["wid"];
				
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
				$charges = $row[12];
				
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
				$charges = $_POST["Charges"];
				
				$updateQuery = "UPDATE worker SET WorkerPassword='".$password."',FirstName='".$firstname."',MiddleName='".$middlename."',LastName='".$lastname."',
				Gender='".$gender."',DateofJoin='".$dateofjoin."',ContactNo1='".$contactNumber1."',ContactNo2='".$contactNumber2."',EMailId='".$email."',City='".$city."',profession='".$profession."',Charges='".$charges."' WHERE  WorkerId =".$_SESSION["wid"];
				$result = mysqli_query($con, $updateQuery);
				if($result==1)
				{
					header("location:index.php");
					echo "Everythings is perfect";
				}
				else
				{
					echo "Something wrong".mysqli_error($con);
				}
			}
		?>

	<div class="container">
    <div class="content">
		<div class="logo"> <img src="IMAGES\logo4-removebg-preview(1).png" alt="logo"> </div><br>
		<div  class="title"> E-Home's Services </div>
		<form method="post" action="workerprofile.php">
		<div class="user-details">
			<div class="input-box">
            <span class="details">E-mail</span>
            <input type="email" name="EmailId" placeholder="E-mail Id" value = <?php echo $email?>>
			</div>
			<div class="input-box">
            <span class="details">Worker password</span>
            <input type="password" name="Workerpassword" placeholder="Worker password" value = <?php echo $password?>>
			</div>
			<div class="input-box">
            <span class="details">First name</span>
            <input type="text" name="Firstname" placeholder="First name" value = <?php echo $firstname?>>
			</div>
			<div class="input-box">
            <span class="details">Middle name</span>
            <input type="text" name="Middlename" placeholder="Middel name" value = <?php echo $middlename?>>
			</div>
			<div class="input-box">
            <span class="details">Last name</span>
            <input type="text" name="Lastname" placeholder="Last name" value = <?php echo $lastname?>>
			</div>
			
		
			<div class="input-box">
            <span class="details">Date of join</span>
            <input type="date" name="Dateofjoin" placeholder="Date of join" value = <?php echo $dateofjoin?>>
			</div>
			
			<div class="gender-details">
			  <input type="radio" name="WorkerGender" id="dot-1" <?php echo $optionGender[0]?> value="Male">
			  <input type="radio" name="WorkerGender" id="dot-2" <?php echo $optionGender[1]?> value="Female">
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
            <input type="text" name="ContactNo1" placeholder="Contact No.1" value = <?php echo $contactNumber1?>>
			</div>
			<div class="input-box">
            <span class="details">Contact number 2</span>
            <input type="text" name="ContactNo2" placeholder="Contact No.2" value = <?php echo $contactNumber2?>>
			</div>

			
			
			<div class="input-box">
			<span class="details">City</span>
            <select class="input-box" style =" Width:100%;height: 45px;border: 1px solid #ccc;"  name="city" id="city">
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
				</div>

			<div class="input-box">
			<span class="details">Profession</span>
        	<select class="input-box" style =" height: 45px;width: 100%;outline: none;font-size: 16px;border-radius: 5px; padding-left: 10px;border: 1px solid #ccc;border-bottom-width: 2px;transition: all 0.3s ease;.user-details .input-box input:focus,.user-details .input-box input:valid{border-color: #8cc751;}" name="profession" id="profession">
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
            </div>

            <div class="input-box">
            <span class="details">Charges</span>
            <input type="text" name="Charges" placeholder="Charges" value = <?php echo $charges?>>
			</div>
			
			<div class="button">
          	<input  type="submit" name="Signupbtn" value="Update">
        	</div>

		</form>	
		</div>
	</div>
  </div>
</div>
</body>
</html>

<?php
	include_once 'footer.php';
?>