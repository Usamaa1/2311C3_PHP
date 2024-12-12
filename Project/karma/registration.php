<?php
require "partial/navbar.php";

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