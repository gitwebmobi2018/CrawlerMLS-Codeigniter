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
									<li><a class="menu" href="#project">Rent</a></li>
									<li><a class="menu" href="#buy">Buy </a></li>
									<li><a class="menu" href="#sell">Sell </a></li>
									<!--<li><a class="menu blink_me" href="#New Items"><strong>New Items</strong></a></li>-->
									<li><a class="menu" href="<?php echo base_url("/showcart"); ?>">My Cart </a></li>
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
		<div class="text-hidden text-white" style="padding-bottom:80px;">
			<p>.</p>
		</div>
	</section>


	<!--filter search-->
	<div class="container">
		<div class="row">
			<form class="form-inline center" action="<?php echo base_url("properties/search");  ?>" method="POST"  onSubmit="return saveSearchInput();">
					<div class="search">
	  				<label for="startprice">Starting Price:</label>
	  				<input type="number" id="startprice" placeholder="Numbers Only" name="lower" value="">
	  				<label for="endprice">Ending Price</label>
	  				<input type="number" id="endprice" placeholder="Numbers Only" name="higher" value="">
	  				<input type="hidden" id="bedrooms" placeholder="0" name="bedrooms">
	  				<input type="hidden" id="bathrooms" placeholder="0" name="bathrooms">
	  				<input type="hidden" id="floors" placeholder="0" name="floors">
	  				<input type="hidden" id="lot" placeholder="0" name="lot">
	  				<input type="hidden" id="construction" placeholder="0" name="construction">
					<button class="btn" style="margin-left: 66px;" type="submit">Search</button>
					<a class="popup-with-zoom-anim logout" style="margin-left: 20px;" href="#small-dialog">Advance Search</a>

					</div>
				</form>
		</div>
	</div>

<div class="reg">
    <span class="head text-danger"></span>
    <!-- Popup-Box -->
    <!--<div class="popup w3l border border-info">-->
    <div id="small-dialog" class="mfp-hide aits" style="font-family: Arial, Helvetica, sans-serif;">
        <div class="pop_up agileits ">
            <div>
                <form autocomplete="off" action="<?php echo base_url("properties/search"); ?>" method="post" class="form-horizontal bg-light py-2"
                      role="form">
                    <div class="mx-auto bg">
                        <div class="form-group">
                            <div class="col-sm-12 text-primary text-center">
                                <h1><strong>Advance Search</strong></h1>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <span style="color: white">Starting Price:</span>
                                <input type="number" name="lower" placeholder="Enter Starting Price"
                                       class="form-control"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <span style="color: white">Ending Price:</span>
                                <input name="higher" type="number" placeholder="Enter Ending Price" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <span style="color: white">Bedroom</span>
                                <input name="bedrooms" type="number" placeholder="0"
                                       class="form-control"/> 
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <span style="color: white">Bathroom</span>
                                <input name="bathrooms" type="number" placeholder="0" class="form-control"/> 
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <span style="color: white">Floors</span>
                                <input name="floors" type="number" placeholder="0" class="form-control"/> 
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <span style="color: white">lot m<sup>2</sup></span>
                                <input name="lot" type="number" placeholder="0" class="form-control"/> 
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <span style="color: white">construction m<sup>2</sup></span>
                                <input name="construction" type="number" placeholder="0" class="form-control"/> 
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12 text-center">
                                <button class="bg-primary rounded" type="submit">
                                    Search
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--</div>-->
    <button title="Close (Esc)" type="button" class="mfp-close w3layouts">×</button>
    <!-- //Popup-Box -->

</div>

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
			<?php foreach($results as $data){ ?>
				<div class="col-md-4 col-sm-6 fit-content" style="height: 700px;">
					<div class="single-about-detail clearfix">
						<div class="about-img property">
							<a type="button" onclick="add_to_cart(<?php echo $data->id; ?>, <?php echo $_SESSION['id']; ?>)"  title="Add To Cart" class="btn"><img class="img-responsive" alt="cart" src="<?php echo base_url(); ?>/assets/img/shopping_cart_add.png"/></a>
							<img class="img-responsive" src="<?php echo base_url(); ?>/assets/<?php echo $data->image; ?>" alt="Property">
						</div>
						<div class="about-details text-center">
							<div class="pentagon-text">
								<h1><?php echo $data->price_with_currency; ?></h1>
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
			<?php } ?>
		</div>
	</div>
	</section>

	<!-- end of about section -->
	<div class="center">
		<?php
		if($links != "NULL"){echo $links;} ?>
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
