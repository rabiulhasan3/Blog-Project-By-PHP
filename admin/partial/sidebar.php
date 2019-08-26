
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="assets/images/users/<?php echo $_SESSION['avatar'] ?>" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['name'] ?></div>
                    <div class="email"><?php echo $_SESSION['email'] ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="sign-out.php"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <?php $pageName = basename($_SERVER['PHP_SELF']); ?>
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="<?php if($pageName == 'index.php'){  echo 'active';} ?>">
                        <a href="index.php">
                            <i class="material-icons">home</i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="<?php if($pageName == 'banner.php'){  echo 'active';} ?>">
                        <a href="banner.php">
                            <i class="material-icons">format_align_justify</i>
                            <span>Banner</span>
                        </a>
                    </li>
                    <li class="<?php if($pageName == 'category.php'){  echo 'active';} ?>">
                        <a href="category.php">
                            <i class="material-icons">format_align_justify</i>
                            <span>Category</span>
                        </a>
                    </li>
                    <li class="<?php if($pageName == 'tag.php'){  echo 'active';} ?>">
                        <a href="tag.php">
                            <i class="material-icons">format_align_right</i>
                            <span>Tag</span>
                        </a>
                    </li>
                    <li class="<?php if($pageName == 'post.php'){  echo 'active';} ?>">
                        <a href="post.php">
                            <i class="material-icons">insert_drive_file</i>
                            <span>Post</span>
                        </a>
                    </li>
                    <li class="<?php if($pageName == 'role.php'){  echo 'active';} ?>">
                        <a href="role.php">
                            <i class="material-icons">insert_drive_file</i>
                            <span>Role</span>
                        </a>
                    </li>
                   <li class="<?php if($pageName == 'comment.php'){  echo 'active';} ?>">
                        <a href="comments.php">
                            <i class="material-icons">insert_drive_file</i>
                            <span>Comment</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; <?php echo "2019 - ". date('Y '); ?><a href="javascript:void(0);">Blog - Project By PHP</a>.
                </div>
                <div class="version">
                    <b>Developer : </b> Rabiul Hasan
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>