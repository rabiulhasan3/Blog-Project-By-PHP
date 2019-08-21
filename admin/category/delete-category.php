<?php
    include '../../db/database_connection.php';
	$id=$_GET['id'];
	mysqli_query($conn,"delete from categories where id='$id'");
	header('location:../category.php');
?>