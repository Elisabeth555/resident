<?php
include 'link.php';
?>
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
                            <h1 class="title-single">Our Amazing Rooms</h1>
                            <span class="color-text-a">Grid Rooms</span>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Rooms Grid
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section><!-- End Intro Single-->

        <!-- ======= Property Grid ======= -->
        <section class="property-grid grid">
            <div class="container">
                <div class="row">
                    <?php
                    $sql = $link->query("SELECT r.*, h.hotel_name, h.location FROM rooms r LEFT JOIN hotel h ON h.id = r.hotel_id WHERE r.availability=1 ORDER BY r.id DESC");
                    while ($row = mysqli_fetch_array($sql)) {
                        $id = $row['id'];
                        $room = $row['display_title'];
                        $web   = $row['hotel_name'];
                        $loc   = $row['availability'] > 0 ? 'Available' : 'Unavailable';
                        $image = $row['image'];
                        $ogImage = substr($image, 3);
                    ?>
                        <!-- rooms grid -->
                        <div class="col-md-4">
                            <div class="card-box-a card-shadow">
                                <div class="img-box-a">
                                    <img src="./<?php echo $ogImage; ?>" alt="" class="img-a img-fluid" style="min-height: 400px;max-height: 400px;min-width: 100%;max-width: 100%;">
                                </div>
                                <div class="card-overlay">
                                    <div class="card-overlay-a-content">
                                        <div class="card-header-a">
                                            <h2 class="card-title-a">
                                                <?php echo $room; ?>
                                                <br />
                                                <?php echo $loc; ?>
                                            </h2>
                                        </div>
                                        <div class="card-body-a">
                                            <div class="price-box d-flex">
                                                <?php
                                                $today = date("Y-m-d");
                                                $reservationsResult = $link->query("SELECT * FROM reservations WHERE type = 'Room' AND type_id = '$id' AND since <= '$today' AND until >= '$today'");
                                                $reservations = mysqli_num_rows($reservationsResult);
                                                ?>
                                                <span class="price-a"><?php echo $loc; ?></span>
                                            </div>
                                            <a href="rooms-single.php?q=<?php echo $row["id"] ?>" class="link-a">Click here to view
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
        </section><!-- End Property Grid Single-->

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