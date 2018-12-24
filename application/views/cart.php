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
	<!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
	<![endif]-->

</head>

<body class="bg">

	<!-- ===============================================header section -->
	<header class="top-header">
		<div class="container">
			<div class="row">
				<div class="col-xs-4 header-logo">
					<br>
					<a href="index.html"><img src="<?php echo base_url(); ?>/assets/img/logo2.PNG" alt="Logo" class="img-responsive logo"></a>
				</div>

				<div class="col-md-7">
					<nav class="navbar navbar-default">
						<div class="container-fluid nav-bar">
							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header">
								<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div>

							<!-- Collect the nav links, forms, and other content for toggling -->
							<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

								<ul class="nav navbar-nav navbar-right">
									<li><a class="menu active" onclick="removeSearchInput()" href="<?php echo base_url(); ?>">Home</a></li>
									<li><a class="menu" href="#project">Rent</a></li>
									<li><a class="menu" href="#buy">Buy </a></li>
									<li><a class="menu" href="#sell">Sell </a></li>
									<!--<li><a class="menu blink_me" href="#New Items"><strong>New Items</strong></a></li>-->
									<li><a class="popup-with-zoom-anim menu" style="margin:0px;" href="#small-dial">Contact Us</a></li>
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
		<div class="text-hidden text-white" style="padding-bottom:70px;">
			<p>.</p>
		</div>
	</section>

<div class="container">
		<div class="row center" style="padding: 0px;">
			<h1 style="color:#e61818;">My Favorites</h1>
		</div>
	</div>
	<!--filter search-->
	
	<div class="reg">
    <span class="head text-danger"></span>
    <!-- Popup-Box -->
    <!--<div class="popup w3l border border-info">-->
    <div id="small-dial" class="mfp-hide aits" style="width: 450px;">
        <div class="pop_up agileits">
                <form autocomplete="off" action="<?php echo base_url("properties/sendMessage"); ?>" method="post" class="form-horizontal bg-light py-2"
                      role="form" id="usrform">
                    <div class="mx-auto bg">
                        <div class="form-group">
                            <div class="col-sm-12 text-center">
                                <h1 class="text-primary"><strong>Contact Us!</strong></h1>
                            </div>
                        </div>

			<div class="form-group">
                            <div class="col-sm-12 text-center">
                                <span style="color: white; font-size: larger;">Please feel free to ask any questions. Our staff will contact you shortly.</span><br><br>
                                <span style="color: white;">Subject:</span><br>
								<input name="subject" type="text" placeholder="Subject" style="width: 420px; margin-bottom:15px;"/><br>
								<span style="color: white;">Message:</span><br>
								<textarea rows="4" cols="57" name="message" form="usrform" ></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 text-center">
                                <button class="btn bg-primary rounded" type="submit">
                                    Send
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
        </div>
    </div>
    <!--</div>-->
    <button title="Close (Esc)" type="button" class="mfp-close w3layouts">Ã—</button>
    <!-- //Popup-Box -->
</div>
	
	<!-- about section -->
	<section class="about" id="project">
	<div class="container">
		<div class="row">
			<?php foreach($results as $datas){
        foreach($datas as $data){
          //echo $data->name; ?>
				<div class="col-md-4 col-sm-6">
					<div class="single-about-detail clearfix del_<?php echo $data->id; ?>">
						<div class="about-img property">
							<a type="button" onclick="delete_from_cart(<?php echo $data->id; ?>, <?php echo $_SESSION['id']; ?>)"  title="Remove Form Cart" class="btn2"><img class="img-responsive" alt="cart" src="<?php echo base_url(); ?>/assets/img/shopping_cart_delete.png"/></a>
							<img class="img-responsive" src="<?php echo base_url(); ?>/assets/<?php echo $data->image; ?>" alt="Property">
						</div>
						<div class="about-details text-center">
							<div class="pentagon-text">
								<h1><?php echo $data->price; ?></h1>
							</div>
							<div>
								<h3><?php echo $data->name; ?></h3>
								<p><?php echo $data->address; ?></p>
								<p><?php echo trim($data->region); ?></p>
								<table class="table" style="color: white; margin-top: -9px;">
									<tr>
										<td>Property Status: <?php echo $data->property_status; ?></td>
										<td>Property Type : <?php echo $data->property_type; ?></td>
									</tr>
								</table>
								<table class="table" style="color: white; margin-top: -12px;">
									<tr>
										<td>Bedroom : <?php echo $data->bedrooms; ?></td>
										<td>Bathroom : <?php echo $data->bathrooms; ?></td>
										<td>Floors : <?php echo $data->floors; ?></td>
										<td>Lot m<sup>2</sup> : <?php echo $data->lot; ?></td>
									</tr>
								</table>
								<table class="table" style="color: white; margin-top: -12px;">
									<tr>
										<td>Construction m<sup>2</sup> : <?php echo $data->construction; ?></td>
										<td>Days On Market : <?php echo $data->days_on_market; ?></td>
									</tr>
								</table>
							</div>
							<!-- <p> It’s easy to see why the Asquith demographic has a propensity towards families, particularly those with young children. Well known for its safe and family orientated community there really is no place better to enjoy the outdoors, Immerse yourself in nature’s wonders including Sydney’s largest national parklands just a short drive away and less than 300m away you have local shops and restaurants in the Town Centre as well as Asquith station.  </p> -->
						</div>
					</div>
				</div>
			<?php }} ?>
		</div>
	</div>
	</section>
	<!-- end of about section -->


	<!-- footer starts here -->
	<footer class="footer clearfix">
		<div class="container">
			<div class="row">
				<div class="col-xs-6 footer-para">
					<p>1st International Realty. All right reserved</p>
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
	function delete_from_cart(id, user_id){
			console.log(id);
			console.log(user_id);
			var data = {
				'property_id': id,
				'user_id': user_id
			}
			$.ajax({

		url: "<?php echo base_url("login/removeFromCart"); ?>",

		type: "POST",
		data: data,
		success: function(data){

		}});
		$('.del_'+id).hide();
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
