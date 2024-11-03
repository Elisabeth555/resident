  <?php
    include 'nav.php';
    error_reporting(0);
    $admin = $_SESSION['admin'];
    if (is_null($admin)) {
        header("location: signin.php");
    }else{
       header("location: signin.php"); 
    }
    ?>

  <div class="pcoded-content">
      <div class="pcoded-inner-content">
          <div class="main-body">
              <div class="page-wrapper">

                  <div class="page-body">
                      <div class="row">
                          <!-- card1 start -->
                          <div class="col-md-6 col-xl-3">
                              <div class="card widget-card-1">
                                  <div class="card-block-small">
                                      <i class="ti-layers bg-c-blue card1-icon"></i>
                                      <span class="text-c-blue f-w-600">Users</span>
                                      <h4>
                                          <?php
                                            $select = $link->query("SELECT * FROM users");
                                            $count = mysqli_num_rows($select);
                                            echo $count;
                                            ?>
                                      </h4>
                                      <div>
                                          <span class="f-left m-t-10 text-muted">
                                              <a href="users.php">
                                                  <i class="text-c-blue f-16 ti-eye m-r-10"></i>
                                                  See All
                                              </a>

                                          </span>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <!-- card1 end -->
                          <!-- card2 start -->
                          <div class="col-md-6 col-xl-3">
                              <div class="card widget-card-1">
                                  <div class="card-block-small">
                                      <i class="ti-layers bg-c-blue card1-icon"></i>
                                      <span class="text-c-blue f-w-600">Total Accomodations</span>
                                      <h4>
                                          <?php
                                            $sel = $link->query("SELECT * FROM accomodations");
                                            $counts = mysqli_num_rows($sel);
                                            echo $counts;
                                            ?>
                                      </h4>
                                      <div>
                                          <span class="f-left m-t-10 text-muted">
                                              <a href="hlist.php">
                                                  <i class="text-c-blue f-16 ti-eye m-r-10"></i>
                                                  See All
                                              </a>

                                          </span>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <!-- card2 end -->
                          <!-- card3 start -->
                          <div class="col-md-6 col-xl-3">
                              <div class="card widget-card-1">
                                  <div class="card-block-small">
                                      <i class="ti-layers bg-c-blue card1-icon"></i>
                                      <span class="text-c-blue f-w-600">Rooms</span>
                                      <h4>
                                          <?php
                                            // print_r($_SESSION);
                                            $select = $link->query("SELECT * FROM rooms");
                                            $count = mysqli_num_rows($select);
                                            echo $count;
                                            ?>
                                      </h4>
                                      <div>
                                          <span class="f-left m-t-10 text-muted">
                                              <a href="rooms.php">
                                                  <i class="text-c-blue f-16 ti-eye m-r-10"></i>
                                                  See All
                                              </a>

                                          </span>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <!-- card 3 end -->

                          <!-- card 4 start -->
                          <div class="col-md-6 col-xl-3">
                              <div class="card widget-card-1">
                                  <div class="card-block-small">
                                      <i class="ti-layers bg-c-blue card1-icon"></i>
                                      <span class="text-c-blue f-w-600">Total Halls</span>
                                      <h4>
                                          <?php
                                            $sel = $link->query("SELECT * FROM halls");
                                            $counts = mysqli_num_rows($sel);
                                            echo $counts;
                                            ?>
                                      </h4>
                                      <div>
                                          <span class="f-left m-t-10 text-muted">
                                              <a href="halls.php">
                                                  <i class="text-c-blue f-16 ti-eye m-r-10"></i>
                                                  See All
                                              </a>

                                          </span>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <!-- card 4 end -->
                          <!-- Data widget End -->

                      </div>
                  </div>

                  <div id="styleSelector">

                  </div>
              </div>
          </div>
      </div>
  </div>
  </div>
  </div>
  </div>
  <script type="text/javascript" src="assets/js/jquery/jquery.min.js"></script>
  <script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js"></script>
  <script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js"></script>
  <!-- jquery slimscroll js -->
  <script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>
  <!-- modernizr js -->
  <script type="text/javascript" src="assets/js/modernizr/modernizr.js"></script>
  <!-- am chart -->
  <script src="assets/pages/widget/amchart/amcharts.min.js"></script>
  <script src="assets/pages/widget/amchart/serial.min.js"></script>
  <!-- Todo js -->
  <script type="text/javascript " src="assets/pages/todo/todo.js "></script>
  <!-- Custom js -->
  <script type="text/javascript" src="assets/pages/dashboard/custom-dashboard.js"></script>
  <script type="text/javascript" src="assets/js/script.js"></script>
  <script type="text/javascript " src="assets/js/SmoothScroll.js"></script>
  <script src="assets/js/pcoded.min.js"></script>
  <script src="assets/js/demo-12.js"></script>
  <script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
  <script>
      var $window = $(window);
      var nav = $('.fixed-button');
      $window.scroll(function() {
          if ($window.scrollTop() >= 200) {
              nav.addClass('active');
          } else {
              nav.removeClass('active');
          }
      });
  </script>
  </body>

  </html>