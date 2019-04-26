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
				<h2>Register</h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="./index">Home</a></li>
						<li>Register</li>
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

			<form method="post" id="register-account-form" action="include/process.php">
				<div class="login-register-page">
					<!-- Welcome Text -->
					<div class="welcome-text">
						<h3 style="font-size: 26px;">Let's create your account!</h3>
						<span>Already have an account? <a href="./login">Log In!</a></span>
					</div>

					<?php if(isset($_SESSION['error'])) { ?>
						<div class="notification error closeable">
							<p><?php echo $_SESSION['error']; ?></p>
							<a class="close" href="#"></a>
						</div>
						<?php unset($_SESSION['error']); ?>
					<?php } ?>
						

					<!-- Form -->
					<div class="input-with-icon-left">
						<i class="icon-material-outline-account-circle"></i>
						<input type="text" class="input-text with-border" name="username" id="username-register" placeholder="Username" required/>
					</div>

					<div class="input-with-icon-left">
						<i class="icon-material-baseline-mail-outline"></i>
						<input type="text" class="input-text with-border" name="email" id="emailaddress-register" placeholder="Email Address" required/>
					</div>

					<div class="input-with-icon-left" title="Should be at least 6 characters long" data-tippy-placement="bottom">
						<i class="icon-material-outline-lock"></i>
						<input type="password" class="input-text with-border" name="password" id="password-register" placeholder="Password" required/>
					</div>

					<div class="input-with-icon-left">
						<i class="icon-material-outline-lock"></i>
						<input type="password" class="input-text with-border" name="confirm_password" id="password-repeat-register" placeholder="Repeat Password" required/>
					</div>
					<input type="hidden" name="action" value="register">
					
					<!-- Button -->
					<button class="button full-width button-sliding-icon ripple-effect margin-top-10" type="submit" form="register-account-form">Register <i class="icon-material-outline-arrow-right-alt"></i></button>
				</div>
			</form>

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