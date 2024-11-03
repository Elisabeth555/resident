<?php

include 'nav.php';
include './link.php';
if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $website = $_POST['website'];
    $location = $_POST['location'];
    $accomodationId = $_GET["q"];

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    $sql = $link->query("UPDATE accomodations SET name = '$name', website = '$website', location = '$location', g_photo = '$target_file' WHERE id = '$accomodationId'") or die($link->error);
    if ($sql) {
        $successmessage .= 'Add Accomodation Successefully';
        echo "<script>alert('$successmessage')</script>";
    } else {
        $errormessage .= 'Add Accomodation failed!';
        echo "<script>alert('$errormessage')</script>";
    }
}
?>
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="card">
                    <div class="card-header">
                        <h5>Manage Accomodations</h5>
                        <div class="card-header-right"><i class="icofont icofont-spinner-alt-5"></i></div>
                    </div>
                    <div class="col-lg-12 col-xl-12">
                        <?php
                        $sql = "SELECT * FROM accomodations WHERE id = '$_GET[q]'";
                        $result = $link->query($sql);

                        if ($result->num_rows > 0) {
                            $accomodation = $result->fetch_assoc();
                        }
                        ?>
                        <form method="POST">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name" value="<?php echo $accomodation["name"] ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Website</label>
                                <input type="text" name="website" class="form-control" id="exampleInputPassword1" placeholder="Website" value="<?php echo $accomodation["website"] ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Location</label>
                                <input type="text" name="location" class="form-control" id="exampleInputPassword1" placeholder="Location" value="<?php echo $accomodation["location"] ?>">
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