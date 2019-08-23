<?php
    include '../../../db/database_connection.php';
    if(isset($_POST['submit'])){
        if(isset($_POST['title'])){
            $title = mysqli_real_escape_string($conn,$_POST['title']);
            $image        =  uniqid().$_FILES['image']['name'];
            $image_tmp    = $_FILES['image']['tmp_name'];

            if(!file_exists('../../assets/images/banner'))
            {
                mkdir('../../assets/images/banner',0777,true);
            }
            
            move_uploaded_file($image_tmp, "../../assets/images/banner/$image");
            
            $sql = "INSERT INTO banner (title,image) VALUES ('$title','$image')";
			$query = mysqli_query($conn,$sql);
            if($query){	
			    header('location:../../banner.php');
            }else{
                die("banner insert failed.").mysqli_error();
            }
        }else{

        }
    }
?>