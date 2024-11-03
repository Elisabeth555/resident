<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title>Resident Hotel</title>
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

	<!--Main CSS File -->
	<link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

	<!-- ======= Property Search Section ======= -->
	<div class="click-closed"></div>
	<!--/ Form Search Star /-->
	<div class="box-collapse">
		<div class="title-box-d">
			<h3 class="title-d">Search Property</h3>
		</div>
		<span class="close-box-collapse right-boxed bi bi-x"></span>
		<div class="box-collapse-wrap form">
			<form class="form-a">
				<div class="row">
					<div class="col-md-12 mb-2">
						<div class="form-group">
							<label class="pb-2" for="Type">Keyword</label>
							<input type="text" class="form-control form-control-lg form-control-a" placeholder="Keyword">
						</div>
					</div>
					<div class="col-md-6 mb-2">
						<div class="form-group mt-3">
							<label class="pb-2" for="Type">Type</label>
							<select class="form-control form-select form-control-a" id="Type">
								<option>All Type</option>
								<option>For Rent</option>
								<option>For Sale</option>
								<option>Open House</option>
							</select>
						</div>
					</div>
					<div class="col-md-6 mb-2">
						<div class="form-group mt-3">
							<label class="pb-2" for="city">City</label>
							<select class="form-control form-select form-control-a" id="city">
								<option>All City</option>
								<option>Alabama</option>
								<option>Arizona</option>
								<option>California</option>
								<option>Colorado</option>
							</select>
						</div>
					</div>
					<div class="col-md-6 mb-2">
						<div class="form-group mt-3">
							<label class="pb-2" for="bedhouses">Bedhouses</label>
							<select class="form-control form-select form-control-a" id="bedhouses">
								<option>Any</option>
								<option>01</option>
								<option>02</option>
								<option>03</option>
							</select>
						</div>
					</div>
					<div class="col-md-6 mb-2">
						<div class="form-group mt-3">
							<label class="pb-2" for="garages">Garages</label>
							<select class="form-control form-select form-control-a" id="garages">
								<option>Any</option>
								<option>01</option>
								<option>02</option>
								<option>03</option>
								<option>04</option>
							</select>
						</div>
					</div>
					<div class="col-md-6 mb-2">
						<div class="form-group mt-3">
							<label class="pb-2" for="bathhouses">Bathhouses</label>
							<select class="form-control form-select form-control-a" id="bathhouses">
								<option>Any</option>
								<option>01</option>
								<option>02</option>
								<option>03</option>
							</select>
						</div>
					</div>
					<div class="col-md-6 mb-2">
						<div class="form-group mt-3">
							<label class="pb-2" for="price">Min Price</label>
							<select class="form-control form-select form-control-a" id="price">
								<option>Unlimite</option>
								<option>$50,000</option>
								<option>$100,000</option>
								<option>$150,000</option>
								<option>$200,000</option>
							</select>
						</div>
					</div>
					<div class="col-md-12">
						<button type="submit" class="btn btn-b">Search Property</button>
					</div>
				</div>
			</form>
		</div>
	</div><!-- End Property Search Section -->>

	<!--Header-->
	<?php include 'nav.php'; ?>
	<!--End of Header-->


	<main id="main">

		<!-- ======= Intro Single ======= -->
		<section class="intro-single">
			<div class="container">
				<?php
				include "./link.php";
				$query = "SELECT * FROM houses WHERE accomodation_id = '$_GET[q]'";
				$result = $link->query($query);

				if ($result->num_rows > 0) {
					$house = $result->fetch_assoc();
				}
				?>
				<div class="row">
					<div class="col-md-12 col-lg-8">
						<div class="title-single-box">
							<h1 class="title-single"><?php echo $house["display_title"] ?></h1>
							<span class="color-text-a">RWF <?php echo number_format($house["price_per_hour"]) ?> - RWF <?php echo number_format($house["price_per_day"]) ?></span>
						</div>
					</div>
					<div class="col-md-12 col-lg-4">
						<nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
							<ol class="breadcrumb">
								<li class="breadcrumb-item">
									<a href="index.html">Home</a>
								</li>
								<li class="breadcrumb-item">
									<a href="houses-grid.php">Houses</a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">
									<?php echo $house["display_title"] ?>
								</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</section><!-- End Intro Single-->

		<!-- ======= Property Single ======= -->
		<section class="property-single nav-arrow-b">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-8">
						<div id="" class="swiper">
							<div class="swiper-wrapper">
								<?php
								$accId = $_GET['q'];
								$accSel = $link->query("SELECT * FROM accomodations WHERE id=$accId");
								$accRes = mysqli_fetch_array($accSel);
								$accImg = $accRes['g_photo'];
								$ogImage = substr($accImg, 3);
								?>
								<div class="carousel-item-b swiper-slide">
									<img src="./<?php echo $ogImage ?>" alt="<?php echo $ogImage ?>">
								</div>

							</div>
						</div>
						<div class="property-single-carousel-pagination carousel-pagination"></div>
					</div>
				</div>
				<section class="property-grid grid">
					<div class="container">
						<div class="row">
							<?php
							$sql = $link->query("SELECT r.*, h.name, h.location FROM houses r LEFT JOIN accomodations h ON h.id = r.accomodation_id WHERE h.id = '$_GET[q]' ORDER BY r.id DESC");
							while ($row = mysqli_fetch_array($sql)) {
								$id = $row['id'];
								$house = $row['display_title'];
								$web   = $row['name'];
								$loc   = $row['location'];
								$image = $row['image'];
								$ogImage = substr($image, 3);
							?>
								<!-- houses grid -->
								<div class="col-md-4">
									<div class="card-box-a card-shadow">
										<div class="img-box-a">
											<img src="./<?php echo $ogImage; ?>" alt="" class="img-a img-fluid" style="min-height: 400px;max-height: 400px;min-width: 100%;max-width: 100%;">
										</div>
										<div class="card-overlay">
											<div class="card-overlay-a-content">
												<div class="card-header-a">
													<h2 class="card-title-a">
														<?php echo $house; ?>
														<br /> <?php echo $loc; ?>
													</h2>
												</div>
												<div class="card-body-a">
													<div class="price-box d-flex">
														<?php
														$today = date("Y-m-d");
														$reservationsResult = $link->query("SELECT * FROM reservations WHERE type = 'House' AND type_id = '$id' AND since <= '$today' AND until >= '$today'");
														$reservations = mysqli_num_rows($reservationsResult);
														?>
														<span class="price-a"><?php echo $reservations > 0 ? 'Unavailable' : 'Available'; ?></span>
													</div>
													<a href="houses-single.php?q=<?php echo $row["id"] ?>" class="link-a">Click here to view
														<span class="bi bi-chevron-right"></span>
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
				</section>
			</div>
		</section><!-- End Property Single-->

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
	<script src="assets/js/axios.min.js"></script>

	<script>
		function setUnitPrice() {
			var subscription_type = document.getElementsByName("type")[0].value;
			var unit_price = document.getElementsByName("unit-price")[0].value;
			if (subscription_type == "daily") {
				unit_price = <?php echo $house['price_per_day'] ?>
				// setTotalPrice();
			} else {
				unit_price = <?php echo $house['price_per_hour'] ?>
				// setTotalPrice();
			}
			document.getElementsByName("unit-price")[0].value = unit_price;
		}

		function setTotalPrice() {
			var unit_price = document.getElementsByName("unit-price")[0].value;
			var count = document.getElementsByName("count")[0].value;
			var total = unit_price * count;
			document.getElementsByName("total")[0].value = total;
		}

		function changeCount() {
			var since = document.getElementsByName("since")[0].value;
			var until = document.getElementsByName("until")[0].value;
			var count = document.getElementsByName("count")[0].value;
			var subscription_type = document.getElementsByName("period")[0].value;
			if (subscription_type == "daily") {
				var since_date = new Date(since);
				var until_date = new Date(until);
				var diff = Math.abs(until_date - since_date);
				var diffDays = Math.ceil(diff / (1000 * 60 * 60 * 24));
				document.getElementsByName("count")[0].value = diffDays;
				setTotalPrice();
			} else {
				var since_date = new Date(since);
				var until_date = new Date(until);
				var diff = Math.abs(until_date - since_date);
				var diffHours = Math.ceil(diff / (1000 * 60 * 60));
				document.getElementsByName("count")[0].value = diffHours;
				setTotalPrice();
			}
		}
	</script>

</body>

</html>