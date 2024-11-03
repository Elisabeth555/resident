<?php
ob_start();
error_reporting(0);
include 'nav.php';
include 'link.php';
include '../pay-with-momo/pay-with-momo.php';
$data = $_SESSION["data"];
require_once"add_invoice_model.php";
if(isset($_GET['id']) && isset($_GET['status'])){
 require_once "../controllers/reservation.controller.php";
 $id = $_GET['id'];
 $status = $_GET['status'];
 $res = ReservationController::set_status($id,"canceled");
 print_r($res);
 if($res['ok']){
    $_SESSION['success_message']="Reservation Canceled";
}

if(!$res['ok']){
    $_SESSION['error_message']=$res['message'];
}
header("location:reservations.php");
}
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
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $quer = mysqli_query($link, "SELECT r.*,p.id invoiceno, p.transaction_id FROM reservations r LEFT JOIN payments p ON r.id = p.reservation_id WHERE r.client_id = '$data[id]' order by r.created_at desc");
                        while ($row = mysqli_fetch_array($quer)) {
                            if ($row['type'] == 'Room') {
                                $reservedQuery = mysqli_query($link, "SELECT * FROM rooms WHERE id = '$row[type_id]'");
                                $reserved = mysqli_fetch_array($reservedQuery);
                                $row['display_title'] = $reserved['display_title'];
                                $row['number'] = $reserved['number'];
                                $row['unit_price'] = $row['period'] == 'hourly' ? $reserved['price_per_hour'] : $reserved['price_per_day'];
                            }
                        ?>
                            <tr>
    <td><?php echo htmlspecialchars($row['id']); ?></td>
<td><?php echo htmlspecialchars($row["type"]); ?></td>
<td><?php echo htmlspecialchars($row['display_title'] ? $row['display_title'] : $row["type"]); ?></td>
<td><?php echo htmlspecialchars($row['number'] ? $row['number'] : $row['id']); ?></td>
<td><?php echo htmlspecialchars($row['period']); ?></td>
<td><?php echo htmlspecialchars($row['since']); ?></td>
<td><?php echo htmlspecialchars($row['until']); ?></td>
<td><?php echo htmlspecialchars($row['unit_price'] ? $row['unit_price'] : $row['total_amount']); ?></td>
<td><?php echo htmlspecialchars($row['total_amount']); ?></td>
<td><?php echo htmlspecialchars($row['status']); ?></td>
                         <?php if($row['status'] == 'pending'){ ?>
                                <td>
                                 <a href="#" class="btn btn-primary" onclick="openUploadModal(<?php echo $row['invoiceno']; ?>,<?php echo $row['id']; ?>,'onreview')">Upload Invoice</a>
                                 <a href="reservations.php?id=<?php echo $row['id']; ?>&status==canceled" class="btn btn-danger" onclick="return(confirm('Are you sure you want to cancel this reservation?'))">Cancel</a>
                             </td>
                         <?php } elseif($row['status'] == 'rejected'){ ?>
                             <td>
                                 <a href="#" class="btn btn-primary" onclick="openUploadModal(<?php echo $row['invoiceno']; ?>,<?php echo $row['id']; ?>,'appealed')">change Invoice & appeal</a>
                                <a href="reservations.php?id=<?php echo $row['id']; ?>&status==canceled" class="btn btn-danger" onclick="return(confirm('Are you sure you want to cancel this reservation?'))">cancel</a>
                            </td>
                         <?php } ?>
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
    function openUploadModal(id,resId,status) {
    $('#reservationId').val(id);
    $('#uploadInvoiceModal').modal('show');
    document.getElementById('paymentIdField').value = id
    document.getElementById('id').value = id;
    document.getElementById('resIdField').value = resId;
    document.getElementById('status').value = status;
}
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