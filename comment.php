<?php 
    include 'db/database_connection.php';
    session_start();
    if(isset($_POST['comment_submit'])){
        $post_id = $_GET['post_id'];
        $user_id = $_SESSION['id'];
        $date = date("d F,Y");
        $comment = mysqli_real_escape_string($conn,$_POST['comment']);

        if(isset($comment)){
            $sql = "INSERT INTO comments (post_id,user_id,date,comment) VALUES ('$post_id','$user_id','$date','$comment')";
            $query = mysqli_query($conn,$sql);
            if($query){
                header('location:single.php?post_id='.$post_id.' ');
            }else{
                die("comment failed .".mysqli_error());
            }

        }
        
        
    }

?>