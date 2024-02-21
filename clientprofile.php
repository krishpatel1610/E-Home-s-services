

<html>
<head>
	<title> E-Home's Services </title>
	<link rel = "stylesheet" href = "registration.css">
</head>
<body>
	<?php
			
			session_start();
			if(!isset($_SESSION["wid"]))
    		{
        		header('location:Homepage.php');
    		}
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
			if(isset($_SESSION['wid']))
			{
				$selectQuery = "select * from client where ClientId= ". $_SESSION['wid'];
				
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
				$contactNumber = $row[6];
				$email = $row[7];
				$Address1 = $row[8];
				$Address2 = $row[9];
				$city = $row[10];
				$State = $row[11];
				$Pincode = $row[12];
				
			}
			if (isset($_POST["Signupbtn"]))
			{
				$firstname = $_POST["Firstname"];
				$middlename = $_POST["Middlename"];
				$lastname = $_POST["Lastname"];
				$gender = $_POST["WorkerGender"];
				$password = $_POST["Clientpassword"];
				$email = $_POST["EmailId"];
				$contactNumber = $_POST["ContactNo"];
				$Address1 = $_POST["Address1"];
				$Address2 = $_POST["Address2"];
				$city = $_POST["city"];
				$State = $_POST["State"];
				$Pincode = $_POST["Pincode"];
				
				$updateQuery = "UPDATE `client` SET `ClientPassword`='".$password."',`FirstName`='".$firstname."',`MiddleName`='".$middlename."',`LastName`='".$lastname."',`Gender`='".$gender."',`ContactNo`='".$contactNumber."',`EMailid`='".$email."',`Address1`='".$Address1."',`Address2`='".$Address2."',`City`='".$city."',`State`='".$State."',`Pincode`='".$Pincode."' WHERE ClientId =".$_SESSION['wid'];
				$result = mysqli_query($con, $updateQuery);
				if($result==1)
				{
					header("location:ClientLogin.php");
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
		<form method="post">
		<div class="user-details">
			<div class="input-box">
            <span class="details">E-mail</span>
            <input type="email" name="EmailId" placeholder="E-mail Id" value=<?php echo $email ?>>
			</div>
			<div class="input-box">
            <span class="details">Client password</span>
            <input type="password" name="Clientpassword" placeholder="Client password" value="<?php echo $password ?>">
			</div>
			<div class="input-box">
            <span class="details">First name</span>
            <input type="text" name="Firstname" placeholder="First name" value="<?php echo $firstname ?>">
			</div>
			<div class="input-box">
            <span class="details">Middle name</span>
            <input type="text" name="Middlename" placeholder="Middel name" value="<?php echo $middlename ?>">
			</div>
			<div class="input-box">
            <span class="details">Last name</span>
            <input type="text" name="Lastname" placeholder="Last name" value="<?php echo $lastname ?>">
			</div>
			
			<div class="input-box">
            <span class="details">Contact number</span>
            <input type="text" name="ContactNo" placeholder="Contact No" value = <?php echo $contactNumber?>>
			</div>
			
			<div class="gender-details">
			  <input type="radio" name="WorkerGender" id="dot-1" value="Male" <?php echo $optionGender[0]?>>
			  <input type="radio" name="WorkerGender" id="dot-2" value="Female" <?php echo $optionGender[1]?>>
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
            <input type="text" name="Address1" placeholder="Address - 1" value = <?php echo $Address1?> >
			</div>
			
			<div class="input-box">
            <span class="details">Address2</span>
            <input type="text" name="Address2" placeholder="Address - 2" value = <?php echo $Address2?>>
			</div>
			
			<div class="input-box">
            <span class="details">State</span>
            <input type="text" name="State" placeholder="State" value = <?php echo $State?>>
			</div>
			
			<div class="input-box">
            <span class="details">Pincode</span>
            <input type="text" name="Pincode" placeholder="Pincode" value = <?php echo $Pincode?>>
			</div>
			
			<div class="input-box">
			<span class="details">City</span>
            <select class="input-box" style =" Width:100%;height: 45px;border: 1px solid #ccc;"  name="city" id="city">
                <option value="none">-- Select City --</option>
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
			
			<div class="button">
          <input type="submit" name="Signupbtn" value="Update">
        </div>
		</form>	
		</div>
	</div>
  </div>
</div>
</body>
</html>

<?php
	include_once './include/footer.php';
?>







