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


    <!-- Vertical Layout | With Floating Label -->
    <div class="row clearfix">
        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                       
                        <small>Posted By <strong> <a href=""></a></strong> on </small>
                    </h2>
                </div>
                <div class="body">
                   
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
                <span class="label bg-green">Hello</span>
                        <span class="label bg-green">Hello</span> 
                </div>
            </div>
            <div class="card">
                <div class="header bg-green">
                    <h2>
                        Tags
                    </h2>
                </div>
                <div class="body">
                    
                        <span class="label bg-green">Hello</span>
                        <span class="label bg-green">Hello</span>
                    
                </div>
            </div>
            <div class="card">
                <div class="header bg-amber">
                    <h2>
                        Featured Image 
                    </h2>
                </div>
                <div class="body">
                   <img class="img-responsive thumbnail" src="" alt="">               
                </div>
            </div>
        </div>
    </div>


</div>
</section>
<?php include 'partial/_footer.php'; ?>