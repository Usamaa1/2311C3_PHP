<?php
session_start();


ob_start();


if(isset($_SESSION['userId']))
{
	header("location:index.php");
}

?>
<?php

require "connection/connection.php";


// For Fetching Countries

$countryQuery = "SELECT * FROM `country`";
$countryPrepare = $connect->prepare($countryQuery);
$countryPrepare->execute();
$countryData = $countryPrepare->fetchAll(PDO::FETCH_ASSOC);


// For Fetching Cities

$citiesQuery = "SELECT * FROM `cities`";
$citiesPrepare = $connect->prepare($citiesQuery);
$citiesPrepare->execute();
$citiesData = $citiesPrepare->fetchAll(PDO::FETCH_ASSOC);



// For Registration

if (isset($_POST['registerBtn'])) {


	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$phoneNumber = $_POST['phoneNumber'];
	$country = $_POST['country'];
	$city = $_POST['city'];
	$address = $_POST['address'];
	$roleId = 2;
	$encryptedPassword = password_hash($password, PASSWORD_BCRYPT);


	$registrationQuery = "INSERT INTO `users`(`first_name`, `last_name`, `email`, `password`, `country`, `city`, `phone_number`, `address`, `role_id`) VALUES (:firstName, :lastName, :email, :password, :country, :city,:phoneNumber,:address,:roleId)";
	$registrationPrepare = $connect->prepare($registrationQuery);
	$registrationPrepare->bindParam(':firstName',$firstName,PDO::PARAM_STR);
	$registrationPrepare->bindParam(':lastName',$lastName,PDO::PARAM_STR);
	$registrationPrepare->bindParam(':email',$email,PDO::PARAM_STR);
	$registrationPrepare->bindParam(':password',$encryptedPassword,PDO::PARAM_STR);
	$registrationPrepare->bindParam(':country',$country,PDO::PARAM_STR);
	$registrationPrepare->bindParam(':city',$city,PDO::PARAM_STR);
	$registrationPrepare->bindParam(':phoneNumber',$phoneNumber,PDO::PARAM_INT);
	$registrationPrepare->bindParam(':address',$address,PDO::PARAM_STR);
	$registrationPrepare->bindParam(':roleId',$roleId,PDO::PARAM_INT);
	if($registrationPrepare->execute())
	{
		echo "<script>alert('User Registered')</script>";
	}

	







}














?>




<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>Karma Shop</title>
	<!--
		CSS
		============================================= -->
	<link rel="stylesheet" href="css/linearicons.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/themify-icons.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="css/nouislider.min.css">
	<link rel="stylesheet" href="css/ion.rangeSlider.css" />
	<link rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css" />
	<link rel="stylesheet" href="css/magnific-popup.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

	<!-- Start Header Area -->
	<header class="header_area sticky-header">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light main_box">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="index.php"><img src="img/logo.png" alt=""></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav ml-auto">
							<li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
							<li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">Shop</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="category.php">Shop Category</a></li>
									<li class="nav-item"><a class="nav-link" href="single-product.php">Product Details</a></li>
									<li class="nav-item"><a class="nav-link" href="checkout.php">Product Checkout</a></li>
									<li class="nav-item"><a class="nav-link" href="cart.php">Shopping Cart</a></li>
									<li class="nav-item"><a class="nav-link" href="confirmation.php">Confirmation</a></li>
								</ul>
							</li>
							<li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">Blog</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="blog.php">Blog</a></li>
									<li class="nav-item"><a class="nav-link" href="single-blog.php">Blog Details</a></li>
								</ul>
							</li>
							<li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">Pages</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
									<li class="nav-item"><a class="nav-link" href="tracking.php">Tracking</a></li>
									<li class="nav-item"><a class="nav-link" href="elements.php">Elements</a></li>
								</ul>
							</li>
							<li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li class="nav-item"><a href="cart.php" class="cart"><span class="ti-bag"></span></a></li>
							<li class="nav-item">
								<button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
		<div class="search_input" id="search_input_box">
			<div class="container">
				<form class="d-flex justify-content-between">
					<input type="text" class="form-control" id="search_input" placeholder="Search Here">
					<button type="submit" class="btn"></button>
					<span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
				</form>
			</div>
		</div>
	</header>
	<!-- End Header Area -->

	
<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
	<div class="container">
		<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
			<div class="col-first">
				<h1>Register</h1>
				<nav class="d-flex align-items-center">
					<a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
					<a href="category.html">Register</a>
				</nav>
			</div>
		</div>
	</div>
</section>
<!-- End Banner Area -->

<!--================Login Box Area =================-->
<section class="login_box_area section_gap">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="login_box_img">
					<img class="img-fluid" src="img/login.jpg" alt="">
					<div class="hover">
						<h4>New to our website?</h4>
						<p>There are advances being made in science and technology everyday, and a good example of this is the</p>
						<a class="primary-btn" href="registration.html">Already have an Account?</a>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="login_form_inner">
					<h3>Register</h3>
					<form class="row login_form" method="post" id="contactForm" novalidate="novalidate">
						<div class="col-md-12 form-group">
							<input type="text" class="form-control" id="name" name="firstName" placeholder="First Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'First Name'">
						</div>
						<div class="col-md-12 form-group">
							<input type="text" class="form-control" id="name" name="lastName" placeholder="Last Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name'">
						</div>
						<div class="col-md-12 form-group">
							<input type="email" class="form-control" id="name" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
						</div>
						<div class="col-md-12 form-group">
							<input type="password" class="form-control" id="name" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
						</div>
						<div class="col-md-12 form-group">
							<input type="text" class="form-control" id="name" name="phoneNumber" placeholder="Phone Number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone Number'">
						</div>
						<div class="col-md-12 form-group">
							<select name="country" id="">
								<option value="" selected disabled>Select your Country</option>
								<?php foreach ($countryData as $cd) { ?>
									<option value="<?= $cd['country_id'] ?>"><?= $cd['country_name'] ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="col-md-12 form-group">
							<select name="city" id="">
								<option value="" selected disabled>Select your City</option>
								<?php foreach ($citiesData as $cd) { ?>
									<option value="<?= $cd['city_id'] ?>"><?= $cd['city_name'] ?></option>
								<?php } ?>
							</select>
						</div>


						<div class="col-md-12 form-group">
							<input type="text" class="form-control" id="name" name="address" placeholder="Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Address'">
						</div>

						<div class="col-md-12 form-group">
							<button type="submit" value="submit" name="registerBtn" class="primary-btn">Register</button>

						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================End Login Box Area =================-->
<?php
require "partial/footer.php"
?>