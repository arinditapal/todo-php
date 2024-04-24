<?php 

    $servername = "localhost";
    $username = "root";
    $password = "";

    $conn = mysqli_connect($servername, $username, $password );

    $dbCreateSql = "CREATE DATABASE `todos`";
    $tableCreateSql = "CREATE TABLE `todos`(id int primary key auto_increment, title varchar(20), completed int default 0)";
    $insertTodosSql = "INSERT INTO `todos`(`title`) VALUES( 'buy bread' ), ('finish cleaning room'), ('go for a walk')";

    mysqli_query($conn, $dbCreateSql);
    mysqli_query($conn, "USE `todos`");
    mysqli_query($conn, $tableCreateSql);
    mysqli_query($conn, $insertTodosSql);

?>