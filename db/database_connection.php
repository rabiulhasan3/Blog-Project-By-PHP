<?php 
	$conn = mysqli_connect("localhost","root","","blog");
	if(!$conn){
		die("connection erro").mysqli_error();
	}
 ?>