

<?php 
    include '../../../db/database_connection.php';
    session_start();

    $id=$_GET['id'];

    if(isset($_POST['submit'])){

        if(isset($_POST['title'])){

           

            $title = mysqli_real_escape_string($conn,$_POST['title']);
            $body = mysqli_real_escape_string($conn,trim($_POST['body']));
            
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

            $image_upload = $_FILES['image']['name'];


            if(!empty($image_upload)){

                $oldQuery = mysqli_query($conn,"select * from posts where id='$id' ");
                $orow = mysqli_fetch_assoc($oldQuery);

                $image        =  uniqid().$_FILES['image']['name'];
                $image_tmp    = $_FILES['image']['tmp_name'];

                if(!file_exists('../../assets/images/posts'))
                {
                    mkdir('../../assets/images/posts',0777,true);
                }
                
                unlink('../../assets/images/posts/'.$orow['image']);

                move_uploaded_file($image_tmp, "../../assets/images/posts/$image");

                 mysqli_query($conn,"update posts set title='$title',slug='$slug',image='$image',body='$body' where id='$id'");

            }else{
               mysqli_query($conn,"update posts set title='$title',slug='$slug',body='$body' where id='$id'");
            }

            // delete old category
            mysqli_query($conn,"DELETE FROM category_post WHERE post_id='$id' ");
            // category update
            $categories = $_POST['category'];
            $total_category = count($categories);
            if($total_category > 0){
                foreach($categories as $category_id){
                    $sql = "INSERT INTO category_post (post_id,category_id) VALUES ('$id','$category_id')";
                    $query = mysqli_query($conn,$sql);
                }
            }

            mysqli_query($conn,"DELETE FROM post_tag WHERE post_id='$id'");
            // // Tag Insert
                $tags = $_POST['tag'];
                $total_category = count($tags);
                if($total_category > 0){
                    foreach($tags as $tag_id){
                        $sql = "INSERT INTO post_tag (post_id,tag_id) VALUES ('$id','$tag_id')";
                        $query = mysqli_query($conn,$sql);
                    }
                }
           

            header('location:../../post.php');

        }

    }

 ?>