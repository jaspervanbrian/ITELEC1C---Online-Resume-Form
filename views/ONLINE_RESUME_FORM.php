<?php
	if(isset($_POST['btn_submit'])) {
		$firstName = $_POST['firstName'];
		$middleName = $_POST['middleName'];
		$lastName = $_POST['lastName'];
		$birthday = $_POST['birthday'];
		$homeAddress = $_POST['homeAddress'];
		$emailAddress = $_POST['emailAddress'];
		$contactNumber = $_POST['contactNumber'];
		$objective = $_POST['objective'];
		$profile = $_POST['profile'];
		$school_location = $_POST['school_location'];
		$school = $_POST['school'];
		$startingNumber = $_POST['startingNumber'];
		$endNumber = $_POST['endNumber'];
		$education_attainment = $_POST['education_attainment'];
		if(isset($_POST['course'])) {
			$course = $_POST['course'];
		}
		if(isset($_POST['awards'])){
			$awards = $_POST['awards'];
		}
		if(isset($_POST['organizations'])){
			$organizations = $_POST['organizations'];
		}

		$target_dir = "../assets/images/";
		$target_file = $target_dir . basename($_FILES["photo"]["name"]);
		$uploadOk = 0;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["btn_submit"])) {
		    $check = getimagesize($_FILES["photo"]["tmp_name"]);
		    if($check !== false) {
		        // echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        // header("Location: PERSONAL_FORM_DATA.php?err=1");
		    }
		    if($uploadOk == 1) {
		   		move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
		    } else {
		        // header("Location: PERSONAL_FORM_DATA.php?err=1");
		    }
		}
	} else {
		// header("Location: PERSONAL_FORM_DATA.php?err=1");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Your Online Resume Form</title>
	<link rel="stylesheet" href="../assets/css/online_resume.css">
	<script src="../assets/js/jquery-3.3.1.min.js"></script>
</head>
<body>
	<div class="container">
		<hr>
		<h3>ONLINE RESUME FORM</h3>
		<hr>
		<div class="row">
			<div class="col-6">
				<h4><?= $lastName . ", " . $firstName . " " . $middleName?></h4>
				<p>Birthdate: <b><em><?= $birthday ?></em></b></p>
				<p>Home Address: <b><em><?= $homeAddress ?></em></b></p>
				<p>Contact me at <b><em><?= $contactNumber ?></em></b></p>
				<p>or E-mail at <b><em><?= $emailAddress ?></em></b></p>
			</div>
			<div class="col-6 border-left">
				<img src="<?= $target_file ?>" alt="" id="my_img">
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-6">
				<h5>Objective Summary: </h5>
				<p><?= $objective ?></p>
			</div>
			<div class="col-6">
				<h5>Profile Summary: </h5>
				<p><?= $profile ?></p>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-6">
				<h5>PROFESSIONAL BACKGROUND</h5>
				<p>Company: </p>
				<p>Address: </p>
				<p>Role: </p>
				<p>Duration: </p>
				<br>
				<p>Job Overview:</p>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-4">
				<h5>EDUCATIONAL BACKGROUND</h5>
				<p>School Name: <b><em><?= $school ?></em></b></p>
				<p>School Location: <b><em><?= $school_location ?></em></b></p>
				<p>Highest Education Attainment: <b><em><?= $education_attainment ?></em></b></p>
			</div>
			<div class="col-4">
				<?php
					if(isset($_POST['course'])) {
				?>
						<p>Course Taken: <b><em><?= $course ?></em></b></p>
				<?php
					}
				?>
				<p>Years attended: <?= $startingNumber . " to " . $endNumber ?></p>
				<h5>Awards: </h5>
				<p><em><?= $awards ?></em></p>
			</div>
			<div class="col-4">

				<h5>Organizations: </h5>
				<p><em><?= $organizations ?></em></p>
			</div>
		</div>
		<hr>
		<div class="row">
			<h5>Skills/ Proficiencies</h5>
			<div class="col-6">
				<p>HTML: <b><em>5/10</em></b></p>
				<p>CSS: <b><em>4/10</em></b></p>
				<p>ES6: <b><em>4/10</em></b></p>
				<p>Java 9: <b><em>5/10</em></b></p>
				<p>PHP 7.1: <b><em>5/10</em></b></p>
				<p>Laravel 5.5: <b><em>5/10</em></b></p>
				<p>Rails 5.1.4: <b><em>3/10</em></b></p>
				<p>Vue.js: <b><em>3/10</em></b></p>
			</div>
			<div class="col-6">
				<p>PostgreSQL: <b><em>3/10</em></b></p>
				<p>MySQL: <b><em>4/10</em></b></p>
			</div>
		</div>
	</div>
</body>
</html>