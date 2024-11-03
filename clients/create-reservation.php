<?php

include 'nav.php';
include './link.php';

$data = $_SESSION["data"];
if(is_null($data)){
    echo "<script>window.location.replace('signout.php')</script>";
}

if (isset($_SESSION['is_client'])) {
    $isClient = $_SESSION['is_client'];

    if ($isClient == false) {
        echo "<script>window.location.assign('signin.php?go-to=create-reservation&data=".json_encode($_GET)."')</script>";
    }
}

if (isset($_POST['number'])) {
    $hotelId = $data['hotel_id'];
    $number = $_POST['number'];
    $pricePerHour = $_POST['price_per_hour'];
    $pricePerDay = $_POST['price_per_day'];
    $displayTitle = $_POST["display_title"];

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    $sql = $link->query("INSERT INTO rooms(hotel_id, number, price_per_hour, price_per_day, image, display_title) VALUES('$hotelId', '$number', '$pricePerHour', '$pricePerDay', '$target_file', '$displayTitle')") or die($link->error);
    if ($sql) {
        $successmessage .= 'Add Room Successefully';
    } else {
        $errormessage .= 'Add Room failed!';
    }
}

if (isset($_GET['data'])) {
    $requestData = json_decode($_GET['data'], true);
    $rid = $requestData['reserved-id'];
} else {
    $requestData = $_GET;
}
?>
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="card">
                    <div class="card-header">
                        <h5>Manage Rooms</h5>
                        <div class="card-header-right"><i class="icofont icofont-spinner-alt-5"></i></div>
                    </div>
                    <div class="col-lg-12 col-xl-12">
                        <form method="POST" action="./save_reservation.php">
                        <input type="hidden" name="room-id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Reservation id" value="<?php echo $requestData['reserved-id'] ?>" readonly>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Reservation Type</label>
                                <input type="text" name="type" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Reservation Type" value="<?php echo $requestData['type'] ?>" readonly>
                            </div>
                            <input type="hidden" class="form-control form-control-lg form-control-a" name="reserved-id" required readonly value="<?php echo $rid; ?>">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Reserved Title</label>
                                <input type="text" name="reserved-title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Reserved Title" value="<?php echo $requestData['reserved-title']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Reserved Number</label>
                                <input type="text" name="reserved-number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Reserved Number" value="<?php echo $requestData['reserved-number']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Reserved Unit Price</label>
                                <input type="text" name="unit-price" class="form-control" id="exampleInputPassword1" placeholder="Unit Price" value="<?php echo $requestData['unit-price']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Reservation Period</label>
                                <input type="text" name="period" class="form-control" id="exampleInputPassword1" placeholder="Period" value="<?php echo $requestData['period'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Since</label>
                                <input type="text" name="since" class="form-control" id="exampleInputPassword1" placeholder="Since" value="<?php echo $requestData['since'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Until</label>
                                <input type="text" name="until" class="form-control" id="exampleInputPassword1" placeholder="Until" value="<?php echo $requestData['until'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Period Count</label>
                                <input type="text" name="count" class="form-control" id="exampleInputPassword1" placeholder="Period Count" value="<?php echo $requestData['count'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Total Amount</label>
                                <input type="text" name="total-amount" id="fileToUpload" class="form-control" value="<?php echo $requestData['total'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Phone N&deg;</label>
                                <input type="text" name="phone-number" id="fileToUpload" class="form-control" value="<?php echo $requestData['phone-number'] ?>" readonly>
                            </div>
                            <button type="submit" class="btn btn-primary">Confirm & Make Payment</button>
                        </form>
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