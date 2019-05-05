<?php 
    require('connect.php');
    extract($_POST);
    $html = $conn->real_escape_string($data);
    $blogData = json_decode($editForm);
    if(!empty($_FILES)){
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
                $sql = "UPDATE  blog SET `title` = '$title',`image` = '$filename',`keywords` = '$keywords',`short_desc` = '$description',`desc` =  '$html' WHERE blog_id = $blog_id";
                if($res = $conn->query($sql)){
                        echo json_encode(array("status"=>"true","message"=>"Successfully Updated Blog."));
                }else{
                    echo json_encode(array("status"=>"false","message"=>$conn->error));
                }
            }else{
                echo json_encode(array("status"=>"false","message"=>"Image not uploaded.Server Error"));
            }
        }
    }else{
      
        $title = $conn->real_escape_string($blogData->title);
        $keywords = $conn->real_escape_string($blogData->keywords);
        $description = $conn->real_escape_string($blogData->description);
        $sql = "UPDATE  blog SET `title` = '$title',`keywords` = '$keywords',`short_desc` = '$description',`desc` =  '$html' WHERE blog_id = $blog_id";
        if($res = $conn->query($sql)){
                echo json_encode(array("status"=>"true","message"=>"Successfully Updated Blog."));
        }else{
            echo json_encode(array("status"=>"false","message"=>$conn->error));
        }
    }
    
?>