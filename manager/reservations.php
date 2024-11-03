<?php

include 'nav.php';
include 'link.php';
include '../pay-with-momo/pay-with-momo.php';

$data = $_SESSION["data"];

?>
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="card">
                    <div class="card-header">
                        <h5>Manage Reservations</h5>
                        <!-- <a class="btn btn-primary" href="create-reservation.php" id="red">New</a> -->
                        <div class="card-header-right"><i class="icofont icofont-spinner-alt-5"></i></div>
                    </div>
                    <div class="col-lg-12 col-xl-12">
                        <ul class="nav nav-tabs md-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#profile3" role="tab">Registered Reservations</a>
                                <div class="slide"></div>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content card-block">
                            <div class="tab-pane active" id="home3" role="tabpanel">
                            </div>
                            <div class="tab-pane active" id="profile3" role="tabpanel">

                                <div class="card-block table-border-style">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Type</th>
                                                    <th>Title</th>
                                                    <th>Number</th>
                                                    <th>Period</th>
                                                    <th>Since</th>
                                                    <th>Until</th>
                                                    <th>Unit Price</th>
                                                    <th>Total</th>
                                                    <th>Status</th>
                                                    <!-- <th>Edit</th> -->
                                                    <!-- <th>Delete</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                // Select all hotel's rooms with group concat
                                                $sql1 = "SELECT GROUP_CONCAT(id) FROM rooms WHERE hotel_id = '$data[id]'";
                                                $query1 = mysqli_query($link, $sql1);
                                                $row1 = mysqli_fetch_array($query1);
                                                $rooms = $row1[0];

                                                // Select all hotel's halls with group concat
                                                $sql2 = "SELECT GROUP_CONCAT(id) FROM halls WHERE hotel_id = '$data[id]'";
                                                $query2 = mysqli_query($link, $sql2);
                                                $row2 = mysqli_fetch_array($query2);
                                                $halls = $row2[0];

                                                $sql = "SELECT r.*, p.transaction_id FROM reservations r LEFT JOIN payments p ON r.id = p.reservation_id";
                                                if (strlen($rooms) > 0 || strlen($halls) > 0) {
                                                    $sql .= " WHERE";
                                                    if (strlen($rooms) > 0) {
                                                        $sql .= " (r.type = 'Room' AND r.type_id IN ($rooms))";

                                                        if (strlen($rooms) > 0 && strlen($halls) > 0) {
                                                            $sql .= " OR";
                                                        }
                                                    }

                                                    if (strlen($halls) > 0) {
                                                        $sql .= " (r.type = 'Hall' AND r.type_id IN ($halls))";
                                                    }
                                                }
                                                $sql .= " ORDER BY r.id DESC";
                                                // echo $sql;
                                                $quer = mysqli_query($link, $sql);
                                                $i = 0;
                                                while ($row = mysqli_fetch_array($quer)) {
                                                    $i++;
                                                    if ($row['type'] == 'Room') {
                                                        $reservedQuery = mysqli_query($link, "SELECT * FROM rooms WHERE id = '$row[type_id]'");
                                                        $reserved = mysqli_fetch_array($reservedQuery);
                                                        $row['display_title'] = $reserved['display_title'];
                                                        $row['number'] = $reserved['number'];
                                                        $row['unit_price'] = $row['period'] == 'hourly' ? $reserved['price_per_hour'] : $reserved['price_per_day'];
                                                    }

                                                    // print_r($row);
                                                    try {
                                                        // $onlinePaymentObject = getPayment($row['transaction_id']);
                                                        // print_r($onlinePaymentObject);
                                                    } catch (\Throwable $th) {
                                                        // print_r($th);
                                                    }
                                                ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo $row["type"] ?></td>
                                                        <td><?php echo $row['display_title']; ?></td>
                                                        <td><?php echo $row['number']; ?></td>
                                                        <td><?php echo $row['period']; ?></td>
                                                        <td><?php echo $row['since']; ?></td>
                                                        <td><?php echo $row['until']; ?></td>
                                                        <td><?php echo $row['unit_price']; ?></td>
                                                        <td><?php echo $row['total_amount']; ?></td>
                                                        <td><?php echo $onlinePaymentObject?->status; ?></td>
                                                        <!-- <td><a class="btn btn-secondary" href="update-reservation.php?q=<?php echo $row['id']; ?>">Edit</a></td> -->
                                                        <!-- <td><a class="btn btn-danger" href="delete.php?delreservation=<?php echo $row['id']; ?>" onclick="return confirm('are you sure! you want to delete this service.')" id="red">Delete</a></td> -->
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

</div>
</div>


<!-- Warning Section Ends -->
<!-- Required Jquery -->
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