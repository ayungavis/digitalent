<?php
/**
*	FUNCTION PROCESS SYSTEM
*	Used to process all data from form.
*	For examples to check login.
*	
*/

	require_once(__DIR__ . '/lib/db.class.php');
	require_once('functions.php');
	require_once('config.php');
	$db = new DB();

	// GET ACTION PROCESS
	$action = $_POST["action"];

	/**
	*	LOGIN SYSTEM
	*	Check username and password, and then set session if user logged in.
	*	
	*/
	if ($action == "login") {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$password = md5($password);
		$big = 0;
		if(!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
			$_SESSION['error'] = "Username can only alphabetics and digits!";
			$big++;
		}
		if(!preg_match("/^[a-zA-Z0-9@!# ]*$/", $password)) {
			$_SESSION['error'] = "Password can only alphabetics, digits, and special characters (@!#)!";
			$big++;
		}
		if($big == 0) {
			$db->bindMore(array(
				"username" => "$username",
				"password" => "$password"
			));
			$query = "SELECT user_id, fname, lname FROM user WHERE username = :username AND password = :password";
			$process = $db->query($query);
			if($process) {
				$_SESSION['auth'] = true;
				foreach ($process as $row) {
					$_SESSION['user_id'] = $row['user_id'];
				}
				header("Location: ../dashboard");
				die();
			}
			else {
				$_SESSION['error'] = "Wrong username or password!";
				header("Location: ../login");
				die();
			}
		}
		else {
			header("Location: ../login");
			die();
		}
	}

	/**
	*	REGISTER SYSTEM
	*	Add new user from register page
	*	
	*/
	else if($action == "register") {
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$confirm = $_POST['confirm_password'];
		$big = 0;
		if(!preg_match("/^[a-zA-z0-9]*$/", $username)) {
			$_SESSION['error'] = "Username can only alphabetics and digits!";
			$big++;
		}
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$_SESSION['error'] = "Invalid email format!";
			$big++;
		}
		if($password != $confirm) {
			$_SESSION['error'] = "Password doesn't match!";
			$big++;
		}
		if($big == 0) {
			$password = md5($password);
			$db->bind("username", "$username");
			$query = "SELECT username FROM user WHERE username = :username";
			$process = $db->query($query);
			if($process) {
				$_SESSION['error'] = "Username already exist! Please use another username.";
				header("location: ../register");
				die();
			}
			else {
				$db->bindMore(array(
					"username" => "$username",
					"email" => "$email",
					"password" => "$password",
					"dob" => "0000-00-00",
					"age" => 0,
					"fname" => "",
					"lname" => ""
				));
				$query = "INSERT INTO user VALUES (null, :email, :username, :password, :dob, :age, :fname, :lname)";
				$process = $db->query($query);
				$user_id = $db->lastInsertId();
				if($process) {
					$_SESSION['auth'] = true;
					$_SESSION['user_id'] = $user_id;
					$_SESSION['register'] = "Register success! Please set your first name and last name.";
					header("location: ../setting");
					die();
				}
			}
		}
		else {
			header("location: ../register");
			die();
		}
	}

	else if($action == "add_text") {
		$area_mean = $_POST['area_mean'];
		$radius_mean = $_POST['radius_mean'];
		$perimeter_mean = $_POST['perimeter_mean'];
		$compactness_mean = $_POST['compactness_mean'];
		$concave_points_mean = $_POST['concave_points_mean'];
		$concavity_mean = $_POST['concavity_mean'];
		$fractional_dimension_mean = $_POST['fractional_dimension_mean'];
		$smoothness_mean = $_POST['smoothness_mean'];
		$symmetry_mean = $_POST['symmetry_mean'];
		$texture_mean = $_POST['texture_mean'];

		$area_se = $_POST['area_se'];
		$radius_se = $_POST['radius_se'];
		$perimeter_se = $_POST['perimeter_se'];
		$compactness_se = $_POST['compactness_se'];
		$concave_points_se = $_POST['concave_points_se'];
		$concavity_se = $_POST['concavity_se'];
		$fractional_dimension_se = $_POST['fractional_dimension_se'];
		$smoothness_se = $_POST['smoothness_se'];
		$symmetry_se = $_POST['symmetry_se'];
		$texture_se = $_POST['texture_se'];

		$area_worst = $_POST['area_worst'];
		$radius_worst = $_POST['radius_worst'];
		$perimeter_worst = $_POST['perimeter_worst'];
		$compactness_worst = $_POST['compactness_worst'];
		$concave_points_worst = $_POST['concave_points_worst'];
		$concavity_worst = $_POST['concavity_worst'];
		$fractional_dimension_worst = $_POST['fractional_dimension_worst'];
		$smoothness_worst = $_POST['smoothness_worst'];
		$symmetry_worst = $_POST['symmetry_worst'];
		$texture_worst = $_POST['texture_worst'];

		$user_id = $_SESSION['user_id'];

		date_default_timezone_set('Asia/Jakarta');
		$time = date('Y-m-d H:i:s');

		$db->bindMore(array(
			"area_mean" => $area_mean,
			"radius_mean" => $radius_mean,
			"perimeter_mean" => $perimeter_mean,
			"compactness_mean" => $compactness_mean,
			"concave_points_mean" => $concave_points_mean,
			"concavity_mean" => $concavity_mean,
			"fractional_dimension_mean" => $fractional_dimension_mean,
			"smoothness_mean" => $smoothness_mean,
			"symmetry_mean" => $symmetry_mean,
			"texture_mean" => $texture_mean,
			"area_se" => $area_se,
			"radius_se" => $radius_se,
			"perimeter_se" => $perimeter_se,
			"compactness_se" => $compactness_se,
			"concave_points_se" => $concave_points_se,
			"concavity_se" => $concavity_se,
			"fractional_dimension_se" => $fractional_dimension_se,
			"smoothness_se" => $smoothness_se,
			"symmetry_se" => $symmetry_se,
			"texture_se" => $texture_se,
			"area_worst" => $area_worst,
			"radius_worst" => $radius_worst,
			"perimeter_worst" => $perimeter_worst,
			"compactness_worst" => $compactness_worst,
			"concave_points_worst" => $concave_points_worst,
			"concavity_worst" => $concavity_worst,
			"fractional_dimension_worst" => $fractional_dimension_worst,
			"smoothness_worst" => $smoothness_worst,
			"symmetry_worst" => $symmetry_worst,
			"texture_worst" => $texture_worst,
			"user_id" => $user_id,
			"time" => "$time",
			"diagnosis" => "",
			"other" => ""
		));
		$query = "INSERT INTO patient_data VALUES (null, :radius_mean, :texture_mean, :perimeter_mean, :area_mean, :smoothness_mean, :compactness_mean, :concavity_mean, :concave_points_mean, :symmetry_mean, :fractional_dimension_mean, :radius_se,:texture_se, :perimeter_se, :area_se, :smoothness_se, :compactness_se, :concavity_se, :concave_points_se, :symmetry_se, :fractional_dimension_se, :radius_worst, :texture_worst, :perimeter_worst, :area_worst, :smoothness_worst, :compactness_worst, :concavity_worst, :concave_points_worst, :symmetry_worst, :fractional_dimension_worst, :diagnosis, :other, :time, :user_id)";
		$process = $db->query($query);
		if($process) {
			$_SESSION['success'] = "Your text data has been added.";
			header("Location: ../add?action=text");
			die();
		}
		else {
			$_SESSION['error'] = "Something wrong, please try again.";
			header("Location: ../add?action=text");
			die();
		}
	}

	else if($action == "add_image") {
		$user_id = $_POST['user_id'];
		$db->bind("user_id", $user_id);
		$query = "SELECT image_id FROM image_data WHERE user_id = :user_id";
		$process = $db->query($query);
		$count = count($process);
		$count = $count + 1;

		$filename = $user_id."_".$count.".png";
		$filetmp = $_FILES['image']['tmp_name'];
		$filetype = $_FILES['image']['type'];
		$filepath = "../user_images/".$filename;
		move_uploaded_file($filetmp, $filepath);
		date_default_timezone_set('Asia/Jakarta');
		$time = date('Y-m-d H:i:s');

		$db->bindMore(array(
			"filename" => "$filename",
			"diagnosis" => "",
			"confidence_score" => "",
			"time" => "$time",
			"user_id" => $user_id
		));
		$query = "INSERT INTO image_data VALUES (null, :filename, :diagnosis, :confidence_score, :time, :user_id)";
		$process =  $db->query($query);
		if($process) {
			$_SESSION['success'] = "Your image data has been uploaded.";
			header("Location: ../add?action=image");
			die();
		}
		else {
			$_SESSION['error'] = "Something wrong, please try again.";
			header("Location: ../add?action=image");
			die();
		}
	}

	else if($action == "user_setting") {
		$big = 0;
		$user_id = $_POST['user_id'];
		$username = $_POST['username'];
		$fname = $_POST['first_name'];
		$lname = $_POST['last_name'];
		$email = $_POST['email'];
		$current_password = $_POST['current_password'];
		$new_password = $_POST['new_password'];
		$confirm_password = $_POST['confirm_password'];
		if(!preg_match("/^[a-zA-z0-9]*$/", $username)) {
			$_SESSION['error'] = "Username can only alphabetics and digits!";
			$big++;
		}
		if(!preg_match("/^[ a-zA-z ]*$/", $fname)) {
			$_SESSION['error'] = "First name can only alphabetics!";
			$big++;
		}
		if(!preg_match("/^[ a-zA-z ]*$/", $lname)) {
			$_SESSION['error'] = "Last name can only alphabetics!";
			$big++;
		}
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$_SESSION['error'] = "Invalid email format!";
			$big++;
		}
		if($big == 0) {
			if(!empty($current_password) && !empty($new_password) && !empty($current_password)) {
				if(!preg_match("/^[a-zA-Z0-9@!# ]*$/", $new_password)) {
					$_SESSION['error'] = "Password can only alphabetics, digits, and special characters (@!#)!";
					header("Location: ../setting");
					die();
				}
				if($new_password != $confirm_password) {
					$_SESSION['error'] = "Password doesn't match!";
					header("Location: ../setting");
					die();
				}
				$password = md5($current_password);
				$db->bindMore(array(
					"user_id" => $user_id,
					"password" => "$password"
				));
				$query = "SELECT username FROM user WHERE user_id = :user_id AND password = :password";
				$process = $db->query($query);
				if($process) {
					$password = md5($new_password);
					$db->bindMore(array(
						"user_id" => $user_id,
						"password" => "$password",
						"username" => "$username",
						"fname" => "$fname",
						"lname" => "$lname",
						"email" => "$email"
					));
					$query = "UPDATE user SET username = :username, fname = :fname, lname = :lname, email = :email, password = :password WHERE user_id = :user_id";
					$process = $db->query($query);
					if($process) {
						$_SESSION['success'] = "Your change has been saved.";
						header("Location: ../setting");
						die();
					}
				}
			}
			else {
				$db->bindMore(array(
					"user_id" => $user_id,
					"username" => "$username",
					"fname" => "$fname",
					"lname" => "$lname",
					"email" => "$email"
				));
				$query = "UPDATE user SET username = :username, fname = :fname, lname = :lname, email = :email WHERE user_id = :user_id";
				$process = $db->query($query);
				if($process) {
					$_SESSION['success'] = "Your change has been saved.";
					header("Location: ../setting");
					die();
				}
			}
		}
		else {
			header("location: ../setting");
			die();
		}
	}
?>