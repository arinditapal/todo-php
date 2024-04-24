<?php 

    include "db-connect.php";
    require "model.php";

    if( $_SERVER["REQUEST_METHOD"] === "POST" ) {
        if (isset($_POST["title"])) {
            $title = $_POST["title"];
            if ($title) {
                addTodo($conn, $_POST["title"]);
            }
        }
    }

    header("Location: /todo-php/");
    die();
?>