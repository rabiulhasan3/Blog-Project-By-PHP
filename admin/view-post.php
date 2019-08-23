<?php
     // Session Start
     session_start();
     // Authentication
     if(!isset($_SESSION['email'])){
         header('location:sign-in.php');
         exit;
     }
    include '../db/database_connection.php';
?>
<?php include 'partial/_header.php' ?>
<section class="content">
<div class="container-fluid">

<?php 
    $id = $_GET['post_id'];
    $sql = "SELECT * FROM posts WHERE id='$id'";
    $query = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($query)){
?>

  <!-- Vertical Layout | With Floating Label -->
        <a href="post.php" class="btn btn-danger waves-effect">BACK</a>
        <br>
        <br>


    <!-- Vertical Layout | With Floating Label -->
    <div class="row clearfix">
        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        <?php echo $row['title']; ?>
                        <small>Posted By <strong> <?php echo $row['author_name']; ?></strong> on <?php echo $row['post_date'] ?></small>
                    </h2>
                </div>
                <div class="body">
                   <?php echo $row['body']; ?>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header bg-blue">
                    <h2>
                        Categories 
                    </h2>
                </div>
                <div class="body">
                    <?php 
                        $csql = "SELECT categories.name FROM category_post,categories WHERE category_post.category_id=categories.id AND post_id='".$row['id']."'";
                        $cquery = mysqli_query($conn,$csql);
                        while($crow = mysqli_fetch_assoc($cquery)){
                          ?>
                            <span class="label bg-blue"><?php echo $crow['name']; ?></span>
                          <?php
                        }
                    ?>
                </div>
            </div>
            <div class="card">
                <div class="header bg-green">
                    <h2>
                        Tags
                    </h2>
                </div>
                <div class="body">
                   <?php 
                        $tsql = "SELECT tags.name FROM post_tag,tags WHERE post_tag.tag_id=tags.id AND post_id='".$row['id']."'";
                        $tquery = mysqli_query($conn,$tsql);
                        while($trow = mysqli_fetch_assoc($tquery)){
                          ?>
                            <span class="label bg-green"><?php echo $trow['name']; ?></span>
                          <?php
                        }
                    ?>
                </div>
            </div>
            <div class="card">
                <div class="header bg-amber">
                    <h2>
                        Featured Image 
                    </h2>
                </div>
                <div class="body">
                   <img class="img-responsive thumbnail" src="assets/images/posts/<?php echo $row['image'] ?>" alt="">               
                </div>
            </div>
        </div>
    </div>

<?php 
    }
 ?>


</div>
</section>
<?php include 'partial/_footer.php'; ?>