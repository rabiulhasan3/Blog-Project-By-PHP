<?php 
    if(isset($_POST['submit'])){
        // including Database
        include('../db/database_connection.php');

        // Session Start
        session_start();

        // input data
        $email    = mysqli_real_escape_string($conn,$_POST['email']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);

        // Password Hashed
        $hashedPassword = md5($password);

        // if email and password not empty
        if(isset($email) && isset($password)){
            //findout email
            $sql    = "SELECT * FROM users WHERE email='$email' AND password='$hashedPassword' ";
            $query  = mysqli_query($conn,$sql);
            $result = mysqli_fetch_array($query);
            $row    = mysqli_num_rows($query);

            if($row>0){
                //email found, now password checking
                if( $result['password'] != $hashedPassword ){
                    echo "<script>alert('Wrong Password')</script>"; 
                    echo "<script>window.location='../../login.php'</script>";//failed
                }else{
                    //status check
                    if($result['status'] == 1){
                        $_SESSION['id']      = $result['id'];
                        $_SESSION['name']    = $result['name'];
                        $_SESSION['email']   = $result['email'];
                        $_SESSION['role_id'] = $result['role_id'];
                        $_SESSION['avatar'] = $result['avatar'];
                        echo "<script>alert('You have successfully Logged in');</script>";
                        header("location:index.php");
                    }else{
                        echo "<script>alert('Your account is blocked. Please contact with authority')</script>";  
                        echo "<script>window.location='sign-in.php'</script>";//failed
                    }
                }
            }else{
                echo "<script>alert('Email Or Password are incorrect')</script>"; 
                echo "<script>window.location='sign-in.php'</script>";//failed
            }
        }
    }
	



  	
	
 ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In | Bootstrap Based Admin Template - Material Design</title>
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

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">BLOG <b> PROJECT</b></a>
            <small>Admin BootStrap Based - Material Design</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST" action="">
                    <div class="msg">Sign in to start your session</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="email" autocomplete="off" class="form-control" name="email" placeholder="Email" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" autocomplete="off" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                            <label for="rememberme">Remember Me</label>
                        </div>
                        <div class="col-xs-4">
                            <input type="submit" class="btn btn-block bg-pink waves-effect" name="submit" value="SIGN IN">
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href="sign-up.php">Register Now!</a>
                        </div>
                        <div class="col-xs-6 align-right">
                            <a href="forgot-password.html">Forgot Password?</a>
                        </div>
                    </div>
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
    <script src="assets/js/pages/examples/sign-in.js"></script>
</body>

</html>