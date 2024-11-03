<?php
require_once "../db/db.php";
class ReservationController extends DB{
    public static function getReservations($link, $start, $limit, $label = null)
    {
        // Base query
        $query = "SELECT r.*, p.transaction_id,p.invoice_url, r.status AS status 
                  FROM reservations r 
                  LEFT JOIN payments p ON r.id = p.reservation_id";

        // If a label is provided, filter by p.status in the WHERE clause
        if ($label) {
            $query .= " WHERE r.status = ?";
        }

        // Append order and limit clause
        $query .= " ORDER BY r.id DESC LIMIT ?, ?";

        // Prepare the SQL statement
        $stmt = mysqli_prepare($link, $query);

        // Bind parameters based on whether the label is set
        if ($label) {
            mysqli_stmt_bind_param($stmt, 'sii', $label, $start, $limit);
        } else {
            mysqli_stmt_bind_param($stmt, 'ii', $start, $limit);
        }

        // Execute the query
        mysqli_stmt_execute($stmt);

        // Get the result
        $result = mysqli_stmt_get_result($stmt);

        // Fetch all rows as an associative array
        $reservations = mysqli_fetch_all($result, MYSQLI_ASSOC);

        // Return the fetched reservations
        return $reservations;
    }

    public static function set_status($id,$status){
    try {
     $conn= parent::get_connection();
     $sql= "UPDATE `reservations` SET  `status`= '$status' where `id`= $id ";
     $query = $conn->prepare($sql);
     $query->execute();
     $message=$status=="approved"?"reservation approved successfully":"reservation rejected successfully";
     return["ok"=>true,"message"=>$message];
    } catch (\Throwable $th) {
    return["ok"=>false,"message"=>$th->getMessage()]; 
    }
    }
    public static function approve($id,$type,$type_id){
    try {
     $conn= parent::get_connection();
     $updater="";
     if($type=="hall"){
        $updater= "UPDATE `hall` SET availability=0 where `id`= $id ";
     }
     if($type=="hall"){
        $updater= "UPDATE `hall` SET availability=0 where `id`= $id ";
     }
     if($type=="hall"){
        $updater= "UPDATE `hall` SET availability=0 where `id`= $id ";
     }
     $sql= "UPDATE `reservations` SET  `status`= 'approved' where `id`= $id ";
     $query = $conn->prepare($sql);
     $query->execute();
     $message="reservation approved successfully";
     return["ok"=>true,"message"=>$message];
    } catch (\Throwable $th) {
    return["ok"=>false,"message"=>$th->getMessage()]; 
    }
    }
    }

?>