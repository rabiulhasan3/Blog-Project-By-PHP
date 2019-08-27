<?php
    include '../../../db/database_connection.php';
	$id=$_GET['id'];

     // find out old data 
    $sql = "UPDATE posts SET `status`=0  WHERE id='$id' ";

    $query = mysqli_query($conn,$sql);

    if($query){
        header('location:../../post.php');
    }else{
        die("post activation failed .".mysqli_error());
    } 

?>