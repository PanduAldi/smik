<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo $title ?></title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/login_style.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="modal-dialog">
		    <div class="modal-content">
		        <div class="modal-header">
		          <h2 class="text-center"> .::LOGIN PANEL::.</h2>
		        </div>
		        <form action="<?php echo site_url('home/login') ?>" method="post">
		         <?php echo $this->session->flashdata('pesan'); ?>
		         <div class="modal-body">
		             <div class="form-group">
		                 <input type="text" name="user" class="form-control input-lg" placeholder="Username" required="" />
		             </div>

		             <div class="form-group">
		                 <input type="password" name="pass" class="form-control input-lg" placeholder="Password" required="" />
		             </div>
		             <div class="form-group">
		             	<button type="submit" class="btn btn-primary"> <i class="fa fa-sign-in"></i> Login</button>
		            	<a href="<?php echo site_url('home') ?>" class="btn btn-"></button>
		             </div>
		         </div>
		         </form>
		    </div>
		 </div>

		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	</body>
</html>