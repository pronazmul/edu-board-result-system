<?php


require_once('db.php');

// Email Check in Database While admin Resister...
function emailCheck($email){
	global $conn;
	$sql= "SELECT * FROM admin_login WHERE email = '$email'";
	$com_data = $conn->query($sql);
	$num_rows = $com_data-> num_rows;

	if ($num_rows > 0) {
		return false;
	}else{ return true;}
}


// Roll No check while add student info...
function checkRoll($roll){
global $conn;
	$sql= "SELECT * FROM st_info WHERE roll = '$roll'";
	$com_data = $conn->query($sql);
	$num_rows = $com_data-> num_rows;

	if ($num_rows > 0) {
		return false;
	}else{ return true;}
}

// Roll No check while add student info...
function checkReg($reg){
global $conn;
	$sql= "SELECT * FROM st_info WHERE reg = '$reg'";
	$com_data = $conn->query($sql);
	$num_rows = $com_data-> num_rows;

	if ($num_rows > 0) {
		return false;
	}else{ return true;}
}

//Check input_valid result

function validInput($input){

	if ($input > 100 || $input < 0) {
		return false;
	}else{
		return true;
	}
}



//Check Students result Grade....
function checkGrade($grade){

	if ($grade >= 0 && $grade <=32) {
		$grade = 'F';
	}elseif ($grade >= 33 && $grade <= 39) {
		$grade = 'D';
	}elseif ($grade >= 40 && $grade <= 49) {
		$grade = 'C';
	}elseif ($grade >= 50 && $grade <= 59) {
		$grade = 'B';
	}elseif ($grade >= 60 && $grade <= 69) {
		$grade = 'A-';
	}elseif ($grade >= 70 && $grade <= 79) {
		$grade = 'A';
	}elseif ($grade >=80 && $grade <= 100) {
		$grade = 'A+';
	}else{ $grade = 'Invalid';}

	return $grade;

}

//Check Students result GPA....
function checkGpa($gpa){

	if ($gpa >= 0 && $gpa <=32) {
		$gpa = '0';
	}elseif ($gpa >= 33 && $gpa <= 39) {
		$gpa = '1';
	}elseif ($gpa >= 40 && $gpa <= 49) {
		$gpa = '2';
	}elseif ($gpa >= 50 && $gpa <= 59) {
		$gpa = '3';
	}elseif ($gpa >= 60 && $gpa <= 69) {
		$gpa = '3.5';
	}elseif ($gpa >= 70 && $gpa <= 79) {
		$gpa = '4';
	}elseif ($gpa >=80 && $gpa <= 100) {
		$gpa = '5';
	}else{ $gpa = 'Invalid';}

	return $gpa;
}

// CGPA Calculation..........
function checkCgpa($bangla_gpa, $english_gpa, $math_gpa, $science_gpa, $social_gpa, $religion_gpa){

	$total= $bangla_gpa+$english_gpa+$math_gpa+$science_gpa+$social_gpa+$religion_gpa;

	$cgpa = $total / 6 ;

	return $cgpa;
}

// Result Calculation..........
function checkResult($bangla_gpa, $english_gpa, $math_gpa, $science_gpa, $social_gpa, $religion_gpa){

	if ($bangla_gpa == 0 || $english_gpa == 0 || $math_gpa == 0 || $science_gpa == 0 || $social_gpa == 0 || $religion_gpa == 0) {
		
		$result = "Failed";

	}else{ $result = "Passed"; }

	return $result;
}

//Check total  
function totalGrade($cgpa, $bangla_gpa, $english_gpa, $math_gpa, $science_gpa, $social_gpa, $religion_gpa){

	if ($bangla_gpa == 0 || $english_gpa == 0 || $math_gpa == 0 || $science_gpa == 0 || $social_gpa == 0 || $religion_gpa == 0) {
		$grade = 'F';
	}elseif ($cgpa == 5 ) {
		$grade = 'A+';}

	elseif($cgpa >= 4 && $cgpa < 5){
		$grade = 'A';}

	elseif($cgpa >= 3.5 && $cgpa < 4){
		$grade = 'A-';}

	elseif($cgpa >= 3 && $cgpa < 3.5){
		$grade = 'B';}

	elseif($cgpa >= 2 && $cgpa < 3){
		$grade = 'C';}

	elseif($cgpa >= 1 && $cgpa < 2){
		$grade = 'D';}

	return $grade;
}

//Data Check result is updated or not ....

function dataCheck($roll, $reg){
	global $conn;

	$sql ="SELECT * FROM st_result WHERE roll = '$roll' AND reg = '$reg'";
	$com_data= $conn->query($sql);
	$num_rows = $com_data-> num_rows;

	if ($num_rows > 0) {
		return true;

	}else{return false;}

}















?>