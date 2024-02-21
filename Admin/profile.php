<html>
<head>
	<title> E-Home's Services </title>
	<link rel = "stylesheet" href = "registration.css">
</head>
<body>
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins',sans-serif;
}
body{
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 10px;
  background: #f2f2f2;
}
.logo {
     width: 80px;
     margin: auto;
 }

 .logo img {
     width: 100%;
     height: 80px;
     object-fit: cover;
     border-radius: 50%;
     box-shadow: 0px 0px 3px #5f5f5f, 0px 0px 0px 5px #ecf0f3, 8px 8px 15px #a7aaa7, -8px -8px 15px #fff
 }
.container{
  max-width: 700px;
  width: 100%;
  background-color: #fff;
  padding: 25px 30px;
  border-radius: 5px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.15);
}
.container .title{
  font-size: 25px;
  font-weight: 500;
  position: relative;
}
.container .title::before{
  content: "";
  position: absolute;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 30px;
  border-radius: 5px;
  background: linear-gradient(135deg, #138808, #8cc751);
}
.content form .user-details{
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  margin: 20px 0 12px 0;
}
form .user-details .input-box{
  margin-bottom: 15px;
  width: calc(100% / 2 - 20px);
}
form .input-box span.details{
  display: block;
  font-weight: 500;
  margin-bottom: 5px;
}
.user-details .input-box input{
  height: 45px;
  width: 100%;
  outline: none;
  font-size: 16px;
  border-radius: 5px;
  padding-left: 10px;
  border: 1px solid #ccc;
  border-bottom-width: 2px;
  transition: all 0.3s ease;
}
.user-details .input-box input:focus,
.user-details .input-box input:valid{
  border-color: #8cc751;
}
 form .gender-details .gender-title{
  font-size: 20px;
  font-weight: 500;
  align-items: center;
 }
 form .category{
   display: flex;
   width: 80%;
   margin: 14px 0 0 0px;
   justify-content: space-between;
 }
 form .category label{
   display: flex;
   align-items: center;
   cursor: pointer;
 }
 form .category label .dot{
  height: 18px;
  width: 18px;
  border-radius: 50%;
  border: 2px solid #ccc;
  transition: all 0.3s ease;
}
 #dot-1:checked ~ .category label .one,
 #dot-2:checked ~ .category label .two,
 #dot-3:checked ~ .category label .three{
   background: #138808;
   border-color: #8cc751;
 }
 form input[type="radio"]{
   display: none;
 }
 form .button{
   height: 45px;
   margin: 35px;
 }
 form .button input{
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
 form .button input:hover{
  /* transform: scale(0.99); */
    background: linear-gradient(-135deg, #138808, #8cc751);
  }
 @media(max-width: 584px){
 .container{
  max-width: 100%;
}
form .user-details .input-box{
    margin-bottom: 15px;
    width: 100%;
  }
  form .category{
    width: 100%;
  }
  .content form .user-details{
    max-height: 300px;
    overflow-y: scroll;
  }
  .user-details::-webkit-scrollbar{
    width: 5px;
  }
  }
  @media(max-width: 459px){
  .container .content .category{
    flex-direction: column;
  }
}

	</style>
<?php
			session_start();
			/*if(!isset($_SESSION["aid"]))
    		{
        		header('location:index.php');
    		}*/
			$con = mysqli_connect("localhost","root","");
			$db=mysqli_select_db($con,"testproject");
			$aname = "";
			$password = "";			
			$firstname = "";
			$middlename = "";
			$lastname = "";
			$gender = "";
			$dateofjoin = "";
			$contactNumber = "";
			$email = "";	
			
			if(isset($_SESSION["aid"]))
			{
				$selectQuery = "select * from Admin where AdminId= " . $_SESSION["aid"];
				
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
				@$aname = $_POST["Adminname"];
				$firstname = $_POST["Firstname"];
				$middlename = $_POST["Middlename"];
				$lastname = $_POST["Lastname"];
				$gender = $_POST["WorkerGender"];
				$password = $_POST["Adminpassword"];
				$email = $_POST["EmailId"];
				$dateofjoin = $_POST["Dateofjoin"];
				$contactNumber = $_POST["ContactNo"];
				
				
				$updateQuery = "UPDATE `admin` SET `Adminname`='".$aname."',`AdminPassword`='".$password."',`FirstName`='".$firstname."',`MiddleName`='".$middlename."',`LastName`='".$lastname."',`Gender`='".$gender."',`DateofJoin`='".$dateofjoin."',`ContactNo`='".$contactNumber."',`EMailId`='".$email."' WHERE  AdminId =".$_SESSION["aid"];
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
		<form method="post" action="profile.php">
		<div class="user-details">
			<div class="input-box">
            <span class="details">E-mail</span>
            <input type="email" name="EmailId" placeholder="E-mail Id" value="<?php echo $email ?>">
			</div>
			<div class="input-box">
            <span class="details">Admin password</span>
            <input type="password" name="Adminpassword" placeholder="Worker password" value="<?php echo $password ?>">
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
            <span class="details">Date of join</span>
            <input type="date" name="Dateofjoin" placeholder="Date of join" value = <?php echo $dateofjoin?>>
			</div>
			
			<div class="input-box">
            <span class="details">Contact number</span>
            <input type="text" name="ContactNo" placeholder="Contact No." value = "<?php echo $contactNumber?>" align="right">
			</div>
			<br>
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
			<div class="button"><br><br>
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
	include_once 'footer.php';
?>