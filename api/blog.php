<?php
 require("../adminpanel/php/connect.php");
 $sql = "SELECT * FROM blog ORDER BY date DESC";
 if($res = $conn->query($sql)){
     if($res->num_rows > 0){
        $arr = array();
        while($row = $res->fetch_assoc()){
            array_push($arr,$row);
        }
    }else{
        $error = array("status"=>"false","message"=>"No Data Found.");
    }
 }else{
    $error = array("status"=>"false","message"=>"Query Error.");
 }
?>