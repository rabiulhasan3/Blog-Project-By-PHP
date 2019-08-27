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
                    CATEGORY LISTS
                </h2>
            </div>
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                ALL CATEGORY LISTS HERE
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                <button type="button" class="btn btn-default waves-effect" data-toggle="modal" data-target="#addCategory">
                                <i class="material-icons">add</i>ADD CATEGORY
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
                                            <th>Name</th>
                                            <th>Slug</th>
                                            <th>Date</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $sql = "SELECT * FROM categories";
                                            $query = mysqli_query($conn,$sql);
                                            $result = mysqli_num_rows($query);
                                            if($result > 0){
                                                $i = 0;
                                                while($row=mysqli_fetch_assoc($query)){
                                                    ?>
                                                        <tr>
                                                            <td><?php echo ++$i; ?></td>
                                                            <td class="text-capitalize"><?php echo $row['name'] ?></td>
                                                            <td><?php echo $row['slug'] ?></td>
                                                            <td><?php echo $row['date']; ?></td>
                                                            <td class="text-center">
                                                                <a href="#editCategory<?php echo $row['id']; ?>" data-toggle="modal" class="btn btn-default waves-effect">
                                                                    <i class="material-icons">create</i>
                                                                </a>
                                                                <?php 
                                                                    if($row['status'] == 0){
                                                                        ?>
                                                                            <a href="#inactiveCat<?php echo $row['id']; ?>" data-toggle="modal" class="btn btn-danger waves-effect">
                                                                                <i class="material-icons">check_box_outline_blank</i>
                                                                            </a>
                                                                        <?php
                                                                    }else{
                                                                        ?>
                                                                           <a href="#ActiveCat<?php echo $row['id']; ?>" data-toggle="modal" class="btn btn-success waves-effect">
                                                                                <i class="material-icons">check_box</i>
                                                                            </a>
                                                                        <?php
                                                                    }

                                                                ?>
                                                                <a href="#delCategory<?php echo $row['id']; ?>" data-toggle="modal" class="btn btn-default waves-effect">
                                                                    <i class="material-icons">delete_sweep</i>
                                                                </a>
                                                                <?php include 'api/category/edit-delete.php';  ?>
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

            <div class="modal fade" id="addCategory" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm" role="document">
                    <form action="api/category/add-category.php" method="post">
                    <div class="card">
                        <div class="header">
                            <h4 class="modal-title" id="smallModalLabel">ADD CATEGORY</h4>
                        </div>
                        <div class="body">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">content_paste</i>
                            </span>
                            <div class="form-line">
                                <input type="text" autocomplete="off" class="form-control" name="name" placeholder="Category Name" required autofocus>
                            </div>
                        </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary waves-effect" value="Save" name="submit">
                            <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>
<?php include 'partial/_footer.php'; ?>