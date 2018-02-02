<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Personal Form Data</title>
	<link rel="stylesheet" href="../assets/css/personal_form.css">
	<script src="../assets/js/jquery-3.3.1.min.js"></script>
	<script>
		<?php
			if(isset($_GET["err"])) {
		?>
				alert("Error sending data.");
		<?php
			}
		?>
		$(document).ready(function() {
			var choices = {
				"Manila": [
					"De La Salle University",
					"Philippine Normal University",
					"Centro Escolar University",
					"University of Santo Tomas",
					"Pamantasan ng Lungsod ng Maynila",
					"Adamson University",
					"Far Eastern University",
					"San Beda College",
				],
				"Quezon City": [
					"University of the Philippines Diliman",
					"Ateneo de Manila University",
					"New Era University",
					"Trinity University of Asia",
					"Far Eastern University Nicanor Reyes Medical Foundation",
					"Angelicum College",
					"Miriam College",
					"AMA Computer University - Quezon City",
				],
				"Pasay": [
					"Philippine State College of Aeronautics",
					"Arellano University in Pasay",
					"Asian Institute Of Maritime Studies",
					"Datamex Institute of Computer Technology Pasay",
					"Manila Tytana Colleges",
					"International Electronics and Technical Institute Pasay",
				],
			}
			$("#course_taken").hide();	
			$("#school_location").on('click', function(){
				if($("#school_location").val()){
					$("#school").empty();
					$("#school").append('<option value="">Select school: </option>');
					$.each(choices, function(location, schools){
						if(location === $("#school_location").val()) {
							$.each(schools, function(index, school){
								$("#school").append("<option>"+ school +"</option>");
							});
						}
					});
				}
			});
			$("#startingNumber").on('keyup', function(){
				if($.trim($("#endNumber").val()) !== "") {
					if(parseInt($.trim($("#endNumber").val())) < parseInt($(this).val())){
						$(this).val("");
					}
				}
			});
			$("#endNumber").on('change', function(){
				if($.trim($("#startingNumber").val()) !== "") {
					if(parseInt($.trim($("#startingNumber").val())) > parseInt($(this).val())){
						$(this).val("");
					}
				}
			});
			$("#education_attainment").on('change', function(){
				if($(this).val() === "COLLEGE"){
					$("#course_taken").show();
				} else {
					$("#course_taken").hide();
				}
			});
		});
	</script>
</head>
<body>
	<form action="ONLINE_RESUME_FORM.php" enctype="multipart/form-data" method="POST">
		<div class="container">
			<hr>
			<h2 class="header">A. PERSONAL INFORMATION</h2>
			<hr>
			<div class="content_container" id="personal_info" style="text-align: right;">
				<p>First Name: <input type="text" name="firstName" id="firstName" required></p>
				<p>Middle Name: <input type="text" name="middleName" id="middleName" required></p>
				<p>Last Name: <input type="text" name="lastName" id="lastName" required></p>
				<br>
				<p>Birthday: <input type="date" name="birthday" id="birthday" required></p>
				<p>Home Address: <input type="text" name="homeAddress" id="homeAddress" required></p>
				<p>Email Address: <input type="email" name="emailAddress" id="emailAddress" required></p>
				<p>Contact Number: <input type="text" name="contactNumber" id="contactNumber" required></p>
				<p style="text-align: left">Upload your photo here. <input type="file" name="photo" id="photo" required></p>
			</div>
			<div class="content_container">
				<p>Objective Summary: </p><textarea name="objective" id="objective" cols="45" rows="20" required></textarea>
			</div>
			<div class="content_container">
				<p>Profile Summary: </p><textarea name="profile" id="profile" cols="45" rows="20" required></textarea>
			</div>
		</div>
		<div class="container">
			<hr>
			<h2 class="header">B. EDUCATIONAL BACKGROUND</h2>
			<hr>
			<div class="content_container">
				<p>School Location: </p>
				<select name="school_location" id="school_location" required>
					<option value="">Select school location</option>
					<option value="Manila">Manila</option>
					<option value="Quezon City">Quezon City</option>
					<option value="Pasay">Pasay</option>
				</select>
				<p>School: </p>
				<select name="school" id="school" required>
					<option value="">Select school: </option>
				</select>
				<p>Years attended: </p>
				<input type="number" name="startingNumber" id="startingNumber" required>
				<p> - to - </p>
				<input type="number" name="endNumber" id="endNumber" required>
			</div>
			<div class="content_container">
				<p>Highest Education Attainment: </p>
				<select name="education_attainment" id="education_attainment" required>
					<option value="">Select education attainment</option>
					<option value="DOCTORATE / MASTERAL DEGREE">DOCTORATE / MASTERAL DEGREE</option>
					<option value="COLLEGE">COLLEGE</option>
					<option value="UNDERGRADUATE">UNDERGRADUATE</option>
					<option value="VOCATIONAL">VOCATIONAL</option>
					<option value="HIGH SCHOOL">HIGH SCHOOL</option>
					<option value="ELEMENTARY">ELEMENTARY</option>
				</select>
				<p>Awards: </p><textarea name="awards" id="awards" cols="45" rows="15"></textarea>
			</div>
			<div class="content_container">
				<div id="course_taken">
					<p>Course taken in college: </p>
					<select name="course" id="course">
						<option value="Computer Science" selected>Computer Science</option>
						<option value="Information Technology">Information Technology</option>
						<option value="Information Systems">Information Systems</option>
					</select>
				</div>
				<p>Organizations: </p><textarea name="organizations" id="organizations" cols="45" rows="15"></textarea>
			</div>
		<button type="submit" name="btn_submit" value="0x8f">Submit form</button>
		</div>
	</form>
</body>
</html>