<?php 
	require_once("include/functions.php");
	if(!isset($_SESSION["auth"])) header("Location: ./login");
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
				<h3>Input Text</h3>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="./index">Home</a></li>
						<li><a href="./dashboard">Dashboard</a></li>
						<li>Input Text</li>
					</ul>
				</nav>
			</div>

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
								<h3><i class="icon-feather-folder-plus"></i> Mean Values</h3>
							</div>

							<div class="content with-padding padding-bottom-10">
								<div class="row">

									<div class="col-xl-4">
										<div class="submit-field">
											<h5>Radius</h5>
											<input type="text" class="with-border" name="radius_mean" required>
										</div>
									</div>

									<div class="col-xl-4">
										<div class="submit-field">
											<h5>Texture</h5>
											<input type="text" class="with-border" name="texture_mean" required>
										</div>
									</div>

									<div class="col-xl-4">
										<div class="submit-field">
											<h5>Perimeter</h5>
											<input type="text" class="with-border" name="perimeter_mean" required>
										</div>
									</div>

									<div class="col-xl-4">
										<div class="submit-field">
											<h5>Area</h5>
											<input type="text" class="with-border" name="area_mean" required>
										</div>
									</div>

									<div class="col-xl-4">
										<div class="submit-field">
											<h5>Smoothness</h5>
											<input type="text" class="with-border" name="smoothness_mean" required>
										</div>
									</div>

									<div class="col-xl-4">
										<div class="submit-field">
											<h5>Compactness</h5>
											<input type="text" class="with-border" name="compactness_mean" required>
										</div>
									</div>

									<div class="col-xl-4">
										<div class="submit-field">
											<h5>Concavity</h5>
											<input type="text" class="with-border" name="concavity_mean" required>
										</div>
									</div>

									<div class="col-xl-4">
										<div class="submit-field">
											<h5>Concave Points</h5>
											<input type="text" class="with-border" name="concave_points_mean" required>
										</div>
									</div>

									<div class="col-xl-4">
										<div class="submit-field">
											<h5>Symmetry</h5>
											<input type="text" class="with-border" name="symmetry_mean" required>
										</div>
									</div>								

									<div class="col-xl-12">
										<div class="submit-field">
											<h5>Fractal Dimension</h5>
											<input type="text" class="with-border" name="fractal_dimension_mean" required>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>

					<br>

					<!-- Dashboard Box -->
					<div class="col-xl-12">
						<div class="dashboard-box margin-top-0">

							<!-- Headline -->
							<div class="headline">
								<h3><i class="icon-feather-folder-plus"></i> Standard Error Values</h3>
							</div>

							<div class="content with-padding padding-bottom-10">
								<div class="row">

									<div class="col-xl-4">
										<div class="submit-field">
											<h5>Radius</h5>
											<input type="text" class="with-border" name="radius_se" required>
										</div>
									</div>

									<div class="col-xl-4">
										<div class="submit-field">
											<h5>Texture</h5>
											<input type="text" class="with-border" name="texture_se" required>
										</div>
									</div>

									<div class="col-xl-4">
										<div class="submit-field">
											<h5>Perimeter</h5>
											<input type="text" class="with-border" name="perimeter_se" required>
										</div>
									</div>

									<div class="col-xl-4">
										<div class="submit-field">
											<h5>Area</h5>
											<input type="text" class="with-border" name="area_se" required>
										</div>
									</div>

									<div class="col-xl-4">
										<div class="submit-field">
											<h5>Smoothness</h5>
											<input type="text" class="with-border" name="smoothness_se" required>
										</div>
									</div>

									<div class="col-xl-4">
										<div class="submit-field">
											<h5>Compactness</h5>
											<input type="text" class="with-border" name="compactness_se" required>
										</div>
									</div>

									<div class="col-xl-4">
										<div class="submit-field">
											<h5>Concavity</h5>
											<input type="text" class="with-border" name="concavity_se" required>
										</div>
									</div>

									<div class="col-xl-4">
										<div class="submit-field">
											<h5>Concave Points</h5>
											<input type="text" class="with-border" name="concave_points_se" required>
										</div>
									</div>

									<div class="col-xl-4">
										<div class="submit-field">
											<h5>Symmetry</h5>
											<input type="text" class="with-border" name="symmetry_se" required>
										</div>
									</div>								

									<div class="col-xl-12">
										<div class="submit-field">
											<h5>Fractal Dimension</h5>
											<input type="text" class="with-border" name="fractal_dimension_se" required>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>

					<br>

					<!-- Dashboard Box -->
					<div class="col-xl-12">
						<div class="dashboard-box margin-top-0">

							<!-- Headline -->
							<div class="headline">
								<h3><i class="icon-feather-folder-plus"></i> Worst Values</h3>
							</div>

							<div class="content with-padding padding-bottom-10">
								<div class="row">

									<div class="col-xl-4">
										<div class="submit-field">
											<h5>Radius</h5>
											<input type="text" class="with-border" name="radius_worst" required>
										</div>
									</div>

									<div class="col-xl-4">
										<div class="submit-field">
											<h5>Texture</h5>
											<input type="text" class="with-border" name="texture_worst" required>
										</div>
									</div>

									<div class="col-xl-4">
										<div class="submit-field">
											<h5>Perimeter</h5>
											<input type="text" class="with-border" name="perimeter_worst" required>
										</div>
									</div>

									<div class="col-xl-4">
										<div class="submit-field">
											<h5>Area</h5>
											<input type="text" class="with-border" name="area_worst" required>
										</div>
									</div>

									<div class="col-xl-4">
										<div class="submit-field">
											<h5>Smoothness</h5>
											<input type="text" class="with-border" name="smoothness_worst" required>
										</div>
									</div>

									<div class="col-xl-4">
										<div class="submit-field">
											<h5>Compactness</h5>
											<input type="text" class="with-border" name="compactness_worst" required>
										</div>
									</div>

									<div class="col-xl-4">
										<div class="submit-field">
											<h5>Concavity</h5>
											<input type="text" class="with-border" name="concavity_worst" required>
										</div>
									</div>

									<div class="col-xl-4">
										<div class="submit-field">
											<h5>Concave Points</h5>
											<input type="text" class="with-border" name="concave_points_worst" required>
										</div>
									</div>

									<div class="col-xl-4">
										<div class="submit-field">
											<h5>Symmetry</h5>
											<input type="text" class="with-border" name="symmetry_worst" required>
										</div>
									</div>								

									<div class="col-xl-12">
										<div class="submit-field">
											<h5>Fractal Dimension</h5>
											<input type="text" class="with-border" name="fractal_dimension_worst" required>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>

					<div class="col-xl-12">
						<input type="hidden" name="action" value="add_text">
						<input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
						<button type="submit" class="submit button ripple-effect big margin-top-30">Submit</button>
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