<?php
ob_start();
include 'nav.php';
if(isset($_GET['id'])&&isset($_GET['status'])){
    require_once "../controllers/houses.controller.php";
    $response = HouseController::set_status($_GET['id'],$_GET['status']);
    if($response['ok']){
        $_SESSION['success_message']=$response['message'];
        header("Location:houses.php");
    }else{
         $_SESSION['error_message']=$response['message'];
        header("Location:houses.php");
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
                        <a class="btn btn-primary" href="create-house.php" id="red">New</a>
                        <div class="card-header-right"><i class="icofont icofont-spinner-alt-5"></i></div>
                    </div>
                    <div class="col-lg-12 col-xl-12">
                        <ul class="nav nav-tabs md-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#profile3" role="tab">Registered Houses</a>
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
                                                    <th>Image</th>
                                                    <th>Title</th>
                                                    <th>Accomodation</th>
                                                    <th>House N&deg;</th>
                                                    <th>N&deg; of Rooms</th>
                                                    <th>N&deg; of Beds</th>
                                                    <th>Price/Hour</th>
                                                    <th>Price/Day</th>
                                                    <th colspan="3">action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $quer = mysqli_query($link, "SELECT h.*, a.name FROM houses h LEFT JOIN accomodations a ON h.accomodation_id = a.id");
                                                while ($row = mysqli_fetch_array($quer)) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $row['id']; ?></td>
                                                        <td><img src="<?php echo $row["image"] ?>" class="img-fluid" style="max-height: 40px;" /></td>
                                                        <td><?php echo $row['display_title']; ?></td>
                                                        <td><?php echo $row['name']; ?></td>
                                                        <td><?php echo $row['number']; ?></td>
                                                        <td><?php echo $row['number_of_rooms']; ?></td>
                                                        <td><?php echo $row['number_of_beds']; ?></td>
                                                        <td><?php echo $row['price_per_hour']; ?></td>
                                                        <td><?php echo $row['price_per_day']; ?></td>
                                                         <td>
                                                          <?php if($row['availability']==1){ ?>
                                                             <a class="btn btn-secondary" href="houses.php?id=<?=$row['id']; ?>&&status=0">set inactive</a></td>
                                                                          <?php     }  else{?>
                                                                 <a class="btn btn-success" href="houses.php?id=<?=$row['id']; ?>&&status=1">Set active</a>
                                                             <?php } ?>
                                        
                                                             </td>


                                                        <td><a class="btn btn-secondary" href="update-house.php?q=<?php echo $row['id']; ?>">Edit</a></td>
                                                        <td><a class="btn btn-danger" href="delete.php?delhouse=<?php echo $row['id']; ?>" onclick="return confirm('are you sure! you want to delete this service.')" id="red">Delete</a></td>
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