
<?php
require_once('libs/functions.php');

if (isset($_SESSION['name']) && isset($_SESSION['email'])) {
    header('location:dashbord.php');
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>PHP |Practice Application</title>
       <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="css/app.v1.css" type="text/css" />

    <!--[if lt IE 9]> <script src="js/ie/html5shiv.js"></script> <script src="js/ie/respond.min.js"></script> <script src="js/ie/excanvas.js"></script> <![endif]-->
</head>

<body class="">

    <section id="content" class="m-t-lg wrapper-md animated fadeInDown">
        <!-- Error Or Sucesss Msg -->

                                  
        <div class="container aside-xl"> <a class="navbar-brand block" href="#">EDU_RESULT_MANAGEMENT</a>
            <section class="m-b-lg">
                <header class="wrapper text-center"> <strong>Admin Resistration Panel</strong> </header>

<!-- Form Data collect -->
<?php 

if (isset($_POST['submit'])) {
   $name = $_POST['name'];

   //Email Management...
   $email = $_POST['email'];
   $checked_email  = emailCheck($email);

   //password management....
   $pass = $_POST['pass'];
   $pass_hash = password_hash($pass, PASSWORD_DEFAULT);

   if (isset($_POST['checkbox'])) {
       $agree = true;
   }else{$agree= false;}


   if (!empty($name) && !empty($email) && !empty($pass)) {
       
       if (filter_var($email, FILTER_VALIDATE_EMAIL) == true) {

        if ($checked_email == true) {
            
            if ($agree ==true ) {
                
                $sql = "INSERT INTO admin_login(name, email, pass, status)VALUES('$name','$email','$pass_hash','active')";
                $conn->query($sql);


                $msg ="<p class = 'alert alert-success '><b>SUCCESS!</b> Data Inserted Successfully. <button class='close' data-dismiss='alert'>&times;</button></p>";


            }else{$msg ="<p class = 'alert alert-danger '><b>ERROR!</b> Must be agree with condition. <button class='close' data-dismiss='alert'>&times;</button></p>";}

        }else{$msg ="<p class = 'alert alert-danger '><b>ERROR!</b> Email Already Exist in Database.<button class='close' data-dismiss='alert'>&times;</button></p>";}
           
       }else{ $msg ="<p class = 'alert alert-danger '><b>ERROR!</b> Email is invalid <button class='close' data-dismiss='alert'>&times;</button></p>";}
        

   }else{ $msg ="<p class = 'alert alert-danger '><b>ERROR!</b> Field Must Not Be Empty <button class='close' data-dismiss='alert'>&times;</button></p>";}
}
?>
                    
                    <?php if (isset($msg)) {
                        echo $msg;
                    } ?>



                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <div class="list-group">
                        <div class="list-group-item">
                            <input name="name" type="text" placeholder="Name" class="form-control no-border"> </div>
                        <div class="list-group-item">
                            <input name="email" type="text" placeholder="Email" class="form-control no-border"> </div>
                        <div class="list-group-item">
                            <input name="pass" type="password" placeholder="Password" class="form-control no-border"> </div>
                    </div>
                    <div class="checkbox m-b">
                        <label>
                            <input name="checkbox" value="agree" type="checkbox"> Agree the terms and policy </label>
                    </div>
                    <input type="submit" name=" submit" value="Sign Up" class="btn btn-lg btn-primary btn-block">
                
                    <div class="line line-dashed"></div>
                    <p class="text-muted text-center"><small>Already have an account?</small></p> <a href="index.php" class="btn btn-lg btn-default btn-block">Sign in</a> 
                </form>









            </section>
        </div>
    </section>
    <!-- footer -->
    <footer id="footer">
        <div class="text-center padder clearfix">
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






