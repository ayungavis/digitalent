<?php
	require_once("include/functions.php");
	if(!isset($_SESSION["auth"])) header("Location: ./login");

	$db->bind("user_id", $_SESSION['user_id']);
	$query = "SELECT image_id FROM image_data WHERE user_id = :user_id";
	$data_image = $db->query($query);
	$total_image = count($data_image);
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
				<h3>Image Data Results</h3>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="./index">Home</a></li>
						<li><a href="./dashboard">Dashboard</a></li>
						<li>Image Data Results</li>
					</ul>
				</nav>
			</div>
	
			<!-- Row -->
			<div class="row">

				<!-- Dashboard Box -->
				<div class="col-xl-12">
					<div class="dashboard-box margin-top-0">

						<!-- Headline -->
						<div class="headline">
							<h3><i class="icon-material-outline-business-center"></i> My Image Data Results</h3>
						</div>

						<div class="content">
							<ul class="dashboard-box-list">
								<?php if($total_image != 0) { ?>
									<?php 
										$db->bind("user_id", $_SESSION['user_id']);
										$query = "SELECT * FROM image_data WHERE user_id = :user_id ORDER BY timestamp DESC";
										$data_image = $db->query($query);
										foreach($data_image as $row) {
									?>
										<li>
											<!-- Job Listing -->
											<div class="job-listing">

												<!-- Job Listing Details -->
												<div class="job-listing-details">

													<!-- Logo -->
		 											<a href="#" class="job-listing-company-logo">
														<img src="user_images/<?php echo $row['filename']; ?>" alt="">
													</a>

													<!-- Details -->
													<div class="job-listing-description">
														<h3 class="job-listing-title"><?php echo diagnosis($row['diagnosis']); ?></h3>

														<!-- Job Listing Footer -->
														<div class="job-listing-footer">
															<ul>
																<li><i class="icon-material-outline-date-range"></i> Added on <?php echo show_date($row['timestamp']); ?></li>
															</ul>
														</div>
													</div>
												</div>
											</div>

											<!-- Buttons -->
											<div class="buttons-to-right always-visible">
												<a href="#" class="button ripple-effect"><i class="icon-material-outline-check"></i> Confidence Score: <?php echo $row['confidence_score']; ?></a>
												<a href="#" class="button gray ripple-effect ico" title="View Detail" data-tippy-placement="top"><i class="icon-feather-eye"></i></a>
												<a href="#" class="button gray ripple-effect ico" title="Remove" data-tippy-placement="top"><i class="icon-feather-trash-2"></i></a>
											</div>
										</li>
									<?php } ?>
								<?php } else { ?>
									<div align="center">
										<br><p>You didn't upload image yet.</p><br>
									</div>
								<?php } ?>

							</ul>
						</div>
					</div>
				</div>

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