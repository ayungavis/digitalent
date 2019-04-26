<?php
	require_once("include/functions.php");

	if(isset($_SESSION['auth'])) header("location: ./dashboard");
?>

<?php require_once("include/pages/header_start.php"); ?>

<?php require_once("include/pages/library.php"); ?>

<?php require_once("include/pages/header_end.php"); ?>

<body>

<!-- Wrapper -->
<div id="wrapper">

<?php require_once("include/pages/navbar_white.php"); ?>

<!-- Content
================================================== -->
<div id="titlebar" class="white margin-bottom-30">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>Log In</h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="./index">Home</a></li>
						<li>Log In</li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
</div>

<!-- Page Content
================================================== -->
<div class="container">
	<div class="row">
		<div class="col-xl-5 offset-xl-3">


			<div class="login-register-page">
				<!-- Welcome Text -->
				<div class="welcome-text">
					<h3>We're glad to see you again!</h3>
					<span>Don't have an account? <a href="./register">Sign Up!</a></span>
				</div>

				<?php if(isset($_SESSION['error'])) { ?>
					<div class="notification error closeable">
						<p><?php echo $_SESSION['error']; ?></p>
						<a class="close" href="#"></a>
					</div>
					<?php unset($_SESSION['error']); ?>
				<?php } ?>

				<?php if(isset($_SESSION['logout'])) { ?>
					<div class="notification success closeable">
						<p><?php echo $_SESSION['logout']; ?></p>
						<a class="close" href="#"></a>
					</div>
					<?php unset($_SESSION['logout']); ?>
				<?php } ?>
					
				<!-- Form -->
				<form method="post" id="login-form" action="include/process.php">
					<div class="input-with-icon-left">
						<i class="icon-material-baseline-mail-outline"></i>
						<input type="text" class="input-text with-border" name="username" id="emailaddress" placeholder="Username" required/>
					</div>

					<div class="input-with-icon-left">
						<i class="icon-material-outline-lock"></i>
						<input type="password" class="input-text with-border" name="password" id="password" placeholder="Password" required/>
					</div>
					<!-- <a href="./forgot-password" class="forgot-password">Forgot Password?</a> -->
					<input type="hidden" name="action" value="login">
				</form>
				
				<!-- Button -->
				<button class="button full-width button-sliding-icon ripple-effect margin-top-10" type="submit" form="login-form">Log In <i class="icon-material-outline-arrow-right-alt"></i></button>
			</div>

		</div>
	</div>
</div>


<!-- Spacer -->
<div class="margin-top-70"></div>
<!-- Spacer / End-->

<?php require_once("include/pages/footer.php"); ?>

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


<!-- Google Autocomplete -->
<script>
	function initAutocomplete() {
		 var options = {
		  types: ['(cities)'],
		  // componentRestrictions: {country: "us"}
		 };

		 var input = document.getElementById('autocomplete-input');
		 var autocomplete = new google.maps.places.Autocomplete(input, options);
	}

	// Autocomplete adjustment for homepage
	if ($('.intro-banner-search-form')[0]) {
	    setTimeout(function(){ 
	        $(".pac-container").prependTo(".intro-search-field.with-autocomplete");
	    }, 300);
	}

</script>

<!-- Google API -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAgeuuDfRlweIs7D6uo4wdIHVvJ0LonQ6g&libraries=places&callback=initAutocomplete"></script>

</body>
</html>