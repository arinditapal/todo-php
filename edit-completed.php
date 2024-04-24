<?php 

    include "model.php";

    $queries = $_SERVER["QUERY_STRING"];
    $queryParameters = array();
    parse_str($queries, $queryParameters);

    echo $queryParameters["id"] . $queryParameters["title"];
    updateCompleted($conn, $queryParameters["completed"], $queryParameters["id"]);

    header("Location:" . "/todo-php/index.php");
    exit();
?>