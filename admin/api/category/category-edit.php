<?php
	include '../../../db/database_connection.php';
 
	$id=$_GET['id'];
 
    if(isset($_POST['name'])){
        $name = mysqli_real_escape_string($conn,$_POST['name']);
        // create slug
        function slug($text)
            {
            // replace non letter or digits by -
            $text = preg_replace('~[^\pL\d]+~u', '-', $text);

            // transliterate
            $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

            // remove unwanted characters
            $text = preg_replace('~[^-\w]+~', '', $text);

            // trim
            $text = trim($text, '-');

            // remove duplicate -
            $text = preg_replace('~-+~', '-', $text);

            // lowercase
            $text = strtolower($text);

            if (empty($text)) {
                return 'n-a';
            }

            return $text;
            }
        $slug = slug($name);
        $query = mysqli_query($conn,"update categories set name='$name', slug='$slug' where id='$id'");
        if($query){
            header('location:../../category.php');
        }else{
            die("category update failed").mysqli_error();
        }

    }

 
?>