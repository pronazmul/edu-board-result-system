<?php
require_once('libs/functions.php');

if (isset($_SESSION['name']) && isset($_SESSION['email'])) {
    header('location:dashbord.php');
}

?>


<!DOCTYPE html>
<html lang="en" class=" ">

<head>
    <meta charset="utf-8" />
    <title>EDU_Application</title>
    <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="css/app.v1.css" type="text/css" />
    <!--[if lt IE 9]> <script src="js/ie/html5shiv.js"></script> <script src="js/ie/respond.min.js"></script> <script src="js/ie/excanvas.js"></script> <![endif]-->
</head>

<body class="">
    <section id="content" class="m-t-lg wrapper-md animated fadeInUp">
        <div class="container aside-xl"> <a class="navbar-brand block" href="#">EDU_RESULT_MANAGEMENT</a>
            <section class="m-b-lg">
                <header class="wrapper text-center"> <strong>Admin Login Panel</strong> </header>


<?php

if (isset($_POST['submit'])) {
    //Manage Email
   $email = $_POST['email'];
  // $email_check = emailCheckDB($email);
   // Manage Pass
   $pass = $_POST['pass'];
   //$pass_verify = passVerify($pass);

    if (!empty($email) && !empty($pass)) {

        $sql = "SELECT * FROM admin_login WHERE email = '$email'";
        $com_data = $conn->query($sql);
        $num_rows = $com_data-> num_rows;
        
        if ($num_rows == 1) {

            $data = $com_data-> fetch_assoc();

            if (password_verify($pass, $data['pass']) == true) {
                

                $_SESSION['name'] = $data['name'];
                $_SESSION['email'] = $data['email'];


                $msg ="<p class = 'alert alert-success '><b>SUCCESS!</b> Login Successfull <button class='close' data-dismiss='alert'>&times;</button></p>";
                header('location:dashbord.php');

            }else{$msg ="<p class = 'alert alert-danger '><b>ERROR!</b> Password Dosen't Match <button class='close' data-dismiss='alert'>&times;</button></p>";}

        }else{$msg ="<p class = 'alert alert-danger '><b>ERROR!</b> Email Dosen't Match <button class='close' data-dismiss='alert'>&times;</button></p>";}

    }else{$msg ="<p class = 'alert alert-danger '><b>ERROR!</b> Field Must Not be empty <button class='close' data-dismiss='alert'>&times;</button></p>";}


}
?>
                <?php if (isset($msg)) {
                        echo $msg;
                    } ?>


        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method ="POST">
            <div class="list-group">
                <div class="list-group-item">
                    <input name="email" type="text" placeholder="Email" class="form-control no-border"> </div>
                <div class="list-group-item">
                    <input name="pass" type="password" placeholder="Password" class="form-control no-border"> </div>
            </div>
            <input type="submit" name="submit" class="btn btn-lg btn-primary btn-block" value="SIGN IN">
            
            <div class="text-center m-t m-b"><a href="#"><small>Forgot password?</small></a></div>
            <div class="line line-dashed"></div>
            <p class="text-muted text-center"><small>Do not have an account?</small></p> <a href="reg.php" class="btn btn-lg btn-default btn-block">Create an account</a> 
        </form>







            </section>
        </div>
    </section>
    <!-- footer -->
    <footer id="footer">
        <div class="text-center padder">
            <p> <small>Programmer Nazmul &copy; 2020</small> </p>
        </div>
    </footer>
    <!-- / footer -->
    <!-- Bootstrap -->
    <!-- App -->
    <script src="js/app.v1.js"></script>
    <script src="js/app.plugin.js"></script>
</body>

</html>