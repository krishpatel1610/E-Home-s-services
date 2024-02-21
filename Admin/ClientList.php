
<?php
include_once 'Adminheader.php';
?>

<html>

<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

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
	<form method="get" action="ClientList.php">
	<div>
		<center>
		<table class="table" style="width:50%; margin-top: 40px;">
			<thead  class="bg-dark">
    <tr>
      <th class="text-white" scope="col">Id</th>
      <th class="text-white" scope="col">Password</th>
      <th class="text-white" scope="col">FirstName </th>
      <th class="text-white" scope="col">MiddleName </th>
      <th class="text-white" scope="col">lastName</th>
      <th class="text-white" scope="col">Gender</th>
      
      <th class="text-white" scope="col">ContactNo.</th>
     
      <th class="text-white" scope="col">E-Mail</th>
        <th class="text-white" scope="col">Address1</th>
          <th class="text-white" scope="col">Address2</th>
      <th class="text-white" scope="col">City</th>
     
      <th class="text-white" scope="col"></th>
      <th class="text-white" scope="col"></th>
    </tr>
  </thead>
			<?php
			$con = mysqli_connect('localhost','root','','testproject');
			$sql="SELECT * FROM client";
			$query=mysqli_query($con, $sql);
			
			
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
			<td> ". $raw[10] ." </td>
			
				
			<td>
				<a href='EditClient.php?wid=".$raw[0]."'><img src='IMAGES\pencil1.ico' alt='pencil'> </a> 
			</td>
			<td>
				<a href='DeleteClient.php?wid=".$raw[0]."' onclick='return checkdelete()' ><img src='IMAGES\deleteImage.ico' alt='pencil'> </a>
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
</body>

<?php
	include_once 'footer.php';
?>