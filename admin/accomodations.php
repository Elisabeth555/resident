<?php
ob_start();
include 'nav.php';
if(isset($_GET['id'])&&isset($_GET['status'])){
    require_once "../controllers/accomodations.controller.php";
    $response = AccomodationsController::set_status($_GET['id'],$_GET['status']);
    if($response['ok']){
        $_SESSION['success_message']=$response['message'];
        header("Location:accomodations.php");
    }else{
         $_SESSION['error_message']=$response['message'];
        header("Location:accomodations.php");
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
                        <a class="btn btn-primary" href="create-accomodation.php" id="red">New</a>
                        <div class="card-header-right"><i class="icofont icofont-spinner-alt-5"></i></div>
                    </div>
                    <div class="col-lg-12 col-xl-12">
                        <ul class="nav nav-tabs md-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#profile3" role="tab">Registered Accomodations</a>
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
                                                    <th>Accomodation Name</th>
                                                    <th>Website</th>
                                                    <th>Location</th>
                                                    <th>Update</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $quer = mysqli_query($link, "SELECT * FROM accomodations");
                                                while ($row = mysqli_fetch_array($quer)) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $row['id']; ?></td>
                                                        <td><?php echo $row['name']; ?></td>
                                                        <td><?php echo $row['website']; ?></td>
                                                        <td><?php echo $row['location']; ?></td>
                                                        <td>
                                                        <?php if($row['availability']==1){ ?>
                                                        <a class="btn btn-secondary" href="accomodations.php?id=<?=$row['id']; ?>&&status=0">set inactive</a></td>
                                                         <?php     }  else{?>
                                                                 <a class="btn btn-success" href="accomodations.php?id=<?=$row['id']; ?>&&status=1">Set active</a>
                                                         <?php } ?>
                                                          </td>
                                                        <td><a class="btn btn-secondary" href="update-accomodation.php?q=<?php echo $row['id']; ?>" id="red">Edit</a></td>
                                                        <td><a class="btn btn-danger" href="delete.php?deld=<?php echo $row['id']; ?>" onclick="return confirm('are you sure! you want to delete this service.')" id="red">Delete</a></td>
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