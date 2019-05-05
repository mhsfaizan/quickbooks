<?php
    require("connect.php");
    extract($_POST);
    $sql = "DELETE FROM comment WHERE comment_id=$commentId";
    if($conn->query($sql)){
        echo json_encode(array("status"=>"true","message"=>"You Have Deleted Succefully."));
    }else{
        echo json_encode(array("status"=>"false","message"=>"Query Error."));
    }
?>
