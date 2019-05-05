<?php
    require("connect.php");
    extract($_POST);
    $sql = "DELETE FROM blog WHERE blog_id = $blogid";
    if($conn->query($sql)){
        echo json_encode(array("status"=>"true","message"=>"You have successfully deleted."));
    }else{
        echo json_encode(array("status"=>"false","message"=>"Query error."));
    }
?>