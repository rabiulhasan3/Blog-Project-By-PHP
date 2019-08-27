<?php
    include '../../../db/database_connection.php';
    if(isset($_POST['submit'])){
        if(isset($_POST['name'])){
            $name = mysqli_real_escape_string($conn,$_POST['name']);
            $date = date("d F,Y");
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
            
            $sql = "INSERT INTO categories (name,slug,date,status) VALUES ('$name','$slug','$date',1)";
			$query = mysqli_query($conn,$sql);
            if($query){	
			    header('location:../../category.php');
            }else{
                die("category insert failed.").mysqli_error();
            }
        }else{

        }
    }
?>