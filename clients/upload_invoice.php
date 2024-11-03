<?php
session_start();
include 'link.php'; // Include your database connection

if (isset($_FILES['invoice'])) {
    $payment_id = $_POST['pay_id'];
    $res_id = $_POST['res_id'];
    $target_dir = "invoices/";
    $target_file = $target_dir . basename($_FILES["invoice"]["name"]);
    $uploadOk = 1;
    $invoiceFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    // Check if file is a PDF
    if ($invoiceFileType != "pdf") {
        echo "Sorry, only jpg, png, jpeg and PDF files are allowed.".$invoiceFileType;
        $uploadOk = 0;
    }

    // Upload the file
    if ($uploadOk == 1 && move_uploaded_file($_FILES["invoice"]["tmp_name"], $target_file)) {
        // Store the URL in the database
        $invoice_url = $target_file;
        $query = "UPDATE payments SET invoice_url='$invoice_url' WHERE id='$payment_id'";
        mysqli_query($link, $query);
        require_once "../controllers/reservation.controller.php";
        $resp=ReservationController::set_status($res_id,$_POST['status']);
       $_SESSION['success_message']="Invoice uploaded successfully!";
    } else {
        $_SESSION['success_message'] = "Error uploading invoice.";
    }
    header("location:reservations.php");
}
?>
