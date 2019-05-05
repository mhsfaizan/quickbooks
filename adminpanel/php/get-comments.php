<?php
    require("connect.php");
    $sql = "SELECT * FROM comment ORDER BY date DESC";
    if($res = $conn->query($sql)){
        if($res->num_rows > 0){
            $arr = array();
            while($row = $res->fetch_assoc()){
                array_push($arr,$row);
            }
            echo json_encode(array("status"=>"true","message"=>"You have succesfully fetched data.","data"=>$arr));
        }else{
            echo json_encode(array("status"=>"false","message"=>"No Data Found."));
        }
    }else{
        echo json_encode(array("status"=>"false","message"=>"Query Error."));
    }
?>