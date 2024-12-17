<?php

ob_start();
session_start();

require "connection/connection.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['forgotBtn']))
{

	$userEmail = $_POST['email'];
	
	
	
	$verifyEmailQuery = "SELECT * FROM `users` WHERE `email` = :email";
	$verifyEmailPrepare = $connect->prepare($verifyEmailQuery);
	$verifyEmailPrepare->bindParam(':email',$userEmail,PDO::PARAM_STR);
	$verifyEmailPrepare->execute();
	$verifyEmailData = $verifyEmailPrepare->fetch(PDO::FETCH_ASSOC);
	

	if($verifyEmailData['user_id'])
	{

		

	$randomCode = rand(1111,9999);
	$_SESSION['forgotOTP'] = $randomCode;
	$_SESSION['userForgotPassId'] = $verifyEmailData['user_id'];

//Load Composer's autoloader
require '../vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'zainaijaz51@gmail.com';                     //SMTP username
    $mail->Password   = 'boyfwovazpwdqcpj';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('zainaijaz51@gmail.com', 'Mailer');
    $mail->addAddress($userEmail, 'Joe User');     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Forgot Password';
    $mail->Body    = "<!DOCTYPE html>
	<html lang='en'>
	<head>
		<meta charset='UTF-8'>
		<meta name='viewport' content='width=device-width, initial-scale=1.0'>
		<title>OTP Verification</title>
		<style>
			body {
				font-family: Arial, sans-serif;
				margin: 0;
				padding: 0;
				background-color: #f6f6f6;
			}
			.email-container {
				width: 100%;
				max-width: 600px;
				margin: 0 auto;
				background-color: #ffffff;
				padding: 20px;
				border-radius: 8px;
				box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
			}
			.email-header {
				text-align: center;
				padding: 10px 0;
				border-bottom: 1px solid #e0e0e0;
			}
			.email-header img {
				max-width: 150px;
			}
			.email-body {
				padding: 20px;
			}
			h1 {
				color: #333333;
				font-size: 24px;
				text-align: center;
			}
			p {
				font-size: 16px;
				color: #666666;
				line-height: 1.6;
			}
			.otp-container {
				background-color: #f0f0f0;
				border: 2px solid #e0e0e0;
				padding: 20px;
				text-align: center;
				font-size: 24px;
				font-weight: bold;
				color: #333333;
				margin: 20px 0;
				border-radius: 8px;
			}
			.cta-button {
				display: block;
				width: 200px;
				margin: 20px auto;
				padding: 12px;
				background-color: #4CAF50;
				color: white;
				text-align: center;
				text-decoration: none;
				border-radius: 5px;
				font-size: 16px;
			}
			.cta-button:hover {
				background-color: #45a049;
			}
			.email-footer {
				text-align: center;
				padding: 10px;
				font-size: 14px;
				color: #999999;
			}
			.email-footer a {
				color: #4CAF50;
				text-decoration: none;
			}
			.email-footer a:hover {
				text-decoration: underline;
			}
		</style>
	</head>
	<body>
		<div class='email-container'>
			<div class='email-header'>
				<img src='https://aptech-education.com.pk/assets/images/logo.png' alt='Your Brand Logo'>
			</div>
			<div class='email-body'>
				<h1>OTP Verification</h1>
				<p>Hello,</p>
				<p>We received a request to verify your identity using a One-Time Password (OTP). Please use the OTP below to complete your verification process:</p>
				<div class='otp-container'>
				$randomCode
				</div>
				<p>This OTP is valid for the next 10 minutes. If you did not request this, please ignore this email.</p>
				<p>For security reasons, please do not share this OTP with anyone.</p>
				<p>If you encounter any issues, please feel free to <a href='https://support.yourwebsite.com'>contact support</a>.</p>
			</div>
			<div class='email-footer'>
				<p>© 2024 Aptech. All rights reserved.</p>
			</div>
		</div>
	</body>
	</html>
	";


    $mail->send();
    echo 'Message has been sent';
	header('location: forgotPasswordCode.php');
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

	}

	else
	{
		echo "<script>alert('Incorrect email')</script>";
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
				<h1>Forgot Password</h1>
				<nav class="d-flex align-items-center">
					<a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
					<a href="#">Forgot Password</a>
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
						<a class="primary-btn" href="registration.php">Forgot Password</a>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="login_form_inner">
					<h3>Log in to enter</h3>
					<form class="row login_form" method="post">
						<div class="col-md-12 form-group">
							<input type="email" required class="form-control" id="name" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
						</div>

						<div class="col-md-12 form-group">
							<button type="submit" value="submit" name="forgotBtn" class="primary-btn">Send Code</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>


<!--================End Login Box Area =================-->
<?php
require "partial/footer.php";
ob_end_flush();
?>