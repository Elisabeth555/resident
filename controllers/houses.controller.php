<?php
require_once "../db/db.php";
class HouseController extends DB{

    public static function set_status($id,$status){
    try {
     $conn= parent::get_connection();
     $sql= "UPDATE `houses` SET  `availability`= $status where `id`= $id ";
     $query = $conn->prepare($sql);
     $query->execute();
     $message=$status==1?"house is set to active":"house is set to inactive";
     return["ok"=>true,"message"=>$message];
    } catch (\Throwable $th) {
    return["ok"=>false,"message"=>$th->getMessage()]; 
    }
    }
    }

?>