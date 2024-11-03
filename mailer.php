<?php
require_once 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Create an instance; passing `true` enables exceptions

function sendMail($reservationId)
{
    include './link.php';
    $mail = new PHPMailer(true);

    $mail->IsSMTP();
    $mail->Mailer = "smtp";

    $query = "SELECT reservations.*, users.email FROM reservations LEFT JOIN users ON reservations.client_id = users.id WHERE reservations.id = '$reservationId'";
    $result = $link->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if ($row["type"] == "Room") {
            $reservedQuery = "SELECT * FROM rooms WHERE id = '$row[type_id]'";
        } else if ($row["type"] == "Hall") {
            $reservedQuery = "SELECT * FROM halls WHERE id = '$row[type_id]'";
        } else if ($row["type"] == "House") {
            $reservedQuery = "SELECT * FROM houses WHERE id = '$row[type_id]'";
        }

        $reservedResult = $link->query($reservedQuery);
        
        if ($reservedResult->num_rows > 0) {
            $reserved = $reservedResult->fetch_assoc();
            print_r($reserved);
        }

        try {
            $mail->SMTPDebug = 1;
            $mail->SMTPAuth = TRUE;
            $mail->SMTPSecure = "tls";
            $mail->Port = 587;
            $mail->Host = "smtp.gmail.com";
            $mail->Username = "elvisrugero@gmail.com";
            $mail->Password = "qgjozdfkvhgxuqdl";

            //Recipients
            $mail->IsHTML(true);
            $mail->AddAddress($row['email'], $row['firstname'] . " " . $row["lastname"]);
            $mail->SetFrom("elvisrugero@gmail.com", "NREP");
            $mail->AddReplyTo("elvisrugero@gmail.com", "reply-to-name");
            $mail->AddCC("elvisrugero@gmail.com", "cc-recipient-name");
            $mail->Subject = "Order #$reservationId";
            $content = "<b>Thank you for reserving $reserved->display_title since $row[since] until $row[until]</b>.";

            //Content
            $mail->MsgHTML($content);
            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
