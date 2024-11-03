<?php 
include 'link.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  
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
  <title>Resident Hotel</title>
</head>

<body>

  

 <!--Header-->
<?php include 'nav.php'; ?>
 <!--End of Header-->

  <!-- ======= Intro Section ======= -->
  <div class="intro intro-carousel swiper position-relative">

    <div class="swiper-wrapper">
      <?php 
      $sql = $link->query("SELECT * FROM rooms ORDER BY id DESC LIMIT 1");
      $row=mysqli_fetch_array($sql);
      $id=$row['id'];
      $hotel = $row['display_title'];
      $web   = $row['number'];
      $loc   = $row['availability'] ? "Available" : "Unavailable";
      $image = $row['image'];
      $ogImage = substr($image, 3);
      ?>
      <div class="swiper-slide carousel-item-a intro-item bg-image" style="background-image: url('<?php echo $ogImage; ?>')">
        <div class="overlay overlay-a"></div>
        <div class="intro-content display-table">
          <div class="table-cell">
            <div class="container">
              <div class="row">
                <div class="col-lg-8">
                  <div class="intro-body">
                    <p class="intro-title-top"><?php echo $loc; ?>
                    </p>
                    <h1 class="intro-title mb-4 ">
                      <span class="color-b"></span> <?php echo $hotel; ?><br>
                      <?php echo $loc; ?>
                    </h1>
                    <p class="intro-subtitle intro-price">
                      <a href="rooms-single.php?q=<?=$id;?>"><span class="price-a">Book Now!!</span></a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php 
      $sql1 = $link->query("SELECT * FROM rooms ORDER BY id ASC LIMIT 1");
      $rows=mysqli_fetch_array($sql1);
      $id1=$row['id'];
      $hotel1 = $rows['display_title'];
      $web1   = $rows['number'];
      $loc1   = $rows['availability'] ? "Available" : "Unavailable";
      $image1 = $rows['image'];
      $ogImage1 = substr($image1, 3);
      ?>
      <div class="swiper-slide carousel-item-a intro-item bg-image" style="background-image: url('<?php echo $ogImage1; ?>')">
        <div class="overlay overlay-a"></div>
        <div class="intro-content display-table">
          <div class="table-cell">
            <div class="container">
              <div class="row">
                <div class="col-lg-8">
                  <div class="intro-body">
                    <p class="intro-title-top"><?php echo $loc1; ?>
                    </p>
                    <h1 class="intro-title mb-4">
                      <span class="color-b">HOT </span><?php echo $hotel1; ?><br>
                      <?php echo $loc1; ?>
                    </h1>
                    <p class="intro-subtitle intro-price">
                      <a href="rooms-single.php?q=<?=$id1;?>"><span class="price-a">Book Now!!</span></a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php 
      $sql2 = $link->query("SELECT * FROM rooms WHERE availability=1");
      $rows=mysqli_fetch_array($sql2);
      $id2=$row['id'];
      $hotel2 = $rows['display_title'];
      $web2   = $rows['number'];
      $loc2   = $rows['availability'] ? "Available" : "Unavailable";
      $image2 = $rows['image'];
      $ogImage2 = substr($image1, 3);
      ?>
      <div class="swiper-slide carousel-item-a intro-item bg-image" style="background-image: url('<?php echo $ogImage2; ?>')">
        <div class="overlay overlay-a"></div>
        <div class="intro-content display-table">
          <div class="table-cell">
            <div class="container">
              <div class="row">
                <div class="col-lg-8">
                  <div class="intro-body">
                    <p class="intro-title-top"><?php echo $loc2; ?>
                    </p>
                    <h1 class="intro-title mb-4">
                      <span class="color-b">HOT </span><?php echo $hotel2; ?><br>
                      <?php echo $loc2; ?>
                    </h1>
                    <p class="intro-subtitle intro-price">
                      <a href="#"><span class="price-a">Book Now!!</span></a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="swiper-pagination"></div>
  </div><!-- End Intro Section -->

  <main id="main">
    <!-- ======= Latest Properties Section ======= -->
    <section class="section-property section-t8">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="title-wrap d-flex justify-content-between">
              <div class="title-box">
                <h2 class="title-a">Latest Rooms</h2>
              </div>
              <div class="title-link">
                <a href="rooms-grid.php">All Rooms
                  <span class="bi bi-chevron-right"></span>
                </a>
              </div>
            </div>
          </div>
        </div>

        <div id="property-carousel" class="swiper">
          <div class="swiper-wrapper">
            <!--carousel items-->
            <?php 
            $selhot = $link->query("SELECT * FROM rooms ORDER BY id DESC");
            while ($hrow=mysqli_fetch_array($selhot)) 
            {
            $lhotel = $hrow['display_title'];
            $locl   = $hrow['number'];
            $lweb   = $hrow['availability'] ? "Available" : "Unavailable";
            $limage = $hrow['image'];
            ?>
            <div class="carousel-item-b swiper-slide">
              <div class="card-box-a card-shadow">
                <div class="img-box-a">
                  <img src="admin/<?php echo $limage; ?>" alt="" class="img-a img-fluid" style="min-height: 400px;max-height: 400px;min-width: 100%;max-width: 100%;">
                </div>
                <div class="card-overlay">
                  <div class="card-overlay-a-content">
                    <div class="card-header-a">
                      <h2 class="card-title-a">
                          <?php echo $lhotel; ?>
                          <br /> <?php echo $locl; ?>
                      </h2>
                    </div>
                    <div class="card-body-a">
                      <div class="price-box d-flex">
                        <span class="price-a"><?php echo $lweb; ?></span>
                      </div>
                      <a href="#" class="link-a">Click here to view
                        <span class="bi bi-chevron-right"></span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End carousel item -->

            <?php } ?>
          </div>
        </div>
        <div class="propery-carousel-pagination carousel-pagination"></div>

      </div>
    </section><!-- End Latest Properties Section -->

    <!-- ======= Latest News Section ======= -->
    <section class="section-news section-t8">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="title-wrap d-flex justify-content-between">
              <div class="title-box">
                <h2 class="title-a">Explore More Accomodations</h2>
              </div>
              <div class="title-link">
                <a href="accomodations-grid.php">All Accomodations
                  <span class="bi bi-chevron-right"></span>
                </a>
              </div>
            </div>
          </div>
        </div>

        <div id="news-carousel" class="swiper">
          <div class="swiper-wrapper">
             <?php 
            $exsel = $link->query("SELECT * FROM accomodations ORDER BY id ASC");
            while ($exrow=mysqli_fetch_array($exsel)) 
            {
            $exhotel = $exrow['name'];
            $exloc   = $exrow['location'];
            $exweb   = $exrow['website'];
            $eximage = $exrow['g_photo'];
            ?>
            <div class="carousel-item-c swiper-slide">
              <div class="card-box-b card-shadow news-box">
                <div class="img-box-b">
                  <img src="images/<?php echo $eximage; ?>" style="min-height: 400px;max-height: 400px;" alt="" class="img-b img-fluid">
                </div>
                <div class="card-overlay">
                  <div class="card-header-b">
                    <div class="card-category-b">
                      <a href="#" class="category-b"><?php echo $exweb; ?></a>
                    </div>
                    <div class="card-title-b">
                      <h2 class="title-2">
                        <a href="https://<?php echo $exweb; ?>"><?php echo $exhotel; ?>
                      </a>
                      </h2>
                    </div>
                    <div class="card-date">
                      <span class="date-b"><?php echo $exloc; ?></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- End carousel item -->
          <?php } ?>
          </div>
        </div>

        <div class="news-carousel-pagination carousel-pagination"></div>
      </div>
    </section><!-- End Latest News Section -->

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