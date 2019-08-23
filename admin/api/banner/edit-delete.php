<!-- Edit Category -->
<div class="modal fade" id="editBanner<?php echo $row['id']; ?>" tabindex="-1" role="dialog">
                <div class="modal-dialog " role="document">
                <?php
                    $edit=mysqli_query($conn,"select * from banner where id='".$row['id']."'");
                    $erow=mysqli_fetch_array($edit);
                ?>
                    <form action="api/banner/banner-edit.php?id=<?php echo $erow['id']; ?>" method="post" enctype="multipart/form-data">
                    <div class="card">
                        <div class="header">
                            <h4 class="modal-title" id="smallModalLabel">EDIT BANNER</h4>
                        </div>
                        <div class="body">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">content_paste</i>
                                </span>
                                <div class="form-line">
                                    <input type="text" autocomplete="off" class="form-control" name="title" placeholder="Title" value="<?php echo $erow['title'] ?>" required autofocus>
                                </div>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">party_mode</i>
                                </span>
                                <div class="form-line">
                                    <input type="file" class="form-control" name="image">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary waves-effect" value="UPDATE" name="submit">
                            <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
<!-- Delete Category -->
<div class="modal fade"  id="delBanner<?php echo $row['id']; ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form action="javascript.void();" method="post">
        <div class="card">
            <div class="header">
                <h4 class="modal-title" id="smallModalLabel">DELETE BANNER</h4>
            </div>
            <div class="body">
            <div class="input-group">
            <?php
                $del=mysqli_query($conn,"select * from banner where id='".$row['id']."'");
                $drow=mysqli_fetch_array($del);
            ?>
            <div class="container-fluid">
                <h5 class="text-danger">Are you sure you want to delete this category?<h3 style="color:black;"><?php echo $row['title']; ?></h3> </h5> 
            </div> 
            </div>
            <div class="modal-footer">
                <a href="api/banner/delete-banner.php?id=<?php echo $row['id']; ?>" class="btn btn-success">YES</a>
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">NO</button>
            </div>
        </div>
        </form>
    </div>
</div>

