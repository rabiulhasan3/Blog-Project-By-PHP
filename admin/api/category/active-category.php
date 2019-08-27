<?php
    include '../../../db/database_connection.php';
	$id=$_GET['id'];

     // find out old data 
    $sql = "UPDATE categories SET `status`=1  WHERE id='$id' ";

    $query = mysqli_query($conn,$sql);

    if($query){
        header('location:../../category.php');
    }else{
        die("category activation failed .".mysqli_error());
    } 

?>