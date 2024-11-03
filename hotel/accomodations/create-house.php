<?php

include 'nav.php';
include './link.php';

$data = $_SESSION["data"];

if (isset($_POST['number'])) {
    $accomodationId = $data['accomodation_id'];
    $number = $_POST['number'];
    $pricePerHour = $_POST['price_per_hour'];
    $pricePerDay = $_POST['price_per_day'];
    $displayTitle = $_POST["display_title"];
    $numberOfRooms = $_POST["number_of_rooms"];
    $numberOfBeds = $_POST["number_of_beds"];

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    $sql = $link->query("INSERT INTO houses(accomodation_id, number, price_per_hour, price_per_day, image, display_title, number_of_rooms, number_of_beds) VALUES('$accomodationId', '$number', '$pricePerHour', '$pricePerDay', '$target_file', '$displayTitle', '$numberOfRooms', '$numberOfBeds')") or die($link->error);
    if ($sql) {
        $successmessage .= 'Add House Successefully';
    } else {
        $errormessage .= 'Add House failed!';
    }
}
?>
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="card">
                    <div class="card-header">
                        <h5>Manage Houses</h5>
                        <div class="card-header-right"><i class="icofont icofont-spinner-alt-5"></i></div>
                    </div>
                    <div class="col-lg-12 col-xl-12">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Display title</label>
                                <input type="text" name="display_title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Display title">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">House number</label>
                                <input type="text" name="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Number">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Number of Rooms</label>
                                <input type="text" name="number_of_rooms" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Number of Rooms">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Number of Beds</label>
                                <input type="text" name="number_of_beds" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Number of Bedss">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Price/Hour</label>
                                <input type="text" name="price_per_hour" class="form-control" id="exampleInputPassword1" placeholder="Price per hour">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Price/Day</label>
                                <input type="text" name="price_per_day" class="form-control" id="exampleInputPassword1" placeholder="Price per day">
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