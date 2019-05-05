<?php
    require("connect.php");
    extract($_POST);
    if($isApprove == 0){
        $sql = "UPDATE comment SET is_approve = 1 WHERE comment_id = $commentId";
        if($conn->query($sql)){
            echo json_encode(array("status"=>"true","message"=>"You have Succefully Approved."));
        }else{
            echo json_encode(array("status"=>"false","message"=>"Query Error."));
        }
    }else{
        $sql = "UPDATE comment SET is_approve = 0 WHERE comment_id = $commentId";
        if($conn->query($sql)){
            echo json_encode(array("status"=>"true","message"=>"You have Succefully Unapproved."));
        }else{
            echo json_encode(array("status"=>"false","message"=>"Query Error."));
        }
    }
?>