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
				<h2>Information</h2>
				<span>Breast Cancer Detection</span>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="./index">Home</a></li>
						<li>Information</li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
</div>

<!-- Icon Boxes -->
<div class="section padding-top-65 padding-bottom-65">
	<div class="container">
		<div class="row">
			<p><strong>Cancer</strong> is a disease in which cells, almost anywhere in the body, begin to divide uncontrollably. When the growth occurs in solid tissue such as an organ, muscle, or bone, it’s called a <strong>tumor</strong>, which may spread to surrounding tissues through the blood and lymph systems.</p>
			<p><strong>Breast cancer</strong> is cancer that forms in the cells of the breasts. Symptoms include a lump or thickening of the breast, and changes to the skin or the nipple. There are two types of solid tumors: <strong>malignant</strong> (cancerous) and <strong>benign</strong> (noncancerous)</p>
			<p>Convolutional Neural Networks are a bit different. First of all, the layers are organised in 3 dimensions: width, height and depth. Further, the neurons in one layer do not connect to all the neurons in the next layer but only to a small region of it. Lastly, the final output will be reduced to a single vector of probability scores, organized along the depth dimension.</p>
		</div>
	</div>
</div>
<!-- Icon Boxes / End -->

<!-- Features Cities -->
<div class="section gray padding-top-65 padding-bottom-50">
	<div class="container">
		<div class="row">

			<!-- Section Headline -->
			<div class="col-xl-12">
				<div class="section-headline centered margin-top-0 margin-bottom-45">
					<h3>Types of Breast Cancer</h3>
				</div>
			</div>

			<div class="col-xl-3 col-md-6">
				<!-- Photo Box -->
				<a href="./types/adenosis" class="photo-box" data-background-image="images/adenosis.png">
					<div class="photo-box-content">
						<h3>Adenosis</h3>
						<span>Benign</span>
					</div>
				</a>
			</div>
			
			<div class="col-xl-3 col-md-6">
				<!-- Photo Box -->
				<a href="./types/fibroadenoma" class="photo-box" data-background-image="images/fibroadenoma.png">
					<div class="photo-box-content">
						<h3>Fibroadenoma</h3>
						<span>Benign</span>
					</div>
				</a>
			</div>
			
			<div class="col-xl-3 col-md-6">
				<!-- Photo Box -->
				<a href="./types/phyllodes-tumor" class="photo-box" data-background-image="images/phyllodes-tumor.png">
					<div class="photo-box-content">
						<h3>Phyllodes Tumor</h3>
						<span>Benign</span>
					</div>
				</a>
			</div>

			<div class="col-xl-3 col-md-6">
				<!-- Photo Box -->
				<a href="./types/tubular-adenoma" class="photo-box" data-background-image="images/tubular-adenoma.png">
					<div class="photo-box-content">
						<h3>Tubular Adenoma</h3>
						<span>Benign</span>
					</div>
				</a>
			</div>

			<div class="col-xl-3 col-md-6">
				<!-- Photo Box -->
				<a href="./types/ductal-carcinoma" class="photo-box" data-background-image="images/ductal-carcinoma.png">
					<div class="photo-box-content">
						<h3>Ductal Carcinoma</h3>
						<span>Malignant</span>
					</div>
				</a>
			</div>
			
			<div class="col-xl-3 col-md-6">
				<!-- Photo Box -->
				<a href="./types/lobular-carcinoma" class="photo-box" data-background-image="images/lobular-carcinoma.png">
					<div class="photo-box-content">
						<h3>Lobular Carcinoma</h3>
						<span>Malignant</span>
					</div>
				</a>
			</div>
			
			<div class="col-xl-3 col-md-6">
				<!-- Photo Box -->
				<a href="./types/mucinous-carcinoma" class="photo-box" data-background-image="images/mucinous-carcinoma.png">
					<div class="photo-box-content">
						<h3>Mucinous Carcinoma</h3>
						<span>Malignant</span>
					</div>
				</a>
			</div>

			<div class="col-xl-3 col-md-6">
				<!-- Photo Box -->
				<a href="./types/papillary-carcinoma" class="photo-box" data-background-image="images/papillary-carcinoma.png">
					<div class="photo-box-content">
						<h3>Papillary Carcinoma</h3>
						<span>Malignant</span>
					</div>
				</a>
			</div>

		</div>
	</div>
</div>
<!-- Features Cities / End -->

<div class="section border-top padding-top-45 padding-bottom-45">
	<!-- Logo Carousel -->
	<div class="container">
		<div class="row">
			<div class="col-xl-12">
				<div align="center">
					<h2>Start diagnosis your breast cancer now!</h2>
					<a href="./register" class="button button-sliding-icon ripple-effect big margin-top-20">Create an Account <i class="icon-material-outline-arrow-right-alt"></i></a>
				</div>
			</div>
		</div>
	</div>
</div>

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