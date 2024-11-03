<?php
define('API_ID', "HDEV-690d1434-f4d2-4585-9e0b-37ca7faa9a93-ID");
define('API_KEY', "HDEV-e6ecceeb-ec99-4454-a5da-2e478835bb71-KEY");

function makePayment($reservationId, $phone, $price)
{
    include 'pay-parse.php';
    include "../link.php";
    include "../mailer.php";

    $curl = curl_init();
    $transID = uniqid();
    $calback = "";

    hdev_payment::api_id(API_ID);
    hdev_payment::api_key(API_KEY);
    $pay = hdev_payment::pay($phone, $price, $transID, $calback);

    $query = "INSERT INTO `payments`(`reservation_id`, `transaction_id`, `phone`, `amount`, `method`, `status`, `transaction_message`) VALUES ('$reservationId', '$transID', '$phone', '$price', 'MoMo', '$pay->status', '$pay->message')";
    // echo $query;
    $result = $link->query($query);

    sendMail($reservationId);

    return $pay;
}

function getPayment($transID)
{
    include 'pay-parse.php';

    try {
        hdev_payment::api_id(API_ID);
        hdev_payment::api_key(API_KEY);
        $result = hdev_payment::get_pay($transID);
    } catch (\Throwable $th) {
        $result = $th;
    }

    return $result;
}
