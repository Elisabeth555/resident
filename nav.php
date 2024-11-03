<?php
include 'link.php';
$info = $link->query("SELECT * FROM system_info");
$row = mysqli_fetch_array($info);
?>
<!-- ======= Header/Navbar ======= -->
<nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
	<div class="container">
		<button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
			<span></span>
			<span></span>
			<span></span>
		</button>
		<a class="navbar-brand text-brand" href="index.php">Resident<span class="color-b"> Hotel</span></a>

		<div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
			<ul class="navbar-nav">

				<li class="nav-item">
					<a class="nav-link active" href="index.php">Home</a>
				</li>

				<li class="nav-item">
					<a class="nav-link " href="about.php">About</a>
				</li>


				
				<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Services</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="rooms-grid.php">Rooms</a>
								<a class="dropdown-item" href="halls-grid.php">Halls</a>
								<a class="dropdown-item" href="accomodations-grid.php">Accomodations</a>
							</div>
						</li>
				<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Contact Us</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="http://twitter.com/BizwiV">Twitter</a>
								<a class="dropdown-item" href="http://facebook.com">Facebook</a>
								<a class="dropdown-item" href="http://instagram.com/vava20123">Instagram</a>
							</div>
						</li>

				<li class="nav-item">
					<a class="nav-link " href="signup.php">Signup</a>
				</li>
				<li class="nav-item">
					<a class="nav-link " href="user.php">My Account</a>
				</li>
				<li class="nav-item">
					<a class="nav-link " href="./admin/index.php">Admin</a>
				</li>
		
			</ul>
		</div>

		<button type="button" class="btn btn-b-n navbar-toggle-box navbar-toggle-box-collapse" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" disabled>
			<i class="bi bi-lock"></i>
		</button>

	</div>
</nav><!-- End Header/Navbar -->