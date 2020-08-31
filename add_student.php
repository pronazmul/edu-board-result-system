 
 <?php
 
require_once('template/header.php');

 ?>
    
<!-- collect Form data check & insert to database -->


<?php

if (isset($_POST['submit'])) {

   $name = $_POST['name'];
   $ins = $_POST['ins'];
   $board = $_POST['board'];

   //Roll Management
   $roll = $_POST['roll'];
   $check_roll = checkRoll($roll);
   //Reg Management
   $reg = $_POST['reg'];
   $check_reg = checkReg($reg);

   //Files Management
  $photo = $_FILES['photo']['name'];
  $photo_tmp = $_FILES['photo']['tmp_name'];
  $ext = strtolower(pathinfo($photo,PATHINFO_EXTENSION));
  $u_photo = md5(time().$photo).'.'.$ext;


if (!empty($name) && !empty($ins) && !empty($board) && !empty($roll) && !empty($reg) && !empty($photo)) {

	if ($check_roll == true) {

		if ($check_reg == true) {
			
			if (in_array($ext, ['jpg','jpeg','png']) == true) {
				
				$sql = "INSERT INTO st_info(name, roll, reg, institute, board, photo)VALUES('$name', '$roll', '$reg', '$ins', '$board', '$u_photo')";
				$conn->query($sql);

				move_uploaded_file($photo_tmp, 'st_photo/'.$u_photo);

				$msg ="<p class = 'alert alert-success '><b>SUCCESS!</b> Data Inserted Successfully <button class='close' data-dismiss='alert'>&times;</button></p>";


			}else{$msg ="<p class = 'alert alert-danger '><b>ERROR!</b> Not Supported photo format <button class='close' data-dismiss='alert'>&times;</button></p>";}

		}else{$msg ="<p class = 'alert alert-danger '><b>ERROR!</b> Reg no Already Exist in Database <button class='close' data-dismiss='alert'>&times;</button></p>";}
		
	}else{$msg ="<p class = 'alert alert-danger '><b>ERROR!</b> Roll no Already Exist in Database <button class='close' data-dismiss='alert'>&times;</button></p>";}

	
}else{$msg ="<p class = 'alert alert-danger '><b>ERROR!</b> Field Must Not Be Empty <button class='close' data-dismiss='alert'>&times;</button></p>";}






}

?>


					<!-- Dashbord Panel -->
                                 <div class="row">
                                      
                                        <div class="col-md-12 ">
                                            <section class="panel" style="min-height: 400px; margin-top: 20px;">


    <div style="width: 60%; margin: 10px auto; ">

    	<h1 class="text-center text-success">Add Student Info</h1>
    	<hr>
    		  <?php if (isset($msg)) {
                        echo $msg;
                    } ?>

    	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
    		
		<div class="form-group">
		<label>Student Name</label>
		<input class="form-control" type="text" name="name" placeholder="Name">
		</div>

		<div class="form-group">
		<label>Student Roll</label>
		<input class="form-control" type="text" name="roll" placeholder="Roll">
		</div>

		<div class="form-group">
		<label>Student Reg</label>
		<input class="form-control" type="" name="reg" placeholder="Registration">
		</div>

		<div class="form-group">
		<label>Institute</label>
		<input class="form-control" type="text" name="ins" placeholder="Institute">
		</div>

		<div class="form-group">
		<label>Board</label>
		<input class="form-control" type="text" name="board" placeholder="Board">
		</div>

		<div class="form-group">
		<label>Photo</label>
		<input type="file" name="photo">
		</div>

		<div class="form-group">
		<label></label>
		<input type="submit" name="submit" class="btn btn-success btn-block" value="Add Student">
		</div>

    	</form>
  	
    	
    </div>

<a href="dashbord.php" class="btn btn-success" style="margin: 0px 0px 5px 10px;">Back</a>

            </section>
        </div>
      
    </div>


 
 <?php
require_once('template/footer.php');

 ?>





