<?php
session_start();
	if($_SESSION['admin_ID'] == "")
	{
		echo "Please Login!";
		exit();
	}
 ?>
