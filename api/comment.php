<?php
    require("../adminpanel/php/connect.php");
    extract($_POST);
    if($email == "" || $name == "" || $comment == ""){
        echo json_encode(array("status"=>"false","message"=>"Please fill all entries."));
    }else{
        $sql = "INSERT INTO comment(comment,`name`,email,blog_id) VALUES('$comment','$name','$email',$blog_id)";
        if($conn->query($sql)){
            echo json_encode(array("status"=>"true","message"=>"You have succefully comment"));
        }else{
            echo json_encode(array("status"=>"false","message"=>$conn->error));
        }
    }
?>