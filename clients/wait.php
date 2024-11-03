<?php

include "./link.php";
include '../pay-with-momo/parse.php';
    if($_GET){
        if(isset($_GET['tx_ref'])){
            $tx_ref = $_GET['tx_ref'];
        }
    }else{
        //js alert that no tx_ref
        echo "<script>alert('No transaction reference')</script>";
        exit();


    }

    // get the payment status from db
    $stmt = $link->prepare("SELECT * FROM `payments` WHERE `transaction_ref` = ?");
    $stmt->bind_param("s", $tx_ref);
    $stmt->execute();
    $result = $stmt->get_result();
    $payment = $result->fetch_assoc();
    $stmt->close();

    if($payment['status'] == "success" || $payment['status'] == "failed" || $payment['status'] == "rejected"){
        // js redirect to reservation page
        echo "<script>window.location.href='reservations.php'</script>";
        exit();
    }elseif ($payment['status'] == "pending") {
        $payment_data = hdev_payment::get_pay($tx_ref);
        if($payment_data->status == "success"){
            //update db with transaction_id and status 
            $stmt = $link->prepare("UPDATE `payments` SET `transaction_id` = ?, `status` = ? WHERE `transaction_ref` = ?");
            $stmt->bind_param("sss", $payment_data->transaction_id, $payment_data->status, $tx_ref);
            $stmt->execute();
            $stmt->close();

            $st = 'approved';

            // set the status as 
            // `reservations`(`id`, `client_id`, `type`, `type_id`, `period`, `since`, `until`, `period_count`, `total_amount`, `created_at`, `updated_at`, `status`)
            $stmt = $link->prepare("UPDATE `reservations` SET `status` = ? WHERE `id` = ?");
            $stmt->bind_param("ss",$st, $payment['reservation_id']);
            $stmt->execute();
            $stmt->close();

            // display it 
            echo "<script>alert('Payment successful')</script>";
            // js redirect to reservation page
            echo "<script>window.location.href='reservations.php'</script>";
            exit();
        }if ($payment_data->status == "failed" || $payment_data->status == "rejected") {

            // update db 
            $stmt = $link->prepare("UPDATE `payments` SET `status` = ? WHERE `transaction_ref` = ?");
            $stmt->bind_param("ss", $payment_data->status, $tx_ref);
            $stmt->execute();
            $stmt->close();
            $st= 'canceled';

            $stmt = $link->prepare("UPDATE `reservations` SET `status` = ? WHERE `id` = ?");
            $stmt->bind_param("ss", $st, $payment['reservation_id']);
            $stmt->execute();
            $stmt->close();

            // js alert payment failed
            echo "<script>alert('Payment failed')</script>";
            // redirect to reservation page
            echo "<script>window.location.href='reservations.php'</script>";
            exit();
        }

    }
    // re select data 
    $stmt = $link->prepare("SELECT * FROM `payments` WHERE `transaction_ref` = ?");
    $stmt->bind_param("s", $tx_ref);
    $stmt->execute();
    $result = $stmt->get_result();
    $payment = $result->fetch_assoc();
    $stmt->close();
?>

<!-- html centered with transaction_ref and payment status reload in every 5 secs  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Status</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Arial, sans-serif;
        }
    </style>
</head>
<body>
    <div>
        <h1>Payment Status</h1>
        <p>Transaction Reference: <?php echo $payment['transaction_ref']; ?></p>
        <p>Status: <?php echo $payment['status']; ?></p>
    </div>
    <script>
        setTimeout(() => {
            location.reload();
        }, 5000);
    </script>
</body>
</html>