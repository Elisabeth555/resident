<?php
require_once "../db/db.php";
class HallsController extends DB{

    public static function set_status($id,$status){
    try {
     $conn= parent::get_connection();
     $sql= "UPDATE `halls` SET  `availability`= $status where `id`= $id ";
     $query = $conn->prepare($sql);
     $query->execute();
     $message=$status==1?"room is set to active":"room is set to inactive";
     return["ok"=>true,"message"=>$message];
    } catch (\Throwable $th) {
    return["ok"=>false,"message"=>$th->getMessage()]; 
    }
    }
    }

?>