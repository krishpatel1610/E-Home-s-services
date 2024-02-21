<html>
<head>
	<title> Sign up form for worker </title>
	<link rel = "stylesheet" href = "Login.css">
</head>
<body>
<?php
			session_start();
			if(!isset($_SESSION["wid"]))
    		{
        		header('location:index.php');
    		}
			$con = mysqli_connect("localhost","root","");
			$db=mysqli_select_db($con,"testproject");
			$aname = "";
			$password = "";			
			$firstname = "";
			$middlename = "";
			$lastname = "";
			$gender = "";
			$dateofjoin = "";
			$contactNumber1 = "";
			$email = "";	
			
			if(isset($_SESSION["wid"]))
			{
				$selectQuery = "select * from admin where AdminId= " . $_SESSION["wid"];
				
				$result = mysqli_query($con,$selectQuery);
				$row = mysqli_fetch_array($result);
				$aname = $row[1];
				$password = $row[2];
				$firstname = $row[3];
				$middlename = $row[4];
				$lastname = $row[5];
				$gender = $row[6];
				
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
				$dateofjoin = $row[7];
				$contactNumber = $row[8];
				$email = $row[9];
				
			}
			if (isset($_POST["Signupbtn"]))
			{
				$aname = $_POST["Adminname"];
				$firstname = $_POST["Firstname"];
				$middlename = $_POST["Middlename"];
				$lastname = $_POST["Lastname"];
				$gender = $_POST["WorkerGender"];
				$password = $_POST["Workerpassword"];
				$email = $_POST["EmailId"];
				$dateofjoin = $_POST["Dateofjoin"];
				$contactNumber = $_POST["ContactNo"];
				
				
				$updateQuery = "UPDATE admin SET Adminname='".$aname."' AdminPassword='".$password."',FirstName='".$firstname."',MiddleName='".$middlename."',LastName='".$lastname."',
				Gender='".$gender."',DateofJoin='".$dateofjoin."',ContactNo='".$contactNumber."',EMailId='".$email."' WHERE  AdminId =".$_SESSION["wid"];
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
			Admin name
			<div class="form-field d-flex align-items-center">
			<span class="far fa-user"></span>
			<input type="text" name="Adminname" id="WorkerFName" placeholder="First name"
			value="<?php echo $aname ?>">
			</div>
			password
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
			Contact number 
			<div class="form-field d-flex align-items-center">
			<span class="far fa-user"></span>
			<input type="text" name="ContactNo" id="WorkerCno1" placeholder="Contact No."
			value = <?php echo $contactNumber?>>
			</div>
			
			
			<button class="btn mt-3" name="Signupbtn">Update</button>
		</form>
</table>
	</div>
</body>
</html>

<?php
	include_once 'footer.php';
?>