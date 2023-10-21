<?php
session_start();
require_once("partials/header.php");
if(isset($_SESSION['id_admin'])) {
    header("Location: dashboard.php");
    exit();
  }
  ini_set('display_errors', '1');
  ini_set('display_startup_errors', '1');
  error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Login</title>
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="../index.php"><b>Job</b>Pad</a>
        </div>
        <div class="login-box-body">
            <p class="login-box-msg">Admin Login</p>

<div class="container-fluid bg-white">

    <div class="row">
        
        <div class="col-md-3"></div>

        <div class="col-md-6  bg-primary py-5 my-5 px-5">
            <h1 class="text-center text-white">Login</h1>


             <?php if(isset($_SESSION["login_error"])){

                    ?>

                    <h1 class="text-danger text-center bg-white mt-4 py-1"><?php echo $_SESSION["login_error"]; ?></h1>

                    <?php unset($_SESSION["login_error"]); ?>

                    <?php
                    

                    }  
                    
                    
                ?>



            <form action="login_process.php" method="post">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" name="loginbtn" class="btn btn-danger">Submit</button>
            </form>
            <p class="mt-3">Not yet a member?<a href="register.php" class="btn btn-default">Register Here</a></p>
        </div>
        <div class="col-md-3"></div> 
    </div> 
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../js/adminlte.min.js"></script>
<!-- iCheck -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>



</body>
</html>
<?php
require_once("partials/footer.php");
?>