<?php 

    require "db-connect.php";

    // php database models
    if(!function_exists("getAllTodos")) {
        function getAllTodos($conn) {
            $sql = "SELECT * FROM `todos`";
            $todos = mysqli_query($conn, $sql);
            return $todos;
        }
    }

    if(!function_exists("getOneTodo")) {
        function getOneTodo($conn, $id) {
            $sql = "SELECT * FROM `todos` WHERE `id`= {$id}";
            $todo = mysqli_query($conn, $sql);
            return mysqli_fetch_row($todo);
        }
    }


    if(!function_exists("addTodo")){
        function addTodo($conn, $title) {
            $sql = "INSERT INTO `todos`(`title`) VALUES ('{$title}') ";
            mysqli_query($conn, $sql);
        }
    }

    if(!function_exists("deleteTodo")){
        function deleteTodo($conn, $id) {
            $sql = "DELETE FROM `todos` WHERE `id` = {$id}";
            mysqli_query($conn, $sql);
            echo "todo deleted";
        }
    }

    if(!function_exists("updateTodo")) {
        function updateTitle($conn, $title, $id) {
            $sql = "UPDATE `todos` SET `title` = '{$title}' WHERE `id` = {$id}";
            mysqli_query($conn, $sql);
        }
    }
    
    if(!function_exists("updateCompleted")) {
        function updateCompleted($conn, $completed, $id) {
            $sql = "UPDATE `todos` SET `completed` = $completed WHERE `id` = {$id}";
            mysqli_query($conn, $sql);
        }
    }

    updateCompleted($conn, 1, 1);

?>