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
            <div class="block-header">
                <h2>
                    ALL POST
                </h2>
            </div>
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                ALL POST LISTS TABLE
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                <button type="button" class="btn btn-default waves-effect" data-toggle="modal" data-target="#addPost">
                                <i class="material-icons">add</i>ADD POST
                                </button>
                                </li>
                            </ul>
                            <br>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>POST TITLE</th>
                                            <th>AUTHOR</th>
                                            <th>COMMENT</th>
                                            <th>DATE</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                        $sql = "SELECT * FROM  posts";
                                        $query = mysqli_query($conn,$sql);
                                        while($row=mysqli_fetch_assoc($query)){
                                          ?>
                                          <tr>
                                            
                                          </tr>
                                          <?php
                                        }
                                      ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
            
        </div>
    </section>


<?php include 'partial/_footer.php'; ?>