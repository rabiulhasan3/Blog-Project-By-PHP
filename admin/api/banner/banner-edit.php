<?php
	include '../../../db/database_connection.php';
 
	$id=$_GET['id'];
 
    if(isset($_POST['title'])){
        $title = mysqli_real_escape_string($conn,$_POST['title']);
        // image
        $imageUpload = $_FILES['image']['name'];
        if(!empty($imageUpload)){
           

            $image        =  uniqid().$_FILES['image']['name'];
            $image_tmp    = $_FILES['image']['tmp_name'];

            if(!file_exists('../../assets/images/banner'))
            {
                mkdir('../../assets/images/banner',0777,true);
            }

             // find out old data 
            $oldQuery = mysqli_query($conn,"select * from banner where id='$id' ");
            $orow = mysqli_fetch_assoc($oldQuery);

            unlink('../../assets/images/banner/'.$orow['image']);
            
            move_uploaded_file($image_tmp, "../../assets/images/banner/$image");
            $query = mysqli_query($conn,"update banner set title='$title', image='$image' where id='$id'");
            if($query){
                header('location:../../banner.php');
            }else{
                die("category update failed").mysqli_error();
            }
        }else{
            $query = mysqli_query($conn,"update banner set title='$title' where id='$id'");
            if($query){
                header('location:../../banner.php');
            }else{
                die("category update failed").mysqli_error();
            }
        }
       
        

    }

 
?>