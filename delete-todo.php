<?php 

    include "model.php";


    $url = $_SERVER["QUERY_STRING"];
    
    $parameters = array();
    parse_str($url, $parameters);

    deleteTodo($conn, $parameters["id"]);

    header("Location: " . "index.php");
    exit();
?>