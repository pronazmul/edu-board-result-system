 
 <?php
 
require_once('template/header.php');

//collect st_id data by url & GET[] method....

/*if (isset($_GET['id'])) {
$st_table_id = $_GET['id'];
}*/

 ?>
<!-- collect Form data check & insert to database -->
<?php
//collect url Data By Get method...
if (isset($_GET['roll'])) {
	$roll =$_GET['roll'];



//Collect Form data....
if (isset($_POST['submit'])) {

if (validInput($_POST['bangla']) == true && validInput($_POST['english']) == true && validInput($_POST['math']) == true && validInput($_POST['science']) == true && validInput($_POST['social']) == true && validInput($_POST['religion'])) {

//Manage Bangla
$bangla  = $_POST['bangla'];
$bangla_grade  =checkGrade($bangla);
$bangla_gpa  = checkGpa($bangla);

//Manage English
$english = $_POST['english'];
$english_grade  =checkGrade($english);
$english_gpa  = checkGpa($english);

//Manage Math
$math = $_POST['math'];
$math_grade  =checkGrade($math);
$math_gpa  = checkGpa($math);

//Manage Science
$science = $_POST['science'];
$science_grade  =checkGrade($science);
$science_gpa  = checkGpa($science);

//Manage Social
$social = $_POST['social'];
$social_grade  =checkGrade($social);
$social_gpa  = checkGpa($social);

//Manage Religion
$religion = $_POST['religion'];
$religion_grade  =checkGrade($religion);
$religion_gpa  = checkGpa($religion);

//Manage_Result 
$result = checkResult($bangla_gpa, $english_gpa, $math_gpa, $science_gpa, $social_gpa, $religion_gpa);

//Manage_CGPA 
$cgpa = checkCgpa($bangla_gpa, $english_gpa, $math_gpa, $science_gpa, $social_gpa, $religion_gpa);

//Total_grade... 
$total_grade = totalGrade($cgpa, $bangla_gpa, $english_gpa, $math_gpa, $science_gpa, $social_gpa, $religion_gpa);

//Validate Result And update in database....
if (!empty($bangla) && !empty($english) && !empty($math) && !empty($science) && !empty($social) && !empty($religion)) {

	// $sql = "INSERT INTO st_result(roll, reg, bangla, bangla_grade, bangla_gpa, english, english_grade, english_gpa, math, math_grade, math_gpa, science, science_grade, science_gpa, social, social_grade, social_gpa, religion, religion_grade, religion_gpa, total_grade, cgpa, result) VALUES('$roll','$reg','$bangla','$bangla_grade','$bangla_gpa','$english','$english_grade','$english_gpa','$math','$math_grade','$math_gpa','$science','$science_grade','$science_gpa','$social','$social_grade','$social_gpa','$religion','$religion_grade','$religion_gpa', '$total_grade','$cgpa','$result')";
 $sql = "UPDATE st_result SET bangla='$bangla', bangla_grade='$bangla_grade', bangla_gpa='$bangla_gpa',english='$english', english_grade='$english_grade', english_gpa='$english_gpa',math='$math', math_grade='$math_grade', math_gpa='$math_gpa',science='$science', science_grade='$science_grade', science_gpa='$science_gpa',social='$social', social_grade='$social_grade', social_gpa='$social_gpa',religion='$religion', religion_grade='$religion_grade', religion_gpa='$religion_gpa', total_grade='$total_grade', cgpa='$cgpa', result='$result' WHERE roll ='$roll'";

	$conn->query($sql);

	$msg ="<p class = 'alert alert-success'><b>SUCCESS!</b> Result Updated Successfully <button class='close' data-dismiss='alert'>&times;</button></p>";
	
}else{$msg ="<p class = 'alert alert-danger '><b>ERROR!</b> Field Must Not Be Empty <button class='close' data-dismiss='alert'>&times;</button></p>";}

}else{$msg ="<p class = 'alert alert-danger '><b>ERROR!</b> Invalid Input <button class='close' data-dismiss='alert'>&times;</button></p>";}

}



$sql = "SELECT * FROM st_result WHERE roll ='$roll'";
$com_data = $conn->query($sql);
$data = $com_data->fetch_assoc();
}
?>


					<!-- Dashbord Panel -->
                                 <div class="row">
                                      
                                        <div class="col-md-12 ">
                                            <section class="panel" style="min-height: 400px; margin-top: 20px;">
    <div style="width: 50%; margin: 10px auto; ">

    	<h1 class="text-center text-success">Edit Student Result</h1>
    	<hr>
    		  <?php if (isset($msg)) {
                        echo $msg;
                    } ?>

    	<form action="<?php echo $_SERVER['PHP_SELF'];?>?roll=<?php echo $_GET['roll'];?>" method="POST" enctype="multipart/form-data">
    		
		<div class="form-group">
		<label>Bangla</label>
		<input class="form-control" type="number" name="bangla"  value="<?php echo $data['bangla'];?>">
		</div>

		<div class="form-group">
		<label>English</label>
		<input class="form-control" type="number" name="english"  value="<?php echo $data['english'];?>">
		</div>

		<div class="form-group">
		<label>Math</label>
		<input class="form-control" type="number" name="math" value="<?php echo $data['math'];?>">
		</div>

		<div class="form-group">
		<label>Science</label>
		<input class="form-control" type="number" name="science" value="<?php echo $data['science'];?>">
		</div>

		<div class="form-group">
		<label>Social Science</label>
		<input class="form-control" type="number" name="social" value="<?php echo $data['social'];?>">
		</div>

		<div class="form-group">
		<label>Religion</label>
		<input class="form-control" type="number" name="religion" value="<?php echo $data['religion'];?>">
		</div>

		
		<div class="form-group">
		<label></label>
		<input type="submit" name="submit" class="btn btn-success btn-block" value="Update Result">
		</div>

    	</form>
  	
    	
    </div>



            </section>
        </div>
      
    </div>


 
 <?php
require_once('template/footer.php');

 ?>





