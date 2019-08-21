<?php include '../db/database_connection.php'; ?>
<?php include 'partial/_header.php' ?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    TAGAS LISTS
                    <small>Taken from <a href="https://datatables.net/" target="_blank">datatables.net</a></small>
                </h2>
            </div>
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                ALL TAG LISTS TABLE
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                <button type="button" class="btn btn-default waves-effect" data-toggle="modal" data-target="#addTag">
                                <i class="material-icons">add</i>ADD TAG
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
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $sql = "SELECT * FROM tags";
                                            $query = mysqli_query($conn,$sql);
                                            $result = mysqli_num_rows($query);
                                            if($result > 0){
                                                $i = 0;
                                                while($row=mysqli_fetch_assoc($query)){
                                                    ?>
                                                        <tr>
                                                            <td><?php echo ++$i; ?></td>
                                                            <td><?php echo $row['name'] ?></td>
                                                            <td><?php echo $row['slug'] ?></td>
                                                            <td class="text-center">
                                                                <a href="#editCategory<?php echo $row['id']; ?>" data-toggle="modal" class="btn btn-default waves-effect">
                                                                    <i class="material-icons">create</i>
                                                                </a>
                                                                <a href="#delTag<?php echo $row['id']; ?>" data-toggle="modal" class="btn btn-default waves-effect">
                                                                    <i class="material-icons">delete_sweep</i>
                                                                </a>
                                                                <?php include 'tag/edit-delete.php';  ?>
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

            <div class="modal fade" id="addTag" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm" role="document">
                    <form action="tag/add-tag.php" method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="smallModalLabel">ADD TAG</h4>
                        </div>
                        <div class="modal-body">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">content_paste</i>
                            </span>
                            <div class="form-line">
                                <input type="text" autocomplete="off" class="form-control" name="name" placeholder="Tag Name" required autofocus>
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