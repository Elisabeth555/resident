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


    <!--Header-->
    <?php include 'nav.php'; ?>
    <!--End of Header-->


    <main id="main">

        <!-- ======= Intro Single ======= -->
        <section class="intro-single">
            <div class="container">
                <?php
                include "./link.php";
                $query = "SELECT * FROM halls WHERE id = '$_GET[q]'";
                $result = $link->query($query);

                if ($result->num_rows > 0) {
                    $hall = $result->fetch_assoc();
                }
                ?>
                <div class="row">
                    <div class="col-md-12 col-lg-8">
                        <div class="title-single-box">
                            <h1 class="title-single"><?php echo $hall["display_title"] ?></h1>
                            <span class="color-text-a">RWF <?php echo number_format($hall["price_per_hour"]) ?> - RWF <?php echo number_format($hall["price_per_day"]) ?></span>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="halls-grid.php">Halls</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    <?php echo $hall["display_title"] ?>
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
                                <div class="carousel-item-b swiper-slide">
                                    <img src="<?php echo $hall['image']; ?>" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="property-single-carousel-pagination carousel-pagination"></div>
                    </div>
                </div>

                <div class="row d-flex justify-content-center">
                    <br>
                    <div class="col-sm-12">

                        <div class="row justify-content-between">
                            <div class="col-md-5 col-lg-6">
                                <div class="property-price d-flex justify-content-center foo">
                                    <div class="card-header-c d-flex">
                                        <div class="card-box-ico">
                                            <span class="bi bi-cash"></span>
                                        </div>
                                        <div class="card-title-c align-self-center">
                                            <h5 class="title-c">RWF <?php echo number_format($hall["price_per_hour"]) ?> - RWF <?php echo number_format($hall["price_per_day"]) ?></h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="property-summary">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="title-box-d section-t4">
                                                <h3 class="title-d">Quick Summary</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="summary-list">
                                        <ul class="list">
                                            <?php
                                            $today = date("Y-m-d");
                                            $reservationsResult = $link->query("SELECT * FROM reservations WHERE type = 'Hall' AND type_id = '$_GET[q]' AND since <= '$today' AND until >= '$today'");
                                            $reservations = mysqli_num_rows($reservationsResult);
                                            ?>
                                            <li class="d-flex justify-content-between">
                                                <strong>Available:</strong>
                                                <span><?php echo $reservations > 0 ? 'No' : 'Yes'; ?></span>
                                            </li>
                                            <li class="d-flex justify-content-between">
                                                <strong>Hall No:</strong>
                                                <span><?php echo $hall['number'] ?></span>
                                            </li>
                                            <li class="d-flex justify-content-between">
                                                <strong>Price Per Hour:</strong>
                                                <span>
                                                    <?php echo $hall['price_per_hour'] ?>
                                                </span>
                                            </li>
                                            <li class="d-flex justify-content-between">
                                                <strong>Price Per Day:</strong>
                                                <span><?php echo $hall['price_per_day'] ?></span>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7 col-lg-7 section-md-t3">


                            </div>
                        </div>
                    </div>
                    <!-- </div> -->


                    <div class="col-md-12 col-lg-6">
                        <div class="property-contact">
                            <form class="form-a" action="./clients/create-reservation.php">
                                <div class="row">
                                    <div class="col-md-12 mb-1">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Subscription type:</label>
                                            <select class="form-control form-control-lg form-control-a" name="period" onchange="setUnitPrice()">
                                                <option value="daily" selected>Per day</option>
                                                <!-- <option value="hourly">Per hour</option> -->
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-1">
                                        <input type="hidden" class="form-control form-control-lg form-control-a" name="type" placeholder="Type" required readonly value="Hall">
                                        <input type="hidden" class="form-control form-control-lg form-control-a" name="reserved-id" required readonly value="<?php echo $hall['id']; ?>">
                                        <input type="hidden" class="form-control form-control-lg form-control-a" name="reserved-title" required readonly value="<?php echo $hall['display_title']; ?>">
                                        <input type="hidden" class="form-control form-control-lg form-control-a" name="reserved-number" required readonly value="<?php echo $hall['number']; ?>">
                                        <label for="exampleInputEmail1">Unit Price:</label>
                                        <div class="form-group">
                                            <input type="number" class="form-control form-control-lg form-control-a" name="unit-price" placeholder="Unit Price" required readonly onchange="setTotalPrice()" value="<?php echo $hall['price_per_day'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-1">
                                        <label for="exampleInputEmail1">Since:</label>
                                        <div class="form-group">
                                            <input type="date" class="form-control form-control-lg form-control-a" id="inputName" name="since" onchange="changeCount()">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-1">
                                        <label for="exampleInputEmail1">Until:</label>
                                        <div class="form-group">
                                            <input type="date" class="form-control form-control-lg form-control-a" id="inputName" name="until" onchange="changeCount()">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-1">
                                        <label for="exampleInputEmail1">Count:</label>
                                        <div class="form-group">
                                            <input type="number" class="form-control form-control-lg form-control-a" id="inputName" name="count" placeholder="Count" required oninput="setTotalPrice()" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-1">
                                        <label for="exampleInputEmail1">To pay:</label>
                                        <div class="form-group">
                                            <input type="number" class="form-control form-control-lg form-control-a" id="inputEmail1" placeholder="Total" name="total" required readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-1">
                                        <label for="exampleInputEmail1">Phone N&deg;:</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-lg form-control-a" name="phone-number" placeholder="Phone N&deg;" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <button type="submit" class="btn btn-a">Create Reservation</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>
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
                unit_price = <?php echo $hall['price_per_day'] ?>
                // setTotalPrice();
            } else {
                unit_price = <?php echo $hall['price_per_hour'] ?>
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