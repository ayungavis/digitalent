<?php
	$db->bind("user_id", $_SESSION['user_id']);
	$query = "SELECT p_id, diagnosis time FROM patient_data WHERE user_id = :user_id";
	$data_text = $db->query($query);
	$total_text = count($data_text);

	$db->bind("user_id", $_SESSION['user_id']);
	$query = "SELECT * FROM image_data WHERE user_id = :user_id";
	$data_image = $db->query($query);
	$total_image = count($data_image);
?>

<!-- Dashboard Sidebar
================================================== -->
<div class="dashboard-sidebar">
	<div class="dashboard-sidebar-inner" data-simplebar>
		<div class="dashboard-nav-container">

			<!-- Responsive Navigation Trigger -->
			<a href="#" class="dashboard-responsive-nav-trigger">
				<span class="hamburger hamburger--collapse" >
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</span>
				<span class="trigger-title">Dashboard Navigation</span>
			</a>
			
			<!-- Navigation -->
			<div class="dashboard-nav">
				<div class="dashboard-nav-inner">

					<ul data-submenu-title="Main Menu">
						<li><a href="./dashboard"><i class="icon-material-outline-dashboard"></i> Dashboard</a></li>
						<li><a href="#"><i class="icon-material-outline-assignment"></i> Text Data</a>
							<ul>
								<li><a href="add?action=text">Input Text</a></li>
								<li><a href="result?get=text">Results <span class="nav-tag"><?php echo $total_text; ?></span></a></li>
							</ul>	
						</li>
						<li><a href="#"><i class="icon-material-outline-crop-original"></i> Image Data</a>
							<ul>
								<li><a href="add?action=image">Upload Image</a></li>
								<li><a href="result?get=image">Results <span class="nav-tag"><?php echo $total_image; ?></span></a></li>
							</ul>	
						</li>
					</ul>

					<ul data-submenu-title="Account">
						<li><a href="./setting"><i class="icon-material-outline-settings"></i> Settings</a></li>
						<li><a href="./logout"><i class="icon-material-outline-power-settings-new"></i> Logout</a></li>
					</ul>
					
				</div>
			</div>
			<!-- Navigation / End -->

		</div>
	</div>
</div>
<!-- Dashboard Sidebar / End -->