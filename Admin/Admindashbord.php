<?php
	session_start();
			if(!isset($_SESSION["aid"]))
    		{
        		header('location:index.php');
    		}
include_once "Adminheader.php"; 
?>



<?php

include_once "footer.php"; 
?>