<?php
ob_start();
include 'nav.php';
include 'link.php';
require_once '../pay-with-momo/pay-with-momo.php';
require_once '../controllers/reservation.controller.php';

// Check for status change action
if (isset($_GET['id']) && isset($_GET['action'])) {
    $id = intval($_GET['id']);
    $status = ($_GET['action'] == 'approve') ? 'approved' : (($_GET['action'] == 'reject') ? 'rejected' : 'completed');
    $resp = ReservationController::set_status($id, $status);
    
    if ($resp['ok']) {
        $_SESSION['success_message'] = $resp['message'];
    } else {
        $_SESSION['error_message'] = $resp['message'];
    }
    
    header("location: reservations.php");
    exit;
}

// Pagination Setup
$limit = 10; // Rows per page
$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1; // Ensure $page is at least 1
$start = ($page - 1) * $limit;
$label = isset($_GET['label']) ? htmlspecialchars($_GET['label']) : null;

// Fetch Total Reservations Count
$countQuery = $label ? mysqli_query($link, "SELECT COUNT(*) AS total FROM reservations WHERE status='$label'") : mysqli_query($link, "SELECT COUNT(*) AS total FROM reservations");
$countResult = mysqli_fetch_assoc($countQuery);
$totalRows = $countResult['total'];
$totalPages = max(1, ceil($totalRows / $limit)); // Ensure there's at least 1 page

// Fetch reservations based on pagination and label filter
$rows = ReservationController::getReservations($link, $start, $limit, $label);
$i = $start;
?>

<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="card">
                    <div class="card-header">
                        <h5>Manage Halls</h5>
                        <a class="btn btn-primary" href="create-hall.php" id="red">New</a>
                        <div class="card-header-right"><i class="icofont icofont-spinner-alt-5"></i></div>
                    </div>
                    <div class="col-lg-12 col-xl-12">
                        <ul class="nav nav-tabs md-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#profile3" role="tab">Registered Halls</a>
                                <div class="slide"></div>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="row py-4">
                            <div class="col">
                                <a href="reservations.php?label=pending" class="btn">Wait for Payment</a>
                            </div>
                            <div class="col">
                                <a href="reservations.php?label=onreview" class="btn">Wait for Approval</a>
                            </div>
                            <div class="col">
                                <a href="reservations.php?label=approved" class="btn">Approved Reservations</a>
                            </div>
                            <div class="col">
                                <a href="reservations.php?label=appealed" class="btn">Appealed Reservations</a>
                            </div>
                            <div class="col">
                                <a href="reservations.php?label=rejected" class="btn">Rejected Reservations</a>
                            </div>
                        </div>

                        <div class="tab-content card-block">
                            <div class="tab-pane active" id="profile3" role="tabpanel">
                                <div class="card-block table-border-style">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Type</th>
                                                    <th>Period</th>
                                                    <th>Since</th>
                                                    <th>Until</th>
                                                    <th>Unit Price</th>
                                                    <th>Total</th>
                                                    <th>Status</th>
                                                    <th colspan="3">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($rows as $row) {
                                                    $i++;
                                                ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo htmlspecialchars($row["type"]); ?></td>
                                                        <td><?php echo htmlspecialchars($row['period_count']); ?></td>
                                                        <td><?php echo htmlspecialchars($row['since']); ?></td>
                                                        <td><?php echo htmlspecialchars($row['until']); ?></td>
                                                        <td><?php echo htmlspecialchars($row['total_amount']/$row['period_count']); ?></td>
                                                        <td><?php echo htmlspecialchars($row['total_amount']); ?></td>
                                                        <td><?php echo htmlspecialchars($row['status']); ?></td>
                                                        <?php if ($row['status'] == 'onreview' || $row['status'] == 'appealed') { ?>
                                                            <td><a href="../clients/<?php echo htmlspecialchars($row['invoice_url']); ?>" class="link" target='_blank'>View Invoice</a></td>
                                                            <td><a href="reservations.php?id=<?php echo intval($row['id']); ?>&action=approve" class="btn btn-sm btn-success">Approve</a></td>
                                                            <td><a href="reservations.php?id=<?php echo intval($row['id']); ?>&action=reject" class="btn btn-sm btn-danger">Reject</a></td>
                                                        <?php } ?>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- Pagination -->
                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item <?php if ($page == 1) echo 'disabled'; ?>">
                                            <a class="page-link" href="?page=<?php echo max(1, $page - 1); ?>">Previous</a>
                                        </li>
                                        <?php for ($p = 1; $p <= $totalPages; $p++) { ?>
                                            <li class="page-item <?php if ($page == $p) echo 'active'; ?>">
                                                <a class="page-link" href="?page=<?php echo $p; ?>"><?php echo $p; ?></a>
                                            </li>
                                        <?php } ?>
                                        <li class="page-item <?php if ($page == $totalPages) echo 'disabled'; ?>">
                                            <a class="page-link" href="?page=<?php echo min($totalPages, $page + 1); ?>">Next</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Required JS Libraries -->

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
