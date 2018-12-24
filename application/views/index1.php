<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>1st International Realty</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/costom.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,400,800,700,300' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=BenchNine:300,400,700' rel='stylesheet' type='text/css'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>/assets/js/custom.js"></script>
	</head>

<body class="bg" onload="checkCookies()">

	<!-- ===============================================header section -->

	<header class="top-header">
		<div class="container">
			<div class="row">
				<div class="col-xs-4 header-logo">
					<br>
					<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>/assets/img/logo2.PNG" alt="Logo" class="logo"></a>
				</div>

				<div class="col-md-7">
					<nav class="navbar navbar-default">
						<div class="container-fluid nav-bar">
							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header">
								<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div>

							<!-- Collect the nav links, forms, and other content for toggling -->
							<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


								<ul class="nav navbar-nav navbar-right">
									<li><a class="menu active" onclick="removeSearchInput()" href="<?php echo base_url(); ?>">Home</a></li>
								</ul>
							</div><!-- /navbar-collapse -->
						</div><!-- / .container-fluid -->
					</nav>
				</div>
				<div class="col-md-1">
					<br>
					<a class="logout" onclick="removeSearchInput()" href="<?php echo base_url("login/logout"); ?>"><strong>Logout</strong></a>
				</div>
			</div>
		</div>
	</header>
	<!-- end of header area -->

	<!--Section brake-->
	<section>
		<div class="text-hidden text-white" style="padding-bottom:80px;">
			<p>.</p>
		</div>
	</section>

<div class="container">
<div class="row text-center text-primary" style="padding-bottom:390px; font-size:50px;">
Thank you!! Our staff will contact you shortly.
</div>
</div>

	<!-- footer starts here -->
	<footer class="footer clearfix">
		<div class="container">
			<div class="row">
				<div class="col-xs-6 footer-para">
					<p>&copy; 1st International Realty. All right reserved</p>
				</div>
				<div class="col-xs-6 text-right">
					<a href=""><i class="fa fa-facebook"></i></a>
					<a href=""><i class="fa fa-twitter"></i></a>

				</div>
			</div>
		</div>
	</footer>

	<!-- script tags
============================================================= -->
	
	<script src="<?php echo base_url(); ?>/assets/js/jquery-2.1.1.js"></script>
	<script src="<?php echo base_url(); ?>/assets/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>/assets/js/jquery.magnific-popup1.js" type="text/javascript"></script>
	<script>
	function add_to_cart(id, user_id){
		if (confirm("Are you sure you want to add this item to your cart?")) {
        var data = {
				'property_id': id,
				'user_id': user_id
			}
			$.ajax({

		url: "<?php echo base_url("login/addToCart"); ?>",

		type: "POST",
		data: data,
		success: function(data){

		}});
    } else {
		
    }
			
		}	
	</script>

<script>
    $(document).ready(function () {
        $('.popup-with-zoom-anim').magnificPopup({
            type: 'inline',
            fixedContentPos: false,
            fixedBgPos: true,
            overflowY: 'auto',
            closeBtnInside: true,
            preloader: false,
            midClick: true,
            removalDelay: 300,
            mainClass: 'my-mfp-zoom-in'
        });
    });
</script>
</body>

</html>
