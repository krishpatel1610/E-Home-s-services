<?php
    /*if(!isset($_SESSION["wid"]))
    {
        header('location:ClientLogin.php');
    }*/
    session_start();
    include_once 'Workerheader.php';

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
	<form method="post" >
	<div>
		<center>
		<table class="table" style="width:50%; margin-top: 40px; " >
			 <thead  class="bg-dark">
    <tr>
      <th class="text-white" scope="col">BookingId</th>
      <th class="text-white" scope="col">Firstname</th>
      <th class="text-white" scope="col">Middle name</th>
      <th class="text-white" scope="col">lastname</th>
      <th class="text-white" scope="col">ContactNo.</th>
      <th class="text-white" scope="col">E-Mail</th>
      <th class="text-white" scope="col">Address1</th>
      <th class="text-white" scope="col">Address2</th>
      <th class="text-white" scope="col">Area</th>
      <th class="text-white" scope="col">Billing</th>
      <th class="text-white" scope="col"></th>
      <th class="text-white" scope="col"></th>
    </tr>
  </thead>
		
		
			<?php
			
			$wid = $_SESSION["wid"];
			$con = mysqli_connect('localhost','root','','testproject');
			$smt = "select*from booking where WorkerId=".$wid;
			$q = mysqli_query($con, $smt);
			$row_count = mysqli_num_rows($q);
			if($q)
			{
				if ($row_count == 0)
                    {
                        
                        echo "No record found!";
                    
                    } 
                    else
                    {
			

			while($raw=mysqli_fetch_array($q))
			{
				$cid = $raw[1];
				$bookingid = $raw[0];
				$bill = $raw[3] ;
				if($bill == 0)
				{
					$bill = 0;
				}
				else
				{
					$bill = $raw[3]-200;
				}
				
				$con = mysqli_connect('localhost','root','','testproject');
				$ss = "select*from client where ClientId=".$cid;
				$query = mysqli_query($con, $ss);

				
			
			while($raw=mysqli_fetch_array($query))
			{
			echo "<tr>
			
			<td> ". $bookingid ." </td>
			<td> ". $raw[2] ." </td>
			<td> ". $raw[3] ." </td>
			<td> ". $raw[4] ." </td>
			<td> ". $raw[6] ." </td>
			<td> ". $raw[7] ." </td>
			<td> ". $raw[8] ." </td>
			<td> ". $raw[9] ." </td>
			<td> ". $raw[10] ." </td>
			<td> ". $bill ." </td>
			<td>  </td>
		</tr>";
			
		}
	}
}
}
		
		?>
	</table>
</center>
</div>
</form>
</body>
</html>

<?php
    include_once 'footer.php';
?>