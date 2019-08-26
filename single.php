<?php include 'db/database_connection.php'; ?>
<?php session_start(); ?>
<?php include 'partial/_header.php'; ?>
<?php include 'partial/menu.php'; ?>
    <section class="s-content s-content--top-padding s-content--narrow">

    	<?php 
    		$post_id = $_GET['post_id'];
    		$sql = "SELECT * FROM posts WHERE id='$post_id' ";
    		$query = mysqli_query($conn,$sql);
    		while($row = mysqli_fetch_assoc($query)){
    			?>
				<article class="row entry format-standard">

			            <div class="entry__media col-full">
			                <div class="entry__post-thumb">
			                    <img src="admin/assets/images/posts/<?php echo $row['image'] ?>" 
			                         
			                         sizes="(max-width: 2000px) 100vw, 2000px" alt="image">
			                </div>
			            </div>

			            <div class="entry__header col-full">
			                <h1 class="entry__header-title display-1">
			                    <?php echo $row['title'] ?>
			                </h1>
			                <ul class="entry__header-meta">
			                    <li class="date">
			                    	<?php
                                       $post_date =  strtotime($row['post_date']); 
                                        echo date('F d,Y',$post_date);
                                     ?>
			                    </li>
			                    <li class="byline">
			                        By
			                        <a href="#0"><?php echo $row['author_name']; ?></a>
			                    </li>
			                </ul>
			            </div>

			            <div class="col-full entry__main">
							
							<?php echo $row['body']; ?>
			            </div> <!-- s-entry__main -->

        </article> <!-- end entry/article -->
    			<?php
    		}
    	?>

        



        <div class="comments-wrap">

        <div id="comments" class="row">
                <div class="col-full">

                <?php
                    $post_id = $_GET['post_id'];
                    $ccsql = "SELECT * FROM comments WHERE post_id='$post_id'";
                    $ccquery = mysqli_query($conn,$ccsql);

                    $total_comment = mysqli_num_rows($ccquery);
                    
                ?>

                    <?php  if($total_comment >= 0){ ?>
                        <h3 class="h2"><?php echo $total_comment; ?> Comments</h3>
                    <?php  } ?>

                    <!-- START commentlist -->
                    <ol class="commentlist">

                        <?php 
                            $commentSql = "SELECT comments.*, users.* FROM comments INNER JOIN users ON comments.user_id=users.id";
                            $commentQuery = mysqli_query($conn,$commentSql);
                            $commentCount = mysqli_num_rows($commentQuery);
                            if($commentCount >= 0){
                                while($commentRow = mysqli_fetch_assoc($commentQuery)){
                                    ?>
                                        <li class="depth-1 comment">

                                            <div class="comment__avatar">
                                                <img class="avatar" alt="umga" src="admin/assets/images/users/<?php echo $commentRow['avatar']; ?>" alt="" width="50" height="50">
                                            </div>

                                            <div class="comment__content">

                                                <div class="comment__info">
                                                    <div class="comment__author"><?php echo $commentRow['name'] ?></div>

                                                    <div class="comment__meta">
                                                        <div class="comment__time"><?php echo $commentRow['date']; ?></div>
                                                        <div class="comment__reply">
                                                            <a class="comment-reply-link" href="#0">Reply</a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="comment__text">
                                                <p><?php echo $commentRow['comment']; ?></p>
                                                </div>

                                            </div>

                                            </li> <!-- end comment level 1 -->
                                    <?php
                                }
                            }else{
                                echo '<h3>No Comment :)</h3>';
                            }
                        ?>

                       

  

                    </ol>
                    <!-- END commentlist -->           

                </div> <!-- end col-full -->
            </div> <!-- end comments -->


            <div class="row comment-respond">

                <!-- START respond -->
                <div id="respond" class="col-full">
                
        <?php
            if(!isset($_SESSION['id'])){
                ?>
                <a href="admin/sign-in.php" class="btn btn--primary btn-wide btn--large full-width">if you want to write comment. Plese Login</a>
                <?php
            }else{
        ?>

                    <h3 class="h2">Add Comment <span>Share Your Opinion</span></h3>

                    <form name="contactForm" id="contactForm" method="post" action="comment.php?post_id=<?php echo $post_id; ?>" autocomplete="off">
                        <fieldset>

                            <div class="message form-field">
                                <textarea name="comment" id="comment" class="full-width" placeholder="Write your comment."></textarea>
                            </div>

                            <input name="comment_submit" id="submit" class="btn btn--primary btn-wide btn--large full-width" value="Add Comment" type="submit">

                        </fieldset>
                    </form>
                     <!-- end form -->

            <?php } ?>

                </div>
                <!-- END respond-->

            </div> <!-- end comment-respond -->

        </div> <!-- end comments-wrap -->

    </section> <!-- end s-content -->
<?php include 'partial/_footer.php'; ?>


