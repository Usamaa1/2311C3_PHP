<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../vendors/feather/feather.css">
  <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../images/favicon.png" />
</head>


<?php include 'connection/connection.php' ?>

<?php
session_start();

if(isset($_SESSION['userId']))
{
	header("location:home/index.php");
}

if (isset($_POST['loginBtn'])) {

	$email = $_POST['username'];
	$password = $_POST['password'];

	

	$loginQuery = "SELECT * FROM `users` WHERE `email` = :email AND role_id != 2";
	$loginPrepare = $connect->prepare($loginQuery);
	$loginPrepare->bindParam(':email', $email);
	$loginPrepare->execute();
	$userExist = $loginPrepare->fetch(PDO::FETCH_ASSOC);
	if ($userExist) {



		if(password_verify($password, $userExist['password']))
		{

			$_SESSION['userId'] = $userExist['user_id'];
			$_SESSION['username'] = $userExist['first_name'];
			$_SESSION['email'] = $userExist['email'];
			$_SESSION['roleId'] = $userExist['role_id'];

			echo "<script>alert('Login Successfull')</script>";
			header("location: home/index.php");
		}	
		else {
			echo "<script>alert('Wrong password')</script>";
		}

	} 
	else {
		echo "<script>alert('Not an Admin')</script>";
	}
}



?>






<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="../images/logo.svg" alt="logo">
              </div>
              <h4>Hello! let's get started</h4>
              <h6 class="font-weight-light">Sign in to continue.</h6>
              <form class="pt-3" method="post">
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username"  name="username">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password"  name="password">
                </div>
                <div class="mt-3">
                  <button type="submit" name="loginBtn" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                </div>
 
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../js/off-canvas.js"></script>
  <script src="../js/hoverable-collapse.js"></script>
  <script src="../js/template.js"></script>
  <script src="../js/settings.js"></script>
  <script src="../js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
