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
                    BANNER LISTS
                    <small>All Banner Here For Slider</small>
                </h2>
            </div>
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                BANNER SECTION
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                <button type="button" class="btn btn-default waves-effect" data-toggle="modal" data-target="#addBanner">
                                <i class="material-icons">add</i>ADD BANNER
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
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $sql = "SELECT * FROM banner";
                                            $query = mysqli_query($conn,$sql);
                                            $result = mysqli_num_rows($query);
                                            if($result > 0){
                                                $i = 0;
                                                while($row=mysqli_fetch_assoc($query)){
                                                    ?>
                                                        <tr>
                                                            <td><?php echo ++$i; ?></td>
                                                            <td>
                                                                <img src="assets/images/banner/<?php echo $row['image'] ?>" alt="banner-image" style="height:50px;weidth:50px;">
                                                            </td>
                                                            <td class="text-capitalize"><?php echo $row['title'] ?></td>
                                                            
                                                            <td class="text-center">
                                                                <a href="#editBanner<?php echo $row['id']; ?>" data-toggle="modal" class="btn btn-default waves-effect">
                                                                    <i class="material-icons">create</i>
                                                                </a>
                                                                <?php 
                                                                    if($row['status'] == 0){
                                                                        ?>
                                                                            <a href="#inactiveBanner<?php echo $row['id']; ?>" data-toggle="modal" class="btn btn-danger waves-effect">
                                                                                <i class="material-icons">check_box_outline_blank</i>
                                                                            </a>
                                                                        <?php
                                                                    }else{
                                                                        ?>
                                                                           <a href="#ActiveBanner<?php echo $row['id']; ?>" data-toggle="modal" class="btn btn-success waves-effect">
                                                                                <i class="material-icons">check_box</i>
                                                                            </a>
                                                                        <?php
                                                                    }

                                                                ?>
                                                                <a href="#delBanner<?php echo $row['id']; ?>" data-toggle="modal" class="btn btn-default waves-effect">
                                                                    <i class="material-icons">delete_sweep</i>
                                                                </a>
                                                               
                                                                
                                                                <?php include 'api/banner/edit-delete.php';  ?>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                }else{

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

            <div class="modal fade" id="addBanner" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <form action="api/banner/add-banner.php" method="post" enctype="multipart/form-data">
                    <div class="card">
                        <div class="header">
                            <h4 class="modal-title" id="smallModalLabel">ADD BANNER</h4>
                        </div>
                        <div class="body">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">content_paste</i>
                                </span>
                                <div class="form-line">
                                    <input type="text" autocomplete="off" class="form-control" name="title" placeholder="Title" required autofocus>
                                </div>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">party_mode</i>
                                </span>
                                <div class="form-line">
                                    <input type="file" class="form-control" name="image" require>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary waves-effect" value="SAVE" name="submit">
                            <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>

        </div>
    </section>
<?php include 'partial/_footer.php'; ?>