<?php
    /*if(!isset($_SESSION["wid"]))
    {
        header('location:ClientLogin.php');
    }*/
    include_once './include/header.php';
?>

<html>

<head>
	<title> E-Home's Services </title>
</head>
<body>
	<form method="post" >
	<div>
		<br>
		<table border="1">
			<?php
			session_start();
			$cid = $_SESSION["wid"];
			$con = mysqli_connect('localhost','root','','testproject');
			$smt = "select*from booking where ClientId=".$cid;
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
                    	echo "<table border = '2' align = 'center' cellspacing = '3' cellpadding='3' >";
			echo "<tr>
					
					<th> BookingId </th>
					<th> First name </th>
					<th> Middle name </th>
					<th> last name </th>
					<th> Contact number1 </th>
					<th> Contact number2</th>
					<th> E-Mail </th>
					<th> Area  </th>
					<th> profession </th>
					<th> Charges </th>
					<th> Bill </th>
					
			</tr>";
			while($raw=mysqli_fetch_array($q))
			{
				$workerid = $raw[2];
				$bookingid = $raw[0];
				$billing = $raw[3];
				$con = mysqli_connect('localhost','root','','testproject');
				$ss = "select*from worker where WorkerId=".$workerid;
				$query = mysqli_query($con, $ss);
			
			while($raw=mysqli_fetch_array($query))
			{
			echo "<tr>
			
			<td> ". $bookingid ." </td>
			<td> ". $raw[2] ." </td>
			<td> ". $raw[3] ." </td>
			<td> ". $raw[4] ." </td>
			<td> ". $raw[7] ." </td>
			<td> ". $raw[8] ." </td>
			<td> ". $raw[9] ." </td>
			<td> ". $raw[10] ." </td>
			<td> ". $raw[11] ." </td>
			<td> ". $raw[12] ." </td>
			<td> ". $billing ." </td>

			
		</tr>";
		}
	}
	}
}
		?>
	</table>
</div>
</form>
</body>
</html>

<?php
    include_once './include/footer.php';
?>