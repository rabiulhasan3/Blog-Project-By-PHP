<?php
    include '../../../db/database_connection.php';
	$id=$_GET['id'];

     // find out old data 
    $oldQuery = mysqli_query($conn,"select * from banner where id='$id' ");
    $orow = mysqli_fetch_assoc($oldQuery);

    unlink('../../assets/images/banner/'.$orow['image']);
	mysqli_query($conn,"delete from banner where id='$id'");
	header('location:../../banner.php');
?>