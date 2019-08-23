<!-- Edit Category -->
<div class="modal fade" id="editCategory<?php echo $row['id']; ?>" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm" role="document">
                <?php
                    $edit=mysqli_query($conn,"select * from categories where id='".$row['id']."'");
                    $erow=mysqli_fetch_array($edit);
                ?>
                    <form action="api/category/category-edit.php?id=<?php echo $erow['id']; ?>" method="post">
                    <div class="card">
                        <div class="header">
                            <h4 class="modal-title" id="smallModalLabel">EDIT CATEGORY</h4>
                        </div>
                        <div class="body">
                       
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">content_paste</i>
                            </span>
                            <div class="form-line">
                                <input type="text" autocomplete="off" class="form-control" name="name" placeholder="Name" value="<?php echo $erow['name'] ?>">
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
<div class="modal fade"  id="delCategory<?php echo $row['id']; ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <form action="javascript.void();" method="post">
        <div class="card">
            <div class="header">
                <h4 class="modal-title" id="smallModalLabel">DELETE CATEGORY</h4>
            </div>
            <div class="body">
            <div class="input-group">
            <?php
                $del=mysqli_query($conn,"select * from categories where id='".$row['id']."'");
                $drow=mysqli_fetch_array($del);
            ?>
            <div class="container-fluid">
                <h5 class="text-danger">Are you sure you want to delete this category?<h3 style="color:black;"><?php echo $row['name']; ?></h3> </h5> 
            </div> 
            </div>
            <div class="modal-footer">
                <a href="api/category/delete-category.php?id=<?php echo $row['id']; ?>" class="btn btn-success">YES</a>
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">NO</button>
            </div>
        </div>
        </form>
    </div>
</div>

