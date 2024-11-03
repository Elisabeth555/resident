<?php

  include 'nav.php';
  $user = $_SESSION['admin'];
  if (isset($_POST['update'])) 
{
$nsys   = $_POST['sname'];
$nuser  = $_POST['user'];
$nemo   = $_POST['email'];
$nphone = $_POST['pnumber'];
$npass  = md5($_POST['password']);
$nloc   = $_POST['location'];
$nabout = $_POST['about'];
$update = $link->query("UPDATE system_info SET system_name='$nsys',username='$nuser',email='$nemo',phone='$nphone',password='$npass',location='$nloc',about='$nabout'") or die(mysqli_error($link));
if ($update) 
{
  echo "<script>alert('Informations Updated Successfully!!')</script>";
  echo "<script>window.location.replace('signout.php')</script>";
}
else
{
  echo "<script>alert('Something Went Wrong. Try again!!')</script>";
}
}
?>
?>
                        <div class="pcoded-content">
                            <div class="pcoded-inner-content">
                                <div class="main-body">
                                    <div class="page-wrapper">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>System Information</h5>
                                            <div class="card-header-right"><i
                                                class="icofont icofont-spinner-alt-5"></i></div>
                                        </div>    
                                    <div class="col-lg-12 col-xl-12">
                                                <ul class="nav nav-tabs md-tabs" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" data-toggle="tab" href="#home3" role="tab">Update System Info</a>
                                                        <div class="slide"></div>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#profile3" role="tab">System Info</a>
                                                        <div class="slide"></div>
                                                    </li>
                                                </ul>
                                                <!-- Tab panes -->
                                                <div class="tab-content card-block">
                                                    <div class="tab-pane active" id="home3" role="tabpanel">
                                            <div class="card-block">
                                                <form method="POST">
                                                <?php 
                                                $info = $link->query("SELECT * FROM system_info WHERE username='$user'");
                                                $rows=mysqli_fetch_array($info);
                                                $sys   = $rows['system_name'];
                                                $uname = $rows['username'];
                                                $emo   = $rows['email'];
                                                $phone = $rows['phone'];
                                                $pass  = $rows['password'];
                                                $loc   = $rows['location'];
                                                $about = $rows['about'];
                                                ?>    
                                                <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">System Name</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="sname" class="form-control form-control-normal"
                                                            placeholder="Enter campany name" value="<?php echo $sys; ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Username</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="user" class="form-control form-control-normal"
                                                            value="<?php echo $uname; ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">E-mail</label>
                                                        <div class="col-sm-10">
                                                          <input type="email" name="email" class="form-control form-control-normal"
                                                            value="<?php echo $emo; ?>" required>    
                                                       
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Phone</label>
                                                        <div class="col-sm-10">
                                                          <input type="number" name="pnumber" class="form-control form-control-normal"
                                                            value="<?php echo $phone; ?>" required>   
                                                        
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">New Password or Existing *</label>
                                                        <div class="col-sm-10">
                                                          <input type="text" name="password" class="form-control form-control-normal"
                                                            placeholder="<?php echo $pass; ?>" required>    
                                                       
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Location</label>
                                                        <div class="col-sm-10">
                                                          <input type="text" name="location" class="form-control form-control-normal"
                                                            placeholder="Enter phone" value="<?php echo $loc; ?>" required>    
                                                       
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">About Us</label>
                                                        <div class="col-sm-10">
                                                          <textarea name="about" class="form-control form-control-normal" required> 
                                                          <?php echo $about;?>   
                                                       </textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <input type="submit" name="update" value="Update System Info"
                                                            class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">
                                                        </div>
                                                    </div>
                                                    
                                                </form>
                                            </div>
                                                    </div>
                                                    <div class="tab-pane" id="profile3" role="tabpanel">
                                                        
                                        <div class="card-block table-border-style">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>System Name</th>
                                                            <th>Username</th>
                                                            <th>E-mail</th>
                                                            <th>Phone</th>
                                                            <th>Password</th>
                                                            <th>Location</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        ;
                                                    <?php
                                                        $quer=mysqli_query($link,"SELECT * FROM system_info");
                                                        while ($row=mysqli_fetch_array($quer)){
                                                            $abt = $row['about'];
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $row['system_name'] ; ?></td>
                                                            <td><?php echo $row['username'] ; ?></td>
                                                            <td><?php echo $row['email'] ; ?></td>
                                                            <td><?php echo $row['phone'] ; ?></td>
                                                            <td><?php echo $row['password'] ; ?></td>
                                                            <td><?php echo $row['location'] ; ?></td>
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

            <    <![endif]-->
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
        $window.scroll(function(){
            if ($window.scrollTop() >= 200) {
            nav.addClass('active');
        }
        else {
            nav.removeClass('active');
        }
    });
    </script>
    </body>

    </html>
