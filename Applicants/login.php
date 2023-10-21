<?php
session_start();

if(isset($_SESSION['applicants_id']) || isset($_SESSION['company_id'])){
    header("Location: index.php");
    exit();
}

?>


<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="index.php"><b>Job</b>Pad</a>
        </div>
        <div class="login-box-body">
            <p class="login-box-msg">Applicants Login</p>

            <form action="checklogin.php">

                <div class="form-group has-feedback">
                    <input type="email" id="email" name="email" class="form-control" placeholder="Email">
                </div>
                <div class="form-group has-feedback">
                    <input type="password" id="email" name="password" class="form-control" placeholder="Password">
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <a href="#">I forgot my password</a>
                    </div>
                </div>

                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>


            </form>

            <br>
            <?php
                if(isset($_SESSION['registerCompleted'])) {
                ?>
                <div>
                    <p id="successMessage" class="text-center">Check your email</p>
                </div>
                <?php
                unset($_SESSION['registerCompleted']); }
            ?>
            <?php
                if(isset($_SESSION['loginError'])) {
                    ?>
                    <div>
                        <p class="text-center">Invalid Email/Password Try again!</p>
                    </div>
                    <?php
                    unset($_SESSION['loginError']); }
            ?>
            <?php
                //If User Failed to login then show error message 
                if(isset($_SESSION['userActivated'])) {
                    ?>
                    <div>
                        <p class="text-center">Your Account is Active. You can login</p>
                    </div>
                    <?php
                    unset($_SESSION['userActivated']); }
            ?>
            <?php
            //If User failed to login then show error message
            if(isset($_SESSION['loginActiveError'])) {
                ?>
                <div>
                    <p class="text-center"><?php echo $_SESSION['loginActiveError']; ?></p>
                </div>
                <?php
                unset($_SESSION['loginActiveError']); }
            ?>
        </div>
    </div>

    <script>
        $(function (){
            $('input').icheck({
                checkboxClass: 'icheckbox_square_blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%'
            });
        });
    </script>
    <script type="text/javascript">
        $(function (){
            $("#successMessage:visible").fadeout(8000);
        });
    </script>
    
</body>