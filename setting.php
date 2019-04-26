<?php
	require_once("include/functions.php");
	if(!isset($_SESSION["auth"])) header("Location: ./login");

	$db->bind("user_id", $_SESSION['user_id']);
	$query = "SELECT fname, lname, email, username FROM user WHERE user_id = :user_id";
	$data = $db->query($query);
	foreach ($data as $row) {
		$fname = $row['fname'];
		$lname = $row['lname'];
		$email = $row['email'];
		$username = $row['username'];
	}
?>

<?php require_once("include/pages/header_start.php"); ?>

<?php require_once("include/pages/library.php"); ?>

<?php require_once("include/pages/header_end.php"); ?>

<body>

<!-- Wrapper -->
<div id="wrapper">

<?php require_once("include/pages/navbar_dashboard.php"); ?>

<!-- Dashboard Container -->
<div class="dashboard-container">

	<?php require_once("include/pages/sidebar.php"); ?>

	<!-- Dashboard Content
	================================================== -->
	<div class="dashboard-content-container" data-simplebar>
		<div class="dashboard-content-inner" >
			
			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3>Setting</h3>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="./index">Home</a></li>
						<li><a href="./dashboard">Dashboard</a></li>
						<li>Setting</li>
					</ul>
				</nav>
			</div>
	
			<?php if(isset($_SESSION['register'])) { ?>
				<div class="notification success closeable">
					<p><?php echo $_SESSION['register']; ?></p>
					<a class="close" href="#"></a>
				</div>
				<?php unset($_SESSION['register']); ?>
			<?php } ?>

			<?php if(isset($_SESSION['error'])) { ?>
				<div class="notification error closeable">
					<p><?php echo $_SESSION['error']; ?></p>
					<a class="close" href="#"></a>
				</div>
				<?php unset($_SESSION['error']); ?>
			<?php } ?>

			<?php if(isset($_SESSION['success'])) { ?>
				<div class="notification success closeable">
					<p><?php echo $_SESSION['success']; ?></p>
					<a class="close" href="#"></a>
				</div>
				<?php unset($_SESSION['success']); ?>
			<?php } ?>

			<!-- Row -->
			<div class="row">
				<form action="include/process.php" method="post">

					<!-- Dashboard Box -->
					<div class="col-xl-12">
						<div class="dashboard-box margin-top-0">

							<!-- Headline -->
							<div class="headline">
								<h3><i class="icon-material-outline-account-circle"></i> My Account</h3>
							</div>

							<div class="content with-padding padding-bottom-0">

								<div class="row">

									<div class="col">
										<div class="row">

											<div class="col-xl-6">
												<div class="submit-field">
													<h5>First Name</h5>
													<input type="text" class="with-border" name="first_name" value="<?php echo $fname; ?>" required>
												</div>
											</div>

											<div class="col-xl-6">
												<div class="submit-field">
													<h5>Last Name</h5>
													<input type="text" class="with-border" name="last_name" value="<?php echo $lname; ?>" required>
												</div>
											</div>

											<div class="col-xl-6">
												<!-- Account Type -->
												<div class="submit-field">
													<h5>Username</h5>
													<input type="text" class="with-border" name="username" value="<?php echo $username; ?>" required>
												</div>
											</div>

											<div class="col-xl-6">
												<div class="submit-field">
													<h5>Email</h5>
													<input type="text" class="with-border" name="email" value="<?php echo $email; ?>" required>
												</div>
											</div>

										</div>
									</div>
								</div>

							</div>
						</div>
					</div>

					<!-- Dashboard Box -->
					<div class="col-xl-12">
						<div id="test1" class="dashboard-box">

							<!-- Headline -->
							<div class="headline">
								<h3><i class="icon-material-outline-lock"></i> Password & Security</h3>
							</div>

							<div class="content with-padding">
								<div class="row">
									<div class="col-xl-4">
										<div class="submit-field">
											<h5>Current Password</h5>
											<input type="password" name="current_password" class="with-border">
										</div>
									</div>

									<div class="col-xl-4">
										<div class="submit-field">
											<h5>New Password</h5>
											<input type="password" name="new_password" class="with-border">
										</div>
									</div>

									<div class="col-xl-4">
										<div class="submit-field">
											<h5>Repeat New Password</h5>
											<input type="password" name="confirm_password" class="with-border">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<!-- Button -->
					<div class="col-xl-12">
						<input type="hidden" name="action" value="user_setting">
						<input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
						<button type="submit" class="submit button ripple-effect big margin-top-30">Save Changes</a>
					</div>

				</form>
			</div>
			<!-- Row / End -->

			<?php require_once("include/pages/footer_dashboard.php"); ?>

		</div>
	</div>
	<!-- Dashboard Content / End -->

</div>
<!-- Dashboard Container / End -->

</div>
<!-- Wrapper / End -->

<?php require_once("include/pages/script.php"); ?>

<!-- Snackbar // documentation: https://www.polonel.com/snackbar/ -->
<script>
// Snackbar for user status switcher
$('#snackbar-user-status label').click(function() { 
	Snackbar.show({
		text: 'Your status has been changed!',
		pos: 'bottom-center',
		showAction: false,
		actionText: "Dismiss",
		duration: 3000,
		textColor: '#fff',
		backgroundColor: '#383838'
	}); 
}); 
</script>

<!-- Chart.js // documentation: http://www.chartjs.org/docs/latest/ -->
<script src="js/chart.min.js"></script>
<script>
	Chart.defaults.global.defaultFontFamily = "Nunito";
	Chart.defaults.global.defaultFontColor = '#888';
	Chart.defaults.global.defaultFontSize = '14';

	var ctx = document.getElementById('chart').getContext('2d');

	var chart = new Chart(ctx, {
		type: 'line',

		// The data for our dataset
		data: {
			labels: ["January", "February", "March", "April", "May", "June"],
			// Information about the dataset
	   		datasets: [{
				label: "Views",
				backgroundColor: 'rgba(42,65,232,0.08)',
				borderColor: '#2a41e8',
				borderWidth: "3",
				data: [196,132,215,362,210,252],
				pointRadius: 5,
				pointHoverRadius:5,
				pointHitRadius: 10,
				pointBackgroundColor: "#fff",
				pointHoverBackgroundColor: "#fff",
				pointBorderWidth: "2",
			}]
		},

		// Configuration options
		options: {

		    layout: {
		      padding: 10,
		  	},

			legend: { display: false },
			title:  { display: false },

			scales: {
				yAxes: [{
					scaleLabel: {
						display: false
					},
					gridLines: {
						 borderDash: [6, 10],
						 color: "#d8d8d8",
						 lineWidth: 1,
	            	},
				}],
				xAxes: [{
					scaleLabel: { display: false },  
					gridLines:  { display: false },
				}],
			},

		    tooltips: {
		      backgroundColor: '#333',
		      titleFontSize: 13,
		      titleFontColor: '#fff',
		      bodyFontColor: '#fff',
		      bodyFontSize: 13,
		      displayColors: false,
		      xPadding: 10,
		      yPadding: 10,
		      intersect: false
		    }
		},
	});
</script>