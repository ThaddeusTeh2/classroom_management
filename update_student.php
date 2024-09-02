<?php

    // 1. collect database info
    $host = '127.0.0.1';
    $database_name = "classroom_management"; // connecting to which database 
    $database_user = "root";
    $database_password = "";

    // 2. connect to database (PDO - PHP database object)
    $database = new PDO(
        "mysql:host=$host;dbname=$database_name",
        $database_user, // username
        $database_password // password
    );

    $name = $_POST["student_name"];
    $id = $_POST["student_id"];

    // check if name is not empty
    if ( empty( $name ) ) {
        echo 'Please insert something';
    } else {
        // update the name of the student
        // sql command (recipe)
        $sql = "UPDATE students SET name = :name WHERE id = :id";
        // prepare
        $query = $database->prepare( $sql );
        // execute
        $query->execute([
            'name' => $name,
            'id' => $id
        ]);

        // redirect
        header("Location: index.php");
        exit;
    }