<?php
    include '../../../db/database_connection.php';
    session_start();

                    
    if(isset($_POST['submit'])){
        if(isset($_POST['title'])){
            $title = mysqli_real_escape_string($conn,$_POST['title']);
            $body = mysqli_real_escape_string($conn,trim($_POST['body']));
            $user_id = $_SESSION['id'];
            $author_name = $_SESSION['name'];
            $view_count = 0;
            $post_date = date('d-m-Y');
            if($_SESSION['role_id'] == 1){
                $status = 1;
                $is_approved = 'approved'; 
            }else{
                $status = 1;
                $is_approved = 'pending'; 
            }
            
            //create slug
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
            
            $slug = slug($title);

            $image        =  uniqid().$_FILES['image']['name'];
            $image_tmp    = $_FILES['image']['tmp_name'];

            if(!file_exists('../../assets/images/posts'))
            {
                mkdir('../../assets/images/posts',0777,true);
            }
            
            move_uploaded_file($image_tmp, "../../assets/images/posts/$image");
 
            $sql = "INSERT INTO posts (user_id,author_name,title,slug,image,body,view_count,post_date,status,is_approved) VALUES ('$user_id','$author_name','$title','$slug','$image','$body','$view_count','$post_date','$status','$is_approved')";

            if ($conn->query($sql) === TRUE) {
                $post_id = $conn->insert_id;

                // category insert
                $categories = $_POST['category'];
                $total_category = count($categories);
                if($total_category > 0){
                    foreach($categories as $category_id){
                        $sql = "INSERT INTO category_post (post_id,category_id) VALUES ('$post_id','$category_id')";
                        $query = mysqli_query($conn,$sql);
                    }
                }


                // Tag Insert
                $tags = $_POST['tag'];
                $total_category = count($tags);
                if($total_category > 0){
                    foreach($tags as $tag_id){
                        $sql = "INSERT INTO post_tag (post_id,tag_id) VALUES ('$post_id','$tag_id')";
                        $query = mysqli_query($conn,$sql);
                    }
                }

                header('location:../../post.php');
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

        }else{

        }
    }
?>