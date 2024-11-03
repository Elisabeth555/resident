<?php
include 'link.php';
if (isset($_POST['save'])) {
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$web   = $_POST['web'];
$hotel = $_POST['hotel'];
$pass  = $_POST['pass'];
$conf  = $_POST['conf'];
if ($pass == $conf) {
	$in = $link->query("INSERT INTO `users`(`firstname`, `lastname`, `phone`, `email`, `password`) VALUES ('$fname','$lname','$phone','$email','$pass')");
	header("location: login.php");
} else {
	echo "<script>alert('Passwords does not match!! Try again.')</script>";
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">

<title>Customer Awareness Hotel Services Management System</title>
<meta content="" name="description">
<meta content="" name="keywords">

<!-- Favicons -->
<link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
<link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

<!-- Main CSS File -->
<link href="assets/css/style.css" rel="stylesheet">

</head>

<body>


<!--Header-->
<?php include 'nav.php'; ?>
<!--End of Header-->

<main id="main">

	<!-- ======= Intro Single ======= -->
	<section class="intro-single">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-8">
					<div class="title-single-box">
						<h1 class="title-single">Create Account</h1>
						<span class="color-text-a">Create account Client.</span>
					</div>
				</div>
				<div class="col-md-12 col-lg-4">
					<nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
						<ol class="breadcrumb">
							<li class="breadcrumb-item">
								<a href="index.php">Home</a>
							</li>
							<li class="breadcrumb-item active" aria-current="page">
								Signup
							</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</section><!-- End Intro Single-->

	<!-- ======= Contact Single ======= -->
	<section class="contact">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 section-t8">
					<div class="row">
						<div class="col-md-7">
							<form method="post" role="form">
								<div class="row">
									<div class="col-md-6 mb-3">
										<div class="form-group">
											<input type="text" name="fname" class="form-control form-control-lg form-control-a" placeholder="First Name" required>
										</div>
									</div>
									<div class="col-md-6 mb-3">
										<div class="form-group">
											<input type="text" name="lname" class="form-control form-control-lg form-control-a" placeholder="Last Name" required>
										</div>
									</div>
									<div class="col-md-12 mb-3">
										<div class="form-group">
											<input type="number" name="phone" class="form-control form-control-lg form-control-a" placeholder="Phone Number" required>
										</div>
									</div>
									<div class="col-md-12 mb-3">
										<div class="form-group">
											<input type="email" name="email" class="form-control form-control-lg form-control-a" placeholder="Your E-mail" required>
										</div>
									</div>
									<div class="col-md-12 mb-3">
										<div class="form-group">
											<input type="password" name="pass" class="form-control form-control-lg form-control-a" placeholder="Create Password" required>
										</div>
									</div>
									<div class="col-md-12 mb-3">
										<div class="form-group">
											<input type="password" name="conf" class="form-control form-control-lg form-control-a" placeholder="Confirm Password" required>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
										</div>
									</div>
									<div class="col-md-12 text-center">
										<br>
										<button type="submit" name="save" class="btn btn-b">Signup</button>
									</div>
								</div>
							</form>
						</div>
						<div class="col-md-5 section-md-t3">
							<div class="icon-box section-b2">
								<div class="icon-box-icon">
									<span class="bi bi-envelope"></span>
								</div>
								<div class="icon-box-content table-cell">
									<div class="icon-box-title">
										<h4 class="icon-title">Say Hello</h4>
									</div>
									<div class="icon-box-content">
										<p class="mb-1">Email.
											<span class="color-a">residenthotel@gmail.com</span>
										</p>
										<p class="mb-1">Phone.
											<span class="color-a">+250781277534</span>
										</p>
									</div>
								</div>
							</div>
							<div class="icon-box section-b2">
								<div class="icon-box-icon">
									<span class="bi bi-geo-alt"></span>
								</div>
								<div class="icon-box-content table-cell">
									<div class="icon-box-title">
										<h4 class="icon-title">Find us in</h4>
									</div>
									<div class="icon-box-content">
										<p class="mb-1">
											Kigali, Muhima
											<br> 
										</p>
									</div>
								</div>
							</div>
							<div class="icon-box">
								<div class="icon-box-icon">
									<span class="bi bi-share"></span>
								</div>
								<div class="icon-box-content table-cell">
									<div class="icon-box-title">
										<h4 class="icon-title">Social networks</h4>
									</div>
									<div class="icon-box-content">
										<div class="socials-footer">
											<ul class="list-inline">
												<li class="list-inline-item">
													<a href="#" class="link-one">
														<i class="bi bi-facebook" aria-hidden="true"></i>
													</a>
												</li>
												<li class="list-inline-item">
													<a href="#" class="link-one">
														<i class="bi bi-twitter" aria-hidden="true"></i>
													</a>
												</li>
												<li class="list-inline-item">
													<a href="#" class="link-one">
														<i class="bi bi-instagram" aria-hidden="true"></i>
													</a>
												</li>
												<li class="list-inline-item">
													<a href="#" class="link-one">
														<i class="bi bi-linkedin" aria-hidden="true"></i>
													</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section><!-- End Contact Single-->

</main><!-- End #main -->

<!--footer-->
<?php include 'footer.php'; ?>
<!--footer end-->

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

</body>

</html>