<?php
    include '../../../db/database_connection.php';
	$id=$_GET['id'];

     // find out old data 
    $sql = "UPDATE tags SET `status`=1  WHERE id='$id' ";

    $query = mysqli_query($conn,$sql);

    if($query){
        header('location:../../tag.php');
    }else{
        die("tag activation failed .".mysqli_error());
    } 

?>