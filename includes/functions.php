<?php
    // Function to connect to database
    function connectToDB(){
        // Setup database credential
        $host = 'mysql';
        $database_name = "classroom_management";
        $database_user = "root";
        $database_password = "secret";

        // Connecting to database (PDO - PHP database object)
        $database = new PDO(
            "mysql:host=$host;dbname=$database_name",
            $database_user, // Username
            $database_password // Password
        );

        return $database;
    }

    // Function to add error messages
    function setError($message, $path){
        $_SERVER["error"] = $message;
        // Redirect user to a specific page
        header("Location: ".$path);
        exit;
    }

    // Function to add sucees messages
    function setSuccess($message, $path){
        $_SERVER["success"] = $message;
        // Redirect user to a specific page
        header("Location: ".$path);
        exit;
    }
?>