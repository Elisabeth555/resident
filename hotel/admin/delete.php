<?php
include 'link.php';

if (isset($_GET['delservice'])){
	$del_service=$_GET['delservice'];
	$del_quer=mysqli_query($conn,"DELETE FROM services WHERE id='$del_service' ");	 
    if ($del_quer) {        
		?>
        <script type="text/javascript">alert('Drone Deleted, Successfully!')</script>
        <?php
        header("location:addservice.php");
    }
    else {
        
		?>
        <script type="text/javascript">alert('Delete Drone failed!')</script>
        <?php
        header("location:addservice.php");
    }
}

if (isset($_GET['delroom'])){
	$del_room=$_GET['delroom'];
	$del_quer=mysqli_query($link,"DELETE FROM rooms WHERE id='$del_room' ");	 
    if ($del_quer) {        
		?>
        <script type="text/javascript">alert('Drone Deleted, Successfully!')</script>
        <?php
        header("location:rooms.php");
    }
    else {
        
		?>
        <script type="text/javascript">alert('Delete Drone failed!')</script>
        <?php
        header("location:rooms.php");
    }
}

if (isset($_GET['delhall'])){
	$del_hall=$_GET['delhall'];
	$del_quer=mysqli_query($link,"DELETE FROM halls WHERE id='$del_hall' ");	 
    if ($del_quer) {        
		?>
        <script type="text/javascript">alert('Drone Deleted, Successfully!')</script>
        <?php
        header("location:halls.php");
    }
    else {
        
		?>
        <script type="text/javascript">alert('Delete Drone failed!')</script>
        <?php
        header("location:halls.php");
    }
}

if (isset($_GET['deld'])){
    $del_service=$_GET['deld'];
    $del_quer=mysqli_query($link,"DELETE FROM hotel WHERE id='$del_service' ");   
    if ($del_quer) {        
        ?>
        <script type="text/javascript">alert('Hotel Deleted, Successfully!')</script>
        <?php
        header("location:hlist.php");
    }
    else {
        
        ?>
        <script type="text/javascript">alert('Delete Hotel failed!')</script>
        <?php
        header("location:hlist.php");
    }
}
if (isset($_GET['delu']))
{
    $del_service=$_GET['delu'];
    $del_quer=mysqli_query($link,"DELETE FROM users WHERE id='$del_service' ");   
    if ($del_quer) {        
        ?>
        <script type="text/javascript">alert('User Deleted, Successfully!')</script>
        <?php
        header("location:bloodd.php");
    }
    else {
        
        ?>
        <script type="text/javascript">alert('Delete User failed!')</script>
        <?php
        header("location:bloodd.php");
    }
}

if (isset($_GET['delabout'])){
	$del_service=$_GET['delabout'];
	$del_quer=mysqli_query($conn,"DELETE FROM about WHERE id='$del_service' ");	 
    if ($del_quer) {
        echo '
        <script type="text/javascript">alert("about Deleted, Successfully!")</script>
        
        ';
        header("location:about.php");
    }
    else {
        echo '
        <script type="text/javascript">alert("about not Deleted,!")</script>
        
        ';
        header("location:about.php");
    }
}

if (isset($_GET['delscontact'])){
	$del_service=$_GET['delscontact'];
	$del_quer=mysqli_query($link,"DELETE FROM contact WHERE id='$del_service' ");	 
    if ($del_quer) {
        echo '
        <script type="text/javascript">alert("contact Deleted, Successfully!")</script>       
        ';
        header("location:contact.php");
    }
    else {
        echo '
        <script type="text/javascript">alert("contact not Deleted,!")</script>
        
        ';
        header("location:contact.php");
    }
}



if (isset($_GET['delmessage'])){
	$del_messa=$_GET['delmessage'];
	$del_quer=mysqli_query($link,"DELETE FROM messages WHERE id='$del_messa' ");	 
    if ($del_quer) {
        echo '
        <script type="text/javascript">alert("contact Deleted, Successfully!")</script>       
        ';
        header("location:message.php");
    }
    else {
        echo '
        <script type="text/javascript">alert("contact not Deleted,!")</script>
        
        ';
        header("location:message.php");
    }
}



if (isset($_GET['delpackage'])){
	$del_pack=$_GET['delpackage'];
	$del_quer=mysqli_query($conn,"DELETE FROM package WHERE pack_id='$del_pack' ");	 
    if ($del_quer) {
        echo '
        <script type="text/javascript">alert("Package Deleted, Successfully!")</script>       
        ';
        header("location:package.php");
    }
    else {
        echo '
        <script type="text/javascript">alert("Package not Deleted,!")</script>
        ';
        header("location:package.php");
    }
}


if (isset($_GET['deldestination'])){
	$del_pack=$_GET['deldestination'];
	$del_quer=mysqli_query($conn,"DELETE FROM destination WHERE desti_id='$del_pack' ");	 
    if ($del_quer) {
        echo '
        <script type="text/javascript">alert("destination Deleted, Successfully!")</script>       
        ';
        header("location:destination.php");
    }
    else {
        echo '
        <script type="text/javascript">alert("destination not Deleted,!")</script>
        ';
        header("location:destination.php");
    }
}


if (isset($_GET['delbooking'])){
	$del_pack=$_GET['delbooking'];
	$del_quer=mysqli_query($conn,"DELETE FROM booking WHERE bookid='$del_pack' ");	 
    if ($del_quer) {
        echo '
        <script type="text/javascript">alert("Book Deleted, Successfully!")</script>       
        ';
        header("location:booking.php");
    }
    else {
        echo '
        <script type="text/javascript">alert("destination not Deleted,!")</script>
        ';
        header("location:booking.php");
    }
}


if (isset($_GET['deleplx'])){
	$del_pack=$_GET['deleplx'];
	$del_quer=mysqli_query($conn,"DELETE FROM  explanation WHERE id='$del_pack' ");	 
    if ($del_quer) {
        echo '
        <script type="text/javascript">alert(" explanation Deleted, Successfully!")</script>       
        ';
        header("location:explanation.php");
    }
    else {
        echo '
        <script type="text/javascript">alert(" explanation not Deleted,!")</script>
        ';
        header("location:explanation.php");
    }
}




?>