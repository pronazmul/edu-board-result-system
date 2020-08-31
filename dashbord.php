 
 <?php
 
require_once('template/header.php');

 ?>
                                  
					<!-- Dashbord Panel -->


                                    <div class="row">
                                      
                                        <div class="col-md-12 ">
                                            <section class="panel" style="min-height: 400px; margin-top: 20px;">
<div style="width: 70%; margin: 10px auto;"> 
	<h1 class="text-success text-center">Welcome <?php echo $_SESSION['name'];?></h1> <hr>

	<div class="col-md-6 bg-dark card " style="border-radius: 5px; padding: 20px auto;">
		<div class="card-body text-center"  style="margin-bottom: 25px;">
			<h3 class="text-success text-center">Student included</h3><hr>

<?php
$sql = "SELECT * FROM st_info";
$com = $conn->query($sql);

 $st_info = $com-> num_rows;
?>

<span style="font-size: 35px; line-height: 35px;"><?php echo $st_info;?> <br> Students included</span>

<a style="margin-top: 20px;" class="btn btn-success btn-block btn-center" href="add_student.php">Add Student</a>
		</div>
	</div>
	<div class="col-md-6 bg-dark card" style="border-radius: 5px; padding: 20px auto;">
		<div class="card-body text-center" style="margin-bottom: 25px;">
			<h3 class="text-success text-center">Result included</h3><hr>
			<?php
$sql = "SELECT * FROM st_result";
$com = $conn->query($sql);

 $st_result = $com-> num_rows;
?>

<span style="font-size:35px; line-height: 35px;"><?php echo $st_result;?> <br> Result included</span>

<a  style="margin-top: 20px;" class="btn btn-success btn-block" href="all_student.php">Add Result</a>

		</div>
	</div>
</div>
		                                  </section>
                                        </div>
                                      
                                    </div>


 
 <?php
require_once('template/footer.php');

 ?>





