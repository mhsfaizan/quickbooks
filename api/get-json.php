<?php
    function getJson($path){
        $json = file_get_contents($path);
        return json_decode($json);
    }
?>