<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/costom.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
          integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body class="bg">


<div class="row" style="background-color: #7e3a4f;">
    <div class="col-md-3 mt-4 ml-4 logo">
        <img alt="Logo" width="150" height="100" class="img-responsive" src="<?php echo base_url(); ?>/assets/img/logo2.PNG"/>
    </div>
    <div class="col order-12 mt-4 mr-4 d-inline-block">
        <!--<form class="form-group" action="<?php echo base_url("properties/searchById");  ?>" method="POST">
					<div class="search" style="color: #fff;">
	  				<label for="startprice">Property ID:</label>
	  				<input class="text-dark" type="number" id="startprice" placeholder="Property ID" name="id">
					<button type="submit">Search</button>
					</div>
				</form>-->
    </div>
    <div class="col-sm-5 order-1 ml-4 text-center">
        <a href="#" class="text-danger text-center display-4 text-uppercase font-weight-bold brand" style="text-decoration: none;">1st International Realty</div>
	</div>
</div>		
<div class="row" style="margin-left:60px;">
  <?php
    echo $msg;
  ?>
</div>

<div class="reg">
    <span class="head text-danger"></span>
    <!-- Popup-Box -->
    <!--<div class="popup w3l border border-info">-->
    <div id="small-dialog" class="mfp-hide aits">
        <div class="pop_up agileits ">
            <div class="">
                <form autocomplete="off" action="<?php echo base_url("login/register"); ?>" method="post" class="form-horizontal bg-light py-2"
                      role="form">
                    <div class="mx-auto bg">
                        <div class="form-group">
                            <div class="col-sm-12 text-primary text-center">
                                <h1><strong>Registration Form</strong></h1>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <span style="color: white">Name</span>
                                <input name="first_name" type="text" placeholder="Name"
                                       class="form-control"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <span style="color: white">Last Name</span>
                                <input name="last_name" type="text"
                                       placeholder="Last Name" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <span style="color: white">E-mail</span>
                                <input name="email" type="text" placeholder="Email"
                                       class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <span style="color: white">Password</span>
                                <input name="password" type="password" placeholder="Password" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 text-center">
                                <button class="bg-primary rounded" type="submit">
                                    Register User
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--</div>-->
    <button title="Close (Esc)" type="button" class="mfp-close w3layouts">Ã—</button>
    <!-- //Popup-Box -->
</div>

<div class="reg">
    <span class="head text-danger"></span>
    <!-- Popup-Box -->
    <!--<div class="popup w3l border border-info">-->
    <div id="small-dial" class="mfp-hide aits">
        <div class="pop_up agileits ">
            <div class="">
                <form autocomplete="off" action="<?php echo base_url("login/change"); ?>" method="post" class="form-horizontal bg-light py-2"
                      role="form">
                    <div class="mx-auto bg">
                        <div class="form-group">
                            <div class="col-sm-12 text-primary text-center">
                                <h1><strong>Change Credential</strong></h1>
                            </div>
                        </div>

			<div class="form-group">
                            <div class="col-sm-12">
                                <span style="color: white">Enter New Email:</span>
                                <input name="email" type="text"
                                       placeholder="Email" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <span style="color: white">Enter New Password:</span>
                                <input name="password" type="password" placeholder="Password"
                                       class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 text-center">
                                <button class="bg-primary rounded" type="submit">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--</div>-->
    <button title="Close (Esc)" type="button" class="mfp-close w3layouts">Ã—</button>
    <!-- //Popup-Box -->
</div>


<section>
<div class="container mt-4">
    <div class="row" style="background-color: rgba(255,255,255,0.5);">
        <div class="col py-2">
            <a href="#"><img src="<?php echo base_url(); ?>/assets/img/goBack.png"
                                                class="img-responsive center-block" width="45" height="45"
                                                alt="Back"/></a>
        </div>
        <div class="col order-12 text-right py-3">
            <div class="dropdown">
                <img class="img-responsive" alt="settings" src="<?php echo base_url(); ?>/assets/img/cog.png"/>
                <div class="dropdown-content">
		    <a class="popup-with-zoom-anim" href="#small-dialog">
			<small>Add User</small>
                    </a>
		    <a class="popup-with-zoom-anim" href="#small-dial">
			<small>Change password</small>
                    </a>
<a href="<?php echo base_url(); ?>/crawler_log.txt" target="_blank">
                        <small>Crawler Log</small>
                    </a>
                    <a href="<?php echo base_url(); ?>/email_log.txt" target="_blank">
                        <small>Email Log</small>
                    </a>
<a href="<?php echo base_url("login/logout"); ?>">
                        <small>Logout</small></a>
                </div>
            </div>
        </div>
        <div class="text-dark col-sm-6 text-md-center align-bottom py-2 brand" >
            <h5>Welcome to <strong class="font-weight-bold">ADMIN</strong> panel</h5>
        </div>
    </div>
	</div>
	<div class="container">
		<div class="row">
			<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">S.no</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Email</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php for($i = 0; $i<sizeof($users); $i++){ ?>
    <tr class="del_<?php echo $users[$i]->id; ?>" >
      <th scope="row"><?php echo $i+1; ?></th>
      <td><?php echo $users[$i]->first_name; ?></td>
      <td><?php echo $users[$i]->last_name; ?></td>
      <td><?php echo $users[$i]->email; ?></td>
      <td><button class="btn-warning" onclick="delete_user(<?php echo $users[$i]->id; ?>)">Delete</button></td>
    </tr>
  <?php } ?>

  </tbody>
</table>
		</div>
	</div>
</section>

<script src="<?php echo base_url(); ?>/assets/js/jquery.magnific-popup1.js" type="text/javascript"></script>

<script>
function delete_user(id){
  console.log(id);
  $.ajax({

url: "<?php echo base_url("login/delete_user"); ?>",

type: "POST",
data:'id='+id,
success: function(data){

}});
$('.del_'+id).hide();
}



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
