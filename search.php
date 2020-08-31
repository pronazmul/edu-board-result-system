<?php

require_once('libs/functions.php');

if (isset($_POST['submit'])) {
	//$exam = $_POST['exam'];
	//$year = $_POST['year'];
	//$board = $_POST['board'];
	$roll = $_POST['roll'];
	$reg = $_POST['reg'];

$sql = "SELECT * FROM st_info JOIN st_result ON st_info.roll = st_result.roll
WHERE st_info.roll = '$roll'";

$com_data = $conn->query($sql);

$data = $com_data->fetch_assoc();


}else{
	header('location:check_result.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Education Board Bangladesh</title>
	<link rel="stylesheet" href="assets/css/syle.css">

	<link rel="shortcut icon" type="image/x-icon" href="assets/images/bd_logo.png">
</head>
<body>
	

	<div class="wraper">
		<div class="w-top">
			<div class="logo">
				<img src="assets/images/bd_logo.png" alt="">
			</div>
			<div class="banner">
				<h3>Ministry of Education</h3>
				<hr>
				<h4>Intermediate and Secondary Education Boards Bangladesh</h4>
			</div>
		</div>
		<button style="padding: 5px 5px; margin: 5px 0px 0px 5px;"><a href="check_result.php" style="text-decoration: none;">Back</a></button>
		<div class="w-main">


				<div class="student-info">
					<div class="student-photo">
						<img src="st_photo/<?php echo $data['photo']; ?>" alt="">
					</div>
					<div class="student-details">
						<table>
							<tr>
								<td>Name</td>
								<td><?php echo $data['name']; ?></td>
							</tr>
							<tr>
								<td>Roll</td>
								<td><?php echo $data['roll']; ?></td>
							</tr>
							<tr>
								<td>Reg.</td>
								<td><?php echo $data['reg']; ?></td>
							</tr>
							<tr>
								<td>Board</td>
								<td><?php echo $data['board']; ?></td>
							</tr>
							<tr>
								<td>Institute</td>
								<td><?php echo $data['institute']; ?></td>
							</tr>
							<tr>
								<td>Grade</td>
								<td><?php echo $data['total_grade']; ?></td>
							</tr>
							<tr>
								<td>Result</td>
								<td>

								<?php if ($data['result']=='Passed'):?>

									<span style="color:green;font-weight:bold;">Passed<span>

								<?php else: ?>

									<span style="color:red;font-weight:bold;">Failed<span>

								<?php endif; ?>

									</td>
							</tr>
						</table>
					</div>

				</div>

				<div class="student-result">
					<table>
						<tr>
							<td>Subject</td>
							<td>Marks</td>
							<td>Grade</td>
							<td>GPA</td>
							<td>CGPA</td>
						</tr>
						<tr>
							<td>Bangla</td>
							<td><?php echo $data['bangla']; ?></td>
							<td><?php echo $data['bangla_grade']; ?></td>
							<td><?php echo $data['bangla_gpa']; ?></td>
							<td rowspan="6"><?php echo $data['cgpa']; ?></td>
						</tr>
						<tr>
							<td>English</td>
							<td><?php echo $data['english']; ?></td>
							<td><?php echo $data['english_grade']; ?></td>
							<td><?php echo $data['english_gpa']; ?></td>
						</tr>
						<tr>
							<td>Math</td>
							<td><?php echo $data['math']; ?></td>
							<td><?php echo $data['math_grade']; ?></td>
							<td><?php echo $data['math_gpa']; ?></td>
						</tr>
						<tr>
							<td>Science</td>
							<td><?php echo $data['science']; ?></td>
							<td><?php echo $data['science_grade']; ?></td>
							<td><?php echo $data['science_gpa']; ?></td>
						</tr>
						<tr>
							<td>Social Science</td>
							<td><?php echo $data['social']; ?></td>
							<td><?php echo $data['social_grade']; ?></td>
							<td><?php echo $data['social_gpa']; ?></td>
						</tr>
						<tr>
							<td>Religion</td>
							<td><?php echo $data['religion']; ?></td>
							<td><?php echo $data['religion_grade']; ?></td>
							<td><?php echo $data['religion_gpa']; ?></td>
						</tr>
					</table>
				</div>




		</div>
		<div class="w-footer">
			<div class="f-left">
				<p>©2005-2019 Ministry of Education, All rights reserved.</p>
			</div>
			<div class="f-right">
				<span>Powered by</span>
				<img src="assets/images/tbl_logo.png" alt="">
			</div>
		</div>
	</div>
	<div class="bottom">
		<img src="assets/images/play.png" alt="">
	</div>

	

	
</body>
</html>