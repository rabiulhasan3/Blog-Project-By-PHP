<?php
    include '../../../db/database_connection.php';
	$id=$_GET['id'];

     // find out old data 
    $sql = "UPDATE banner SET `status`=1  WHERE id='$id' ";

    $query = mysqli_query($conn,$sql);

    if($query){
        header('location:../../banner.php');
    }else{
        die("banner activation failed .".mysqli_error());
    } 

?>