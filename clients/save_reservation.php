<?php
error_reporting(0);
session_start();

include '../pay-with-momo/parse.php';

if (!isset($_SESSION['data'])) {
    die("Session data not available");
}

$clientData = $_SESSION['data'];

include "./link.php";

$type = htmlspecialchars($_POST['type']);
$reservedTitle = htmlspecialchars($_POST['reserved-title']);
$reservedId = htmlspecialchars($_POST['room-id']);
$reservedNumber = htmlspecialchars($_POST['reserved-number']);
$unitPrice = htmlspecialchars($_POST['unit-price']);
$period = htmlspecialchars($_POST['period']);
$since = htmlspecialchars($_POST['since']);
$until = htmlspecialchars($_POST['until']);
$count = htmlspecialchars($_POST['count']);
$totalAmount = htmlspecialchars($_POST['total-amount']);
$phoneNumber = htmlspecialchars($_POST['phone-number']);

try {
    // Insert into reservations table
    $stmt = $link->prepare("INSERT INTO `reservations`(`client_id`, `type`, `type_id`, `period`, `period_count`, `total_amount`, `since`, `until`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $clientData['id'], $type, $reservedId, $period, $count, $totalAmount, $since, $until);

    if (!$stmt->execute()) {
        throw new Exception("Failed to add data: " . $stmt->error);
    }

    $reservationId = $link->insert_id;
    $stmt->close();
    // tx ref 

    // generate tx ref 
    $tx_ref = "res-".time().rand();

    // Insert into payments table
    $stmt = $link->prepare("INSERT INTO `payments`(`amount`, `reservation_id`,`transaction_ref`) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $totalAmount, $reservationId,$tx_ref);
    
    if ($stmt->execute()) {
        // call the payment
        $pay = hdev_payment::pay($phoneNumber,$totalAmount,$tx_ref);
        var_dump($pay);
        if(!is_null($pay) && $pay->status == "success"){
            // js redirect to wait.php
            echo "<script>window.location.href='wait.php?tx_ref=".$tx_ref."'</script>";
            exit();
        }else{
            $_SESSION['error_message'] = 'Booking Reservation failed';
        }
        $_SESSION['success_message'] = 'Booking Reservation successful Pay'.$totalAmount.' FRw on Acc 112332-123435-324245 and upload invoice';
    } else {
        $_SESSION['error_message'] = 'Booking Reservation failed';
    }

    $stmt->close();

    $available = $link->query("UPDATE rooms SET availability=0 WHERE id=$reservedId");
echo"<script>alert($reservedId)</script>";
    // Redirect to reservation page
    header("Location: reservations.php");
    exit();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

?>
