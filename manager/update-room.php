<?php

include 'nav.php';
include './link.php';
$data = $_SESSION["data"];
if (isset($_POST['number'])) {
    $number = $_POST['number'];
    $hotelId = $data["hotel_id"];
    $pricePerHour = $_POST['price_per_hour'];
    $pricePerDay = $_POST['price_per_day'];
    $roomId = $_GET["q"];
    $displayTitle = $_POST["display_title"];

    if (!empty($_FILES)) {
        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

        echo $_FILES["fileToUpload"]["tmp_name"];
        echo "<br />";
        echo $target_file;
        echo "<br />";

        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    $sql = $link->query("UPDATE rooms SET hotel_id = '$hotelId', number = '$number', price_per_hour = '$pricePerHour', price_per_day = '$pricePerDay', image = '$target_file', display_title = '$displayTitle' WHERE id = '$roomId'") or die($link->error);
    if ($sql) {
        $successmessage .= 'Add Room Successefully';
    } else {
        $errormessage .= 'Add Room failed!';
    }
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
                        <?php
                        $sql = "SELECT * FROM rooms WHERE id = '$_GET[q]'";
                        $result = $link->query($sql);

                        if ($result->num_rows > 0) {
                            $room = $result->fetch_assoc();
                        }
                        ?>
                        <form method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Display title</label>
                                <input type="text" name="display_title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Display title" value="<?php echo $room["display_title"] ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Room number</label>
                                <input type="text" name="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Number" value="<?php echo $room["number"] ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Price/Hour</label>
                                <input type="text" name="price_per_hour" class="form-control" id="exampleInputPassword1" placeholder="Price per hour" value="<?php echo $room["price_per_hour"] ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Price/Day</label>
                                <input type="text" name="price_per_day" class="form-control" id="exampleInputPassword1" placeholder="Price per day" value="<?php echo $room["price_per_day"] ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Image</label>
                                <input type="file" name="fileToUpload" id="fileToUpload" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
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