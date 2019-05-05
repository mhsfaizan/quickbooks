<?php
    require("connect.php");
    $postdata = json_decode(file_get_contents("php://input"));
    $sql = "SELECT * FROM admin WHERE email = '$postdata->email' AND password = '$postdata->password'";
    if($result = $conn->query($sql)){
        if($result->num_rows > 0){
            $isStart = session_start();
            $_SESSION['email'] = $postdata->email;
            echo json_encode(array("status"=>"true","message"=>"succefully Logged In."));
        }else{
            echo json_encode(array("status"=>"false","message"=>"Invalid email Or password."));
        }
    }else{
        echo json_encode(array("status"=>"false","message"=>"Query Error."));
    }
?>