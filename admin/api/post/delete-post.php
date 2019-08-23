<?php
    include '../../../db/database_connection.php';
	$id=$_GET['id'];

    // find out old data 
    $oldQuery = mysqli_query($conn,"select * from posts where id='$id' ");
    $orow = mysqli_fetch_assoc($oldQuery);

    unlink('../../assets/images/posts/'.$orow['image']);

    // category delete this posta 
    mysqli_query($conn,"delete from category_post where post_id='$id' ");

    // category delete this posta 
    mysqli_query($conn,"delete from post_tag where post_id='$id' ");

    
	mysqli_query($conn,"delete from posts where id='$id'");
	header('location:../../post.php');
?>