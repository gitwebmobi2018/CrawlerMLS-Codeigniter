<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LOGIN</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/login.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>/assets/js/custom.js"></script>
</head>

<body class="bg">
<div class="reg w3l aits">
    <span class="head text-danger"></span>
    <!-- Popup-Box -->
    <div class="popup w3l border border-info">
    <div id="small-dialog" class="mfp-hide aits">
        <div class="pop_up agileits ">
            <div class="register w3layouts">
                <form name="myForm" autocomplete="off" action="<?php echo base_url("login/userRegister"); ?>" method="post" onsubmit="return validateForm()" class="form-horizontal bg-light py-2"
                      role="form">
                    <div class="mx-auto">
                        <div class="form-group">
                            <div class="col-sm-12 text-center">
                                <h1 style="font-size: 30px;"><strong>Create An Account</strong></h1>
                            </div>
							<p style="float: right;"><span class="error">* Required field</span></p>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <h5>First Name</h5>
								<span class="error">*</span>
								<?php if (!empty($firstNameErr)) {?>
									<span class="error"><?php echo $firstNameErr;?></span>
								<?php }?>
                                <input name="first_name" type="text" placeholder="Name"
                                       class="form-control"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <h5>Last Name</h5>
								<span class="error">*</span>
								<?php if (!empty($lastNameErr)) {?>
									<span class="error"><?php echo $lastNameErr;?></span>
								<?php }?>
                                <input name="last_name" type="text"
                                       placeholder="Last Name" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <h5>E-mail</h5>
								<span class="error">*</span>
								<?php if (!empty($emailErr)) {?>
									<span class="error"><?php echo $emailErr;?></span>
								<?php }?>
                                <input id="email" name="email" type="text" placeholder="Email"
                                       class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <h5>Password</h5>
								<span class="error">*</span>
								<?php if (!empty($passwordErr)) {?>
									<span class="error"><?php echo $passwordErr;?></span>
								<?php }?>
                                <input name="password" type="password" placeholder="Password" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 text-center" style="text-align: center;">
								<input id='validate' name="Submit" value="Sign Up" type="Submit"/>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <button title="Close (Esc)" type="button" class="mfp-close w3layouts">×</button>
    <!-- //Popup-Box -->
</div>

<div class="container w3layouts agileits">
    <h2 style="font-size: 40px;">LOGIN</h2><br/>
    <img src="<?php echo base_url(); ?>/assets/img/logo2.PNG" class="img-responsive center-block" width="300" height="180" alt="Logo"/>
    <div class="login w3layouts">
        <form action="<?php echo base_url("login"); ?>" method="POST" class="text-orange">
            <br/>
            <h5>Email</h5><br/>
            <input type="text" name="email" th:placeholder="Email"
                   class="user"/> <br/>
            <h5>Password</h5><br/>
            <input type="password" th:placeholder="Password"
                   name="password" class="pass"/> <br/>

            <input style="margin-right: 80px;" name="Submit" value="LOGIN" type="Submit"/>
        </form>
        <div class="clear"></div>
    </div>
	<span>Are you new here?<a class="popup-with-zoom-anim" id="myCheck" href="#small-dialog">Create an account.</a></span>
	<!--<a class="popup-with-zoom-anim hvr-underline-from-left" href="#small-dialog">Register Here</a>-->
    <div class="clear"></div>
	<?php if (!empty($emailErr)) {?>
	<h2 class="error"><?php echo $emailErr;?></h2>
	<?php }?>
</div>

<script src="<?php echo base_url(); ?>/assets/js/jquery.magnific-popup1.js" type="text/javascript"></script>
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
