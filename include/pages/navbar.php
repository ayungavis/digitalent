<?php require_once("include/functions.php"); ?>

<!-- Header Container
================================================== -->
<header id="header-container" class="fullwidth transparent-header">

	<!-- Header -->
	<div id="header">
		<div class="container">
			
			<!-- Left Side Content -->
			<div class="left-side">
				
				<!-- Logo -->
				<div id="logo">
					<a href="./index"><img src="images/logo_white.png" data-sticky-logo="images/logo_default.png" data-transparent-logo="images/logo_white.png" alt="logo"></a>
				</div>

				<!-- Main Navigation -->
				<nav id="navigation">
					<ul id="responsive">

						<li><a href="./index">Home</a></li>

						<li><a href="./about">About</a></li>

						<li><a href="./information">Information</a></li>

						<li><a href="./contact">Contact</a></li>

					</ul>
				</nav>
				<div class="clearfix"></div>
				<!-- Main Navigation / End -->
				
			</div>
			<!-- Left Side Content / End -->


			<!-- Right Side Content / End -->
			<div class="right-side">

				<?php if(isset($_SESSION['auth'])) { ?>
					
					<!-- User Menu -->
					<div class="header-widget">

						<!-- Messages -->
						<div class="header-notifications user-menu">
							<div class="header-notifications-trigger">
								<a href="#"><div class="user-avatar status-online"><img src="images/default-avatar.png" alt=""></div></a>
							</div>

							<!-- Dropdown -->
							<div class="header-notifications-dropdown">

								<!-- User Status -->
								<div class="user-status">

									<!-- User Name / Avatar -->
									<div class="user-details">
										<div class="user-avatar status-online"><img src="images/default-avatar.png" alt=""></div>
										<div class="user-name">
											Tom Smith <span>Freelancer</span>
										</div>
									</div>

								</div>
							
								<ul class="user-menu-small-nav">
									<li><a href="./dashboard"><i class="icon-material-outline-dashboard"></i> Dashboard</a></li>
									<li><a href="./setting"><i class="icon-material-outline-settings"></i> Settings</a></li>
									<li><a href="./logout"><i class="icon-material-outline-power-settings-new"></i> Logout</a></li>
								</ul>

							</div>
						</div>

					</div>
					<!-- User Menu / End -->

				<?php } else { ?>

					<!-- User Menu -->
					<div class="header-widget">

						<!-- Main Navigation -->
						<nav id="navigation">
							<ul>
								<li><a href="./login">Login / Register</a></li>
							</ul>
						</nav>
					</div>
					<!-- User Menu / End -->

				<?php } ?>

				<!-- Mobile Navigation Button -->
				<span class="mmenu-trigger">
					<button class="hamburger hamburger--collapse" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>
				</span>

			</div>
			<!-- Right Side Content / End -->

		</div>
	</div>
	<!-- Header / End -->

</header>
<div class="clearfix"></div>
<!-- Header Container / End -->