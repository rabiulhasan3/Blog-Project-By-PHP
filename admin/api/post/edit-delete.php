


<!-- Edit Category -->
<div class="modal fade" id="editPost<?php echo $row['id']; ?>" tabindex="-1" role="dialog">
                <div class="modal-dialog " role="document">
                <?php
                    $edit=mysqli_query($conn,"select * from posts where id='".$row['id']."'");
                    $erow=mysqli_fetch_array($edit);
                ?>
                    <form action="api/post/post-edit.php?id=<?php echo $erow['id']; ?>" method="post" enctype="multipart/form-data">
                    <div class="card">
                        <div class="header">
                            <h4 class="modal-title" id="smallModalLabel">EDIT BANNER</h4>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                    <div class="col-sm-12">
                       <div class="form-group form-float">
                          <div class="form-line">
                             <p>
                                <b>Title</b>
                             </p>
                             <input type="text" name="title" class="form-control" required="required" value="<?php echo $erow['title'] ?>" autofocus="autofocus">
                          </div>
                       </div>
                    </div>
                       <div class="col-md-12">
                          <div class="form-group">
                             <p>
                                <b>Featured Image</b>
                             </p>
                             <div class="form-line">
                                <input type="file" class="form-control" name="image" >
                             </div>
                          </div>
                       </div>
                    <div class="col-sm-12">
                       <div class="form-group">
                          <p>
                             <b>Select Categories</b>
                          </p>
                          <select name="category[]" class="form-control show-tick" multiple data-live-search="true">
                             <?php
                                $sqlCategories = "SELECT * FROM categories";
                                $sqlCatQuery = mysqli_query($conn,$sqlCategories);
                                $result = mysqli_num_rows($sqlCatQuery);
                                if($result > 0){
                                    while($row=mysqli_fetch_assoc($sqlCatQuery)){
                                        ?>
                             <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                             <?php
                                }
                                }
                                ?>
                          </select>
                       </div>
                    </div>
                    <div class="col-sm-12">
                       <div class="form-group">
                          <p>
                             <b>Select Tags</b>
                          </p>
                          <select name="tag[]" class="form-control show-tick" multiple data-live-search="true">
                             <?php
                                $sqlTags = "SELECT * FROM tags";
                                $sqlTagsQuery = mysqli_query($conn,$sqlTags);
                                $result = mysqli_num_rows($sqlTagsQuery);
                                if($result > 0){
                                    while($row=mysqli_fetch_assoc($sqlTagsQuery)){
                                      ?>
                                        <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                                      <?php
                                    }
                                  }
                                ?>
                          </select>
                       </div>
                       <div class="col-md-12">
                          <div class="form-group">
                             <textarea id="ckeditor" name="body">
                              <?php echo $erow['body']; ?>
                             </textarea>
                          </div>
                       </div>
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
<div class="modal fade"  id="delPost<?php echo $row['id']; ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <form action="javascript.void();" method="post">
        <div class="card">
            <div class="header">
                <h4 class="modal-title" id="smallModalLabel">DELETE POST</h4>
            </div>
            <div class="body">
            <div class="input-group">
            <?php
                $del=mysqli_query($conn,"select * from posts where id='".$row['id']."'");
                $drow=mysqli_fetch_array($del);
            ?>
            <div class="container-fluid">
                <h5 class="text-danger">Are you sure you want to delete this post?<h3 style="color:black;"><?php echo $row['title']; ?></h3> </h5> 
            </div> 
            </div>
            <div class="modal-footer">
                <a href="api/post/delete-post.php?id=<?php echo $row['id']; ?>" class="btn btn-success">YES</a>
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">NO</button>
            </div>
        </div>
        </div>
        </form>
    </div>
</div>

<!-- Inactive To Active -->
<div class="modal fade"  id="inactivePost<?php echo $row['id']; ?>" tabindex="-1" role="dialog">
   <div class="modal-dialog" role="document">
      <form action="javascript.void();" method="post">
         <div class="card">
            <div class="header">
               <h4 class="modal-title" >Active Post</h4>
            </div>
            <div class="body">
               <div class="input-group">
                  <div class="container-fluid">
                     <h5 class="text-danger">Are you sure you want to Active this Post? </h5>
                  </div>
               </div>
               <div class="modal-footer">
                  <a href="api/post/active-post.php?id=<?php echo $row['id']; ?>" class="btn btn-success">YES</a>
                  <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">NO</button>
               </div>
            </div>
         </div>
      </form>
   </div>
</div>
<!-- Active To Imactove-->
<div class="modal fade"  id="ActivePost<?php echo $row['id']; ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog" >
        <form action="javascript.void();" method="post">
        <div class="card">
            <div class="header">
                <h4 class="modal-title" >Deactive Post</h4>
            </div>
            <div class="body">
            <div class="input-group">
            
            <div class="container-fluid">
                <h5 class="text-danger">Are you sure you want to Deactive this Post? </h5> 
            </div> 
            </div>
            <div class="modal-footer">
                <a href="api/post/deactive-post.php?id=<?php echo $row['id']; ?>" class="btn btn-success">YES</a>
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">NO</button>
            </div>
            </div>
            </div>
        </form>
    </div>
</div>