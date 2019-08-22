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
                                            <th>Name</th>
                                            <th>Slug</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
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
      <form action="tag/add-tag.php" method="post">
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
                           <input type="text" name="title" class="form-control">
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-12">
                     <div class="form-group">
                        <p>
                           <b>Select Categories</b>
                        </p>
                        <select names="categories" class="form-control show-tick" multiple data-live-search="true">
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
                        <select names="tags" class="form-control show-tick" multiple data-live-search="true">
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
                           <textarea id="ckeditor">
                           </textarea>
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="form-group">
                           <p>
                              <b>Featured Image</b>
                           </p>
                           <div class="form-line">
                              <input type="file" class="form-control" name="avatar" id="avatar" >
                           </div>
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