<?php 
    //Database Connection 
    include '../db/database_connection.php';

    if(isset($_POST['submit'])){
        $name               = mysqli_real_escape_string($conn,$_POST['name']);
        $email              = mysqli_real_escape_string($conn,$_POST['email']);
        $password           = mysqli_real_escape_string($conn,md5($_POST['password']));
        $confirm_password   = mysqli_real_escape_string($conn,md5($_POST['confirm_password']));
        $about              = mysqli_real_escape_string($conn,md5($_POST['about']));
        $role_id            = mysqli_real_escape_string($conn,$_POST['role_id']);

        $avatar        = $_FILES['avatar']['name'];
        $avatar_tmp    = $_FILES['avatar']['tmp_name'];

        move_uploaded_file($avatar_tmp, "assets/images/users/$avatar");


        if(empty($name) || empty($email) || empty($password) || empty($confirm_password) || empty($about) || empty($role_id)){
            echo "<script>alert('please fill up all required information')</script>";   
            echo "<script>window.location='sign-up.php'</script>";//failed
        }else{
            if($password != $confirm_password){
                echo "<script>alert('password does not match')</script>";   
                echo "<script>window.location='sign-up.php'</script>";//failed
            }else{
                $sql = "INSERT INTO users (role_id,name,username,email,password,avatar,about,status) VALUES ('$role_id','$name','rabiul2','$email','$password','$avatar','$about',0)";
                $query = mysqli_query($conn,$sql);
                if($query){
                    echo "<script>alert('Registration Successfully. Please Login')</script>";   
                    echo "<script>window.location='sign-in.php'</script>";//failed
                }else{
                    die("Registration Failed ".mysqli_error());
                }
            }
        }
    }
 ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign Up | Bootstrap Based Admin Template - Material Design</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="assets/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="assets/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body class="signup-page">
    <div class="signup-box">
        <div class="logo">
            <a href="javascript:void(0);">BLOG <b> PROJECT</b></a>
            <small>Admin BootStrap Based - Material Design</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_up" method="POST" action="" enctype="multipart/form-data">
                    <div class="msg">Register a new membership</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Name Surname" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" name="email" id="email" class="form-control" name="email" placeholder="Email Address" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" name="password" id="password" class="form-control" name="password" minlength="6" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" name="confirm_password" id="confirm_password" class="form-control" minlength="6" placeholder="Confirm Password" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">description</i>
                        </span>
                        <div class="form-line">
                            <textarea name="about" cols="30" rows="5" class="form-control no-resize" required placeholder="about you"></textarea>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">party_mode</i>
                        </span>
                        <div class="form-line">
                            <input type="file" class="form-control" name="avatar" id="avatar" >
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">party_mode</i>
                        </span>
                        <div class="form-line">
                            <select name="role_id" id="role_id" class="form-control">
                                <option value="">Select Role</option>
                                <option value="1">Admin</option>
                                <option value="2">Subscriber</option>
                            </select>
                        </div>
                    </div>
                    

                    <div class="form-group">
                        <input type="checkbox" name="terms" id="terms" class="filled-in chk-col-pink">
                        <label for="terms">I read and agree to the <a href="javascript:void(0);">terms of usage</a>.</label>
                    </div>

                    <input type="submit" class="btn btn-block btn-lg bg-pink waves-effect" value="SIGN UP" name="submit"> 

                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="assets/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="assets/plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="assets/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="assets/js/admin.js"></script>
    <script src="assets/js/pages/examples/sign-up.js"></script>
    
</body>

</html>