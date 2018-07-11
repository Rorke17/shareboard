<html>
<head>
	<title>Shareboard</title>
	<link rel="stylesheet" href="<?php echo ROOT_PATH; ?>assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo ROOT_PATH; ?>assets/css/style.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
			 <a class="navbar-brand brand-left" href="<?php echo ROOT_URL; ?>shares">Shareboard</a>
			 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
					 <span class="navbar-toggler-icon"></span>
			 </button>
			 <div id="navbarNavDropdown" class="navbar-collapse collapse">
					 <ul class="navbar-nav mr-auto">
							 <li class="nav-item active">
									 <a class="nav-link" href="<?php echo ROOT_URL; ?>">Home <span class="sr-only">(current)</span></a>
							 </li>
							 <li class="nav-item active">
									 <a class="nav-link" href="<?php echo ROOT_URL; ?>shares">Shares</a>
							 </li>
							 <?php if(isset($_SESSION['is_logged_in'])) : ?>
							 <li class="nav-item active">
									<a class="nav-link" href="<?php echo ROOT_URL; ?>shares/myShares">My Shares</a>
							</li>
						<?php endif; ?>
					 </ul>
					 <ul class="navbar-nav brand-right">
						 <?php if(isset($_SESSION['is_logged_in'])) : ?>
							  <li class="nav-item dropdown">
									 <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										 Profile
									 </a>
									 <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
											 <a class="dropdown-item" href="<?php echo ROOT_URL; ?>users/profileSettings">Settings</a>
											 <a class="dropdown-item" href="#">Another action</a>
									 </div>
							 </li>
						 <?php endif; ?>
							<?php if(isset($_SESSION['is_logged_in'])) : ?>
							 <li class="nav-item">
									 <a class="nav-link" href="<?php echo ROOT_URL; ?>users/profile">Welcome <?php echo $_SESSION['user_data']['first_name']; ?></a>
							 </li>
							 <li class="nav-item">
									 <a class="nav-link" href="<?php echo ROOT_URL; ?>users/logout">Logout</a>
							 </li>
							<?php else : ?>
								<li class="nav-item">
										<a class="nav-link" href="<?php echo ROOT_URL; ?>users/registration">Login</a>
								</li>
								<li class="nav-item">
										<a class="nav-link" href="<?php echo ROOT_URL; ?>users/registration">Register</a>
								</li>
							<?php endif; ?>
					 </ul>
			 </div>
	 </nav>

    <div class="container">
			<?php Messages::display(); ?>
     <!-- <div class="row"> -->
     	<?php require($view); ?>
     <!-- </div> -->

    </div><!-- /.container -->
</body>
</html>
