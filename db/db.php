<?php
class Db{
    public static function get_connection(){
     return new mysqli("localhost","root","","residenthotel","3306");
    }
}

?>