<?php
    require("connect.php");
    extract($_POST);
    $html = $conn->real_escape_string($data);
    $blogData = json_decode($blogForm);
    if($_FILES['image']['size'] > 500000){
        echo json_encode(array("status"=>"false","message"=>"Size is large.Maximum size can be 500kb"));
    }else{
        $array = explode(".",$_FILES['image']['name']);
        $extension = end($array);
        $filename = $conn->real_escape_string(time().".".$extension);
        if(move_uploaded_file($_FILES['image']['tmp_name'],"../assets/uploads/".$filename)){
            $title = $conn->real_escape_string($blogData->title);
            $keywords = $conn->real_escape_string($blogData->keywords);
            $description = $conn->real_escape_string($blogData->description);
            $sql = "INSERT INTO blog(`title`,`image`,`keywords`,`short_desc`,`desc`) VALUES ('$title','$filename','$keywords','$description','$html')";
            if($res = $conn->query($sql)){
                    echo json_encode(array("status"=>"true","message"=>"Successfully Uploaded Blog."));
            }else{
                echo json_encode(array("status"=>"false","message"=>$conn->error));
            }
        }else{
            echo json_encode(array("status"=>"false","message"=>"Image not uploaded.Server Error"));
        }
    }
?>