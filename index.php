
<?php include 'partial/_header.php'; ?>

<body id="top">

    <!-- preloader
    ================================================== -->
    <div id="preloader">
        <div id="loader" class="dots-fade">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>


   <?php include 'partial/menu.php'; ?>


    <!-- featured 
    ================================================== -->
    <section class="s-featured">
        <div class="row">
            <div class="col-full">

                <div class="featured-slider featured" data-aos="zoom-in">
                   <?php 
                        $sql = "SELECT * FROM banner";
                        $query = mysqli_query($conn,$sql);
                        while($row = mysqli_fetch_assoc($query)){
                            ?>
                            <div class="featured__slide">
                                <div class="entry">

                                    <div class="entry__background" style="background-image:url('admin/assets/images/banner/<?php echo $row['image'] ?>');"></div>
                                    
                                    <div class="entry__content">

                                        <h1><a href="#0" title=""><?php echo $row['title'] ?></a></h1>

                                    </div> <!-- end entry__content -->
                                    
                                </div> <!-- end entry -->
                            </div> <!-- end featured__slide -->   
                            <?php
                        }

                    ?>

                    
                </div> <!-- end featured -->

            </div> <!-- end col-full -->
        </div>
    </section> <!-- end s-featured -->


    <!-- s-content
    ================================================== -->
    <section class="s-content">
        
        <div class="row entries-wrap wide">
            <div class="entries">

            <?php 
                $asql = "SELECT * FROM posts WHERE status=1 AND is_approved='approved' ORDER BY id DESC";
                $aquery = mysqli_query($conn,$asql);
                while($arow = mysqli_fetch_assoc($aquery)){
                    ?>
                    <article class="col-block">
                        
                        <div class="item-entry" data-aos="zoom-in">
                            <div class="item-entry__thumb">
                                <a href="single.php?post_id=<?php echo  $arow['id']; ?>" class="item-entry__thumb-link">
                                    <img src="admin/assets/images/posts/<?php echo $arow['image'] ?>" alt="">
                                </a>
                            </div>
            
                            <div class="item-entry__text">    
                                <div class="item-entry__cat">
                                    <?php 
                                        $acsql = "SELECT categories.name FROM category_post,categories WHERE category_post.category_id=categories.id AND post_id='".$arow['id']."'";
                                        $acquery = mysqli_query($conn,$acsql);
                                        while($acrow = mysqli_fetch_assoc($acquery)){
                                          ?>
                                          <a href="category.html"><?php echo $acrow['name']," " ?></a> 
                                          <?php
                                        }
                                    ?>
                                    
                                </div>
        
                                <h1 class="item-entry__title"><a href="single.php?post_id=<?php echo  $arow['id']; ?>"><?php echo $arow['title'] ?></a></h1>
                                    
                                <div class="item-entry__date">
                                    <a href="single-standard.html">
                                        <?php
                                           $post_date =  strtotime($arow['post_date']); 
                                            echo date('F d,Y',$post_date);
                                         ?>
                                            
                                    </a>
                                </div>
                            </div>
                        </div> <!-- item-entry -->

                    </article> <!-- end article -->
                    <?php
                }
            ?>



            </div> <!-- end entries -->
        </div> <!-- end entries-wrap -->

        <div class="row pagination-wrap">
            <div class="col-full">
                <nav class="pgn" data-aos="fade-up">
                    <ul>
                        <li><a class="pgn__prev" href="#0">Prev</a></li>
                        <li><a class="pgn__num" href="#0">1</a></li>
                        <li><span class="pgn__num current">2</span></li>
                        <li><a class="pgn__num" href="#0">3</a></li>
                        <li><a class="pgn__num" href="#0">4</a></li>
                        <li><a class="pgn__num" href="#0">5</a></li>
                        <li><span class="pgn__num dots">…</span></li>
                        <li><a class="pgn__num" href="#0">8</a></li>
                        <li><a class="pgn__next" href="#0">Next</a></li>
                    </ul>
                </nav>
            </div>
        </div>

    </section> <!-- end s-content -->


    <!-- s-extra
    ================================================== -->
    <section class="s-extra">

        <div class="row">

            <div class="col-seven md-six tab-full popular">
                <h3>Popular Posts</h3>

                <div class="block-1-2 block-m-full popular__posts">
                    <article class="col-block popular__post">
                        <a href="#0" class="popular__thumb">
                            <img src="images/thumbs/small/tulips-150.jpg" alt="">
                        </a>
                        <h5>10 Interesting Facts About Caffeine.</h5>
                        <section class="popular__meta">
                            <span class="popular__author"><span>By</span> <a href="#0">John Doe</a></span>
                            <span class="popular__date"><span>on</span> <time datetime="2018-06-14">Jun 14, 2018</time></span>
                        </section>
                    </article>
                    <article class="col-block popular__post">
                        <a href="#0" class="popular__thumb">
                            <img src="images/thumbs/small/wheel-150.jpg" alt="">
                        </a>
                        <h5><a href="#0">Visiting Theme Parks Improves Your Health.</a></h5>
                        <section class="popular__meta">
                            <span class="popular__author"><span>By</span> <a href="#0">John Doe</a></span>
                            <span class="popular__date"><span>on</span> <time datetime="2018-06-12">Jun 12, 2018</time></span>
                        </section>
                    </article>
                    <article class="col-block popular__post">
                        <a href="#0" class="popular__thumb">
                            <img src="images/thumbs/small/shutterbug-150.jpg" alt="">
                        </a>
                        <h5><a href="#0">Key Benefits Of Family Photography.</a></h5>
                        <section class="popular__meta">
                            <span class="popular__author"><span>By</span> <a href="#0">John Doe</a></span>
                            <span class="popular__date"><span>on</span> <time datetime="2018-06-12">Jun 12, 2018</time></span>
                        </section>
                    </article>
                    <article class="col-block popular__post">
                        <a href="#0" class="popular__thumb">
                            <img src="images/thumbs/small/cookies-150.jpg" alt="">
                        </a>
                        <h5><a href="#0">Absolutely No Sugar Oatmeal Cookies.</a></h5>
                        <section class="popular__meta">
                            <span class="popular__author"><span>By</span> <a href="#0"> John Doe</a></span>
                            <span class="popular__date"><span>on</span> <time datetime="2018-06-12">Jun 12, 2018</time></span>
                        </section>
                    </article>
                    <article class="col-block popular__post">
                        <a href="#0" class="popular__thumb">
                            <img src="images/thumbs/small/beetle-150.jpg" alt="">
                        </a>
                        <h5><a href="#0">Throwback To The Good Old Days.</a></h5>
                        <section class="popular__meta">
                            <span class="popular__author"><span>By</span> <a href="#0">John Doe</a></span>
                            <span class="popular__date"><span>on</span> <time datetime="2018-06-12">Jun 12, 2018</time></span>
                        </section>
                    </article>
                    <article class="col-block popular__post">
                        <a href="#0" class="popular__thumb">
                            <img src="images/thumbs/small/salad-150.jpg" alt="">
                        </a>
                        <h5>Healthy Mediterranean Salad Recipes</h5>
                        <section class="popular__meta">
                            <span class="popular__author"><span>By</span> <a href="#0"> John Doe</a></span>
                            <span class="popular__date"><span>on</span> <time datetime="2018-06-12">Jun 12, 2018</time></span>
                        </section>
                    </article>
                </div> <!-- end popular_posts -->
            </div> <!-- end popular -->

            <div class="col-four md-six tab-full end">
                <div class="row">
                    <div class="col-six md-six mob-full categories">
                        <h3>Categories</h3>
        
                        <ul class="linklist">
                            <li><a href="#0">Lifestyle</a></li>
                            <li><a href="#0">Travel</a></li>
                            <li><a href="#0">Recipes</a></li>
                            <li><a href="#0">Management</a></li>
                            <li><a href="#0">Health</a></li>
                            <li><a href="#0">Creativity</a></li>
                        </ul>
                    </div> <!-- end categories -->
        
                    <div class="col-six md-six mob-full sitelinks">
                        <h3>Site Links</h3>
        
                        <ul class="linklist">
                            <li><a href="#0">Home</a></li>
                            <li><a href="#0">Blog</a></li>
                            <li><a href="#0">Styles</a></li>
                            <li><a href="#0">About</a></li>
                            <li><a href="#0">Contact</a></li>
                            <li><a href="#0">Privacy Policy</a></li>
                        </ul>
                    </div> <!-- end sitelinks -->
                </div>
            </div>
        </div> <!-- end row -->

    </section> <!-- end s-extra -->


    <?php include 'partial/_footer.php'; ?>