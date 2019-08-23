<?php
    include '../../../db/database_connection.php';
	$id=$_GET['id'];
	mysqli_query($conn,"delete from roles where id='$id'");
	header('location:../../role.php');
?>