<?php
    include '../../db/database_connection.php';
	$id=$_GET['id'];
	$query = mysqli_query($conn,"delete from tags where id='$id'");
	if($query){
		header('location:../category.php');
	}else{
		die("tag delete failed ").mysqli_error();
	}
	
?>