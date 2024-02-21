<?php
include_once 'Adminheader.php';
?>

<html>

<head>
	<title> E-Home's Services </title>
</head>
<body>
	<form method="get" action="Validation.php">
	<div>
		Manage workers
		<table border="1">
			<?php
			$con = mysqli_connect('localhost','root','','testproject');
			$sql="SELECT * FROM worker";
			$query=mysqli_query($con, $sql);
			echo "<table border = '2' align = 'center' cellspacing = '3' cellpadding='3'>";
			echo "<tr>
					<th> Id </th>
					<th> Password </th>
					<th> First name </th>
					<th> Middle name </th>
					<th> last name </th>
					<th> Gender </th>
					<th> Date of join</th>
					<th> Contact No.1 </th>
					<th> Contact No.2  </th>
					<th> E-Mail </th>
			</tr>";
			while($raw=mysqli_fetch_array($query))
			{
			echo "<tr>
			<td> ". $raw[0] ." </td>
			<td> ". $raw[1] ." </td>
			<td> ". $raw[2] ." </td>
			<td> ". $raw[3] ." </td>
			<td> ". $raw[4] ." </td>
			<td> ". $raw[5] ." </td>
			<td> ". $raw[6] ." </td>
			<td> ". $raw[7] ." </td>
			<td> ". $raw[8] ." </td>
			<td> ". $raw[9] ." </td>
			<td>
				<a href='EditAdmin.php?wid=".$raw[0]."'>Edit </a> 
			</td>
			<td>
				<a href='DeleteAdmin.php?wid=".$raw[0]."'>Delete </a> 
			</td>
		</tr>";
		}
		?>
	</table>
	</div>
	</form>
</body>

<?php
	include_once 'footer.php';
?>