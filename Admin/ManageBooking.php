<?php
include_once 'Adminheader.php';
?>

<html>

<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title> E-Home's Services </title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
	 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<form method="get"> 
	<div>
		<center>
		
		<table class="table" style="width:50%; margin-top: 40px; " >
			 <thead  class="bg-dark">
    <tr>
      <th class="text-white" scope="col">BookingId</th>
      <th class="text-white" scope="col">ClientId</th>
      <th class="text-white" scope="col">WorkerId</th>
      <th class="text-white" scope="col">Bill</th>
      <th class="text-white" scope="col">BookingTime</th>
      <th class="text-white" scope="col"></th>
      <th class="text-white" scope="col"></th>
    </tr>
  </thead>
			<?php
			$con = mysqli_connect('localhost','root','','testproject');
			$sql="SELECT * FROM booking";
			$query=mysqli_query($con, $sql);
			//echo "<table border = '2' align = 'center' cellspacing = '3' cellpadding='3'>";
			
			while($raw=mysqli_fetch_array($query))
			{
			echo "<tr>
			<td> ". $raw[0] ." </td>
			<td> ". $raw[1] ." </td>
			<td> ". $raw[2] ." </td>
			<td> ". $raw[3] ." </td>
			<td> ". $raw[4] ." </td>
			
			<td>
				<a href='Billing.php?wid=".$raw[0]."'> <button type='button' class='btn btn-primary'> UPDATE </button>
				</a> 
			</td>
			<td>
				<a href='DeleteBooking.php?wid=".$raw[0]."' onclick='return checkdelete()'><button type='button' class='btn btn-danger'> DELETE </button> </a> 
			</td>
		</tr>";
		}
		?>
	</table>
</center>
	<script>
		function checkdelete()
		{
			return confirm('Are you sure you want to delete this Record?');
		}
	</script>
	</div>
	</form>
</br>
</body>
</html>









<?php
	include_once 'footer.php';
?>