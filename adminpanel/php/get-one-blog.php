<?php
    require("connect.php");
    extract($_POST);
    $sql = "SELECT * FROM blog WHERE blog_id = '$id'";
    if($res = $conn->query($sql)){
        if($res->num_rows > 0){
            $row = $res->fetch_assoc();
            $id = $row['blog_id'];
            $sql = "SELECT * FROM comment WHERE blog_id = $id AND is_approve = 1";
            $resp['blog'] = $row;
            if($res = $conn->query($sql)){
                if($res->num_rows >0 ){
                    $arr = array();
                    while($row1 = $res->fetch_assoc()){
                        array_push($arr,$row1);
                    }   
                    $resp['comments'] = $arr;
                }
            }
            echo json_encode(array("status"=>"true","message"=>"You have succesfully fetched data.","data"=>$resp));
        }else{
            echo json_encode(array("status"=>"false","message"=>"No Data Found."));
        }
    }else{
        echo json_encode(array("status"=>"false","message"=>"Query Error."));
    }
?>