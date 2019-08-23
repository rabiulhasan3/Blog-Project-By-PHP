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
                                            <th>IMAGE</th>
                                            <th>TITLE</th>
                                            <th>AUTHOR</th>
                                            <th>DATE</th>
                                            <th>TYPE</th>
                                            <th>STATUS</th>
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
                                                <td class="text-center">#</td>
                                                <td>
                                                  <img src="assets/images/posts/<?php echo $row['image'] ?>"  alt="" style="width: 50px;height: 50px;">
                                                </td>
                                                <td><?php echo $row['title'] ?></td>
                                                <td><?php echo $row['author_name']; ?></td>
                                                <td><?php echo $row['post_date']; ?></td>
                                                <td>
                                                  <?php 
                                                    if($row['is_approved'] == 'approved'){
                                                      echo '<span class="label bg-green">Approved</span>';
                                                    }else{
                                                      echo '<span class="label bg-red">Pending</span>';
                                                    }
                                                  ?>
                                                </td>
                                                 <td>
                                                  <?php 
                                                    if($row['status'] == '0'){
                                                      echo '<span class="label bg-green">Deactive</span>';
                                                    }else{
                                                      echo '<span class="label bg-green">Active</span>';
                                                    }
                                                  ?>
                                                </td>
                                                <td class="text-center">
                                                  <a href="#editPost<?php echo $row['id']; ?>" data-toggle="modal" class="btn btn-default waves-effect">
                                                      <i class="material-icons">create</i>
                                                  </a>
                                                   <a href="view-post.php?post_id=<?php echo $row['id']; ?>" data-toggle="modal" class="btn btn-default waves-effect">
                                                      <i class="material-icons">visibility</i>
                                                  </a>
                                                  <a href="#delPost<?php echo $row['id']; ?>" data-toggle="modal" class="btn btn-default waves-effect">
                                                      <i class="material-icons">delete_sweep</i>
                                                  </a>
                                                  <?php include 'api/post/edit-delete.php';  ?>
                                                </td>
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

    <!-- Add Post Modal -->
  <div class="modal fade" id="addPost" tabindex="-1" role="dialog">
     <div class="modal-dialog" role="document">
        <form action="api/post/add-post.php" method="post" enctype="multipart/form-data">
           <div class="card">
              <div class="header">
                 <h4 class="modal-title" id="smallModalLabel">ADD NEW POST</h4>
              </div>
              <div class="modal-body">
                 <div class="row clearfix">
                    <div class="col-sm-12">
                       <div class="form-group form-float">
                          <div class="form-line">
                             <p>
                                <b>Title</b>
                             </p>
                             <input type="text" name="title" class="form-control" required="required" autofocus="autofocus">
                          </div>
                       </div>
                    </div>
                       <div class="col-md-12">
                          <div class="form-group">
                             <p>
                                <b>Featured Image</b>
                             </p>
                             <div class="form-line">
                                <input type="file" class="form-control" name="image" required="required" >
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
                                $query = mysqli_query($conn,$sqlCategories);
                                $result = mysqli_num_rows($query);
                                if($result > 0){
                                    while($row=mysqli_fetch_assoc($query)){
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
                                $query = mysqli_query($conn,$sqlTags);
                                $result = mysqli_num_rows($query);
                                if($result > 0){
                                    while($row=mysqli_fetch_assoc($query)){
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
                             </textarea>
                          </div>
                       </div>
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

<?php include 'partial/_footer.php'; ?>